<?php

require 'vendor/autoload.php';
use gtk\builder;

$ui = new builder('examples/ui/yolo.ui');
$ui->add_callback_symbols(['main_quit',
    'on_loadImage_clicked',
    'on_saveImage_clicked',
    'on_runYolo_clicked',
    'on_imgFileDlg_destroy',
    'on_cancleImgBtn_clicked']);
$ui->connect_signals();
\gtk\core::main();

function on_runYolo_clicked(){}
function on_saveImage_clicked(){}
function on_loadImage_clicked(){
    global $ui;
    $ui->get_object('imgFileDlg');
}

function on_cancleImgBtn_clicked(){}
function on_imgFileDlg_destroy(){}
function main_quit() {
    \gtk\core::main_quit();
}
