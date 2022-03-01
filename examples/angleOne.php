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
use yf\Yapi;
use yf\Dsn;

$dsn = new Dsn();
$ticks = $dsn->getStockList(true);
$yapi = new Yapi();
foreach ($ticks as $tick) {
   $fdata[] = $yapi->getQuote($tick->ticker);
}
$window = new window();
$window->set_title('php-datatable');
$window->set_default_size();
$scrollWindow = new scrollWindow();
$scrollWindow->set_policy();
$window->add($scrollWindow);
$iter = new treeIter();

$rendere = new cellRendereText();
$chngRendere = new cellRendereText();
$cols[] = new treeViewColumn('Date', $rendere, 'text',0);
$cols[] = new treeViewColumn('Symbol', $rendere, 'text',1);
$cols[] = new treeViewColumn('Ltp', $rendere, 'text',2);
$cols[] = new treeViewColumn('Open', $rendere, 'text',3);
$cols[] = new treeViewColumn('High', $rendere, 'text',4);
$cols[] = new treeViewColumn('Low', $rendere, 'text',5);
$cols[] = new treeViewColumn('PClose', $rendere, 'text',6);
$cols[] = new treeViewColumn('Volume', $rendere, 'text',7);
$cols[] = new treeViewColumn('Change', $chngRendere, 'text',8);
$cols[] = new treeViewColumn('%Change', $rendere, 'text',9);


$view = new treeView();
$view->set_grid_lines(treeView::GRID_LINES_BOTH);
$view->set_headers_clickable();
foreach ($cols as $header) {
    $view->append_column($header);
    $header->set_reorderable();
    $header->set_resizable();
    $header->set_sort_indicator();
    $header->set_clickable();
}
$cols[1]->set_sort_column_id(1);
$model = new listStore([gType::STRING,gType::STRING,gType::FLOAT,gType::FLOAT,gType::FLOAT,gType::FLOAT,gType::FLOAT,gType::INT,gType::FLOAT,gType::FLOAT]);
foreach ($fdata as $key => $data) {
    $model->insert_with_values($iter, $key, [
        0, $data->date,
        1, $data->symbol,
        2, $data->price,
        3, $data->open,
        4, $data->high,
        5, $data->low,
        6, $data->previousDay,
        7, $data->volume,
        8, $data->change,
        9, $data->changePercent,
        -1
    ]);
}
$view->set_model($model);
\gtk\core::object_unref($model->cdata_instance);
$scrollWindow->add($view);
$window->show_all();
$window->connect('destroy', function(){
    \gtk\core::main_quit();
});
\gtk\core::main();