<?php

declare(strict_types=1);

namespace yf;

use Coin\Exception\ApiException;
use GuzzleHttp\Client;
use Scheb\YahooFinanceApi\ApiClient;

class Yapi {

    public const INTERVAL_1_MIN = '1m';
    public const INTERVAL_1_DAY = '1d';
    public const INTERVAL_1_WEEK = '1wk';
    public const INTERVAL_1_MONTH = '1mo';
    public const NSE = '.NS';
    public const BSE = '.BS';
    public const NSE_CODE = '^NSEI';
    public const BSE_CODE = '^BSEI';

    private $client;

    public function __construct(string $timeZome = 'Asia/Kolkata') {
        date_default_timezone_set($timeZome);
        $this->client = new Client();
        return $this;
    }

    /**
     * 
     * @param string $symbol
     * @param type $startDate
     * @param type $endDate
     * @return type
     */
    public function getMinData(string $symbol, $startDate, $endDate) {
        $sd = $this->date($startDate);
        $ed = $this->date($endDate);
        $this->validateDate($sd, $ed);
        return $this->apiCall($symbol . self::NSE, $sd, $ed, self::INTERVAL_1_MIN);
    }

    /**
     * 
     * @param string $symbol
     * @param type $startDate
     * @param type $endDate
     * @return type
     */
    public function getEOD(string $symbol, $startDate, $endDate) {
        $sd = $this->date($startDate);
        $ed = $this->date($endDate);
        $this->validateDate($sd, $ed);
        return $this->apiCall($symbol . self::NSE, $sd, $ed, self::INTERVAL_1_DAY);
    }

    /**
     * 
     * @param string $symbol
     * @param type $startDate
     * @param type $endDate
     * @return type
     */
    public function getEOW(string $symbol, $startDate, $endDate) {
        $sd = $this->date($startDate);
        $ed = $this->date($endDate);
        $this->validateDate($sd, $ed);
        return $this->apiCall($symbol . self::NSE, $sd, $ed, self::INTERVAL_1_WEEK);
    }

    /**
     * 
     * @param type $startDate
     * @param type $endDate
     * @return type
     */
    public function getNSE_minData($startDate, $endDate) {
        $sd = $this->date($startDate);
        $ed = $this->date($endDate);
        $this->validateDate($sd, $ed);
        return $this->apiCall(self::NSE_CODE, $sd, $ed, self::INTERVAL_1_MIN);
    }

    /**
     * 
     * @param string $symbol
     * @param type $startDate
     * @param type $endDate
     * @return type
     */
    public function getEOM(string $symbol, $startDate, $endDate) {
        $sd = $this->date($startDate);
        $ed = $this->date($endDate);
        $this->validateDate($sd, $ed);
        return $this->apiCall($symbol . self::NSE, $sd, $ed, self::INTERVAL_1_MONTH);
    }

    /**
     * 
     * @param type $startDate
     * @param type $endDate
     * @return type
     */
    public function getNSE_EOD($startDate, $endDate) {
        $sd = $this->date($startDate);
        $ed = $this->date($endDate);
        $this->validateDate($sd, $ed);
        return $this->apiCall(self::NSE_CODE, $sd, $ed, self::INTERVAL_1_DAY);
    }

    /**
     * 
     * @param type $startDate
     * @param type $endDate
     * @return type
     */
    public function getNSE_EOW($startDate, $endDate) {
        $sd = $this->date($startDate);
        $ed = $this->date($endDate);
        $this->validateDate($sd, $ed);
        return $this->apiCall(self::NSE_CODE, $sd, $ed, self::INTERVAL_1_WEEK);
    }

    /**
     * 
     * @param type $startDate
     * @param type $endDate
     * @return type
     */
    public function getNSE_EOM($startDate, $endDate) {
        $sd = $this->date($startDate);
        $ed = $this->date($endDate);
        $this->validateDate($sd, $ed);
        return $this->apiCall(self::NSE_CODE, $sd, $ed, self::INTERVAL_1_MONTH);
    }

    public function search(string $stock) {
        return $this->apiClient()->search($stock);
    }
    
