<?php


namespace gtk;

class cellRendere {
    
    public $cdata_instance, $ffi;
    
    public function __construct() {
        $this->ffi = core::getFFI();
    }
    
    public function foreground(string $color){
        return \gobject\core::object_set($this->cdata_instance, "foreground", $color, "foreground-set", true);
    }
    
    public function background(string $color) {
        return \gobject\core::object_set($this->cdata_instance, "background", $color, "background-set", true);
    }
    
    public function editable(){
        return \gobject\core::object_set($this->cdata_instance, "editable", "", "editable-set", true);
        
    }
    
}
