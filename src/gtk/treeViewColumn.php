<?php

namespace gtk;

class treeViewColumn {
   
    public $cdata_instance, $ffi;
    
    public function __construct(string $title, \FFI\CData $cell, $type, int $id) {
        $this->ffi = core::getFFI();
        $this->cdata_instance = $this->ffi->gtk_tree_view_column_new_with_attributes($title,$cell, $type,$id, null);
    }

    public function set_title(string $title){
        return $this->ffi->gtk_tree_view_column_set_title($this->cdata_instance, $title);
    }
    
    public function set_reorderable(bool $reorderable = true){
        return $this->ffi->gtk_tree_view_column_set_reorderable($this->cdata_instance, $reorderable);
    }
    
    public function set_sort_indicator(bool $setting = true){
        return $this->ffi->gtk_tree_view_column_set_sort_indicator($this->cdata_instance, $setting);
    }
    
    public function set_resizable(bool $resizable = true){
        return $this->ffi->gtk_tree_view_column_set_resizable($this->cdata_instance, $resizable);
    }
}
