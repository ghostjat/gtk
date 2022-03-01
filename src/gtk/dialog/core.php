<?php

namespace gtk\dialog;

/**
 * Description of core
 * Dialog — Create popup windows
 * @author ghost
 */
class core extends \gtk\widget\core {

    public const MODAL = 1,
            DESTROY_WITH_PARENT = 2,
            USE_HEADER_BAR = 3;
    public const BUTTONS_NONE = 0,
            BUTTONS_OK = 1,
            BUTTONS_CLOSE = 2,
            BUTTONS_CANCEL = 3,
            BUTTONS_YES_NO = 4,
            BUTTONS_OK_CANCEL = 5;

    public function __construct(string $title = null, \gtk\widget\window $parentWindow = null, int $flags = self::MODAL, string $btnLabel = null) {
        parent::__construct();
        if (isset($title) and isset($parentWindow) and isset($btnLabel)) {
            $this->cdata_instance = $this->ffi->gtk_dialog_new_with_buttons($title, $parentWindow, $flags, $btnLabel);
        } else {
            $this->cdata_instance = $this->ffi->gtk_dialog_new();
        }
    }

    public function __call($name, $arguments = null) {
        $fn = 'gtk_dialog_' . $name;
        if (isset($arguments)) {
            return $this->ffi->$fn(...$arguments);
        } else {
            return $this->ffi->$fn();
        }
    }

}
