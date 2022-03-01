<?php

namespace gtk\enum;

/**
 * Description of stateFlags
 * Describes a widget state. Widget states are used to match the widget against 
 * CSS pseudo-classes. Note that GTK extends the regular CSS classes and sometimes
 * uses different names.
 *
 * @author ghost
 */
class stateFlags {

    public const NORMAL = 1,
            ACTIVE = 2,
            PRELIGHT = 3,
            SELECTED = 4,
            INSENSITIVE = 5,
            INCONSISTENT = 6,
            FOCUSED = 7,
            BACKDROP = 8,
            DIR_LTR = 9,
            DIR_RTL = 10,
            LINK = 11,
            VISITED = 12,
            CHECKED = 13,
            DROP_ACTIVE = 14;

}
