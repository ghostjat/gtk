<?php

namespace cairo;

/**
 * Description of core
 *
 * @author ghost
 */
class core {
    public $ffi;
    private static $instance;

    public function __construct() {
        if(is_null($this->ffi)) {
            $this->_init();
        }
        return $this;
    }
    
    public static function getFFI() {
        $instance = self::getInstance();
        return $instance->ffi;
    }
    
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self;
        }
        return self::$instance;
    }
}
