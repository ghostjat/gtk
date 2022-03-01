<?php

namespace gtk\widget;

class treeView extends core {
    
    public $model;
    const GRID_LINE_HORIZONTAL = 1,
            GRID_LINE_VERTICAL = 2,
            GRID_LINES_BOTH = 3;
    
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
    
    public function append_column(\gtk\treeViewColumn $column) {
        return $this->ffi->gtk_tree_view_append_column($this->cdata_instance, $column->cdata_instance);
    }
    
    public function set_model(\gtk\widget\listStore $model) {
        return $this->ffi->gtk_tree_view_set_model($this->cdata_instance, \gtk\core::getFFI()->cast('GtkTreeModel*',$model->cdata_instance));
    }
    
    public function set_grid_lines($grid_lines=0) {
        return $this->ffi->gtk_tree_view_set_grid_lines($this->cdata_instance,  $grid_lines);
    }
    
    public function set_headers_clickable(bool $setting = true){
        return $this->ffi->gtk_tree_view_set_headers_clickable ($this->cdata_instance, $setting);
    }
}
