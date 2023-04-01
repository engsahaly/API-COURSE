<?php

use App\Models\Branch;
use Illuminate\Support\Facades\Auth;

/**
 * Check Permissions of Admin Guard User
 */
function permission($permission)
{
    return (Auth::guard('admin')->user()?->type == 'super_admin' || Auth::guard('admin')->user()?->hasAnyPermission($permission))  ? true : false;
}

/**
 * permission description indicator
 */
function permission_description($permission)
{
    if ($permission != null) {
        echo "<span class='text-danger font-size-12'>(";
        echo __("lang.$permission->name" . '_desc');
        echo ")</span>";
    }
}

/**
 * reverse id number containing dash
 */
function phone($number)
{
    if (substr_count($number, '-') > 0) {
        $array = explode('-', $number);
        $inverse = array_reverse($array);
        $again = implode("-", $inverse);
        echo $again;
    } else {
        echo $number;
    }
}

/**
 * strip text for apis
 */
function strip($text)
{
    $paragraphs = explode('</p>', $text);

    // Remove the closing tag from each paragraph
    foreach ($paragraphs as &$paragraph) {
        $paragraph = str_replace('<p>', '', $paragraph);
    }

    // Remove the last element from the array if it's an empty string
    if (end($paragraphs) === '') {
        array_pop($paragraphs);
    }

    foreach ($paragraphs as &$paragraph) {
        $paragraph = strip_tags(html_entity_decode(str_replace(array("\r", "\n"), '', $paragraph), ENT_HTML5));
    }

    if (end($paragraphs) === '') {
        array_pop($paragraphs);
    }

    return ($paragraphs);
}
