<?php

namespace gtk;
define('G_TYPE_STRING', core::getFFI()->g_type_from_name('gchararray'));
define('G_TYPE_CHAR', core::getFFI()->g_type_from_name('gchar'));
define('G_TYPE_UCHAR', core::getFFI()->g_type_from_name('guchar'));
define('G_TYPE_BOOLEAN', core::getFFI()->g_type_from_name('gboolean'));
define('G_TYPE_INT', core::getFFI()->g_type_from_name('gint'));
define('G_TYPE_UINT', core::getFFI()->g_type_from_name('guint'));
define('G_TYPE_LONG', core::getFFI()->g_type_from_name('glong'));
define('G_TYPE_ULONG', core::getFFI()->g_type_from_name('gulong'));
define('G_TYPE_DOUBLE', core::getFFI()->g_type_from_name('gdouble'));
define('G_TYPE_FLOAT', core::getFFI()->g_type_from_name('gfloat'));
define('G_TYPE_POINTER', core::getFFI()->g_type_from_name('gpointer'));
define('G_TYPE_OBJECT', core::getFFI()->g_type_from_name('GObject'));

class gType {
    
    const STRING = G_TYPE_STRING;
    const CHAR = G_TYPE_CHAR;
    const UCHAR = G_TYPE_UCHAR;
    const BOOLEAN = G_TYPE_BOOLEAN;
    const INT = G_TYPE_INT;
    const UINT = G_TYPE_UINT;
    const LONG = G_TYPE_LONG;
    const ULONG = G_TYPE_ULONG;
    const DOUBLE = G_TYPE_DOUBLE;
    const FLOAT = G_TYPE_FLOAT;
    const POINTER = G_TYPE_POINTER;
    const OBJECT = G_TYPE_OBJECT;
    
}
