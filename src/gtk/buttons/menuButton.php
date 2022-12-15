<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace gtk\buttons;

/**
 * Description of menuButton
 *
 * @author ghost
 */
class menuButton extends core {
    
    public function __construct() {
        parent::__construct();
        $this->cdata_instance = $this->ffi->gtk_menu_button_new();
    }
    
    public function set_popup($widget) {
        if($widget instanceof \gtk\widget\core){
            return $this->ffi->gtk_menu_button_set_popup ($this->cdata_instance,$widget->cdata_instance);
        }
        return $this->ffi->gtk_menu_button_set_popup ($this->cdata_instance,\gtk\core::cast2Widget($widget->cdata_instance));
    }
    
}
