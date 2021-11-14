<?php

namespace gtk;

class box extends container { 
    const ORIENTATION_HORIZONTAL = 0,
            ORIENTATION_VERTICAL = 1;
    const PACK_START = 0,
            PACK_END =1;
    
    public function __construct(int $orientation, int $space) {
        parent::__construct();
        $this->cdata_instance = $this->ffi->gtk_box_new($orientation, $space);
    }
    
    public function pack_start($c_widget, bool $expand, bool $fill, int $padding) {
        $this->ffi->gtk_box_pack_start($this->cdata_instance,$c_widget->cdata_instance,$expand,$fill,$padding);
    }
    
    public function pack_end($c_widget, bool $expand, bool $fill, int $padding) {
        $this->ffi->gtk_box_pack_end($this->cdata_instance,$c_widget->cdata_instance,$expand,$fill,$padding);
    }
    public function set_spacing(int $space) {
        $this->ffi->gtk_box_set_spacing($this->cdata_instance,$space);
    }
    
    public function get_spacing() {
        return $this->ffi->gtk_box_get_spacing($this->cdata_instance);
    }
    
}
