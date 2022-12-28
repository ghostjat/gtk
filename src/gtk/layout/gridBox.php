<?php

namespace gtk\layout;

use gtk\widget\core;
/**
 * Description of gridBox
 *
 * @author ghost
 */
class gridBox extends core {
    
    public function __construct() {
        parent::__construct();
        $this->cdata_instance = $this->ffi->gtk_grid_new();
    }
    
    /**
     * 
     * @param \gtk\widget\core $child
     * @param int $left
     * @param int $right
     * @param int $width
     * @param int $height
     */
    public function attach(\gtk\widget\core $child, int $left, int $right, int $width, int $height) {
        $this->ffi->gtk_grid_attach($this->cdata_instance,$child->cdata_instance,$left,$right,$width,$height);
    }
    
    /**
     * 
     * @param \gtk\widget\core $child
     * @param \gtk\widget\core $sibling
     * @param \gtk\enum\positionType $posType
     * @param int $width
     * @param int $height
     */
    public function attach_next_to(\gtk\widget\core $child,\gtk\widget\core $sibling, \gtk\enum\positionType $posType, int $width, int $height) {
        $this->ffi->gtk_grid_attach_next_to($this->cdata_instance,$child->cdata_instance,$sibling->cdata_instance,$posType,$width,$height);
    }
    
    public function insert_row(int $pos) {
        $this->ffi->gtk_grid_insert_row($this->cdata_instance,$pos);
    }
    
    public function insert_column(int $pos) {
        $this->ffi->gtk_grid_insert_column($this->cdata_instance,$pos);
    }
    
    public function insert_next_to(\gtk\widget\core $child,\gtk\widget\core $sibling, \gtk\enum\positionType $posType) {
        $this->ffi->gtk_grid_insert_next_to($this->cdata_instance,$child->cdata_instance,$sibling->cdata_instance,$posType);
    }
    
    public function set_row_homogeneous(bool $homogeneous=true) {
        $this->ffi->gtk_grid_set_row_homogeneous($this->cdata_instance,$homogeneous);
    }
    
    public function set_column_homogeneous(bool $homogeneous=true) {
        $this->ffi->gtk_grid_set_column_homogeneous($this->cdata_instance,$homogeneous);
    }
    
    public function set_row_spacing(int $space) {
        $this->ffi->gtk_grid_set_row_spacing($this->cdata_instance,$space);
    }
    
    public function set_column_spacing(int $space) {
        $this->ffi->gtk_grid_set_column_spacing($this->cdata_instance,$space);
    }
    
    public function get_row_homogeneous():bool {
        return $this->ffi->gtk_grid_get_row_homogeneous($this->cdata_instance);
    }
    
    public function get_column_homogeneous():bool {
        return $this->ffi->gtk_grid_get_column_homogeneous($this->cdata_instance);
    }
    
    public function get_row_spacing():int {
        return $this->ffi->gtk_grid_get_row_spacing($this->cdata_instance);
    }
    
    public function get_column_spacing():int {
        return $this->ffi->gtk_grid_get_column_spacing($this->cdata_instance);
    }
    
    
}
