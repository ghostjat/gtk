<?php

namespace glib;

class gError {
    
    public $cdata_instance, $ffi;
    
    protected function __construct() {
        $this->ffi = core::getFFI();
    }
    
    public function error_new($domain, int $code,$format) {
        return $this->cdata_instance = $this->ffi->g_error_new($domain,$code, $format);
    }
    
    public function copy() {
        return  $this->ffi->g_error_copy($this->cdata_instance);
    }
    
    public static function new() {
        $instance = new self;
        $instance->cdata_instance = $instance->ffi->new('GError');
        return $instance->ffi->cast('GError **',$instance->cdata_instance);
    }
}
