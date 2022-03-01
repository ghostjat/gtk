<?php

namespace gtk\widget;

/**
 * Description of comboBoxText
 * ComboBoxText — A simple, text-only combo box
 * @author ghost
 */
class comboBoxText extends core{
    
    public function __construct(bool $entry = false) {
        parent::__construct();
        if($entry){
            $this->cdata_instance = $this->ffi->gtk_combo_box_text_new_with_entry();
        }
        else {
            $this->cdata_instance = $this->ffi->gtk_combo_box_text_new();
        }
    }
    
    public function append(string $text, string $id=null) {
        $this->ffi->gtk_combo_box_text_append($this->cdata_instance,$id,$text);
    }
    
    public function prepend(string $text, string $id=null) {
        $this->ffi->gtk_combo_box_text_prepend($this->cdata_instance,$id,$text);
    }
    
    public function insert(int $index, string $text, string $id=null) {
        $this->ffi->gtk_combo_box_text_insert($this->cdata_instance,$index,$id,$text);
    }
    
    public function append_text(string $text) {
        $this->ffi->gtk_combo_box_text_append_text($this->cdata_instance,$text);
    }
    
    public function prepend_text(string $text) {
        $this->ffi->gtk_combo_box_text_prepend_text($this->cdata_instance,$text);
    }
    
    public function insert_text(int $index, string $text) {
        $this->ffi->gtk_combo_box_text_insert_text($this->cdata_instance,$index,$text);
    }
    
    public function remove(int $index) {
        $this->ffi->gtk_combo_box_text_remove($this->cdata_instance,$index);
    }
    
    public function remove_all() {
        $this->ffi->gtk_combo_box_text_remove($this->cdata_instance);
    }
    
    public function get_active_text() {
        return $this->ffi->gtk_combo_box_text_get_active_text($this->cdata_instance);
    }
    
    
}
