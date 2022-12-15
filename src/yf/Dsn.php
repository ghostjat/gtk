<?php

declare(strict_types=1);
namespace yf;
class Dsn extends \PDO {
    public const UPDATE_MIN = 0;
    public const UPDATE_EOD = 1;
    public const UPDATE_EOW = 2;
    public const UPDATE_EOM = 3;
    public const UPDATE_NSE_EOD = 4;
    
    public const DB = 'sqlite://home/ghost/database/coin.db';
    
    public function __construct(string $dsn = self::DB, string $username = null, string $passwd = null, array $options = null) {
        try {
            parent::__construct($dsn, $username, $passwd, $options);
            $this->setAttribute(self::ATTR_ERRMODE, self::ERRMODE_EXCEPTION);
            $this->exec('PRAGMA journal_mode=wal;');
        } catch (\PDOException $exc) {
            echo $exc->getTraceAsString();
        }

        return $this;
    }
    
    public function addToWL($cid,$id){
        $this->query("insert into watchlist (client_id,stock_id) values('$cid','$id')") or die(Err());
    }
    
    public function getStockList($tickerOnly = false){
        if($tickerOnly){
            $sql = $this->query("select ticker from stocks");
        }
         else{
             $sql = $this->query("select id,ticker,instrument,sector,company,info from stocks");
         }
         return $sql->fetchAll(self::FETCH_OBJ);
    }
    
    public function getSettings(){
        $sql = $this->query('select * from settings') or die(Err());
        return $sql->fetchObject();
    }
    
    public function lastUpdate(){
        $sql = $this->query('select lastUpdate from settings') or die(Err());
        return $sql->fetchObject();
    }
    
    public function getLastNseUpdate(){
        $sql = $this->query('select nseUpdate from settings') or die(Err());
        return $sql->fetchObject();
    }
    
    public function getLastStockUpdate(){
        $sql = $this->query('select stockUpdate from settings') or die(Err());
        return $sql->fetchObject();
    }
    
    public function auth($cid){
        $sql = $this->query("select * from client where cname = '$cid'")or die(Err());
        return $sql->fetchObject();
    }

    public function updateLocalDatabase(int $typeOfUpdate,$sd,$ed){
        switch ($typeOfUpdate){
            case self::UPDATE_MIN:
                $keys = ['stock_id','date','time','open','high','low','close','volume'];
                $api = $this->__YapiCall();
                $query = $this->getTicker();
                while ($tick = $this->result($query)) {
                    $symbol = $tick['ticker'];
                    $json = $api->getMinData($symbol, $sd, $ed);
                    $data = $this->parseYApiData($tick['id'], $json, true);
                    $this->insert('intraday', $keys, $data);
                }
                break;
            case self::UPDATE_EOD:
                $keys = ['stock_id','date','open','high','low','close','volume'];
                $api = $this->__YapiCall();
                $query = $this->getTicker();
                while ($tick = $this->result($query)) {
                    $symbol = $tick['ticker'];
                    $json = $api->getEOD($symbol, $sd, $ed);
                    $data = $this->parseYApiData($tick['id'], $json);
                    $this->insert('eod', $keys, $data);
                }
                break;
            case self::UPDATE_EOW:
                break;
            case self::UPDATE_EOM;
                break;
            case self::UPDATE_NSE_EOD;
                $keys = ['date','open','high','low','close','volume'];
                $api = $this->__YapiCall();
                $json = $api->getNSE_EOD($sd, $ed);
                $data = $this->parseYApiNSEData($json);
                $this->insert('nse_eod', $keys, $data);
                break;
        }
    }
    
    public function getStock(string $stock) {
         return $this->query("select * from stocks where ticker = $stock");
    }
    
    public function getTicker() {
        return $this->query("select id, ticker from stocks");
    }
    
    public function getTickData(int $stock_id) {
        return $this->query("select * from quotes where id = $stock_id");
    }
    
    public function getWatchList(int $client_id) {
        $sql = $this->query("select stock_id,ticker,cmp FROM quotes, stocks,watchlist where "
                . " watchlist.client_id=$client_id and stocks.id = watchlist.stock_id and quotes.id = watchlist.stock_id");
        return$sql->fetchAll(self::FETCH_OBJ);
    }

