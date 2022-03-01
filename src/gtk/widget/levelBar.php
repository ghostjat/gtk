<?php

namespace gtk\widget;

/**
 * Description of levelBar
 * GtkLevelBar — A bar that can used as a level indicator
 * @author ghost
 */
class levelBar extends core{
    
    public function __construct() {
        parent::__construct();
        $this->cdata_instance = $this->ffi->gtk_level_bar_new();
    }
    
    public function set_mode(int $mode) {
        $this->ffi->gtk_level_bar_set_mode($mode);
    }
    
    public function get_mode() {
        return $this->ffi->gtk_level_bar_get_mode($this->cdata_instance);
    }
    
    public function set_value(float $val) {
        $this->ffi->gtk_level_bar_set_value($this->cdata_instance,$val);
    }
    
    public function get_value() {
        return $this->ffi->gtk_level_bar_get_value($this->cdata_instance);
    }
    
    public function set_min_value(float $val) {
        $this->ffi->gtk_level_bar_set_min_value($this->cdata_instance,$val);
    }
    
    public function get_min_value() {
        return $this->ffi->gtk_level_bar_get_min_value($this->cdata_instance);
    }
    
    public function set_max_value(float $val) {
        $this->ffi->gtk_level_bar_set_max_value($this->cdata_instance,$val);
    }
    
    public function get_max_value() {
        return $this->ffi->gtk_level_bar_get_max_value($this->cdata_instance);
    }
    
    public function set_inverted(bool $inverted) {
        $this->ffi->gtk_level_bar_set_inverted($this->cdata_instance,$inverted);
    }
    
    public function get_inverted() {
        return $this->ffi->gtk_level_bar_get_inverted($this->cdata_instance);
    }
    
    public function add_offset_value(string $name, float $val) {
        $this->ffi->gtk_level_bar_add_offset_value($this->cdata_instance, $name, $val);
    }
    
    public function remove_offset_value(string $name) {
        $this->ffi->gtk_level_bar_remove_offset_value($this->cdata_instance, $name);
    }
    
    public function get_offset_value(string $name, float $val) {
        return $this->ffi->gtk_level_bar_get_offset_value($this->cdata_instance, $name, $val);
    }
}
