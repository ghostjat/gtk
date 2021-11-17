<?php

namespace gtk;

class statusBar extends widget {
    
    public function __construct() {
        parent::__construct();
        $this->cdata_instance = $this->ffi->gtk_statusbar_new();
    }
    
    public function get_context_id(string $context_desc){
        return $this->ffi->gtk_statusbar_get_context_id($this->cdata_instance,$context_desc);
    }
    
    public function push(int $context_id, string $text) {
        return $this->ffi->gtk_statusbar_push($this->cdata_instance,$context_id,$text);
    }
    
    public function pop(int $context_id) {
        $this->ffi->gtk_statusbar_pop($this->cdata_instance,$context_id);
    }
    
    public function remove(int $context_id, int $msg_id) {
        $this->ffi->gtk_statusbar_remove($this->cdata_instance,$context_id,$msg_id);
    }
    
    public function remove_all(int $context_id) {
        $this->ffi->gtk_statusbar_remove_all($this->cdata_instance,$context_id);
    }
    
    public function get_message_area() {
        return $this->ffi->gtk_statusbar_get_message_area($this->cdata_instance);
    }
}
