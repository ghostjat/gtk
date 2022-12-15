<?php

namespace gtk\buttons;

/**
 * Description of toggleButton
 *
 * @author ghost
 */
class toggleButton extends core{
    public function __construct(string $label) {
        parent::__construct();
        if($label) {
            $this->cdata_instance = $this->ffi->gtk_toggle_button_new_with_label($label);
        } 
        else {
            $this->cdata_instance = $this->ffi->gtk_toggle_button_new();
        }
    }
    
    public function set_mode(bool $draw_indicator) {
        $this->ffi->gtk_toggle_button_set_mode($this->cdata_instance,$draw_indicator);
    }
    
    public function get_mode():bool {
        return $this->ffi->gtk_toggle_button_get_mode($this->cdata_instance);
    }
    
    public function get_active():bool {
        return $this->ffi->gtk_toggle_button_get_active($this->cdata_instance);
    }
    
    public function set_active(bool $is_active) {
        return $this->ffi->gtk_toggle_button_set_active($this->cdata_instance,$is_active);
    }
}
