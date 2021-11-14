<?php

namespace gtk;

class builder {
    public $cdata_instance, $uiFILE, $ffi; 
    public string $error = null;
    
    public function __construct($param = null) {
        $this->ffi = core::getFFI();
        $this->uiFILE = $param;
        $this->cdata_instance = $this->_newBuilder();
    }
    
    protected function _newBuilder(): \FFI\CData {
        if($this->uiFILE) {
            return $this->ffi->gtk_builder_new_from_file($this->uiFILE);
        }
        return $this->ffi->gtk_builder_new();
    } 
    
    public function add_from_file(string $file) {
        return $this->ffi->gtk_builder_add_from_file($this->cdata_instance,$file, $this->error);
    }
    
    public function add_objects_from_file(string $file, string $objID) {
        return $this->ffi->gtk_builder_add_objects_from_file($this->cdata_instance, $file, $objID, $this->error);
    }
    
    public function get_object(string $objName) : \FFI\CData {
        return $this->ffi->gtk_builder_get_object($this->cdata_instance, $objName);
    }
    
    public function connect_signals($userData) {
        return $this->ffi->gtk_builder_connect_signals($this->cdata_instance, $userData);
    }
    
}
