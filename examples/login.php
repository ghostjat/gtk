<?php
require dirname(__DIR__).'/vendor/autoload.php';

use gtk\widget\box;
use gtk\widget\label;
use gtk\widget\entry;
use gtk\widget\button;
use gtk\widget\window;

use yf\Dsn;

$db = new Dsn();

$mainBox = new box(box::VERTICAL,0);
$mainLabel = new label('Client Login Window');
$idBox = new box(box::HORIZONTAL,0);
$labelID = new label('Client ID');
$entryID = new entry();
$entryID->set_input_type(entry::INPUT_TYPE_EMAIL);
$idBox->pack_start($labelID, true, false, 1);
$idBox->pack_end($entryID,true,false,1);
$pwdBox = new box(box::HORIZONTAL,0);
$labelPWD = new label('Password');
$entryPwd = new entry();
$entryPwd->set_input_type(entry::INPUT_TYPE_PASSWORD);
$entryPwd->set_visibility(false);
$pwdBox->pack_start($labelPWD,true,false,1);
$pwdBox->pack_end($entryPwd,true,false,1);
$mainBox->pack_start($mainLabel,true,true,2);
$btnBox = new box(box::HORIZONTAL, 1);
$loginBTN = new button('Login');
$cancleBTN = new button('Cancle');

$loginBTN->connect('clicked', function() use($db,$entryID,$entryPwd){
    $db->login($entryID->get_entry(), $entryPwd->get_entry());
});
$cancleBTN->connect('clicked', function()use($db,$entryID){
    $db->logout($entryID->get_entry());
    \gtk\core::main_quit();
});
$btnBox->pack_start($loginBTN, true, false, 1);
$btnBox->pack_end($cancleBTN, true, false, 1);
$mainBox->add($idBox);
$mainBox->add($pwdBox);
$mainBox->add($btnBox);
$window = new window();
$window->add($mainBox);
$window->connect('destroy', function(){
    \gtk\core::main_quit();
});
$window->show_all();
\gtk\core::main();

