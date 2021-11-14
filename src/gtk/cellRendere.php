<?php


namespace gtk;

class cellRendere {
    
    public $cdata_instance, $ffi;
    
    public function __construct() {
        $this->ffi = core::getFFI();
        $this->cdata_instance = $this->ffi->gtk_cell_renderer_text_new();
    }
}
