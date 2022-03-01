<?php

namespace gtk\widget;

/**
 * Description of linkButton
 *
 * @author ghost
 */
class linkButton extends core{
    
    public function __construct( string $label = null) {
        parent::__construct();
        if($label){
            $this->cdata_instance = $this->ffi->gtk_link_button_new_with_label($label);
        }
        else {
            $this->cdata_instance = $this->ffi->gtk_link_button_new();
        }
    }
    
    public function get_uri() {
        return $this->ffi->gtk_link_button_get_uri($this->cdata_instance);
    }
    
    public function set_uri(string $uri) {
        $this->ffi->gtk_link_button_set_uri($this->cdata_instance, $uri);
    }
    
    public function get_visited() :bool {
        return $this->ffi->gtk_link_button_get_visited($this->cdata_instance);
    }
    
    public function set_visited(bool $visited) {
        $this->ffi->gtk_link_button_set_visited($this->cdata_instance,$visited);
    }
}
