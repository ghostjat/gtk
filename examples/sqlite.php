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

$window = new window();
$window->set_title('php-datatable');
$window->set_default_size();
$scrollWindow = new scrollWindow();
$scrollWindow->set_policy();
$window->add($scrollWindow);
$iter = new treeIter();

$rendere = new cellRendereText();
$cols[] = new treeViewColumn('Date', $rendere, 'text',0);
$cols[] = new treeViewColumn('Open', $rendere, 'text',1);
$cols[] = new treeViewColumn('High', $rendere, 'text',2);
$cols[] = new treeViewColumn('Low', $rendere, 'text',3);
$cols[] = new treeViewColumn('Close', $rendere, 'text',4);
$cols[] = new treeViewColumn('Volume', $rendere, 'text',5);
$cols[] = new treeViewColumn('PChange', $rendere, 'text',6);
$cols[] = new treeViewColumn('%Change', $rendere, 'text',7);

$view = new treeView();
$view->set_grid_lines(treeView::GRID_LINES_BOTH);
$view->set_headers_clickable();
foreach ($cols as $header) {
    $view->append_column($header);
    $header->set_reorderable();
    $header->set_resizable();
    $header->set_sort_indicator();
}

$model = new listStore([gType::STRING,gType::STRING,gType::STRING,gType::STRING,gType::STRING,gType::STRING,gType::STRING,gType::STRING]);
$i = 0;
try {
    $db = new PDO('sqlite://home/ghost/database/stock.sqlite');
    $db->exec('PRAGMA journal_mode=wal;');
} catch (PDOException $e) {
    echo $e->getMessage();
}
$sql = $db->query('select * from tatamotors');

while ($v = $sql->fetch(PDO::FETCH_OBJ)) {
    $model->insert_with_values($iter, $i, [
        0, $v->date,
        1, $v->open,
        2, $v->high,
        3, $v->low,
        4, $v->close,
        5, $v->volume,
        6, $v->amount_change,
        7, $v->percent_change,
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