#!/usr/local/bin/php
<?php
require dirname(__DIR__).'/vendor/autoload.php';

use gtk\core;
use gtk\widget\window;
use gtk\webKit\webView;

$window = new window();
$window->set_title('php-webkit');
$window->set_default_size(400, 240);
$webview = new webView();
$window->add($webview);
$webview->loadURL('https://developer-old.gnome.org/gtk3/stable/GtkWidget.html');
$window->show_all();
$window->connect('delete-event', function(){
    core::main_quit();
});
core::main();
