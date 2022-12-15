<?php

declare(strict_types=1);
namespace dsn;

/**
 * Description of sqlite
 *
 * @author ghost
 */
class sqlite extends \PDO {
    public const UPDATE_MIN = 0;
    public const UPDATE_EOD = 1;
    public const UPDATE_EOW = 2;
    public const UPDATE_EOM = 3;
    public const UPDATE_NSE = 4;
    
    public const DB = 'sqlite://home/ghost/database/coin.db';
    
    public function __construct(string $dsn = self::DB) {
        try {
            parent::__construct($dsn, null, null, null);
            $this->setAttribute(self::ATTR_ERRMODE, self::ERRMODE_EXCEPTION);
            $this->exec('PRAGMA journal_mode=wal;');
        } catch (\PDOException $exc) {
            echo $exc->getTraceAsString();
        }

        return $this;
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
                    $json = $api->getMinData($symbol, $sd, $ed);
                    $data = $this->parseYApiData($tick['id'], $json);
                    $this->insert('eod', $keys, $data);
                }
                break;
            case self::UPDATE_EOW:
                break;
            case self::UPDATE_EOM;
                break;
            case self::UPDATE_NSE;
                break;
        }
    }
    
    public function login($cid, $pwd) {
        $sql = $this->query("select * from client where email = '$cid'");
        $data = $sql->fetchObject();
        if($data !== false) {
            if(password_verify($pwd, $data->pwd)) {
                $this->query("Update client set active=1 where email = '$cid'");
                return 'login!'.PHP_EOL;
            }
            else{
                echo 'error!'.PHP_EOL;
            }
        }
        else{
            echo 'error!'.PHP_EOL;
        }
    }
    
    public function logout($cid){
        $this->query("Update client set active=0 where id = '$cid'");
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
    
    public function getWatchList(int $client_id, int $stock_id) {
        return $this->query("select ticker cmp from watchlist, quotes, stocks where watchlist.client_id = $client_id and stocks.id = $stock_id and quotes.id = stocks.id");
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
        echo "Num of Rows:-  $row";
        
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
