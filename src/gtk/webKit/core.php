<?php
namespace gtk\webKit;

/**
 * Description of core
 *
 * @author ghost
 */
class core {
    
    public $ffiWebView = null;
    public static $instance = null;
    public $cdata_instance;
    
    public function __construct() {
        if(is_null($this->ffiWebView)) {
            $this->_init();
        }
        return $this;
        
    }
    
    public static function getFFI() {
        $instance = self::getInstance();
        return $instance->ffiWebView;
    }
    
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self;
        }
        return self::$instance;
    }
    
    private function _init() {
        return $this->ffiWebView = \FFI::load(dirname(__DIR__) . "/../lib/webView.h");
    }
}
