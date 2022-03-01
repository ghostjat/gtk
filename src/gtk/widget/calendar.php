<?php

namespace gtk\widget;

/**
 * Description of calendar
 *
 * @author ghost
 */
class calendar extends core{
    
    const SHOW_HEADING=1,
            SHOW_DAY_NAMES=2,
            NO_MONTH_CHANGE=3,
            SHOW_WEEK_NUMBERS=4,
            SHOW_DETAILS=5;
    
    public function __construct() {
        parent::__construct();
        $this->cdata_instance = $this->ffi->gtk_calendar_new();
    }
    
    public function select_month(int $month, int $year){
        $this->ffi->gtk_calendar_select_month($this->cdata_instance,$month,$year);
    }
    
    /**
     * Selects a day from the current month.
     * @param int $day the day number between 1 and 31, or 0 to unselect the currently selected day.
     */
    public function select_day(int $day){
        $this->ffi->gtk_calendar_select_day($this->cdata_instance,$day);
    }
    
    /**
     * Places a visual marker on a particular day.
     * @param int $day the day number to mark between 1 and 31.
     */
    public function mark_day(int $day){
        $this->ffi->gtk_calendar_mark_day($this->cdata_instance,$day);
    }
    
    public function unmark_day(int $day) {
        $this->ffi->gtk_calendar_unmark_day($this->cdata_instance,$day);
    }
    
    public function clear_marks() {
        $this->ffi->gtk_calendar_clear_marks($this->cdata_instance);
    }
    
    public function get_display_options() {
        return $this->ffi->gtk_calendar_get_display_options ($this->cdata_instance);
    }
    
    public function set_display_options(int $flag=self::SHOW_WEEK_NUMBERS){
        $this->ffi->gtk_calendar_set_display_optons($this->cdata_instance,$flag);
    }
    
    public function get_date(int $year,int $month,int $day) {
        $this->ffi->gtk_calendar_get_date($this->cdata_instance,$year,$month,$day);
    }
    
    public function get_detail_width_chars():int{
        return $this->ffi->gtk_calendar_get_detail_width_cahrs($this->cdata_instance);
    }
    
    public function set_detail_width_chars(int $chars) {
        $this->ffi->gtk_calendar_set_detail_width_chars($this->cdata_instance,$chars);
    }
    
    public function get_detail_height_cahrs():int{
        return $this->ffi->gtk_calendar_get_detail_height_chars($this->cdata_instance);
    }
    
    public function set_detail_height_rows(int $rows) {
        $this->ffi->gtk_calendar_set_detail_height_rows($this->cdata_instance,$rows);
    }
    
    
}
