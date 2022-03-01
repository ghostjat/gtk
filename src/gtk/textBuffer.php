<?php

namespace gtk;

/**
 * Description of textBuffer
 * GtkTextBuffer — Stores attributed text for display in a GtkTextView
 * @author ghost
 */
class textBuffer {
    protected $ffi;
    public $cdata_instance;
    
    /**
     * Creates a new text buffer. 
     * @param string $tagTable
     */
    public function __construct($tagTable=null) {
        $this->ffi = core::getFFI();
        $this->cdata_instance = $this->ffi->gtk_text_buffer_new($tagTable);
    }
}
