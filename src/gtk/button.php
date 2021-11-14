<?php

namespace gtk;

class button extends widget {
    
    protected $label;
    public function __construct(string $label) {
        parent::__construct();
        $this->label = $label;
        $this->cdata_instance = $this->ffi->gtk_button_new_with_label($this->label);
    }
    
    public static function new_image_button(string $icon,$size) {
        return core::getFFI()->gtk_button_new_from_icon_name($icon,$size);
    }
    
    public function set_image() {
        return $this->ffi->gtk_button_set_image();
    }
    
    public static function buttonBox(int $orientation) {
        return core::getFFI()->gtk_button_box_new($orientation);
    }
}
