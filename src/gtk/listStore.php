<?php


namespace gtk;


class listStore {
    public $cdata_instance, $ffi;
    
    public function __construct($type) {
        $this->ffi = core::getFFI();
        $this->cdata_instance = $this->ffi->gtk_list_store_new(count($type), ...$type);
    }
    
    public function append(\FFI\CData $iter) {
        return $this->ffi->gtk_list_store_append($this->cdata_instance, $iter);
    }
    
    public function set(\FFI\CData $iter, array $val = null) {
        return $this->ffi->gtk_list_store_set($this->cdata_instance, $iter, ...$val);
    }
    
    public function insert(\FFI\CData $iter,int $pos) {
        return $this->ffi->gtk_list_store_insert($this->cdata_instance, $iter,$pos);
    }
    
    public function set_value(\FFI\CData $iter, int $col, $val) {
        return $this->ffi->gtk_list_store_set_value($this->cdata_instance, $iter, $col, $val);
    }
    
    public function insert_with_values(treeIter $iter, int $pos, array $val = null) {
        return $this->ffi->gtk_list_store_insert_with_values($this->cdata_instance,$iter->cdata_instance, $pos, ...$val);
    }
    
    public function iter_is_valid(\FFI\CData $iter) : bool {
        return $this->ffi->gtk_list_store_iter_is_valid($this->cdata_instance, $iter);
    }
}
