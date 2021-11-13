<?php

require dirname(__DIR__).'/vendor/autoload.php';

use gtk\core;
use gtk\window;
use gtk\checkButton;

$window = new window();
$window->set_title('php-checkButton');
$window->set_default_size();
$chkBtn = new checkButton();
$chkBtn->button_new_with_label(PHP_VERSION);
$window->add($chkBtn);
$chkBtn->connect('toggled', function()use($chkBtn){
    if($chkBtn->button_get_active()) {
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