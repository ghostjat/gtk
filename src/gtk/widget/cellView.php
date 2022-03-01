<?php

namespace gtk\widget;

/**
 * Description of cellView
 *
 * @author ghost
 */
class cellView extends core {
    
    public function __construct() {
        parent::__construct();
        $this->cdata_instance = $this->ffi->gtk_cell_view_new();
    }
    
    public function new_with_text(string $text): \FFI\CData {
        return $this->ffi->gtk_cell_view_new_with_text($text);
    }
    
    public function new_with_markuo(string $markup): \FFI\CData {
        return $this->ffi->gtk_cell_view_new_with_text($markup);
    }
    
    public function new_with_pixbuf(gdkPixbuf $pixbuf): \FFI\CData {
        return $this->ffi->gtk_cell_view_new_with_text($pixbuf->cdata_instance);
    }
    
    public function set_model(\gtk\treeModel $model) {
        $this->ffi->gtk_cell_view_set_model($this->cdata_instance,$model->cdata_instance);
    }
    
    public function get_model():\gtk\treeModel{
        return $this->ffi->gtk_cell_view_get_model($this->cdata_instance);
    }
    
    public function set_displayed_row(\gtk\treePath $path) {
        $this->ffi->gtk_cell_view_set_displayed_row($this->cdata_instance,$path->cdata_instance);
    }
    
    public function get_displayed_row():\gtk\treePath {
        return $this->ffi->gtk_cell_view_get_displayed_row($this->cdata_instance);
    }
    
    public function set_background_rgba($rgba) {
        $this->ffi->gtk_cell_view_set_background_rgba($this->cdata_instance,$rgba);
    }
    
    public function set_draw_sensitive(bool $drawSensitive){
        $this->ffi->gtk_cell_view_set_draw_sensitive($this->cdata_instance,$drawSensitive);
    }
    
    public function get_draw_sensitive():bool{
        return $this->ffi->gtk_cell_view_get_draw_sensitive($this->cdata_instance);
    }
    
    public function set_fit_model(bool $fitModel){
        $this->ffi->gtk_cell_view_set_fit_model($this->cdata_instance,$fitModel);
    }
    
    public function get_fit_model():bool{
        return $this->ffi->gtk_cell_view_get_fit_model($this->cdata_instance);
    }
    
    
}
