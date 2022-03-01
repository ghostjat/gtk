<?php

namespace gtk;

/**
 * Description of textIter
 * GtkTextIter — Text buffer iterator
 * @author ghost
 */
class textIter {
    
    protected $ffi;
    public $cdata_instance;
    
    public function __construct() {
        $this->ffi = core::getFFI();
    }
    
    protected function _struct_textIter(){
        $cdata = $this->ffi->new('GtkTextIter');
        return \FFI::addr($cdata);
    }


    public function get_buffer(){
        
    }
}
