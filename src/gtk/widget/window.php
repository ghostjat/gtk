<?php

namespace gtk\widget;

class window extends container {

    protected $name = 'GtkWidget';

    const TOPLEVEL = 0;
    const POPUP = 1;
    const POS_NONE = 0, POS_CENTER = 1,
            POS_MOUSE = 2, POS_CENTER_ALWAYS = 3,
            POS_CENTER_ON_PARENT = 4;

    public function __construct(int $GtkWidgetType = self::TOPLEVEL) {
        parent::__construct();
        $this->cdata_instance = $this->ffi->gtk_window_new($GtkWidgetType);
    }

    public function set_title(string $title) {
        $this->ffi->gtk_window_set_title($this->cdata_instance, $title);
    }

    public function get_title(): string {
        return $this->ffi->gtk_window_get_title($this->cdata_instance);
    }

    public function set_resizable(bool $resizable) {
        $this->ffi->gtk_window_set_resizable($this->cdata_instance, $resizable);
    }

    public function get_resizable(): bool {
        return$this->ffi->gtk_window_get_resizable($this->cdata_instance);
    }

    public function set_modal(bool $modal) {
        $this->ffi->gtk_window_set_modal($this->cdata_instance, $modal);
    }

    public function get_modal(): bool {
        return $this->ffi->gtk_window_get_modal($this->cdata_instance);
    }

    public function set_default_size(int $width = 400, int $height = 400) {
        $this->ffi->gtk_window_set_default_size($this->cdata_instance, $width, $height);
    }

    public function get_default_size(): array {
        $width = \gtk\core::getFFI()->new("gint", FALSE);
        $height = \gtk\core::getFFI()->new("gint", FALSE);

        $this->ffi->gtk_window_get_default_size($this->cdata_instance, \FFI::addr($width), \FFI::addr($height));
        return [
            'width' => $width->cdata,
            'height' => $height->cdata,
        ];
    }

    public function set_position(int $position) {
        $this->ffi->gtk_window_set_position($this->cdata_instance, $position);
    }

    public function get_position(): array {
        $root_x = \gtk\core::getFFI()->new("gint", FALSE);
        $root_y = \gtk\core::getFFI()->new("gint", FALSE);

        $this->ffi->gtk_window_get_position($this->cdata_instance, \FFI::addr($root_x), \FFI::addr($root_y));

        return [
            'x' => $root_x->cdata,
            'y' => $root_y->cdata,
        ];
    }

    public function activate_focus(): bool {
        return $this->ffi->gtk_window_activate_focus($this->cdata_instance);
    }
    
    
    public function set_transient_for($parent) {
        $this->ffi->gtk_window_set_transient_for($this->cdata_instance, $parent->cdata_instance);
    }

    public function set_attached_to($widget) {
        $this->ffi->gtk_window_set_attached_to($this->cdata_instance, $widget->cdata_instance);
    }

    public function set_destroy_with_parent(bool $setting) {
        $this->ffi->gtk_window_set_destroy_with_parent($this->cdata_instance, $setting);
    }

    public function set_hide_titlebar_when_maximized(bool $setting) {
        $this->ffi->gtk_window_set_hide_titlebar_when_maximized($this->cdata_instance, $setting);
    }

}
