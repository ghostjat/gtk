<?php


namespace gtk;

/**
 * Description of test
 *
 * @author ghost
 */
class test {
    
    public $ffi = null;
    public $instance = null;
    public $cdata_instance;
    
    public function __construct() {
        $this->ffi = \gtk\core::getFFI();
    }
    
}
require dirname(__DIR__).'/../vendor/autoload.php';

$t = new test();
$gdk = $t->ffi->new('GdkRectangle');
$gdk->x = 1;
$gdk->y=2;
$gdk->width=3;
$gdk->height=4;
var_dump(\FFI::addr($gdk));