<?php

namespace gtk\misc;

/**
 * Description of cairo
 *
 * @author ghost
 */
class cairo {

    const STATUS_SUCCESS = 0;
    const STATUS_NO_MEMORY = 1;
    const STATUS_INVALID_RESTORE = 2;
    const STATUS_INVALID_POP_GROUP = 3;
    const STATUS_NO_CURRENT_POINT = 4;
    const STATUS_INVALID_MATRIX = 5;
    const STATUS_INVALID_STATUS = 6;
    const STATUS_NULL_POINTER = 7;
    const STATUS_INVALID_STRING = 8;
    const STATUS_INVALID_PATH_DATA = 9;
    const STATUS_READ_ERROR = 10;
    const STATUS_WRITE_ERROR = 11;
    const STATUS_SURFACE_FINISHED = 12;
    const STATUS_SURFACE_TYPE_MISMATCH = 13;
    const STATUS_PATTERN_TYPE_MISMATCH = 14;
    const STATUS_INVALID_CONTENT = 15;
    const STATUS_INVALID_FORMAT = 16;
    const STATUS_INVALID_VISUAL = 17;
    const STATUS_FILE_NOT_FOUND = 18;
    const STATUS_INVALID_DASH = 19;
    const STATUS_INVALID_DSC_COMMENT = 20;
    const STATUS_INVALID_INDEX = 21;
    const STATUS_CLIP_NOT_REPRESENTABLE = 22;
    const STATUS_TEMP_FILE_ERROR = 23;
    const STATUS_INVALID_STRIDE = 24;
    const STATUS_FONT_TYPE_MISMATCH = 25;
    const STATUS_USER_FONT_IMMUTABLE = 26;
    const STATUS_USER_FONT_ERROR = 27;
    const STATUS_NEGATIVE_COUNT = 28;
    const STATUS_INVALID_CLUSTERS = 29;
    const STATUS_INVALID_SLANT = 30;
    const STATUS_INVALID_WEIGHT = 31;
    const STATUS_INVALID_SIZE = 32;
    const STATUS_USER_FONT_NOT_IMPLEMENTED = 33;
    const STATUS_DEVICE_TYPE_MISMATCH = 34;
    const STATUS_DEVICE_ERROR = 35;
    const STATUS_INVALID_MESH_CONSTRUCTION = 36;
    const STATUS_DEVICE_FINISHED = 37;
    const STATUS_JBIG2_GLOBAL_MISSING = 38;
    const STATUS_PNG_ERROR = 39;
    const STATUS_FREETYPE_ERROR = 40;
    const STATUS_WIN32_GDI_ERROR = 41;
    const STATUS_TAG_ERROR = 42;
    const STATUS_LAST_STATUS = 43;
    const CONTENT_COLOR = 0x1000;
    const CONTENT_ALPHA = 0x2000;
    const CONTENT_COLOR_ALPHA = 0x3000;
    const FORMAT_INVALID = -1;
    const FORMAT_ARGB32 = 0;
    const FORMAT_RGB24 = 1;
    const FORMAT_A8 = 2;
    const FORMAT_A1 = 3;
    const FORMAT_RGB16_565 = 4;
    const FORMAT_RGB30 = 5;
    const FORMAT_RGB96F = 6;
    const FORMAT_RGBA128F = 7;
    const OPERATOR_CLEAR = 0;
    const OPERATOR_SOURCE = 1;
    const OPERATOR_OVER = 2;
    const OPERATOR_IN = 3;
    const OPERATOR_OUT = 4;
    const OPERATOR_ATOP = 5;
    const OPERATOR_DEST = 6;
    const OPERATOR_DEST_OVER = 7;
    const OPERATOR_DEST_IN = 8;
    const OPERATOR_DEST_OUT = 9;
    const OPERATOR_DEST_ATOP = 10;
    const OPERATOR_XOR = 11;
    const OPERATOR_ADD = 12;
    const OPERATOR_SATURATE = 13;
    const OPERATOR_MULTIPLY = 14;
    const OPERATOR_SCREEN = 15;
    const OPERATOR_OVERLAY = 16;
    const OPERATOR_DARKEN = 17;
    const OPERATOR_LIGHTEN = 18;
    const OPERATOR_COLOR_DODGE = 19;
    const OPERATOR_COLOR_BURN = 20;
    const OPERATOR_HARD_LIGHT = 21;
    const OPERATOR_SOFT_LIGHT = 22;
    const OPERATOR_DIFFERENCE = 23;
    const OPERATOR_EXCLUSION = 24;
    const OPERATOR_HSL_HUE = 25;
    const OPERATOR_HSL_SATURATION = 26;
    const OPERATOR_HSL_COLOR = 27;
    const OPERATOR_HSL_LUMINOSITY = 28;
    const ANTIALIAS_DEFAULT = 0;
    const ANTIALIAS_NONE = 1;
    const ANTIALIAS_GRAY = 2;
    const ANTIALIAS_SUBPIXEL = 3;
    const ANTIALIAS_FAST = 4;
    const ANTIALIAS_GOOD = 5;
    const ANTIALIAS_BEST = 6;
    const FILL_RULE_WINDING = 0;
    const FILL_RULE_EVEN_ODD = 1;
    const LINE_CAP_BUTT = 0;
    const LINE_CAP_ROUND = 1;
    const LINE_CAP_SQUARE = 2;
    const LINE_JOIN_MITER = 0;
    const LINE_JOIN_ROUND = 1;
    const LINE_JOIN_BEVEL = 2;
    const TEXT_CLUSTER_FLAG_BACKWARD = 0x00000001;
    const FONT_SLANT_NORMAL = 0;
    const FONT_SLANT_ITALIC = 1;
    const FONT_SLANT_OBLIQUE = 2;
    const FONT_WEIGHT_NORMAL = 0;
    const FONT_WEIGHT_BOLD = 1;
    const SUBPIXEL_ORDER_DEFAULT = 0;
    const SUBPIXEL_ORDER_RGB = 1;
    const SUBPIXEL_ORDER_BGR = 2;
    const SUBPIXEL_ORDER_VRGB = 3;
    const SUBPIXEL_ORDER_VBGR = 4;
    const HINT_STYLE_DEFAULT = 0;
    const HINT_STYLE_NONE = 1;
    const HINT_STYLE_SLIGHT = 2;
    const HINT_STYLE_MEDIUM = 3;
    const HINT_STYLE_FULL = 4;
    const HINT_METRICS_DEFAULT = 0;
    const HINT_METRICS_OFF = 1;
    const HINT_METRICS_ON = 2;
    const FONT_TYPE_TOY = 0;
    const FONT_TYPE_FT = 1;
    const FONT_TYPE_WIN32 = 2;
    const FONT_TYPE_QUARTZ = 3;
    const FONT_TYPE_USER = 4;
    const PATH_MOVE_TO = 0;
    const PATH_LINE_TO = 1;
    const PATH_CURVE_TO = 2;
    const PATH_CLOSE_PATH = 3;
    const DEVICE_TYPE_DRM = 0;
    const DEVICE_TYPE_GL = 1;
    const DEVICE_TYPE_SCRIPT = 2;
    const DEVICE_TYPE_XCB = 3;
    const DEVICE_TYPE_XLIB = 4;
    const DEVICE_TYPE_XML = 5;
    const DEVICE_TYPE_COGL = 6;
    const DEVICE_TYPE_WIN32 = 7;
    const DEVICE_TYPE_INVALID = -1;
    const SURFACE_OBSERVER_NORMAL = 0;
    const SURFACE_OBSERVER_RECORD_OPERATIONS = 0x1;
    const SURFACE_TYPE_IMAGE = 0;
    const SURFACE_TYPE_PDF = 1;
    const SURFACE_TYPE_PS = 2;
    const SURFACE_TYPE_XLIB = 3;
    const SURFACE_TYPE_XCB = 4;
    const SURFACE_TYPE_GLITZ = 5;
    const SURFACE_TYPE_QUARTZ = 6;
    const SURFACE_TYPE_WIN32 = 7;
    const SURFACE_TYPE_BEOS = 8;
    const SURFACE_TYPE_DIRECTFB = 9;
    const SURFACE_TYPE_SVG = 10;
    const SURFACE_TYPE_OS2 = 11;
    const SURFACE_TYPE_WIN32_PRINTING = 12;
    const SURFACE_TYPE_QUARTZ_IMAGE = 13;
    const SURFACE_TYPE_SCRIPT = 14;
    const SURFACE_TYPE_QT = 15;
    const SURFACE_TYPE_RECORDING = 16;
    const SURFACE_TYPE_VG = 17;
    const SURFACE_TYPE_GL = 18;
    const SURFACE_TYPE_DRM = 19;
    const SURFACE_TYPE_TEE = 20;
    const SURFACE_TYPE_XML = 21;
    const SURFACE_TYPE_SKIA = 22;
    const SURFACE_TYPE_SUBSURFACE = 23;
    const SURFACE_TYPE_COGL = 24;
    const PATTERN_TYPE_SOLID = 0;
    const PATTERN_TYPE_SURFACE = 1;
    const PATTERN_TYPE_LINEAR = 2;
    const PATTERN_TYPE_RADIAL = 3;
    const PATTERN_TYPE_MESH = 4;
    const PATTERN_TYPE_RASTER_SOURCE = 5;
    const EXTEND_NONE = 0;
    const EXTEND_REPEAT = 1;
    const EXTEND_REFLECT = 2;
    const EXTEND_PAD = 3;
    const FILTER_FAST = 0;
    const FILTER_GOOD = 1;
    const FILTER_BEST = 2;
    const FILTER_NEAREST = 3;
    const FILTER_BILINEAR = 4;
    const FILTER_GAUSSIAN = 5;
    const REGION_OVERLAP_IN = 0;
    const REGION_OVERLAP_OUT = 1;
    const REGION_OVERLAP_PART = 2;
    const PDF_OUTLINE_ROOT = 0;
    const PDF_VERSION_1_4 = 0;
    const PDF_VERSION_1_5 = 1;
    const PDF_OUTLINE_FLAG_OPEN = 0x1;
    const PDF_OUTLINE_FLAG_BOLD = 0x2;
    const PDF_OUTLINE_FLAG_ITALIC = 0x4;
    const PDF_METADATA_TITLE = 0;
    const PDF_METADATA_AUTHOR = 1;
    const PDF_METADATA_SUBJECT = 2;
    const PDF_METADATA_KEYWORDS = 3;
    const PDF_METADATA_CREATOR = 4;
    const PDF_METADATA_CREATE_DATE = 5;
    const PDF_METADATA_MOD_DATE = 6;
    const PS_LEVEL_2 = 0;
    const PS_LEVEL_3 = 1;
    const SVG_VERSION_1_1 = 0;
    const SVG_VERSION_1_2 = 1;
    const SVG_UNIT_USER = 0;
    const SVG_UNIT_EM = 1;
    const SVG_UNIT_EX = 2;
    const SVG_UNIT_PX = 3;
    const SVG_UNIT_IN = 4;
    const SVG_UNIT_CM = 5;
    const SVG_UNIT_MM = 6;
    const SVG_UNIT_PT = 7;
    const SVG_UNIT_PC = 8;
    const SVG_UNIT_PERCENT = 9;
    const FONT_SANS = "Sans";

