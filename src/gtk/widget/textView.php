<?php

namespace gtk\widget;

/**
 * Description of textView
 * GtkTextView — Widget that displays a GtkTextBuffer
 * @author ghost
 */
class textView extends core {

    public function __construct(\gtk\textBuffer $buffer = null) {
        parent::__construct();
        if ($buffer instanceof \gtk\textBuffer && isset($buffer)) {
            $this->cdata_instance = $this->ffi->gtk_text_view_new_with_buffer($buffer->cdata_instance);
        } else {
            $this->cdata_instance = $this->ffi->gtk_text_view_new();
        }
    }

    public static function set_buffer(\gtk\textBuffer $buffer) {
        $this->ffi->gtk_text_view_set_buffer($this->cdata_instance, $buffer->cdata_instance);
    }

    public function get_buffer() {
        return $this->ffi->gtk_text_view_get_buffer($this->cdata_instance);
    }

    public function scroll_to_mark(\gtk\textMark $mark, float $within_margin, bool $use_align, float $xalign, float $yalign) {
        $this->ffi->gtk_text_view_scroll_to_mark($this->cdata_instance, $mark->cdata_instance, $within_margin, $use_align, $xalign, $yalign);
    }

    public function scroll_to_iter(\gtk\textIter $iter, float $within_margin, bool $use_align, float $xalign, float $yalign): bool {
        return $this->ffi->gtk_text_view_scroll_to_iter($this->cdata_instance, $iter->cdata_instance, $within_margin, $use_align, $xalign, $yalign);
    }

    public function move_mark_onscreen(\gtk\textMark $mark): bool {
        return $this->ffi->gtk_text_view_move_mark_onscreen($this->cdata_instance, $mark->cdata_instance);
    }

    public function place_cursor_onscreen(): bool {
        return $this->ffi->gtk_text_view_place_cursor_onscreen($this->cdata_instance);
    }

    public function get_visible_rect(int $x, int $y, int $width, int $height) {
        $gdkrect = new \gtk\gdk\rectangle($x, $y, $width, $height);
        $this->ffi->gtk_text_view_get_visible_rect($this->cdata_instance, $gdkrect->cdata_instance);
    }

    public function get_iter_location(\gtk\textIter $iter, int $x, int $y, int $width, int $height) {
        $gdkrect = new \gtk\gdk\rectangle($x, $y, $width, $height);
        $this->ffi->gtk_text_view_get_iter_location($this->cdata_instance, $iter->cdata_instance, $gdkrect->cdata_instance);
    }

    /**
     * Given an iter within a text layout, determine the positions of the strong and weak cursors if the insertion point is at that iterator. 
     * The position of each cursor is stored as a zero-width rectangle. The strong cursor location is the location where characters of the directionality 
     * equal to the base direction of the paragraph are inserted. The weak cursor location is the location where characters of the directionality opposite 
     * to the base direction of the paragraph are inserted.
     * 
     * @param \gtk\textIter $iter
     * @param \gtk\gdk\rectangle $strong
     * @param \gtk\gdk\rectangle $weak
     */
    public function get_cursor_locations(\gtk\textIter $iter, \gtk\gdk\rectangle $strong, \gtk\gdk\rectangle $weak) {
        $this->ffi->gtk_text_view_get_cursor_locations($this->cdata_instance, $iter->cdata_instance, $strong->cdata_instance, $weak->cdata_instance);
    }

    /**
     * Gets the GtkTextIter at the start of the line containing the coordinate y . y is in buffer coordinates, 
     * convert from window coordinates with gtk_text_view_window_to_buffer_coords(). If non-NULL, line_top will be 
     * filled with the coordinate of the top edge of the line.
     * @param \gtk\textIter $iter
     * @param int $y
     */
    public function get_line_at_y(\gtk\textIter $iter, int $y) {
        $linTop = $this->ffi->new('int');
        $this->ffi->gtk_text_view_get_line_at_y($this->cdata_instance, $iter->cdata_instance, $y, \FFI::addr($linTop));
    }

    /**
     * Gets the y coordinate of the top of the line containing iter , and the height of the line. 
     * The coordinate is a buffer coordinate; convert to window coordinates with gtk_text_view_buffer_to_window_coords().
     * @param \gtk\textIter $iter
     */
    public function get_line_yrange(\gtk\textIter $iter) {
        $y = $this->ffi->new('int');
        $height = $this->ffi->new('int');
        $this->ffi->gtk_text_view_get_line_yrange($this->cdata_instance, $iter->cdata_instance, \FFI::addr($y), \FFI::addr($height));
    }

