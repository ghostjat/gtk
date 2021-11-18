<?php


namespace gtk;


class listStore {
    public $cdata_instance, $ffi;
    
    public function __construct($type) {
        $this->ffi = core::getFFI();
        $this->cdata_instance = $this->ffi->gtk_list_store_new(count($type), ...$type);
    }
    
    public function append(treeIter $iter) {
        return $this->ffi->gtk_list_store_append($this->cdata_instance, $iter->cdata_instance);
    }
    
    public function set(treeIter  $iter, array $val = null) {
        return $this->ffi->gtk_list_store_set($this->cdata_instance, $iter->cdata_instance, ...$val);
    }
    
    public function insert(treeIter $iter,int $pos) {
        return $this->ffi->gtk_list_store_insert($this->cdata_instance, $iter->cdata_instance, $pos);
    }
    
    public function set_value(treeIter $iter, int $col, $val) {
        return $this->ffi->gtk_list_store_set_value($this->cdata_instance, $iter->cdata_instance, $col, $val);
    }
    
    public function insert_with_values(treeIter $iter, int $pos, array $val = null) {
        return $this->ffi->gtk_list_store_insert_with_values($this->cdata_instance,$iter->cdata_instance, $pos, ...$val);
    }
    
    public function iter_is_valid(treeIter $iter) : bool {
        return $this->ffi->gtk_list_store_iter_is_valid($this->cdata_instance, $iter->cdata_instance);
    }
}