    public $ffi = null;
    public $cdata_instance;

    public function __construct() {
        if (is_null($this->ffi)) {
            $this->_init();
        }
        return $this;
    }

    public function version() {
        return $this->ffi->cairo_version_string();
    }

    public function image_surface_create(int $width, int $height, $format = self::FORMAT_ARGB32) {
        return $this->ffi->cairo_image_surface_create($format, $width, $height);
    }

    public function create_surface($surface) {
        return $this->ffi->cairo_create($surface);
    }

    /* Path creation functions */

    public function new_path($cr) {
        return $this->ffi->cairo_new_path($cr);
    }

    public function move_to($cr, float $x, float $y) {
        return $this->ffi->cairo_move_to($cr, $x, $y);
    }

    public function new_sub_path($cr) {
        return $this->ffi->cairo_new_sub_path($cr);
    }

    public function line_to($cr, float $x, float $y) {
        return $this->ffi->cairo_line_to($cr, $x, $y);
    }

    public function curve_to($cr, float $x1, float $y1, float $x2, float $y2, float $x3, float $y3) {
        return $this->ffi->cairo_curve_to($cr, $x1, $y1, $x2, $y2, $x3, $y3);
    }

    public function arc($cr, float $xc, float $yc, float $radius, float $angle1, float $angle2) {
        return $this->ffi->cairo_arc($cr, $xc, $yc, $radius, $angle1, $angle2);
    }

