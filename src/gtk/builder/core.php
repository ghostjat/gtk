<?php

namespace gtk\builder;

class core {

    public $cdata_instance, $uiFILE, $ffi;
    public ?string $error = null;

    /**
     * 
     * @param string $param
     */
    public function __construct($param = null) {
        $this->ffi = \gtk\core::getFFI();
        $this->uiFILE = $param;
        $this->cdata_instance = $this->_newBuilder();
    }

    protected function _newBuilder(): \FFI\CData {
        if ($this->uiFILE) {
            return $this->ffi->gtk_builder_new_from_file($this->uiFILE);
        }
        return $this->ffi->gtk_builder_new();
    }

    public function add_from_file(string $file) {
        return $this->ffi->gtk_builder_add_from_file($this->cdata_instance, $file, $this->error);
    }

    public function add_from_resource(string $res) {
        return $this->ffi->gtk_builder_add_from_resource($this->cdata_instance, $res, $this->error);
    }

    public function add_from_string(string $string) {
        return $this->ffi->gtk_builder_add_from_string($this->cdata_instance, $string, strlen($string), $this->error);
    }

    public function add_objects_from_resource(string $res, string $objID) {
        return $this->ffi->gtk_builder_add_objects_from_resource($this->cdata_instance, $res, $objID, $this->error);
    }

    public function add_objects_from_string(string $string, string $objID) {
        return $this->ffi->gtk_builder_add_objects_from_string($this->cdata_instance, $string, strlen($string), $objID, $this->error);
    }

    public function add_objects_from_file(string $file, string $objID) {
        return $this->ffi->gtk_builder_add_objects_from_file($this->cdata_instance, $file, $objID, $this->error);
    }

    public function get_object(string $objName): object {
        $cObj = $this->ffi->gtk_builder_get_object($this->cdata_instance, $objName);
        return $this->get_phpOBJ($cObj);
    }

    public function add_callback_symbol(string $cbName, string $cbSymbol) {
        return $this->ffi->gtk_builder_add_callback_symbol($this->cdata_instance, $cbName, $cbSymbol);
    }

    public function add_callback_symbols(array $cbDef) {
        foreach ($cbDef as $value) {
            $this->add_callback_symbol($value, $value);
        }
    }

    public function connect_signals($userData = null) {
        return $this->ffi->gtk_builder_connect_signals($this->cdata_instance, $userData);
    }

    public function get_phpOBJ($cObj): object {
        $widget = \gtk\core::cast2Widget($cObj);
        $gtype = $this->G_OBJECT_TYPE($widget);
        $gtype_name = $this->ffi->g_type_name($gtype);
        $phpgtk_name = $this->_mapObject(strtolower(substr($gtype_name, 3)));
        $phpOBJ = new $phpgtk_name();
        $phpOBJ->cdata_instance = $widget;
        return $phpOBJ;
    }

    private function G_OBJECT_TYPE($a) {
        $g_class = $this->ffi->cast("GTypeInstance *", $a)->g_class;
        $g_type = $this->ffi->cast("GTypeClass *", $g_class)->g_type;
        return $g_type;
    }

    private function _mapObject($phpObj) {
        $obj = json_decode(file_get_contents(dirname(__DIR__).'/builder/map.json'));
        $ns = $obj->$phpObj;
        return $ns;
    }

}
