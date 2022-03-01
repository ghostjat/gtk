<?php
 require dirname(__DIR__).'/vendor/autoload.php';
 
 use gtk\widget\window;
 use gtk\widget\label;
 use gtk\widget\button;
 use gtk\widget\paned;
 use gtk\widget\box;
 $window = new window();
 $l = new label(PHP_VERSION_ID);
 $b = new button(PHP_VERSION);
 $paned = new paned();
 $paned->set_size_request(200, -1);
 $paned->pack1($l,true,false);
 $paned->pack2($b,false,false);
 $box = new box(box::HORIZONTAL,1);
 $box->add($paned);
 $window->add($box);
 $window->show_all();
 $window->connect('delete-event', function(){
    \gtk\core::main_quit();
});
\gtk\core::main();

