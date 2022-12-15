<?php
require dirname(__DIR__).'/vendor/autoload.php';
use gtk\builder;

$ui = new builder('examples/ui/login.ui');
$ui->add_callback_symbols(['main_quit','onConnect']);
$ui->connect_signals(null);
\gtk\core::main();

function onConnect() {
    global $ui;
    $cid = $ui->get_object('idEntry');
    $pwd = $ui->get_object('passwordEntry');
    echo $cid->get_entry();
}

function main_quit() {
    \gtk\core::main_quit();
}

