<?php

namespace gtk\misc;

/**
 * Description of drawingArea
 *
 * @author ghost
 */
class drawingArea extends \gtk\widget\core {
    
    
    public function __construct() {
        parent::__construct();
        $this->cdata_instance = $this->ffi->gtk_drawing_area_new();
    }
}