    public function arc_negative($cr, float $xc, float $yc, float $radius, float $angle1, float $angle2) {
        return $this->ffi->cairo_arc_negative($cr, $xc, $yc, $radius, $angle1, $angle2);
    }

    public function path_extents($cr, float $x1, float $y1, float $x2, float $y2) {
        return $this->ffi->cairo_path_extents($cr, $x1, $y1, $x2, $y2);
    }

    public function close_path($cr) {
        return $this->ffi->cairo_close_path($cr);
    }

    public function rectangle($cr, float $x, float $y, float $width, float $height) {
        return $this->ffi->cairo_rectangle($cr, $x, $y, $width, $height);
    }

    public function rel_curve_to($cr, float $dx1, float $dy1, float $dx2, float $dy2, float $dx3, float $dy3) {
        return $this->ffi->cairo_rel_curve_to($cr, $dx1, $dy1, $dx2, $dy2, $dx3, $dy3);
    }

    public function rel_line_to($cr, float $dx, float $dy) {
        return $this->ffi->cairo_rel_line_to($cr, $dx, $dy);
    }

    public function rel_move_to($cr, float $dx, float $dy) {
        return $this->ffi->cairo_rel_move_to($cr, $dx, $dy);
    }

    public function set_source_rgb($cr, float $r, float $g, float $b, float $alpha = null) {
        return $this->ffi->cairo_set_source_rgba($cr, $r, $g, $b, $alpha);
    }

