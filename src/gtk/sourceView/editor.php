<?php

namespace gtk\sourceView;

/**
 * Description of editor
 *
 * @author ghost
 */
class editor {
    
    public $ffi = null;
    public $instance = null;
    public $cdata_instance;
    
    public function __construct() {
        $this->ffi = core::getFFI();
    }
}
