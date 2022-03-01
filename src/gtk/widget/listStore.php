<?php


namespace gtk\widget;


class listStore extends core {
    
    protected $model;
    public function __construct($type) {
        parent::__construct();
        $this->cdata_instance = $this->ffi->gtk_list_store_new(count($type), ...$type);
    }
    
    public function get_path(\gtk\textIter $iter){
        return $this->ffi->gtk_tree_model_get_path ($this->cdata_instance, $iter->cdata_instance);
    }

    public function append(\gtk\treeIter $iter) {
        return $this->ffi->gtk_list_store_append($this->cdata_instance, $iter->cdata_instance);
    }
    
    public function set(\gtk\treeIter  $iter, array $val = null) {
        return $this->ffi->gtk_list_store_set($this->cdata_instance, $iter->cdata_instance, ...$val);
    }
    
    public function insert(\gtk\treeIter $iter,int $pos) {
        return $this->ffi->gtk_list_store_insert($this->cdata_instance, $iter->cdata_instance, $pos);
    }
    
    public function set_value(\gtk\treeIter $iter, int $col, $val) {
        return $this->ffi->gtk_list_store_set_value($this->cdata_instance, $iter->cdata_instance, $col, $val);
    }
    
    public function insert_with_values(\gtk\treeIter $iter, int $pos, array $val = null) {
        return $this->ffi->gtk_list_store_insert_with_values($this->cdata_instance,$iter->cdata_instance, $pos, ...$val);
    }
    
    public function iter_is_valid(\gtk\treeIter $iter) : bool {
        return $this->ffi->gtk_list_store_iter_is_valid($this->cdata_instance, $iter->cdata_instance);
    }
}
