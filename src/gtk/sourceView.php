<?php

namespace gtk;

class sourceView {
    protected $ffi;
    public $cdata_instance;
    
    public function __construct() {
        if (is_null($this->ffi)) {
            $this->_initSourceView();
        }
    }
    
    public function _initSourceView() {
        return $this->ffi = \FFI::load(dirname(__DIR__).'/lib/sourceview.h');
    }
    
}

