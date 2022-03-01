<?php


namespace gtk\dialog;

/**
 * Description of messageDialog
 * MessageDialog — A convenient message window
 * @author ghost
 */
class messageDialog extends \gtk\widget\core {
    
    public const MODAL = 1,
            DESTROY_WITH_PARENT = 2,
            USE_HEADER_BAR = 3;
    public const BUTTONS_NONE = 0,
            BUTTONS_OK = 1,
            BUTTONS_CLOSE = 2,
            BUTTONS_CANCEL = 3,
            BUTTONS_YES_NO = 4,
            BUTTONS_OK_CANCEL = 5;
    
    public function __construct(\gtk\widget\window $window,int $flag,int $messageType,int $btnType,string $message) {
        parent::__construct();
        $this->cdata_instance = $this->ffi->gtk_message_dialog_new($window->cdata_instance,$flag,$messageType,$btnType,$message);
    }
    
    public function __call($name, $arguments) {
        $fn = 'gtk_message_dialog_'.$name;
        $this->ffi->$fn(...$arguments);
    }
}
