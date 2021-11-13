<?php
require dirname(__DIR__).'/vendor/autoload.php';

use gtk\core;
use gtk\window;
use gtk\webView;

$window = new window();
$window->set_title('php-webkit');
$window->set_default_size(400, 240);
$webview = new webView();
$window->add($webview);
$webview->loadURL('https://kite.zerodha.com');
$window->show_all();
$window->connect('delete-event', function(){
    core::main_quit();
});
core::main();