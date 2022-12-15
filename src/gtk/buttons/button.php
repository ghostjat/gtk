<?php


namespace gtk\buttons;

/**
 * Description of button
 *
 * @author ghost
 */
class button extends core{
     
    public function __construct(string $label) {
        parent::__construct();
        $this->label = $label;
        $this->cdata_instance = $this->ffi->gtk_button_new_with_label($this->label);
    }
    
    public static function new_image_button(string $icon,$size) {
        return core::getFFI()->gtk_button_new_from_icon_name($icon,$size);
    }
    
    public function get_image() {
        return $this->ffi->gtk_button_get_image($this->cdata_instance);
    }
    
    public function set_image(image $image) {
        return $this->ffi->gtk_button_set_image($this->cdata_instance,$image->cdata_instance);
    }
    
    public static function buttonBox(int $orientation) {
        return $this->ffi->gtk_button_box_new($orientation);
    }
    
    public function clicked() {
        $this->ffi->gtk_button_clicked($this->cdata_instance);
    }
    
    public function get_label(){
        return $this->ffi->gtk_button_get_label($this->cdata_instance);
    }
    
    public function set_label(string $label) {
        return $this->ffi->gtk_button_set_label($this->cdata_instance,$label);
    }
    
    
}