    public function updateQuotes(int $stock_id, float $cmp, float $open, float $high, float $low) {
        $data = $this->getTickData($stock_id);
        if(($high == $data->high) && ($low == $data->low) && $open ==$data->open){
            $sql = $this->query("UPDATE quotes SET 
            cmp = $cmp,update = date('now') WHERE id = $stock_id");
        }
        else {
            $sql = $this->query("UPDATE quotes SET 
            cmp = $cmp,open = $open, high = $high, low = $low , update = date('now') WHERE id = $stock_id");
        }
        return $sql->rowCount();
    }
    
    public function result(\PDOStatement $sql) {
        return $sql->fetch();
    }
    
    public function resultObj(\PDOStatement $sql) {
        return $sql->fetch(self::FETCH_OBJ);
    }
    public function update($tableName,array $data,array $where){
        foreach($data as $field => $val) {
            $this->query("Update '$tableName' set '$field' = '$val' where ='$where'");
        }
    }
    
    public function insert(string $table,array $fields, array $data){
        $keys = array_map('strtolower', $fields);
        $this->beginTransaction();
        $insertFields = join(', ', $keys);
        $insertData = join(', ', array_fill(0, count($keys), '?'));
        $sql = "insert into $table($insertFields) values($insertData)";
        $insertQuery = $this->prepare($sql);
        $row = 0;
        $len = count($data);
        while ($row < $len) {
            $insertQuery->execute($data[$row]);
            $row++;
        }
        try {
            $this->commit();
        } catch (\PDOException $exc) {
            echo $exc->getMessage().PHP_EOL;
            $this->rollBack();
        }
        return $row ;
        
    }

    public function importCsvToSqlite($table, $csv) {
        $csvHandle = fopen(dirname(__DIR__).'/csv/'.$csv, 'r');
        if ($csvHandle === false) {
            throw new Exception('failed to read csv file');
        }
        $fields = array_map('strtolower', fgetcsv($csvHandle, 0, ',')); //fgetcsv($csvHandle, 0, ',');
        $this->beginTransaction();
        $insert_fields_str = join(', ', $fields);
        $insert_values_str = join(', ', array_fill(0, count($fields), '?'));
        $insert_sql = "insert into $table ($insert_fields_str) values ($insert_values_str)";
        $insert = $this->prepare($insert_sql);
        $inserted_rows = 0;
        while (($data = fgetcsv($csvHandle, 0, ',')) !== false) {
            $insert->execute($data);
            $inserted_rows++;
        }
        $this->commit();
        fclose($csvHandle);
        echo 'Table Name:- ' . $table . PHP_EOL;
        echo 'Num of Rows:- ' . $inserted_rows . PHP_EOL;
        unlink(dirname(__DIR__).'/csv/'.$csv);
    }
    
    public function parseYApiNSEData($json, $intraday = false): array {
        $data = json_decode($json);
        foreach ($data->chart->result as $row) {
            foreach ($row->timestamp as $d) {
                if ($intraday) {
                    $time[date('j-n-Y', $d)][] = date('h:i:s', $d);
                } else {
                    $date[] = date('j-n-Y', $d);
                }
            }
            foreach ($row->indicators->quote as $price) {
                foreach ($price->open as $p) {
                    $open[] = $p;
                }
                foreach ($price->high as $p) {
                    $high[] = $p;
                }
                foreach ($price->low as $p) {
                    $low[] = $p;
                }
                foreach ($price->close as $p) {
                    $close[] = $p;
                }
                foreach ($price->volume as $p) {
                    $vol[] = $p;
                }
            }
        }
        if ($intraday) {
            foreach ($time as $d => $date) {
                foreach ($date as $k => $t) {
                    $quote[] = [$d, $t, $open[$k], $high[$k], $low[$k], $close[$k], $vol[$k]];
                }
            }
        } else {
            foreach ($date as $k => $d) {
                $quote[] = [$d, $open[$k], $high[$k], $low[$k], $close[$k], $vol[$k]];
            }
        }
        return $quote;
    }
    
    /**
     * 
     * @param type $id
     * @param type $json
     * @param type $intraday
     * @return array
     */
    public function parseYApiData($id, $json, $intraday = false): array {
        $data = json_decode($json);
        foreach ($data->chart->result as $row) {
            foreach ($row->timestamp as $d) {
                if ($intraday) {
                    $time[date('j-n-Y', $d)][] = date('h:i:s', $d);
                } else {
                    $date[] = date('j-n-Y', $d);
                }
            }
            foreach ($row->indicators->quote as $price) {
                foreach ($price->open as $p) {
                    $open[] = $p;
                }
                foreach ($price->high as $p) {
                    $high[] = $p;
                }
                foreach ($price->low as $p) {
                    $low[] = $p;
                }
                foreach ($price->close as $p) {
                    $close[] = $p;
                }
                foreach ($price->volume as $p) {
                    $vol[] = $p;
                }
            }
        }
        if ($intraday) {
            foreach ($time as $d => $date) {
                foreach ($date as $k => $t) {
                    $quote[] = [$id, $d, $t, $open[$k], $high[$k], $low[$k], $close[$k], $vol[$k]];
                }
            }
        } else {
            foreach ($date as $k => $d) {
                $quote[] = [$id, $d, $open[$k], $high[$k], $low[$k], $close[$k], $vol[$k]];
            }
        }
        return $quote;
    }
    
    private function __YapiCall(){
        return new \Coin\Yapi();
    }

}
