<?php

namespace gtk\sourceView;

/**
 * Description of languageManager
 *
 * @author ghost
 */
class languageManager extends editor {
    
    public function __construct(){
        parent::__construct();
        $this->cdata_instance = $this->ffi->gtk_source_language_manager_new();
    }
    
    public function get_language(string $langName): \FFI\CData {
        return $this->ffi->gtk_source_language_manager_get_language($this->cdata_instance,$langName);
    }
    
    public function get_default(): \FFI\CData {
        return $this->ffi->gtk_source_language_manager_get_default();
    }
    
    public function get_language_ids(){
        return $this->ffi->gtk_source_language_manager_get_language_ids($this->cdata_instance);
    }
    
    public function guess_language(string $fileName,string $type) {
        return $this->ffi->gtk_source_language_manager_guess_language($this->cdata_instance,$fileName,$type);
    }
    
}
