<?php


namespace gtk;

class checkButton extends widget {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function button_new(){
        return $this->cdata_instance = $this->ffi->gtk_check_button_new();
    }
    
    public function button_new_with_label(string $label) {
        return $this->cdata_instance = $this->ffi->gtk_check_button_new_with_label($label);
    }
    
    public function button_get_active() {
        return $this->ffi->gtk_toggle_button_get_active($this->cdata_instance);
    }
}
