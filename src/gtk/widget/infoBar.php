<?php
namespace gtk\widget;

class infoBar extends core {
    
    public function __construct() {
        parent::__construct();
        $this->cdata_instance = $this->ffi->gtk_info_bar_new();
    }
    
    public function add_action_widget(widget $child, int $response_id) {
        $this->ffi->gtk_info_bar_add_action_widget($this->cdata_instance, $child->cdata_instance,$response_id);
    }
    
    public function add_button(string $text, int $response_id) {
        return $this->ffi->gtk_info_bar_add_button($this->cdata_instance,$text,$response_id);
    }
    
    public function set_response_sensitive(int $response_id, bool $setting) {
        $this->ffi->gtk_info_bar_set_response_sensitive($this->cdata_instance,$response_id,$setting);
    }
    
    public function set_default_response(int $response_id) {
        $this->ffi->gtk_info_bar_set_default_response($this->cdata_instance,$response_id);
    }
    
    public function response(int $response_id) {
        $this->ffi->gtk_info_bar_response($response_id);
    }
    
    
}
