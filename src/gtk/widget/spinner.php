<?php

namespace gtk\widget;

/**
 * Description of spinner
 * GtkSpinner — Show a spinner animation
 * @author ghost
 */
class spinner extends core{
    
    public function __construct() {
        parent::__construct();
        $this->cdata_instance = $this->ffi->gtk_spinner_new();
    }
    
    public function __call($name, $args=null) {
        $function_name = 'gtk_spinner_'. $name;
        if(isset($args)){
            return $this->ffi->$function_name($this->cdata_instance,...$args);
        }
        else{
            return $this->ffi->$function_name($this->cdata_instance);
        }
    }
}