    public function getQuote(string $symbol) {
        $quote = $this->query($symbol);
        $ret['symbol'] = $quote->getSymbol();
        $ret['price'] = $quote->getRegularMarketPrice();
        $ret['date'] = date_format($quote->getRegularMarketTime(), 'd-m-Y G:i:s');
        $ret['open'] = $quote->getRegularMarketOpen();
        $ret['high'] = $quote->getRegularMarketDayHigh();
        $ret['low'] = $quote->getRegularMarketDayLow();
        $ret['previousDay'] = $quote->getregularMarketPreviousClose();
        $ret['volume'] = $quote->getRegularMarketVolume();
        $ret['change'] = $quote->getRegularMarketChange();
        $ret['changePercent'] = $quote->getRegularMarketChangePercent();
        return (object)$ret;
    }
    
    public function getBid(string $symbol){
        $quote = $this->query($symbol);
        $ret['bidSize'] = $quote->getBidSize();
        $ret['bid'] = $quote->getBid();
        $ret['ask'] = $quote->getAsk();
        $ret['askSize'] = $quote->getAskSize();
        return $ret;
    }
    
    public function getAMQ(string $symbol){
        $quote = $this->query($symbol);
        if ($quote->getPostMarketTime()) {
            $ret['price'] = $quote->getPostMarketPrice();
            $ret['change'] = $quote->getPostMarketChange();
            $ret['changePercent'] = $quote->getPostMarketChangePercent();
            $ret['lastTrade'] = date_format($quote->getPostMarketTime(), 'Y-m-d G:i:s');
            return $ret;
        }
        return false;
    }
    public function getFinancials(string $symbol){
        $quote = $this->query($symbol);
        $ret['name'] = $quote->getShortName();
        $ret['mktCap'] = $quote->getMarketCap();
        $ret['sharesOutstanding'] = $quote->getSharesOutstanding();
        $ret['volumeAvg3Month'] = $quote->getAverageDailyVolume3Month();
        $ret['bookValue'] = $quote->getBookValue();
        $ret['eps12Month'] = $quote->getEpsTrailingTwelveMonths();
        $ret['dividendRate'] = $quote->getTrailingAnnualDividendRate();
        $ret['dividendYield'] = $quote->getTrailingAnnualDividendYield();
        return $ret;
    }
    
    public function getStats(string $symbol){
        $quote = $this->query($symbol);
        $ret['stats']['SMA50'] = $quote->getFiftyDayAverage();
        $ret['stats']['SMA200'] = $quote->getTwoHundredDayAverage();
        $ret['stats']['1yrHigh'] = $quote->getFiftyTwoWeekHigh();
        $ret['stats']['1yrHighChangePercent'] = $quote->getFiftyTwoWeekHighChangePercent();
        $ret['stats']['1yrLow'] = $quote->getFiftyTwoWeekLow();
        $ret['stats']['1yrLowChangePercent'] = $quote->getFiftyTwoWeekLowChangePercent();
        return $ret;
    }
    private function query(string $symbol){
        return $this->apiClient()->getQuote($symbol.'.NS');
    }

    private function validateDate($startDate, $endDate): void {
        if ($startDate > $endDate) {
            throw new ApiException('Start date must be before end date');
        }
    }

    private function date(string $date) {
        return strtotime($date);
    }

    private function apiClient() {
        return new ApiClient($this->client, new \Scheb\YahooFinanceApi\ResultDecoder(new \Scheb\YahooFinanceApi\ValueMapper()));
    }

    private function __toCsv($filename, $quote, $intraday = false) {
        $file = dirname(__DIR__) . '/csv/' . $filename;
        if (file_exists($file)) {
            unlink($file);
        }
        $fp = fopen(dirname(__DIR__) . '/csv/' . $filename . '.csv', 'w');
        if ($intraday) {
            $key = ['stock_id', 'date', 'time', 'open', 'high', 'low', 'close', 'volume'];
        } else {
            $key = ['stock_id', 'date', 'open', 'high', 'low', 'close', 'volume'];
        }
        fputcsv($fp, $key);
        foreach ($quote as $q) {
            fputcsv($fp, $q);
        }
        fclose($fp);
    }

