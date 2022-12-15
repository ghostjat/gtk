<?php

namespace gtk\buttons;

/**
 * Description of colorButton
 *
 * @author ghost
 */
class colorButton extends core{
    
    public function __construct(array $rgba = null) {
        parent::__construct();
        if(!empty($rgba)) {
            $gdkRGBA = new \gtk\gdk\rgba(...$rgba);
            $this->cdata_instance = $this->ffi->gtk_color_button_new_with_rgba($gdkRGBA->cdata_instance);
        }
        else {
            $this->cdata_instance = $this->ffi->gtk_color_button_new();
        }
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
