<?php
require dirname(__DIR__).'/vendor/autoload.php';

use gtk\core;
use gtk\window;
use gtk\button;

$window = new window();
$window->set_title('php-gtkButton');
$window->set_default_size();
$btn = new button('php');
$window->add($btn);
$btn->connect('clicked', function(){
    print PHP_VERSION.PHP_EOL;
});
$window->connect('delete-event', function(){
    core::main_quit();
});
$window->show_all();
core::main();