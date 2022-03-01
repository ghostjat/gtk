<?php

namespace gtk\widget;

class container extends core {
    
    const HORIZONTAL = 0,
          VERTICAL = 1;
    const PACK_START = 0,
            PACK_END =1;
    public function __construct() {
        parent::__construct();
    }
    
    public function add($widget) {
        if($widget instanceof \gtk\widget\core){
            return $this->ffi->gtk_container_add($this->cdata_instance, $widget->cdata_instance);
        }
        return $this->ffi->gtk_container_add($this->cdata_instance, \gtk\core::cast2Widget($widget->cdata_instance));
    }
    
    public function remove($widget) {
       return $this->ffi->gtk_container_remove($this->cdata_instance , $widget->cdata_instance);
    }
    
    public function foreach($callback) {
        // Create the user data, removing callback argument
        $userdata = func_get_args();
        array_shift($userdata);
        $this->ffi->gtk_container_foreach($this->ffi->cast("GtkContainer *", $this->cdata_instance), function ($widget) use ($callback, $userdata) {
            $object = $this->php_GtkOBJ($widget);
            array_unshift($userdata, $object);
            call_user_func_array($callback, $userdata);
        }, NULL);
    }
    
    public function get_children() {
        $children = [];
        $this->foreach(function ($widget) use (&$children) {
            $children[] = $widget;
        });
        return $children;
    }

    public function get_focus_child() {
        $children = [];
        $widget = $this->ffi->gtk_container_get_focus_child($this->ffi->cast("GtkContainer *", $this->cdata_instance));
        $object = $this->php_GtkOBJ($widget);
        return $object;
    }

    public function set_focus_child($widget) {
       return $this->ffi->gtk_container_set_focus_child($this->ffi->cast("GtkContainer *", $this->cdata_instance), $this->ffi->cast("GtkWidget *", $widget->cdata_instance));
    }

    public function child_type() {
        return $this->ffi->gtk_container_child_type($this->ffi->cast("GtkContainer *", $this->cdata_instance));
    }

    public function child_notify($widget, $child_property) {
        return $this->ffi->gtk_container_child_notify($this->ffi->cast("GtkContainer *", $this->cdata_instance), $this->ffi->cast("GtkWidget *", $widget->cdata_instance), $child_property);
    }
    
}
