<?php

namespace gtk\layout;

use gtk\widget\core;
/**
 * Description of paned
 * Paned — A widget with two adjustable panes
 * @author ghost
 */
class paned extends core{
    
    /**
     * 
     * @param \gtk\enum\orientation int $orientation
     */
    public function __construct(int $orientation = null) {
        parent::__construct();
        $this->cdata_instance = $this->ffi->gtk_paned_new($orientation);
    }
    
    public function add1($child) {
         if($child instanceof \gtk\widget\core){
            return $this->ffi->gtk_paned_add1($this->cdata_instance,$child->cdata_instance);
         }
         return $this->ffi->gtk_paned_add1($this->cdata_instance, \gtk\core::cast2Widget($child->cdata_instance));
    }
    
    public function add2($child) {
        if($child instanceof \gtk\widget\core){
            return $this->ffi->gtk_paned_add2($this->cdata_instance,$child->cdata_instance);
         }
         return $this->ffi->gtk_paned_add2($this->cdata_instance, \gtk\core::cast2Widget($child->cdata_instance));
    }
    
    public function pack1($child,bool $resize, bool $shrink) {
        if($child instanceof \gtk\widget\core){
            return $this->ffi->gtk_paned_pack1($this->cdata_instance,$child->cdata_instance,$resize,$shrink);
         }
         return $this->ffi->gtk_paned_pack1($this->cdata_instance, \gtk\core::cast2Widget($child->cdata_instance),$resize,$shrink);
    }
    
    public function pack2($child,bool $resize, bool $shrink) {
        if($child instanceof \gtk\widget\core){
            return $this->ffi->gtk_paned_pack2($this->cdata_instance,$child->cdata_instance,$resize,$shrink);
         }
         return $this->ffi->gtk_paned_pack2($this->cdata_instance, \gtk\core::cast2Widget($child->cdata_instance),$resize,$shrink);
    }
    
    public function get_child1() {
        return $this->get_phpOBJ($this->ffi->gtk_paned_get_child1($this->cdata_instance));
    }
    
    public function get_child2() {
        return $this->get_phpOBJ($this->ffi->gtk_paned_get_child2($this->cdata_instance));
    }
    
    public function set_position(int $pos) {
        $this->ffi->gtk_paned_set_position($this->cdata_instance,$pos);
    }
    
    public function get_position():int {
        $this->ffi->gtk_paned_get_position($this->cdata_instance);
    }
}
