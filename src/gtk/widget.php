<?php

namespace gtk;

class widget {

    protected $ffi = null;
    public $instance = null;
    public $cdata_instance;
    
    public function __construct() {
        $this->ffi = \gtk\core::getFFI();
    }

    public function destroy() {
        $this->ffi->gtk_widget_destroy(core::cast2Widget($this->cdata_instance));
    }

    public function in_destruction(): bool {
        return $this->ffi->gtk_widget_in_destruction(core::cast2Widget($this->cdata_instance));
    }

    public function destroyed($widget) {
        $this->ffi->gtk_widget_destroyed(core::cast2Widget($this->cdata_instance), $this->ffi->cast("GtkWidget **", \FFI::addr($this->cdata_instance)));
    }

    public function unparent() {
        $this->ffi->gtk_widget_unparent(core::cast2Widget($this->cdata_instance));
    }

    public function show() {
        $this->ffi->gtk_widget_show(core::cast2Widget($this->cdata_instance));
    }

    public function show_now() {
        $this->ffi->gtk_widget_show_now(core::cast2Widget($this->cdata_instance));
    }

    public function hide() {
        $this->ffi->gtk_widget_hide(core::cast2Widget($this->cdata_instance));
    }

    public function show_all() {
        $this->ffi->gtk_widget_show_all($this->cdata_instance);
    }

    public function map() {
        $this->ffi->gtk_widget_map(core::cast2Widget($this->cdata_instance));
    }

    public function unmap() {
        $this->ffi->gtk_widget_unmap(core::cast2Widget($this->cdata_instance));
    }

    public function realize() {
        $this->ffi->gtk_widget_realize(core::cast2Widget($this->cdata_instance));
    }

    public function queue_draw() {
        $this->ffi->gtk_widget_queue_draw(core::cast2Widget($this->cdata_instance));
    }

    public function queue_resize() {
        $this->ffi->gtk_widget_queue_resize(core::cast2Widget($this->cdata_instance));
    }

    public function queue_resize_no_redraw() {
        $this->ffi->gtk_widget_queue_resize_no_redraw(core::cast2Widget($this->cdata_instance));
    }

    public function queue_allocate() {
        $this->ffi->gtk_widget_queue_allocate(core::cast2Widget($this->cdata_instance));
    }

    public function get_scale_factor(): int {
        return $this->ffi->gtk_widget_get_scale_factor(core::cast2Widget($this->cdata_instance));
    }

    public function size_allocate(): array {
        throw new \Exception("gtk_widget_size_allocate not implemented", 1);

        $allocate = $this->ffi->new("GtkAllocation");
        $this->ffi->gtk_widget_size_allocate(core::cast2Widget($this->cdata_instance), \FFI::addr($allocate));

        return [
            'x' => $allocate->x,
            'y' => $allocate->y,
            'width' => $allocate->width,
            'height' => $allocate->height,
        ];
    }

    public function connect($signal_name, $callback) {

        $lookup = $this->ffi->g_signal_lookup($signal_name, $this->G_OBJECT_TYPE($this->cdata_instance));
        $signal_info = \FFI::addr($this->ffi->new("GSignalQuery"));
        $this->ffi->g_signal_query($lookup, $signal_info);
        $closure = $this->ffi->g_cclosure_new_swap(function () use ($signal_info, $signal_name, $callback) {

            $return_param = [];

            // Object
            $return_param[0] = $this;
            // var_dump($signal_info);
            // var_dump(func_get_args());


            for ($i = 0; $i < $signal_info[0]->n_params; $i++) {
                $gtype = $this->ffi->g_type_fundamental($signal_info[0]->param_types[$i]);
                $gname = $this->ffi->g_type_name($gtype);

                $gdkevent = new \gtk\event();
                $gdkevent->cdata_instance = func_get_arg($i + 1);
                $return_param[$i + 1] = $gdkevent;
                // $return_param[$i+1] = func_get_arg($i+1);
                // var_dump(\FFI::typeof(func_get_arg($i+1)));
            }


            $return = call_user_func_array($callback, $return_param);

            if ($signal_info[0]->return_type != 4) {

                $return_p = $this->ffi->new("gpointer");
                return $return_p;
            }
        }, NULL, NULL);
        $this->ffi->g_signal_connect_closure($this->ffi->cast("gpointer", $this->cdata_instance), $signal_name, $closure, TRUE);
            // $index = 1;
            // $this->callbacks[$index] = $callback;
            // $a = $this->ffi->new("struct st_callback");
            // $a->index = 1;
            // var_dump("1");
            // $a = $this->ffi->g_signal_connect_object(
            // $this->ffi->cast("gpointer *", $this->cdata_instance), $signal_name, function() use ($index) {
            // 	var_dump("lkkk: " . $index);
            // } , NULL,1);
            // var_dump("2");
    }

    private function connect_callback() {
        var_dump("OK");
        $param1 = func_get_arg(0);
        $instance = $this->ffi->cast($this->name . " *", $param1);

        $widget = new $this;
        $widget->cdata_instance = $instance;
        // $c = func_get_arg(1);
        $data = $this->ffi->cast("struct st_callback*", $c);
        var_dump($data);
        // call_user_func_array(unserialize(serialize([$this, "funcA"])), []);

        return FALSE;
    }

    public function G_OBJECT_TYPE($a) {
        $g_class = $this->ffi->cast("GTypeInstance *", $a)->g_class;
        $g_type = $this->ffi->cast("GTypeClass *", $g_class)->g_type;

        return $g_type;
    }

    public function G_OBJECT_TYPE_CLASS($a) {
        $g_type = $this->ffi->cast("GTypeClass *", $a)->g_type;

        return $g_type;
    }

    public function g_type_name($gtype) {
        return $this->ffi->g_type_name($gtype);
    }

    /**
     * Convert an CDATA widget to PHPGTK widget
     */
    public function php_GtkOBJ($widget) {
        // Get type of widget
        $widget = core::cast2Widget($widget);
        $gtype = $this->G_OBJECT_TYPE($widget);
        $gtype_name = $this->ffi->g_type_name($gtype);

        // Convert it to PHP-GTK class
        $phpgtk_name = "\\Gtk\\" . substr($gtype_name, 3);
        $php_GtkOBJ = new $phpgtk_name();
        $php_GtkOBJ->cdata_instance = $widget;

        return $php_GtkOBJ;
    }

}
