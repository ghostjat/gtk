<?php

namespace gtk\gdk;

/**
 * Description of rectangle
 *
 * @author ghost
 */
class rectangle {
    public $ffi,$cdata_instance;
    public function __construct(int $x, int $y, int $width, int $height) {
        $this->ffi = \gtk\core::getFFI();
        $this->cdata_instance = $this->ffi->new('GdkRectangle');
        $this->cdata_instance->x = $x;
        $this->cdata_instance->y = $y;
        $this->cdata_instance->width= $width;
        $this->cdata_instance->height=$height;
    }
}
