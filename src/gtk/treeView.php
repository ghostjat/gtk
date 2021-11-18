<?php

namespace gtk;

class treeView extends widget {
    
    public $model;
    const GRID_LINES_BOTH = 1;
    
    public function __construct(\FFI\CData $model = null) {
        parent::__construct();
        $this->model = $model;
        $this->cdata_instance = $this->_newTreeView();
    }
    
    protected function _newTreeView() {
        if($this->model) {
            return $this->ffi->gtk_tree_view_new_with_model($this->model);
        }
        return $this->ffi->gtk_tree_view_new();
    }
    
    public function append_column(treeViewColumn $column) {
        return $this->ffi->gtk_tree_view_append_column($this->cdata_instance, $column->cdata_instance);
    }
    
    public function set_model(listStore $model) {
        return $this->ffi->gtk_tree_view_set_model($this->cdata_instance, core::getFFI()->cast('GtkTreeModel*',$model->cdata_instance));
    }
    
    public function set_grid_lines($grid_lines) {
        return $this->ffi->gtk_tree_view_set_grid_lines($this->cdata_instance,  $grid_lines);
    }
    
    public function set_headers_clickable(bool $setting = true){
        return $this->ffi->gtk_tree_view_set_headers_clickable ($this->cdata_instance, $setting);
    }
}
