<?php

namespace gtk\widget;

/**
 * Description of drawingArea
 *
 * @author ghost
 */
class drawingArea extends core {
    
    public function __construct() {
        parent::__construct();
        $this->cdata_instance = $this->ffi->gtk_drawing_area_new();
    }
}