    public function get_iter_at_location(\gtk\textIter $iter, int $x, int $y): bool {
        return $this->ffi->gtk_text_view_get_iter_at_location($this->cdata_instance, $iter->cdata_instance, $x, $y);
    }

    public function buffer_to_window_coords(\gtk\enum\textWindowType $win, int $buffer_x, int $buffer_y) {
        $window_x = $this->ffi->new('int');
        $window_y = $this->ffi->new('int');
        $this->ffi->gtk_text_view_buffer_to_window_coords($this->cdata_instance, $win, $buffer_x, $buffer_y, \FFI::addr($window_x), \FFI::addr($window_y));
    }

    public function set_border_window_size(\gtk\enum\textWindowType $type, int $size) {
        $this->ffi->gtk_text_view_set_border_window_size($this->cdata_instance, $type, $size);
    }

    public function get_border_window_size(\gtk\enum\textWindowType $type): int {
        return $this->ffi->gtk_text_view_get_border_window_size($this->cdata_instance, $type);
    }

    public function forward_display_line(\gtk\textIter $iter): bool {
        return $this->ffi->gtk_text_view_forward_display_line($this->cdata_instance, $iter->cdata_instance);
    }

    public function backward_display_line(\gtk\textIter $iter): bool {
        return $this->ffi->gtk_text_view_backward_display_line($this->cdata_instance, $iter->cdata_instance);
    }

    public function forward_display_line_end(\gtk\textIter $iter): bool {
        return $this->ffi->gtk_text_view_forward_display_line_end($this->cdata_instance, $iter->cdata_instance);
    }

    public function backward_display_line_start(\gtk\textIter $iter): bool {
        return $this->ffi->gtk_text_view_backward_display_line_start($this->cdata_instance, $iter->cdata_instance);
    }

    public function starts_display_line(\gtk\textIter $iter): bool {
        return $this->ffi->gtk_text_view_starts_display_line($this->cdata_instance, $iter->cdata_instance);
    }

    public function move_visually(\gtk\textIter $iter, int $count): bool {
        return $this->ffi->gtk_text_view_move_visually($this->cdata_instance, $iter->cdata_instance, $count);
    }

    public function child_anchor_new(): \FFI\CData {
        return $this->ffi->gtk_text_child_anchor_new();
    }

    /**
     * Adds a child widget in the text buffer, at the given anchor .
     * @param \gtk\widget\core $widget
     * @param \FFI\CData $anchor
     */
    public function add_child_at_anchor(\gtk\widget\core $widget, \FFI\CData $anchor) {
        $this->ffi->gtk_text_view_add_child_at_anchor($this->cdata_instance, $widget->cdata_instance, $anchor);
    }

    /**
     * Determines whether a child anchor has been deleted from the buffer. 
     * @param \FFI\CData $anchor
     * @return bool
     */
    public function child_anchor_get_deleted(\FFI\CData $anchor): bool {
        return $this->ffi->gtk_text_child_anchor_get_deleted($anchor);
    }

    /**
     * Adds a child at fixed coordinates in one of the text widget's windows.
     * @param \gtk\widget\core $widget
     * @param \gtk\enum\textWindowType $win
     * @param int $xpos
     * @param int $ypos
     */
    public function add_child_in_window(\gtk\widget\core $widget, \gtk\enum\textWindowType $win, int $xpos, int $ypos) {
        $this->ffi->gtk_text_view_add_child_in_window($this->cdata_instance, $widget->cdata_instance, $win, $xpos, $ypos);
    }

    public function move_child(\gtk\widget\core $widget, int $xpos, int $ypos) {
        $this->ffi->gtk_text_view_move_child($this->cdata_instance, $widget->cdata_instance, $xpos, $ypos);
    }

    public function set_warp_mode(\gtk\enum\warpMode $warp_mode) {
        $this->ffi->gtk_text_view_set_warp_mode($this->cdata_instance, $warp_mode);
    }

    public function get_wapr_mode() {
        return $this->ffi->gtk_text_view_get_wrap_mode($this->cdata_instance);
    }

    public function set_editable(bool $setting) {
        $this->ffi->gtk_text_view_set_editable($this->cdata_instance, $setting);
    }

    public function get_editable(): bool {
        return $this->ffi->gtk_text_view_get_editable($this->cdata_instance);
    }

    public function set_cursor_visible(bool $setting) {
        $this->ffi->gtk_text_view_set_cursor_visible($this->cdata_instance, $setting);
    }

