<?php

namespace gtk;

class entry extends widget {

    public const ICON_PRIMARY = 0;
    public const ICON_SECONDARY = 1;

    public function __construct() {
        parent::__construct();

        // Create the window
        $this->cdata_instance = $this->ffi->gtk_entry_new();
    }

    public function set_visibility1(bool $visible) {
        return core::getFFI()->gtk_entry_set_visibility(core::getFFI()->cast("GtkEntry *", $this->cdata_instance), $visible);
    }

    public function get_visibility1(): bool {
        return core::getFFI()->gtk_entry_get_visibility(core::getFFI()->cast("GtkEntry *", $this->cdata_instance));
    }

}
