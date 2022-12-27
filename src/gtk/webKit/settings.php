<?php

namespace gtk\webKit;

/**
 * Description of settings
 *
 * @author ghost
 */
class settings {
    
    public $ffi = null;
    public $instance = null;
    public $cdata_instance;
    
    const HARDWARE_ACCELERATION_POLICY_ON_DEMAND = 0,
    HARDWARE_ACCELERATION_POLICY_ALWAYS = 1,
    HARDWARE_ACCELERATION_POLICY_NEVER =2;
    
    public function __construct() {
        $this->ffi = \gtk\webKit\core::getFFI();
        $this->cdata_instance = $this->ffi->webkit_settings_new ();
    }
    
    public function setHardwareAccelerationPolicy(int $policy = self::HARDWARE_ACCELERATION_POLICY_ALWAYS) {
        return $this->ffi->webkit_settings_set_hardware_acceleration_policy ($this->cdata_instance,$policy);
    }
    
    
}
