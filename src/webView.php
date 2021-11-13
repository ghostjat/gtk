<?php
namespace gtk;

class webView  {
    
    protected $ffiWebView, $name = 'WebKitWebView';
    public $cdata_instance;
    public function __construct() {
        $this->_initWebView();
        $this->cdata_instance = $this->_newWebView();
    }

    public function loadURL($url) {
        return $this->ffiWebView->webkit_web_view_load_uri($this->cdata_instance,$url);
    }

    protected function _newWebView(){
        return $this->ffiWebView->webkit_web_view_new();
    }
    
    protected function _initWebView() {
        return $this->ffiWebView = \FFI::load(__DIR__ . "/lib/webView.h");
    }

}

