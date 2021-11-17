<?php

namespace gtk;

class progressBar extends widget {

    public function __construct() {
        parent::__construct();
        $this->cdata_instance = $this->ffi->gtk_progress_bar_new();
    }

    public function pulse() {
        $this->ffi->gtk_progress_bar_pulse($this->cdata_instance);
    }

    public function set_fraction(float $fraction) {
        $this->ffi->gtk_progress_bar_set_fraction($this->cdata_instance, $fraction);
    }

    public function get_fraction() {
        return $this->ffi->gtk_progress_bar_get_fraction($this->cdata_instance);
    }

    public function set_inverted(bool $inverted) {
        $this->ffi->gtk_progress_bar_set_inverted($this->cdata_instance, $inverted);
    }

    public function get_inverted() {
        return $this->ffi->gtk_progress_bar_get_inverted($this->cdata_instance);
    }

    public function set_show_text(bool $show_text) {
        $this->ffi->gtk_progress_bar_set_show_text($this->cdata_instance, $show_text);
    }

    public function get_show_text() {
        return $this->ffi->gtk_progress_bar_get_show_text($this->cdata_instance);
    }

    public function set_text(string $text) {
        $this->ffi->gtk_progress_bar_set_text($this->cdata_instance, $text);
    }

    public function get_test() {
        return $this->ffi->gtk_progress_bar_get_text($this->cdata_instance);
    }

    public function set_pulse_step(float $fraction) {
        $this->ffi->gtk_progress_bar_set_pulse_step($this->cdata_instance, $fraction);
    }

    public function get_pulse_step() {
        return $this->ffi->gtk_progress_bar_get_pulse_step($this->cdata_instance);
    }

}
