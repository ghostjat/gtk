<?php

namespace gtk;

class treeIter {
    
    public $cdata_instance, $ffi;
    
    public function __construct() {
        $this->ffi = core::getFFI();
        $this->cdata_instance = $this->ffi->new('GtkTreeIter *');
    }
}
