<?php

namespace gtk;

class spiner extends widget {
    
    public function __construct() {
        parent::__construct();
        $this->cdata_instance = $this->ffi->gtk_spinner_new();
    }
    
    public function start() {
        $this->ffi->gtk_spinner_start($this->cdata_instance);
    }
    
    public function stop() {
        $this->ffi->gtk_spinner_stop($this->cdata_instance);
    }
}
