<?php

namespace gtk\sourceView;

class view extends editor {
    
    public function __construct(\gtk\sourceView\buffer $buffer) {
        parent::__construct();
        $this->cdata_instance = $this->ffi->gtk_source_view_new_with_buffer($buffer->cdata_instance);
    }
    
    public function set_show_line_numbers(bool $flag = true){
        $this->ffi->gtk_source_view_set_show_line_numbers($this->cdata_instance,$flag);
    }
    
    public function set_show_right_margin(bool $flag = true) {
        $this->ffi->gtk_source_view_set_show_right_margin($this->cdata_instance,$flag);
    }
    
    public function set_highlight_current_line(bool $flag = true) {
        $this->ffi->gtk_source_view_set_highlight_current_line($this->cdata_instance,$flag);
    }
    
    public function set_auto_indent(bool $flag = true) {
        $this->ffi->gtk_source_view_set_auto_indent($this->cdata_instance,$flag);
    }
    
    public function set_indent_on_tab(bool $flag = true) {
        $this->ffi->gtk_source_view_set_indent_on_tab($this->cdata_instance,$flag);
    }
    
    public function set_tab_width(int $width = 4) {
        $this->ffi->gtk_source_view_set_tab_width($this->cdata_instance,$width);
    }
    
    public function set_indent_width(int $width = 4) {
        $this->ffi->gtk_source_view_set_indent_width($this->cdata_instance,$width);
    }
    
    public function set_smart_backspace(bool $flag = true) {
        $this->ffi->gtk_source_view_set_smart_backspace($this->cdata_instance,$flag);
    }
    
    public function get_completion(): \FFI\CData {
        return $this->ffi->gtk_source_view_get_completion($this->cdata_instance);
    }
}

