<?php

namespace gtk;

class treeViewColumn {
   
    const SORT_ASCENDING=1,SORT_DESCENDING=2;
    public $cdata_instance, $ffi;
    
    public function __construct(string $title, cellRendere $cell, $type, int $id) {
        $this->ffi = core::getFFI();
        $this->cdata_instance = $this->ffi->gtk_tree_view_column_new_with_attributes($title,$cell->cdata_instance, $type,$id, null);
    }
    
    public function set_clickable(){
        $this->ffi->gtk_tree_view_column_set_clickable ($this->cdata_instance,true);
    }
    
    public function set_sort_column_id(int $colID){
        return $this->ffi->gtk_tree_view_column_set_sort_column_id ($this->cdata_instance,$colID);
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
