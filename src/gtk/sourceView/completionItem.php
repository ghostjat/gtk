<?php


namespace gtk\sourceView;

/**
 * Description of completionItem
 *
 * @author ghost
 */
class completionItem extends editor {
    
    public function __construct() {
        parent::__construct();
        $this->cdata_instance = $this->ffi->gtk_source_completion_item_new();
    }
    
    public function set_label(string $label) {
        $this->ffi->gtk_source_completion_item_set_label($this->cdata_instance,$label);
    }
    
    public function set_markup(string $markup) {
        $this->ffi->gtk_source_completion_item_set_markup($this->cdata_instance,$markup);
    }
    
    public function set_text(string $text) {
        $this->ffi->gtk_source_completion_item_set_text($this->cdata_instance,$text);
    }
    
    public function set_icon(string $icon) {
        $this->ffi->gtk_source_completion_item_set_icon($this->cdata_instance,$icon);
    }
    
    public function set_icon_name(string $icon_name) {
        $this->ffi->gtk_source_completion_item_set_icon_name($this->cdata_instance,$icon_name);
    }
    
    public function set_info(string $info) {
        $this->ffi->gtk_source_completion_item_set_icon($this->cdata_instance,$info);
    }
}
