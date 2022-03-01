<?php

namespace gtk\sourceView;

/**
 * Description of buffer
 *
 * @author ghost
 */
class buffer extends editor{
    
    public function __construct(\FFI\CData $language = null) {
        parent::__construct();
        if(isset($language)) {
            $this->cdata_instance = $this->ffi->gtk_source_buffer_new_with_language($language);
        }
        else {
            $this->cdata_instance = $this->ffi->gtk_source_buffer_new();
        }
    }

    public function get_language(): \FFI\CData {
        return $this->ffi->gtk_source_buffer_get_language($this->cdata_instance);
    }
    
    public function get_style_scheme():\FFI\CData {
        return $this->ffi->gtk_source_buffer_get_style_scheme($this->cdata_instance);
    }
    
    public function set_language(\FFI\CData $language) {
        $this->ffi->gtk_source_buffer_set_language($this->cdata_instance,$language);
    }
    
    public function set_style_scheme(\FFI\CData $style_scheme) {
        $this->ffi->gtk_source_buffer_set_style_scheme($this->cdata_instance,$style_scheme);
    }
    
    public function set_highlight_syntax(bool $flag = true) {
        $this->ffi->gtk_source_buffer_set_highlight_syntax($this->cdata_instance,$flag);
    }
    
    public function get_highlight_syntax():bool {
        return $this->ffi->gtk_source_buffer_get_highlight_syntax($this->cdata_instance);
    }
    
    public function set_highlight_matching_brackets(bool $flag = true) {
        $this->ffi->gtk_source_buffer_set_highlight_matching_brackets($this->cdata_instance,$flag);
    }
    
    public function get_highlight_matching_brackets():bool {
        return $this->ffi->gtk_source_buffer_get_highlight_matching_brackets($this->cdata_instance);
    }
    
    public function undo() {
        $this->ffi->gtk_source_buffer_undo($this->cdata_instance);
    }
    
    public function redo() {
        $this->ffi->gtk_source_buffer_redo($this->cdata_instance);
    }
    
    public function can_undo():bool {
        return $this->ffi->gtk_source_buffer_can_undo($this->cdata_instance);
    }
    
    public function can_redo():bool {
        return $this->ffi->gtk_source_buffer_can_redo($this->cdata_instance);
    }
    
    public function begin_not_undoable_action() {
        $this->ffi->gtk_source_buffer_begin_not_undoable_action($this->cdata_instance);
    }
    
    public function end_not_undoable_action() {
        $this->ffi->gtk_source_buffer_begin_not_undoable_action($this->cdata_instance);
    }
    
    public function get_max_undo_levels():int {
        return $this->ffi->gtk_source_buffer_get_max_undo_levels($this->cdata_instance);
    }
    
    public function set_max_undo_levels(int $maxLevels) {
        $this->ffi->gtk_source_buffer_get_max_undo_levels($this->cdata_instance,$maxLevels);
    }
    
}
