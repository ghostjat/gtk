<?php
require dirname(__DIR__).'/vendor/autoload.php';

use gtk\gType;
use gtk\widget\window;
use gtk\widget\scrollWindow;
use gtk\treeIter;
use gtk\widget\treeView;
use gtk\treeViewColumn;
use gtk\widget\listStore;
use gtk\cellRendereText;

use Scheb\YahooFinanceApi\ApiClientFactory;

$window = new window();
$window->set_title('php-datatable');
$window->set_default_size();
$scrollWindow = new scrollWindow();
$scrollWindow->set_policy();
$window->add($scrollWindow);
$iter = new treeIter();

$rendere = new cellRendereText();
$cols[] = new treeViewColumn('Tick', $rendere, 'text',0);
$cols[] = new treeViewColumn('Date', $rendere, 'text',1);
$cols[] = new treeViewColumn('Open', $rendere, 'text',2);
$cols[] = new treeViewColumn('High', $rendere, 'text',3);
$cols[] = new treeViewColumn('Low', $rendere, 'text',4);
$cols[] = new treeViewColumn('Close', $rendere, 'text',5);
$cols[] = new treeViewColumn('Vol', $rendere, 'text',6);
$cols[] = new treeViewColumn('Chg', $rendere, 'text',7);
$cols[] = new treeViewColumn('%Chg', $rendere, 'text',8);
$cols[] = new treeViewColumn('PvCls', $rendere, 'text',9);
$cols[] = new treeViewColumn('50DM', $rendere, 'text',10);
$cols[] = new treeViewColumn('52H', $rendere, 'text',11);
$cols[] = new treeViewColumn('52L', $rendere, 'text',12);
$cols[] = new treeViewColumn('Dvd', $rendere, 'text',13);
$cols[] = new treeViewColumn('200DM', $rendere, 'text',14);
$cols[] = new treeViewColumn('MktCap', $rendere, 'text',15);

$view = new treeView();
$view->set_grid_lines(treeView::GRID_LINES_BOTH);
$view->set_headers_clickable();
foreach ($cols as $header) {
    $view->append_column($header);
    $header->set_reorderable();
    $header->set_resizable();
    $header->set_sort_indicator();
}

$model = new listStore([gType::STRING,gType::STRING,gType::STRING,gType::STRING,gType::STRING,gType::STRING,gType::STRING,gType::STRING,
    gType::STRING,gType::STRING,gType::STRING,gType::STRING,gType::STRING,gType::STRING,gType::STRING,gType::STRING]);
$i = 0;

$client = ApiClientFactory::createApiClient();
$quote = $client->getQuote("IRFC.NS");
//$v = $quote->jsonSerialize();
foreach ($quote->jsonSerialize() as $v) {
    $v->getSymbol();
    $model->insert_with_values($iter, $i, [
        0, $v->getSymbol(),
        1, $v->getRegularMarketTime()->format('y-m-d'),
        2, $v->getRegularMarketOpen(),
        3, $v->getregularMarketDayHigh(),
        4, $v->getregularMarketDayLow(),
        5, $v->getregularMarketPrice(),
        6, $v->getregularMarketVolume(),
        7, $v->getregularMarketChange(),
        8, $v->getregularMarketChangePercent(),
        9, $v->getregularMarketPreviousClose(),
        10, $v->getfiftyDayAverage(),
        11, $v->getfiftyTwoWeekHigh(),
        12, $v->getfiftyTwoWeekLow(),
        13, $v->getTrailingAnnualDividendYield(),
        14, $v->gettwoHundredDayAverage(),
        15, $v->getmarketCap(),
        -1
    ]);
    ++$i;
}
$view->set_model($model);
\gtk\core::object_unref($model->cdata_instance);
$scrollWindow->add($view);
$window->show_all();
$window->connect('destroy', function(){
    \gtk\core::main_quit();
});
\gtk\core::main();