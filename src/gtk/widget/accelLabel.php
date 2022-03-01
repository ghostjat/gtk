<?php

namespace gtk\widget;

/**
 * Description of accelLabel
 * GtkAccelLabel — A label which displays an accelerator key on the right of the text
 * @author ghost
 */
class accelLabel extends core {
    
    public function __construct() {
        parent::__construct();
        $this->cdata_instance = $this->ffi->gtk_accel_label_new();
    }
    
    public function __call($name, $args=null) {
        $function_name = 'gtk_accel_label_'. $name;
        if(isset($args)){
            return $this->ffi->$function_name($this->cdata_instance,...$args);
        }
        else{
            return $this->ffi->$function_name($this->cdata_instance);
        }
    }
}
