<?php

namespace gtk\enum;

/**
 * Description of gdkEventTypes
 *
 * @author ghost
 */
class gdkEventTypes {

    public const
            NOTHING = -1,
            DELETE = 0,
            DESTROY = 1,
            EXPOSE = 2,
            MOTION_NOTIFY = 3,
            BUTTON_PRESS = 4,
            TWO_BUTTON_PRESS = 5,
            DOUBLE_BUTTON_PRESS = self::TWO_BUTTON_PRESS,
            THREE_BUTTON_PRESS = 6,
            TRIPLE_BUTTON_PRESS = self::THREE_BUTTON_PRESS,
            BUTTON_RELEASE = 7,
            KEY_PRESS = 8,
            KEY_RELEASE = 9,
            ENTER_NOTIFY = 10,
            LEAVE_NOTIFY = 11,
            FOCUS_CHANGE = 12,
            CONFIGURE = 13,
            MAP = 14,
            UNMAP = 15,
            PROPERTY_NOTIFY = 16,
            SELECTION_CLEAR = 17,
            SELECTION_REQUEST = 18,
            SELECTION_NOTIFY = 19,
            PROXIMITY_IN = 20,
            PROXIMITY_OUT = 21,
            DRAG_ENTER = 22,
            DRAG_LEAVE = 23,
            DRAG_MOTION = 24,
            DRAG_STATUS = 25,
            DROP_START = 26,
            DROP_FINISHED = 27,
            CLIENT_EVENT = 28,
            VISIBILITY_NOTIFY = 29,
            SCROLL = 31,
            WINDOW_STATE = 32,
            SETTING = 33,
            OWNER_CHANGE = 34,
            GRAB_BROKEN = 35,
            DAMAGE = 36,
            TOUCH_BEGIN = 37,
            TOUCH_UPDATE = 38,
            TOUCH_END = 39,
            TOUCH_CANCEL = 40,
            TOUCHPAD_SWIPE = 41,
            TOUCHPAD_PINCH = 42,
            EVENT_LAST = 43;
}
