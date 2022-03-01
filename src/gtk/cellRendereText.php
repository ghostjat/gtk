<?php

namespace gtk;

/**
 * Description of cellRendereText
 *
 * @author ghost
 */
class cellRendereText extends cellRendere{
    
    public function __construct() {
        parent::__construct();
        $this->cdata_instance = $this->ffi->gtk_cell_renderer_text_new();
    }
}
