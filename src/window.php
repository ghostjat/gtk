<?php

namespace gtk;

class window extends container {

    protected $name = 'GtkWidget';

    const TOPLEVEL = 0;
    const POPUP = 1;
    const POS_NONE = 0, POS_CENTER = 1,
            POS_MOUSE = 2, POS_CENTER_ALWAYS = 3,
            POS_CENTER_ON_PARENT = 4;

    public function __construct(int $GtkWidgetType = self::TOPLEVEL) {
        parent::__construct();
        $this->cdata_instance = core::getFFI()->gtk_window_new($GtkWidgetType);
    }

    public function set_title(string $title) {
       core::getFFI()->gtk_window_set_title($this->cdata_instance, $title);
    }

    public function get_title(): string {
        $a =core::getFFI()->gtk_window_get_title(core::cast2Widget($this->cdata_instance));
        return $a;
    }

    public function set_resizable(bool $resizable) {
       core::getFFI()->gtk_window_set_resizable(core::cast2Widget($this->cdata_instance), $resizable);
    }

    public function get_resizable(): bool {
        returncore::getFFI()->gtk_window_get_resizable(core::cast2Widget($this->cdata_instance));
    }

    public function set_modal(bool $modal) {
       core::getFFI()->gtk_window_set_modal(core::cast2Widget($this->cdata_instance), $modal);
    }

    public function get_modal(): bool {
        return core::getFFI()->gtk_window_get_modal(core::cast2Widget($this->cdata_instance));
    }

    public function set_default_size(int $width = 400, int $height=400) {
       core::getFFI()->gtk_window_set_default_size(core::cast2Widget($this->cdata_instance), $width, $height);
    }

    public function get_default_size(): array {
        $width =core::getFFI()->new("gint", FALSE);
        $height =core::getFFI()->new("gint", FALSE);

       core::getFFI()->gtk_window_get_default_size(core::cast2Widget($this->cdata_instance), \FFI::addr($width), \FFI::addr($height));

        return [
            'width' => $width->cdata,
            'height' => $height->cdata,
        ];
    }

    public function set_position(int $position) {
        core::getFFI()->gtk_window_set_position(core::cast2Widget($this->cdata_instance), $position);
    }

    public function get_position(): array {
        $root_x =core::getFFI()->new("gint", FALSE);
        $root_y =core::getFFI()->new("gint", FALSE);

       core::getFFI()->gtk_window_get_position(core::cast2Widget($this->cdata_instance), \FFI::addr($root_x), \FFI::addr($root_y));

        return [
            'x' => $root_x->cdata,
            'y' => $root_y->cdata,
        ];
    }

    public function set_transient_for($parent) {
       core::getFFI()->gtk_window_set_transient_for(core::cast2Widget($this->cdata_instance),core::cast2Widget($parent->cdata_instance));
    }

    public function set_attached_to($widget) {
       core::getFFI()->gtk_window_set_attached_to(core::cast2Widget($this->cdata_instance),core::cast2Widget($widget->cdata_instance));
    }

    public function set_destroy_with_parent(bool $setting) {
       core::getFFI()->gtk_window_set_destroy_with_parent(core::cast2Widget($this->cdata_instance), $setting);
    }

    public function set_hide_titlebar_when_maximized(bool $setting) {
       core::getFFI()->gtk_window_set_hide_titlebar_when_maximized(core::cast2Widget($this->cdata_instance), $setting);
    }

}
