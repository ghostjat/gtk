<?php

namespace gtk\sourceView;

/**
 * Description of completionWords
 *
 * @author ghost
 */
class completionWords extends editor {
    
    public function __construct(string $name) {
        parent::__construct();
        $this->cdata_instance = $this->ffi->gtk_source_completion_words_new($name,null);
    }
    
    public function register(\gtk\sourceView\buffer $buffer) {
        $this->ffi->gtk_source_completion_words_register($this->cdata_instance,$buffer->cdata_instance);
    }
    
    public function unregister(\gtk\sourceView\buffer $buffer) {
        $this->ffi->gtk_source_completion_words_unregister($this->cdata_instance,$buffer->cdata_instance);
    }
    
    public function add_provider(\FFI\CData $sourceCompletion):bool {
        $provider = $this->ffi->cast($this->ffi->type('GtkSourceCompletionProvider*'), $this->cdata_instance);
        return $this->ffi->gtk_source_completion_add_provider($sourceCompletion,$provider,null);
    }
    
    
}
