<?php

namespace gtk;

class separator extends widget{
    
    public function __construct(int $orientation = core::ORIENTATION_HORIZONTAL) {
        parent::__construct();
        $this->cdata_instance = $this->ffi->gtk_separator_new($orientation);
    }
}
