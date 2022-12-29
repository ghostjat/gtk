<?php

namespace gtk\widget;
use gtk\layout\container;

class scrollWindow extends container {
    
    public function __construct($hadjustment = null, $vadjustment = null) {
        parent::__construct();
        $this->cdata_instance = $this->ffi->gtk_scrolled_window_new($hadjustment, $vadjustment);
    }
    
    public function __call($name, $args=[]) {
        $function_name = 'gtk_scrolled_window_'. $name;
        return $this->ffi->$function_name($this->cdata_instance,...$args);
    }
    
    public function set_policy(int $hscrollbar_policy =1, int $vscrollbar_policy=1) {
        return $this->ffi->gtk_scrolled_window_set_policy($this->cdata_instance,$hscrollbar_policy,$vscrollbar_policy);
    }
}
