<?php
namespace gtk\buttons;

/**
 * Description of switchButton
 *
 * @author ghost
 */
class switchButton extends core{
    
    public function __construct() {
        parent::__construct();
        $this->cdata_instance= $this->ffi->gtk_switch_new();
    }
    
    public function set_active(bool $is_active){
        $this->ffi->gtk_switch_set_active($this->cdata_instance,$is_active);
    }
    
    public function get_active():bool{
        return $this->ffi->gtk_switch_get_active($this->cdata_instance);
    }
    
    public function set_state(bool $state){
        $this->ffi->gtk_switch_set_state($this->cdata_instance,$state);
    }
    
    public function get_state():bool{
        return $this->ffi->gtk_switch_set_state($this->cdata_instance);
    }
    
}
