<?php
require dirname(__DIR__).'/vendor/autoload.php';

use gtk\core;
use gtk\window;
use gtk\image;
use gtk\box;
use gtk\button;

$window = new window();
$image = new image(dirname(__DIR__).'/php.png');
$box = new box(1, 5);
$box->add($image);
$btn = new button('Change');
$btn->connect('clicked', function()use($image){
    core::timeout(1000, 'imgUpdate', $image->cdata_instance);
});
$box->add($btn);
$window->add($box);
$window->show_all();
$window->connect('destroy', function(){
    core::main_quit();
});
core::main();
$i = 0;
function imgUpdate() {
    global $image,$i;
    $imgFile = glob('/home/ghost/projects/git/darknet/temp/out/*.jpg');
    if($i < 9) {
        $image->clear();
        $image->set_from_file($imgFile[$i]);
        echo $i++.PHP_EOL;
    }
    else{
        core::main_quit();
    }
}
