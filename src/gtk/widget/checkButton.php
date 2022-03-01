<?php


namespace gtk\widget;

class checkButton extends core {
    
    public function __construct(string $label = null) {
        parent::__construct();
        if($label) {
            $this->cdata_instance = $this->ffi->gtk_check_button_new_with_label($label);
        }
        else {
            $this->cdata_instance = $this->ffi->gtk_check_button_new();
        }
    }
    
    public function get_active() {
        return $this->ffi->gtk_toggle_button_get_active($this->cdata_instance);
    }
}
