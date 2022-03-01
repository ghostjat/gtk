<?php


namespace gtk;

/**
 * Description of textMark
 * GtkTextMark — A position in the buffer preserved across buffer modifications
 * @author ghost
 */
class textMark {
    protected $ffi;
    public $cdata_instance;
    
    /**
     * Creates a text mark. 
     * @param string $name
     * @param bool $left_gravity
     */
    public function __construct(string $name,bool $left_gravity) {
        $this->ffi = core::getFFI();
        $this->cdata_instance = $this->ffi->gtk_text_mark_new($name,$left_gravity);
    }
    
    public function __call($name, $args=null) {
        $function_name = 'gtk_text_mark_'. $name;
        if(isset($args)){
            return $this->ffi->$function_name($this->cdata_instance,...$args);
        }
        else{
            return $this->ffi->$function_name($this->cdata_instance);
        }
    }
}
