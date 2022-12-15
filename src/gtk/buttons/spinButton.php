<?php

namespace gtk\buttons;

/**
 * Description of spinButton
 *
 * @author ghost
 */
class spinButton extends core{
    
    public function __construct(float $min = 0, float $max = 100, float $step = 0.1) {
        parent::__construct();
        $this->cdata_instance = $this->ffi->gtk_spin_button_new_with_range($min,$max,$step);
    }
    
    public function set_digits(int $digits) {
        $this->ffi->gtk_spin_button_set_digits($this->cdata_instance,$digits);
    }
    
    public function set_increments(float $step, float $page) {
        $this->ffi->gtk_spin_button_set_increments($this->cdata_instance,$step,$page);
    }
    
    public function set_range(float $min = 0, float $max =100) {
        $this->ffi->gtk_spin_button_set_range($this->cdata_instance,$min,$max);
    }
    
    public function get_value_as_int() :int{
        return $this->ffi->gtk_spin_button_get_value_as_int($this->cdata_instance);
    }
    
    public function set_value(float $val) {
        $this->ffi->gtk_spin_button_set_value($this->cdata_instance,$val);
    }
    
    public function set_numeric(bool $numeric) {
        $this->ffi->gtk_spin_button_set_numeric($this->cdata_instance,$numeric);
    }
    
    public function get_digits():int {
        return $this->ffi->gtk_spin_button_get_digits($this->cdata_instance);
    }
    
    public function get_value():float {
        return $this->ffi->gtk_spin_button_get_value($this->cdata_instance);
    }
    
    public function get_numeric():bool {
        return $this->ffi->gtk_spin_button_get_numeric($this->cdata_instance);
    }
    
    public function update(){
        $this->ffi->gtk_spin_button_update($this->cdata_instance);
    }
    
    
}
