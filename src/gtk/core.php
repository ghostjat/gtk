<?php

namespace gtk;

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
    
    public static function cast2Widget(\FFI\CData $widget) {
        return self::getFFI()->cast('GtkWidget * ', $widget);
    }
    
    public static function cast2_GTK_TREE_SORTABLE(\FFI\CData $widget){
        return self::getFFI()->cast('GtkTreeSortable * ', $widget);
    }
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self;
        }
        return self::$instance;
    }
    
    public static function main() {
        $instance = self::getInstance();
        return $instance->ffi->gtk_main();
    }

    public static function main_quit() {
        $instance = self::getInstance();
        $instance->ffi->gtk_main_quit();
    }
    
    public static function timeout(int $interval, $callback, \FFI\CData $ptr) {
        return \glib\core::timeout_add($interval, $callback, $ptr);
    }


    public static function pString2Char(string $string) {
        $char = \FFI::new("char[" . strlen($string) . "]");
        \FFI::memcpy($char, $string, strlen($string));
        return \FFI::cast("char *", $char);
    }

    public static function typeOf(\FFI\CData $cdata_instance): \FFI\CType {
        return \FFI::typeof($cdata_instance);
    }
    
    public static function object_unref($object) {
        core::getFFI()->g_object_unref($object);
    }


    protected function _init() {
        $this->ffi = \FFI::load(dirname(__DIR__).'/lib/gtk.h');
        return $this->ffi->gtk_init(\FFI::addr(\FFI::new('int')),null);
    }
    
    protected function version() {
        return (string) $this->ffi->gtk_check_version();
    }
    
}
