<?php

namespace glib;

class gList {
    public $cdata_instance, $ffi;
    
    public function __construct() {
        $this->ffi = core::getFFI();
    }
    
    public function data() {
        return $this->cdata_instance->data;
    }
    
    public function next() {
        $n = $this->cdata_instance->next;
        if($n) {
            $n->cdata;
        }
    }
    
    public function prev() {
        $n = $this->cdata_instance->prev;
        if($n) {
            $n->cdata;
        }
    }
    
    public function free() {
        return $this->ffi->g_list_free($this->cdata_instance);
    }
}
