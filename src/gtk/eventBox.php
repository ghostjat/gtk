<?php

namespace gtk;

class eventBox extends widget {
    
    public function __construct() {
        parent::__construct();
        $this->cdata_instance = $this->ffi->gtk_event_box_new();
    }
}
