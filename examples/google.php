#!/usr/local/bin/php
<?php
require dirname(__DIR__).'/vendor/autoload.php';

use gtk\core;
use gtk\widget\window;
use gtk\webView;

$window = new window();
$window->set_title('php-webkit');
$window->set_default_size(400, 240);
$webview = new webView();
$window->add($webview);
$webview->loadURL('https://google.in');
$window->show_all();
$window->connect('delete-event', function(){
    core::main_quit();
});
core::main();
