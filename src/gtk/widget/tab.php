<?php


namespace gtk\widget;

class tab extends core {
    
    public function __construct() {
        parent::__construct();
        $this->cdata_instance = $this->ffi->gtk_notebook_new();
    }
    
    /**
     * Appends a page to notebook
     * @param \gtk\widget\core $child
     * @param \gtk\widget\label $label
     * @return int the index (starting from 0) of the appended page in the notebook, or -1 if function fails
     */
    public function append_page(\gtk\widget\core $child, \gtk\widget\label $label):int {
        return $this->ffi->gtk_notebook_append_page($this->cdata_instance,$child->cdata_instance,$label->cdata_instance);
    }
    
    /**
     * Prepends a page to notebook
     * @param \gtk\widget\core $child
     * @param \gtk\widget\label $label
     * @return int the index (starting from 0) of the appended page in the notebook, or -1 if function fails
     */
    public function prepend_page(\gtk\widget\core $child, \gtk\widget\label $label):int {
        return $this->ffi->gtk_notebook_prepend_page($this->cdata_instance,$child->cdata_instance,$label->cdata_instance);
    }
    
    /**
     * Insert a page into notebook at the given position.
     * @param \gtk\widget\core $child
     * @param \gtk\widget\label $label
     * @param int $pos
     * @return int the index (starting from 0) of the appended page in the notebook, or -1 if function fails
     */
    public function insert_page(\gtk\widget\core $child, \gtk\widget\label $label,int $pos):int {
        return $this->ffi->gtk_notebook_append_page($this->cdata_instance,$child->cdata_instance,$label->cdata_instance,$pos);
    }
    
    /**
     * Removes a page from the notebook given its index in the notebook
     * @param int $page_num the index of a notebook page, starting from 0. If -1, the last page will be removed.
     */
    public function remove_page(int $page_num) {
        $this->ffi->gtk_notebook_remove_page($this->cdata_instance,$page_num);
    }
    
    public function detach_tab(\gtk\widget\core $child) {
        $this->ffi->gtk_notebook_detach_tab ($this->cdata_instance,$child->cdata_instance);
    }
    
    public function page_num(\gtk\widget\core $child):int{
        return $this->ffi->gtk_notebook_page_num($this->cdata_instance,$child->cdata_instance);
    }
    
    public function next_page(){
        $this->ffi->gtk_notebook_next_page($this->cdata_instance);
    }
    
    public function prev_page(){
        $this->ffi->gtk_notebook_prev_page($this->cdata_instance);
    }
    
    public function reorder_child(\gtk\widget\core $child, int $pos) {
        $this->ffi->gtk_notebook_reorder_child($this->cdata_instance,$child->cdata_instance,$pos);
    }
    
    public function set_tab_pos(\gtk\enum\positionType $pos) {
        $this->ffi->gtk_notebook_set_tab_pos($this->cdata_instance,$pos);
    }
    
    public function set_show_tabs(bool $show_tabs) {
        $this->ffi->gtk_notebook_set_shows_tabs($this->cdata_instance,$show_tabs);
    }
    
    public function set_show_border(bool $show_border){
        $this->ffi->gtk_notebook_set_show_border($this->cdata_instance,$show_border);
    }
    
    public function set_scrollable(bool $scrollable) {
        $this->ffi->gtk_notebook_set_scrollable($this->cdata_instance,$scrollable);
    }
    
    public function popup_enable(){
        $this->ffi->gtk_notebook_popup_enable($this->cdata_instance);
    }
    
    public function popup_disable(){
        $this->ffi->gtk_notebook_popup_disable($this->cdata_instance);
    }
    
    public function get_current_page(){
        $this->ffi->gtk_notebook_get_current_page($this->cdata_instance);
    }
    
    public function get_nth_page(int $page_num) {
        return $this->get_phpOBJ($this->ffi->gtk_notebook_get_nth_page($this->cdata_instance,$page_num));
    }
    
    public function get_n_pages():int{
        return $this->ffi->gtk_notebook_get_n_pages($this->cdata_instance);
    }
    
    public function get_tab_label(\gtk\widget\core $child) {
        return $this->get_phpOBJ($this->ffi->gtk_notebook_get_tab_label($this->cdata_instance,$child->cdata_instance));
    }
    
    public function set_tab_reorderable(\gtk\widget\core $child,bool $reorderable) {
        $this->ffi->gtk_notebook_set_tab_reorderable($this->cdata_instance,$child->cdata_instance,$reorderable);
    }
    
    public function set_tab_detachable(\gtk\widget\core $child,bool $detachable) {
        $this->ffi->gtk_notebook_set_tab_reorderable($this->cdata_instance,$child->cdata_instance,$detachable);
    }
    
    public function set_current_page(int $page_num) {
        $this->ffi->gtk_notebook_set_current_page($this->cdata_instance,$page_num);
    }
    
}
