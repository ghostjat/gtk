<?php

require dirname(__DIR__).'/vendor/autoload.php';

use gtk\core;
use gtk\window;
use gtk\box;
use gtk\widget\spinner;
use gtk\widget\statusBar;

$window = new window();
$window->set_title('php-gtkLabel');
$window->set_default_size();
$box = new box(box::HORIZONTAL, 1);
$spinner = new spinner();
$spinner->start();
$statusBar = new statusBar();
$statusBar->push(0,PHP_OS_FAMILY);
$box->add($spinner);
$box->add($statusBar);
$window->add($box);
$window->show_all();
$window->connect('delete-event', function(){
    core::main_quit();
});
core::main();
