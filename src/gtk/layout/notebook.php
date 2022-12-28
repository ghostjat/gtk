<?php

namespace gtk\layout;

/**
 * Description of notebook
 *
 * @author ghost
 */
class notebook extends container {

    public function __construct() {
        parent::__construct();
        $this->cdata_instance = $this->ffi->gtk_notebook_new();
    }
    
    public function append_page($widget, \gtk\widget\label $label){
        if($widget instanceof \gtk\widget\core){
            return $this->ffi->gtk_notebook_append_page($this->cdata_instance,$widget->cdata_instance,$label->cdata_instance);
        }
        return $this->ffi->gtk_notebook_append_page($this->cdata_instance, \gtk\core::cast2Widget($widget->cdata_instance),$label->cdata_instance);
    }
    
    public function prepend_page($widget, \gtk\widget\label $label){
        if($widget instanceof \gtk\widget\core){
            return $this->ffi->gtk_notebook_prepend_page($this->cdata_instance,$widget->cdata_instance,$label->cdata_instance);
        }
        return $this->ffi->gtk_notebook_prepend_page($this->cdata_instance, \gtk\core::cast2Widget($widget->cdata_instance),$label->cdata_instance);
    }
    
    public function insert_page($widget, \gtk\widget\label $label, int $pageNum){
        if($widget instanceof \gtk\widget\core){
            return $this->ffi->gtk_notebook_insert_page($this->cdata_instance,$widget->cdata_instance,$label->cdata_instance,$pageNum);
        }
        return $this->ffi->gtk_notebook_insert_page($this->cdata_instance, \gtk\core::cast2Widget($widget->cdata_instance),$label->cdata_instance,$pageNum);
    }
    
    public function remove_page(int $pageNum) {
        return $this->ffi->gtk_notebook_remove_page($this->cdata_instance,$pageNum);
    }
    
    public function get_nth_page(int $pageNum) {
        return $this->ffi->gtk_notebook_get_nth_page($this->cdata_instance,$pageNum);
    }
    
    public function set_current_page(int $pageNum) {
        return $this->ffi->gtk_notebook_set_current_page($this->cdata_instance,$pageNum);
    }
    
    public function page_num($widget) {
        if($widget instanceof \gtk\widget\core){
            return $this->ffi->gtk_notebook_get_nth_page($this->cdata_instance,$widget->cdata_instance);
        }
        return $this->ffi->gtk_notebook_get_nth_page($this->cdata_instance, \gtk\core::cast2Widget($widget->cdata_instance));
    }
    
    public function get_current_page() {
        return $this->ffi->gtk_notebook_get_current_page($this->cdata_instance);
    }
    
    public function get_n_pages() {
        return $this->ffi->gtk_notebook_get_n_pages($this->cdata_instance);
    }
    
    public function next_page() {
        return $this->ffi->gtk_notebook_next_page($this->cdata_instance);
    }
    
    public function prev_page() {
        return $this->ffi->gtk_notebook_prev_page($this->cdata_instance);
    }
    
    public function get_show_border() {
        return $this->ffi->gtk_notebook_get_show_border($this->cdata_instance);
    }
    
    public function set_show_border(bool $show) {
        return $this->ffi->gtk_notebook_set_show_border($this->cdata_instance,$show);
    }
    
    public function get_scrollable () {
        return $this->ffi->gtk_notebook_get_scrollable ($this->cdata_instance);
    }
    
    public function set_scrollable (bool $scroll) {
        return $this->ffi->gtk_notebook_set_scrollable ($this->cdata_instance, $scroll);
    }
}
