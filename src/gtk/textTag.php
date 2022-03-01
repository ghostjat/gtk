<?php

namespace gtk;

/**
 * Description of textTag
 * GtkTextTag — A tag that can be applied to text in a GtkTextBuffer
 * @author ghost
 */
class textTag {
    protected $ffi;
    public $cdata_instance;
    
    /**
     * Creates a GtkTextTag. 
     * Configure the tag using object arguments, i.e. using g_object_set().
     * 
     */
    public function __construct(string $name = null) {
        $this->ffi = core::getFFI();
        $this->cdata_instance = $this->ffi->gtk_text_tag_new($name);
    }
    
    public function __call($name, $args=null) {
        $function_name = 'gtk_text_tag_'. $name;
        if(isset($args)){
            return $this->ffi->$function_name($this->cdata_instance,...$args);
        }
        else{
            return $this->ffi->$function_name($this->cdata_instance);
        }
    }
}
