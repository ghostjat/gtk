<?php
namespace gtk\enum;

/**
 * Description of baselinePosition
 * Whenever a container has some form of natural row it may align children in that
 * row along a common typographical baseline. If the amount of verical space in the
 * row is taller than the total requested height of the baseline-aligned children then
 * it can use a GtkBaselinePosition to select where to put the baseline inside the extra availible space.
 * @author ghost
 */
class baselinePosition {
    public const TOP=1,
            CENTER=2,
            BOTTOM=3;
}
