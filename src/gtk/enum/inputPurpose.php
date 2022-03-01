<?php

namespace gtk\enum;

/**
 * Description of inputPurpose
 * Describes primary purpose of the input widget. This information is useful for 
 * on-screen keyboards and similar input methods to decide which keys should be presented to the user.
 * @author ghost
 */
class inputPurpose {

    public const FREE_FORM = 1,
            ALPHA = 2,
            DIGITS = 3,
            NUMBER = 4,
            PHONE = 5,
            URL = 6,
            EMAIL = 7,
            NAME = 8,
            PASSWORD = 9,
            PIN = 10,
            TERMINAL = 11;

}
