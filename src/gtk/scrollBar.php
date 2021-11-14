<?php


namespace gtk;

class scrollBar extends widget {
    
    public function __construct(int $orientatioin, $adjustment = null) {
        parent::__construct();
        $this->cdata_instance = $this->ffi->gtk_scrollbar_new($orientatioin,$adjustment);
    }
}
