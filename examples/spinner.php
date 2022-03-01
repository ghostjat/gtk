<?php

require dirname(__DIR__).'/vendor/autoload.php';

use gtk\core;
use gtk\widget\window;
use gtk\widget\spinner;

$window = new window();
$window->set_title('php-gtkLabel');
$window->set_default_size();
$spinner = new spinner();
$spinner->start();
$window->add($spinner);
$window->show_all();
$window->connect('delete-event', function(){
    core::main_quit();
});
core::main();
