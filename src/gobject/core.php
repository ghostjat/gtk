<?php

namespace gobject;

/**
 * Description of core
 *
 * @author ghost
 */
class core {
    
    protected $ffi;
    private static $instance;
    
    public function __construct() {
        $this->ffi = \FFI::load(dirname(__DIR__).'/lib/gObject.h');
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
    
    
    public static function object_set($gObject,string $property, string $value,string $setProperty,bool $t=true){
        $instance = self::getInstance();
        return $instance->ffi->g_object_set($gObject, $property,$value,$setProperty,$t,null);
    }
}
