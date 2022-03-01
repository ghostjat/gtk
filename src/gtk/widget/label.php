<?php

namespace gtk\widget;

class label extends core {
    public $label;
    
    public function __construct(string $label=null) {
        parent::__construct();
        $this->label = $label;
        $this->cdata_instance = $this->ffi->gtk_label_new($this->label);
    }
    
    public function __call($name, $args=null) {
        $function_name = 'gtk_label_'. $name;
        if(isset($args)){
            return $this->ffi->$function_name($this->cdata_instance,...$args);
        }
        else{
            return $this->ffi->$function_name($this->cdata_instance);
        }
    }
}
