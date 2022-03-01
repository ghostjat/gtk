<?php

namespace gtk\widget;

class entry extends core {

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
        $this->cdata_instance = $this->ffi->gtk_entry_new();
    }
    
    public static function with_buffer(\gtk\gObject\entryBuffer $buffer): \FFI\CData{
        return \gtk\core::getFFI()->gtk_entry_new_with_buffer($buffer->cdata_instance);
    }
    
    public function set_buffer(\gtk\gObject\entryBuffer $buffer){
        $this->ffi->gtk_entry_set_buffer($this->cdata_instance,$buffer->cdata_instance);
    }
    
    
    public function set_input_type($type= self::INPUT_TYPE_FREE_FORM) {
        return $this->ffi->gtk_entry_set_input_purpose($this->cdata_instance,$type);
    }
    
    public function get_input_type(){
        return $this->ffi->gtk_entry_get_input_purpose($this->cdata_instance);
    }
    
    public function get_text() {
        return $this->ffi->gtk_entry_get_text($this->cdata_instance);
    }
    
    public function set_text(string $data) {
        return $this->ffi->gtk_entry_get_text($this->cdata_instance,$data);
    }
    
    public function get_text_length():int{
        return $this->ffi->gtk_entry_get_text_length($this->cdata_instance);
    }
    
    public function get_text_area(gdkRectangle $text_area){
        $this->ffi->gtk_entry_get_text_area($this->cdata_instance,$text_area->cdata_instance);
    }
    
    
    public function set_visibility(bool $visible) {
        return $this->ffi->gtk_entry_set_visibility($this->cdata_instance, $visible);
    }
    
    /**
     * 
     * @param string $char a Unicode character
     */
    public function set_invisible_char(string $char) {
        $this->ffi->gtk_entry_set_invisible_char($this->cdata_instance,$char);
    }

    public function get_visibility(): bool {
        return $this->ffi->gtk_entry_get_visibility($this->cdata_instance);
    }

}
