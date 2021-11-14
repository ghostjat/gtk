<?php

namespace gtk;

class label extends widget {
    public $label;
    
    public function __construct(string $label) {
        parent::__construct();
        $this->label = $label;
        $this->cdata_instance = $this->ffi->gtk_label_new($this->label);
    }
    
    public function __call($name, $args=[]) {
        $function_name = 'gtk_label_'. $name;
        return $this->ffi->$function_name($this->cdata_instance,...$args);
    }

    public function set_text(string $label) {
        return $this->ffi->gtk_label_set_text($this->cdata_instance, $label);
    }
    
    public function set_attributes(int $attrs) {
        return $this->ffi->gtk_label_set_attributes($this->cdata_instance,  $attrs);
    }
    
    public function set_markup(string $label) {
        return $this->ffi->gtk_label_set_markup($this->cdata_instance, $label);
    }
    
}
