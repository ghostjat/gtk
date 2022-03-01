<?php

namespace gtk\widget;

/**
 * Description of comboBox
 * ComboBox — A widget used to choose from a list of items
 * @author ghost
 */
class comboBox extends core {
    
    public function __construct() {
        parent::__construct();
        $this->cdata_instance = $this->ffi->gtk_combo_box_new();
    }
    
    public function get_wrap_width() :int{
        return $this->ffi->gtk_combo_box_get_wrap_width($this->cdata_instance);
    }
    
    public function set_wrap_width(int $width){
        return $this->ffi->gtk_combo_box_set_wrap_width($this->cdata_instance,$width);
    }
    
    public function get_active() :int{
        return $this->ffi->gtk_combo_box_get_active($this->cdata_instance);
    }
    
    public function set_active(int $index){
        $this->ffi->gtk_combo_box_set_active($this->cdata_instance,$index);
    }
    
    public function get_active_iter(\gtk\treeIter $iter):bool {
        return $this->ffi->gtk_combo_box_get_active_iter($this->cdata_instance,$iter->cdata_instance);
    }
    
    public function set_active_iter(\gtk\treeIter $iter=null) {
        $this->ffi->gtk_combo_box_set_active_iter($this->cdata_instance,$iter->cdata_instance);
    }
    
    public function get_id_column():int{
        return $this->ffi->gtk_combo_box_get_id_column($this->cdata_instance);
    }
    
    public function set_id_column(int $id_col){
        return $this->ffi->gtk_combo_box_set_id_column($this->cdata_instance,$id_col);
    }
    
    public function get_active_id() {
        return $this->ffi->gtk_combo_box_get_active_id($this->cdata_instance);
    }
    
    public function get_model():\gtk\treeModel{
        $cdata = $this->ffi->gtk_combo_box_get_model($this->cdata_instance);
    }
    
    public function set_model(\gtk\treeModel $model) {
        $this->ffi->gtk_combo_box_set_model($this->cdata_instance,$model->cdata_instance);
    }
    
    public function popup(){
        $this->ffi->gtk_combo_box_popup($this->cdata_instance);
    }
    
    public function popdown(){
        $this->ffi->gtk_combo_box_popdown($this->cdata_instance);
    }
    
    public function get_has_entry():bool {
        return $this->ffi->gtk_combo_box_get_has_entry($this->cdata_instance);
    }
    
    
}
