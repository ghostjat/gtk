<?php

namespace gtk\sourceView;

/**
 * Description of completion
 *
 * @author ghost
 */
class completion extends editor {
    
    public function __construct(\gtk\sourceView\view $view) {
        parent::__construct();
        $this->cdata_instance = $this->ffi->gtk_source_view_get_completion($view->cdata_instance);
    }
    
    
}
