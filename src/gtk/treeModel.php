<?php


namespace gtk;

class treeModel {
    
    public $cdata_instance,$ffi;
    
    public function __construct() {
        $this->ffi = core::getFFI();
    }
    
    public function get_iter_first(\FFI\CData $iter) {
        return $this->ffi->gtk_tree_model_get_iter_first($this->cdata_instance,$iter);
    }
}
