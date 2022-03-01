<?php

require dirname(__DIR__).'/vendor/autoload.php';

use gtk\core;
use gtk\widget\window;
use gtk\widget\checkButton;

$window = new window();
$window->set_title('php-checkButton');
$window->set_default_size();
$chkBtn = new checkButton(PHP_VERSION);
$window->add($chkBtn);
$chkBtn->connect('toggled', function()use($chkBtn){
    if($chkBtn->get_active()) {
        print 1;
    }
    else {
        print 0;
    }
});
$window->show_all();
$window->connect('delete-event', function(){
    core::main_quit();
});
core::main();