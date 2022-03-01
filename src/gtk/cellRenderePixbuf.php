<?php

namespace gtk;

/**
 * Description of cellRenderePixbuf
 *
 * @author ghost
 */
class cellRenderePixbuf extends cellRendere {
    public function __construct() {
        parent::__construct();
        $this->cdata_instance = $this->ffi->gtk_cell_renderer_pixbuf_new();
    }
}
