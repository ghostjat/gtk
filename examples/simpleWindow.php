<?php

require dirname(__DIR__).'/vendor/autoload.php';

$window = new \gtk\widget\window();
$window->set_title('php-gtk');
$window->set_default_size(250, 250);
$window->show_all();
$window->connect('delete-event', function(){
    \gtk\core::main_quit();
});
\gtk\core::main();
