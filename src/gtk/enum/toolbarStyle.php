<?php

namespace gtk\enum;

/**
 * Description of toolbarStyle
 * Used to customize the appearance of a GtkToolbar. Note that setting the toolbar
 * style overrides the user’s preferences for the default toolbar style. Note that
 * if the button has only a label set and ICONS is used, the label will
 * be visible, and vice versa.
 * @author ghost
 */
class toolbarStyle {

    public const ICONS = 1,
            TEXT = 2,
            BOTH = 3,
            BOTH_HORIZ = 4;

}