    /**
     * 
     * @param string $symbol
     * @param type $sd
     * @param type $ed
     * @param int $interval
     * @return type
     */
    private function apiCall(string $symbol, $sd, $ed, string $interval) {
        $url = "https://query1.finance.yahoo.com/v8/finance/chart/$symbol?symbol=$symbol&period1=$sd&period2=$ed&useYfid=true&interval=$interval&includePrePost=true&events=div%7Csplit%7Cearn&lang=en-US&region=IN";
        return $this->client->request('GET', $url)->getBody()->getContents();
    }
    //&crumb=q7D2TpojDLB&corsDomain=finance.yahoo.com
    //https://www1.nseindia.com/content/historical/EQUITIES/2022/JAN/cm31JAN2022bhav.csv.zip
    
    private function getFinancial(string $symbol){
        $url = "https://query1.finance.yahoo.com/v10/finance/quoteSummary/$symbol.NS?modules=incomeStatementHistory,cashflowStatementHistory,balanceSheetHistory,incomeStatementHistoryQuarterly,cashflowStatementHistoryQuarterly,balanceSheetHistoryQuarterly,earnings";
        $res = $this->client->request('GET', $url)->getBody();
        $decode = json_decode($res);
        return $decode->quoteSummary->result;
    }
    
    public function getQuaterlyIncome(array $data) {
        foreach ($data as $v) {
            foreach ($v->incomeStatementHistoryQuarterly->incomeStatementHistory as $k => $val) {
                foreach ($val as $key => $data) {
                    $finData['qIn'][$k][$key] = $data->raw;
                }
            }
        }
        return $finData;
    }
    
    public function getQuaterlyCashFlow(array $data) {
        foreach ($data as $v) {
            foreach ($v->cashflowStatementHistoryQuarterly->cashflowStatements as $k => $val) {
                foreach ($val as $key => $data) {
                    $finData['qcf'][$k][$key] = $data->raw;
                }
            }
        }
        return $finData;
    }

    public function getcashFlow(array $data) {
        foreach ($data as $v) {
            foreach ($v->cashflowStatementHistory->cashflowStatements as $k => $val) {
                foreach ($val as $key => $data) {
                    $finData['cf'][$k][$key] = $data->raw;
                }
            }
        }
        return $finData;
    }
    
    public function getQuaterlyBlanceSheet(array $data) {
        foreach ($data as $v) {
            foreach ($v->balanceSheetHistoryQuarterly->balanceSheetStatements as $k => $val) {
                foreach ($val as $key => $data) {
                    $finData['qbs'][$k][$key] = $data->raw;
                }
            }
        }
        return $finData;
    }
    
    public function getBlanceSheet(array $data) {
        foreach ($data as $v) {
            foreach ($v->balanceSheetHistory->balanceSheetStatements as $k => $val) {
                foreach ($val as $key => $data) {
                    $finData['qbs'][$k][$key] = $data->raw;
                }
            }
        }
        return $finData;
    }
    
    public function getIncome(array $data) {
        foreach ($data as $v) {
            foreach ($v->incomeStatementHistory->incomeStatementHistory as $k => $val) {
                foreach ($val as $key => $data) {
                    $finData['qbs'][$k][$key] = $data->raw;
                }
            }
        }
        return $finData;
    }
    

}

//https://query1.finance.yahoo.com/v10/finance/quoteSummary/IRFC.NS?modules=incomeStatementHistory,cashflowStatementHistory,balanceSheetHistory,incomeStatementHistoryQuarterly,cashflowStatementHistoryQuarterly,balanceSheetHistoryQuarterly,earnings

//https://query1.finance.yahoo.com/ws/fundamentals-timeseries/v1/finance/timeseries/IRFC.NS?symbol=IRFC.NS&padTimeSeries=true&type=quarterlyMarketCap,trailingMarketCap,quarterlyEnterpriseValue,trailingEnterpriseValue,quarterlyPeRatio,trailingPeRatio,quarterlyForwardPeRatio,trailingForwardPeRatio,quarterlyPegRatio,trailingPegRatio,quarterlyPsRatio,trailingPsRatio,quarterlyPbRatio,trailingPbRatio,quarterlyEnterprisesValueRevenueRatio,trailingEnterprisesValueRevenueRatio,quarterlyEnterprisesValueEBITDARatio,trailingEnterprisesValueEBITDARatio&merge=false&period1=493590046&period2=1644647975
