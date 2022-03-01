<?php

namespace gtk;

/**
 * Description of cellRendereToggle
 *
 * @author ghost
 */
class cellRendereToggle extends cellRendere {

    public function __construct() {
        parent::__construct();
        $this->cdata_instance = $this->ffi->gtk_cell_renderer_toggle_new();
    }

    public function get_radio() {
        return $this->ffi->gtk_cell_renderer_toggle_get_radio($this->cdata_instance);
    }

    public function set_radio(bool $radio) {
        return $this->ffi->gtk_cell_renderer_toggle_set_radio($this->cdata_instance, $radio);
    }

    public function get_active() {
        return $this->ffi->gtk_cell_renderer_toggle_get_active($this->cdata_instance);
    }

    public function set_active(bool $setting) {
        return $this->ffi->gtk_cell_renderer_toggle_set_active($this->cdata_instance, $setting);
    }

}
