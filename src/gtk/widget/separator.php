<?php

namespace gtk\widget;

class separator extends core{
    
    public function __construct(\gtk\enum\orientation $orientation) {
        parent::__construct();
        $this->cdata_instance = $this->ffi->gtk_separator_new($orientation);
    }
}
