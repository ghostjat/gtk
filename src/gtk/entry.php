<?php

namespace gtk;

class entry extends widget {

    public const ICON_PRIMARY = 0;
    public const ICON_SECONDARY = 1;
    public const INPUT_TYPE_FREE_FORM = 0,
            INPUT_TYPE_ALPHA = 1,
            INPUT_TYPE_DIGITS = 2,
            INPUT_TYPE_NUMBER = 3,
            INPUT_TYPE_PHONE = 4,
            INPUT_TYPE_URL = 5,
            INPUT_TYPE_EMAIL = 6,
            INPUT_TYPE_NAME = 7,
            INPUT_TYPE_PASSWORD = 8,
            INPUT_TYPE_PIN = 9,
            INPUT_TYPE_TERMINAL = 10;

    public function __construct() {
        parent::__construct();

        // Create the window
        $this->cdata_instance = $this->ffi->gtk_entry_new();
    }
    
    
    public function set_input_type($type= self::INPUT_TYPE_FREE_FORM) {
        return core::getFFI()->gtk_entry_set_input_purpose($this->cdata_instance,$type);
    }
    
    public function get_input_type(){
        return core::getFFI()->gtk_entry_get_input_purpose($this->cdata_instance);
    }
    
    public function get_entry() {
        return core::getFFI()->gtk_entry_get_text($this->cdata_instance);
    }
    
    public function set_entry(string $data) {
        return core::getFFI()->gtk_entry_get_text($this->cdata_instance,$data);
    }
    
    public function set_visibility(bool $visible) {
        return core::getFFI()->gtk_entry_set_visibility($this->cdata_instance, $visible);
    }

    public function get_visibility(): bool {
        return core::getFFI()->gtk_entry_get_visibility($this->cdata_instance);
    }

}
