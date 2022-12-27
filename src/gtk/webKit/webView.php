<?php

namespace gtk\webKit;

/**
 * Description of webView
 *
 * @author ghost
 */
class webView {
    public $ffi = null;
    public $instance = null;
    public $cdata_instance;
    
    public function __construct(\gtk\webKit\settings $settings = null) {
        $this->ffi = \gtk\webKit\core::getFFI();
        if(!empty($settings)) {
            $this->cdata_instance = $this->ffi->webkit_web_view_new_with_settings ($settings->cdata_instance);
        }else {
            $this->cdata_instance = $this->_newWebView();
        }
    }
    
    public function loadURL($url) {
        return $this->ffi->webkit_web_view_load_uri($this->cdata_instance,$url);
    }

    protected function _newWebView(){
        return $this->ffi->webkit_web_view_new();
    }
}