    public function get_cursor_visible(): bool {
        return $this->ffi->gtk_text_view_get_cursor_visible($this->cdata_instance);
    }

    public function reset_cursor_blink() {
        $this->ffi->gtk_text_view_reset_cursor_blink($this->cdata_instance);
    }

    public function set_overwrite(bool $setting) {
        $this->ffi->gtk_text_view_set_overwrite($this->cdata_instance, $setting);
    }

    public function get_overwrite(): bool {
        return $this->ffi->gtk_text_view_get_overwrite($this->cdata_instance);
    }

    public function set_pixels_above_lines(int $pixels_above_lines) {
        $this->ffi->gtk_text_view_set_pixels_above_lines($this->cdata_instance, $pixels_above_lines);
    }

    public function get_pixels_above_lines(): int {
        return $this->ffi->gtk_text_view_get_pixels_above_lines($this->cdata_instance);
    }

    public function set_pixels_below_lines(int $pixels_below_lines) {
        $this->ffi->gtk_text_view_set_pixels_above_lines($this->cdata_instance, $pixels_below_lines);
    }

    public function get_pixels_below_lines(): int {
        return $this->ffi->gtk_text_view_get_pixels_below_lines($this->cdata_instance);
    }

    public function set_pixels_inside_wrap(int $inside_wrap) {
        $this->ffi->gtk_text_view_set_pixels_above_lines($this->cdata_instance, $inside_wrap);
    }

    public function get_pixels_inside_wrap(): int {
        return $this->ffi->gtk_text_view_get_pixels_inside_wrap($this->cdata_instance);
    }

    public function set_justification(\gtk\enum\justification $justification) {
        $this->ffi->gtk_text_view_set_justification($this->cdata_instance, $justification);
    }

    public function get_justification(): int {
        return $this->ffi->gtk_text_view_get_justification($this->cdata_instance);
    }

    public function set_left_margin(int $left_margin) {
        $this->ffi->gtk_text_view_set_left_margin($this->cdata_instance, $left_margin);
    }

    public function get_left_margin(): int {
        return $this->ffi->gtk_text_view_get_left_margin($this->cdata_instance);
    }

    public function set_right_margin(int $right_margin) {
        $this->ffi->gtk_text_view_set_right_margin($this->cdata_instance, $right_margin);
    }

    public function get_right_margin(): int {
        return $this->ffi->gtk_text_view_get_right_margin($this->cdata_instance);
    }

    public function set_top_margin(int $top_margin) {
        $this->ffi->gtk_text_view_set_top_margin($this->cdata_instance, $top_margin);
    }

    public function get_top_margin(): int {
        return $this->ffi->gtk_text_view_get_top_margin($this->cdata_instance);
    }

    public function set_bottom_margin(int $bottom_margin) {
        $this->ffi->gtk_text_view_set_bottom_margin($this->cdata_instance, $bottom_margin);
    }

    public function get_bottom_margin(): int {
        return $this->ffi->gtk_text_view_get_bottom_margin($this->cdata_instance);
    }

    public function set_indent(int $indent) {
        $this->ffi->gtk_text_view_set_indent($this->cdata_instance, $indent);
    }

    public function get_indent(): int {
        return $this->ffi->gtk_text_view_get_indent($this->cdata_instance);
    }

    public function set_accepts_tab(bool $accepts_tab) {
        $this->ffi->gtk_text_view_set_accepts_tab($this->cdata_instance, $accepts_tab);
    }

    public function get_accepts_tab(): bool {
        return $this->ffi->gtk_text_view_get_accepts_tab($this->cdata_instance);
    }

    public function set_input_purpose(\gtk\enum\inputPurpose $purpose) {
        $this->ffi->gtk_text_view_set_input_purpose($this->cdata_instance, $purpose);
    }

    public function get_input_purpose(): int {
        return $this->ffi->gtk_text_view_get_input_purpose($this->cdata_instance);
    }

    public function set_input_hints(\gtk\enum\inputHints $hint) {
        $this->ffi->gtk_text_view_set_input_hints($this->cdata_instance, $hint);
    }

    public function get_input_hints(): int {
        return $this->ffi->gtk_text_view_get_input_hints($this->cdata_instance);
    }

    public function set_monospace(bool $monospace) {
        $this->ffi->gtk_text_view_set_monospace($this->cdata_instance, $monospace);
    }

    public function get_monospace(): bool {
        return $this->ffi->gtk_text_view_get_monospace($this->cdata_instance);
    }

}
