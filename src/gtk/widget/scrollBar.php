<?php


namespace gtk\widget;

class scrollBar extends core {
    
    /**
     * 
     * @param \gtk\enum\orientation $orientatioin
     * @param type $adjustment
     */
    public function __construct(\gtk\enum\orientation $orientatioin, $adjustment = null) {
        parent::__construct();
        $this->cdata_instance = $this->ffi->gtk_scrollbar_new($orientatioin,$adjustment);
    }
}
