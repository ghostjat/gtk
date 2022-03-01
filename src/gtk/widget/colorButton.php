<?php

namespace gtk\widget;

/**
 * Description of colorButton
 *
 * @author ghost
 */
class colorButton extends core{
    
    public function __construct(float $r, float $g, float $b, float $alpha) {
        parent::__construct();
        $gdkRGBA = new \gtk\gdk\rgba($r, $g, $b, $alpha);
        $this->cdata_instance = $this->ffi->gtk_color_button_new_with_rgba($gdkRGBA->cdata_instance);
    }
    
    public function set_title(string $title) {
        $this->ffi->gtk_color_button_set_title($this->cdata_instance,$title);
    }
    
    public function get_title() {
        return $this->ffi->gtk_color_button_get_title($this->cdata_instance);
    }
    
    public function set_rgba(\gtk\gdk\rgba $rgba){
        $this->ffi->gtk_color_chooser_set_rgba($this->cdata_instance,$rgba->cdata_instance);
    }
}