    public function select_font_face($cr, $font = self::FONT_SANS, $slant = self::FONT_SLANT_NORMAL, $weight = self::FONT_WEIGHT_NORMAL) {
        return $this->ffi->cairo_select_font_face($cr, $font, $slant, $weight);
    }

    public function set_font_size($cr, float $size) {
        return $this->ffi->cairo_set_font_size($cr, $size);
    }

    public function set_font_face($cr, $font_face) {
        $this->ffi->cairo_set_font_face($cr, $font_face);
    }

    public function show_text($cr, string $utf8) {
        return $this->ffi->cairo_show_text($cr, $utf8);
    }

    public function surface_get_type($surface) {
        return $this->ffi->cairo_surface_get_type($surface);
    }

    public function surface_get_content($surface) {
        return $this->ffi->cairo_surface_get_content($surface);
    }

    public function surface_write_to_png($surface, string $file_name) {
        return $this->ffi->cairo_surface_write_to_png($surface, $file_name);
    }

    public function show_page($cr) {
        return $this->ffi->cairo_show_page($cr);
    }

    public function destroy($cr) {
        return $this->ffi->cairo_destroy($cr);
    }

    public function surface_destroy($surface) {
        return $this->ffi->cairo_surface_destroy($surface);
    }

    protected function _init() {
        $this->ffi = \FFI::load(dirname(__DIR__) . '/lib/cairo.h');
    }

}
