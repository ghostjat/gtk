<?php

namespace gtk\widget;

/**
 * Description of glArea
 *
 * @author ghost
 */
class glArea extends core {

    public function __construct() {
        parent::__construct();
        $this->cdata_instance = $this->ffi->gtk_gl_area_new();
    }

    public function get_context() {
        return $this->ffi->gtk_gl_area_get_context($this->cdata_instance);
    }

    public function make_current() {
        return $this->ffi->gtk_gl_area_make_current($this->cdata_instance);
    }

    public function queue_render() {
        return $this->ffi->gtk_gl_area_queue_render($this->cdata_instance);
    }

    public function attach_buffers() {
        return $this->ffi->gtk_gl_area_attach_buffers($this->cdata_instance);
    }

    public function set_error() {
        return $this->ffi->gtk_gl_area_set_error($this->cdata_instance, null);
    }

    public function get_error() {
        return $this->ffi->gtk_gl_area_get_error($this->cdata_instance);
    }

    public function set_has_alpha(bool $has_alpha) {
        return $this->ffi->gtk_gl_area_set_has_alpha($this->cdata_instance, $has_alpha);
    }

    public function get_has_alpha() {
        return $this->ffi->gtk_gl_area_get_has_alpha($this->cdata_instance);
    }

    public function set_has_depth_buffer(bool $has_depth_buffer) {
        return $this->ffi->gtk_gl_area_set_has_depth_buffer($this->cdata_instance, $has_depth_buffer);
    }

    public function get_has_depth_buffer() {
        return $this->ffi->gtk_gl_area_get_has_depth_buffer($this->cdata_instance);
    }

    public function set_has_stencil_buffer(bool $set_has_stencil_buffer) {
        return $this->ffi->gtk_gl_area_set_has_stencil_buffer($this->cdata_instance, $set_has_stencil_buffer);
    }

    public function get_has_stencil_buffer() {
        return $this->ffi->gtk_gl_area_get_has_stencil_buffer($this->cdata_instance);
    }

    public function set_auto_render(bool $auto_render) {
        return $this->ffi->gtk_gl_area_set_auto_render($this->cdata_instance, $auto_render);
    }

    public function get_auto_render() {
        return $this->ffi->gtk_gl_area_get_auto_render($this->cdata_instance);
    }

    public function set_use_es(bool $use_es) {
        return $this->ffi->gtk_gl_area_set_use_es($this->cdata_instance, $use_es);
    }

    public function get_use_es() {
        return $this->ffi->gtk_gl_area_get_use_es($this->cdata_instance);
    }

}
