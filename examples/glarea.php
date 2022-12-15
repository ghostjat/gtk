<?php
require dirname(__DIR__).'/vendor/autoload.php';

use gtk\core;
use gtk\widget\window;
use gtk\widget\glArea;

$window = new window();
$window->set_title('php-gtkglarea');
$window->set_default_size();
$gla = new glArea();
$window->add($gla);
$window->show_all();
$window->connect('delete-event', function(){
    core::main_quit();
});
core::main();

