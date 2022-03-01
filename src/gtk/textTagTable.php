<?php

namespace gtk;

/**
 * Description of textTagTable
 * GtkTextTagTable — Collection of tags that can be used together
 * @author ghost
 */
class textTagTable {
    protected $ffi;
    public $cdata_instance;
    
    /**
     * Creates a new GtkTextTagTable. The table contains no tags by default.
     * 
     */
    public function __construct() {
        $this->ffi = core::getFFI();
        $this->cdata_instance = $this->ffi->gtk_text_tag_table_new();
    }
}
