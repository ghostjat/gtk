<?php

namespace gtk;

class image extends widget {
    
    public function __construct(string $file = null) {
        parent::__construct();
        if($file) {
            $this->cdata_instance = $this->ffi->gtk_image_new_from_file($file);
        }
        else {
            $this->cdata_instance = $this->ffi->gtk_image_new();
        }
        
        return $this;
    }
    
    public function set_from_file($file) {
        return $this->ffi->gtk_image_set_from_file($this->cdata_instance,$file);
    }
    
    public function set_from_resource(string $resource_path) {
        return $this->ffi->gtk_image_set_from_resource($this->cdata_instance, $resource_path);
    }
    
    public function set_from_icon(string $icon_name, int $size) {
        return $this->ffi->gtk_image_set_from_icon_name($this->cdata_instance,$icon_name,$size);
    }
    
    public function set_pixel_size(int $pixel_size) {
        return $this->ffi->gtk_image_set_pixel_size($this->cdata_instance,$pixel_size);
    }
    
    public function get_pixel_size() {
        return $this->ffi->gtk_image_get_pixel_size($this->cdata_instance);
    }

    public function clear() {
        return $this->ffi->gtk_image_clear($this->cdata_instance);
    }
}
