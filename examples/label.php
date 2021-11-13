<?php

require dirname(__DIR__).'/vendor/autoload.php';

use gtk\core;
use gtk\window;
use gtk\label;

$window = new window();
$window->set_title('php-gtkLabel');
$window->set_default_size();
$label = new label('php-ffi for Gtk3');
$window->add($label);
$window->show_all();
$window->connect('delete-event', function(){
    core::main_quit();
});
core::main();