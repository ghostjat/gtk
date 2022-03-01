<?php


namespace gtk\widget;

/**
 * Description of searchBar
 * SearchBar — A toolbar to integrate a search entry with
 * @author ghost
 */
class searchBar extends core {
    
    public function __construct() {
        parent::__construct();
        $this->cdata_instance = $this->ffi->gtk_search_bar_new();
    }
    
    public function connect_entry(entry $entry) {
        $this->ffi->gtk_search_bar_connect_entry($this->cdata_instance,$entry->cdata_instance);
    }
    
    public function get_search_mode():bool{
        return $this->ffi->gtk_search_bar_get_search_mode($this->cdata_instance);
    }
    
    public function set_search_mode(bool $search_mode){
        $this->ffi->gtk_search_bar_set_search_mode($this->cdata_instance,$search_mode);
    }
    
    public function get_show_close_button():bool{
        return $this->ffi->gtk_search_bar_get_show_close_button($this->cdata_instance);
    }
    
    public function set_show_close_button(bool $search_mode){
        $this->ffi->gtk_search_bar_set_show_close_button($this->cdata_instance,$search_mode);
    }
}
