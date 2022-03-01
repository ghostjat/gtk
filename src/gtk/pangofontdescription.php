<?php


namespace gtk;

/**
 * Description of pangofontdescription
 *
 * @author ghost
 */
class pangofontdescription {
    protected $ffi;
    protected $cdata_instance;
    
    public function __construct() {
        if(is_null($this->ffi)) {
            $this->_init();
        }
        $this->cdata_instance = $this->ffi->pango_font_description_new();
    }
    
    public function get_font_description_size_is_absolute():bool{
        return $this->ffi->pango_font_description_get_size_is_absolute($this->cdata_instance);
    }
    
    public function set_font_description_absolute_size(float $size){
        $this->ffi->pango_font_description_set_absolute_size($this->cdata_instance, $size);
    }
    
    public function get_font_description_size(int $size):int{
        return $this->ffi->pango_font_description_get_size($this->cdata_instance, $size);
    }
    
    public function set_font_description_size(int $size){
        $this->ffi->pango_font_description_set_size($this->cdata_instance, $size);
    }
    
    public function get_font_description_family():string{
        return \FFI::string($this->ffi->pango_font_description_get_family($this->cdata_instance));
    }
    
    public function set_font_description_family(string $font_family){
        $this->ffi->pango_font_description_set_family($this->cdata_instance, $font_family);
    }
    
    public function free_font_description(){
        $this->ffi->pango_font_description_free($this->cdata_instance);
    }
    protected function _init() {
        $this->ffi = \FFI::load(dirname(__DIR__).'/lib/pango.h');
    }
    
}
