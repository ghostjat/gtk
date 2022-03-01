<?php

namespace gtk\gdk;

/**
 * Description of rgba
 *
 * @author ghost
 */
class rgba {
    public $ffi,$cdata_instance;
    public function __construct(float $r, float $g, float $b, float $alpha) {
        $this->ffi = \gtk\core::getFFI();
        $this->cdata_instance = $this->ffi->new('GdkRGBA');
        $this->cdata_instance->red = $r;
        $this->cdata_instance->green = $g;
        $this->cdata_instance->blue= $b;
        $this->cdata_instance->alpha=$alpha;
    }
}
