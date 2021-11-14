<?php

namespace glib;

class core {
    protected $ffi;
    private static $instance;
    
    public function __construct() {
        $this->ffi = \FFI::load(dirname(__DIR__).'/lib/glib.h');
    }
    
    public static function getInstance() {
        if(self::$instance === null) {
            self::$instance = new self;
        }
        return self::$instance;
    }
    
    public static function getFFI() {
        $instance = self::getInstance();
        return $instance->ffi;
    }
    
    public static function timeout_add(int $interval, $callback, \FFI\CData $ptr) {
        $instance = self::getInstance();
        return $instance->ffi->g_timeout_add($interval,$callback,$ptr);
    }
    
    public function compileVersion() {
        define('GLIB_MAJOR_VERSION', $this->ffi->glib_major_version);
        define('GLIB_MINOR_VERSION', $this->ffi->glib_minor_version);
        define('GLIB_MICRO_VERSION', $this->ffi->glib_micro_version);
        define('GLIB_BINARY_AGE', $this->ffi->glib_binary_age);
        
        return $this->ffi->glib_check_version($this->ffi->glib_major_version,$this->ffi->glib_minor_version,$this->ffi->glib_micro_version);
    }
}
