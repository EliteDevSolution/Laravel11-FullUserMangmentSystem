<?php
function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function getMaxPropItem($array, $prop) {
    if(is_array($array) && sizeof($array) > 0)
    {
        uasort($array, function($a, $b) use($prop) {
            return $a[$prop] < $b[$prop];
        });
        return [array_keys($array)[0] => array_values($array)[0]];
    } else
        return [];
}

function get_keys_for_duplicate_values($my_arr, $clean = false) {
    if ($clean) {
        return array_unique($my_arr);
    }
    $dups = $new_arr = array();
    foreach ($my_arr as $key => $val) {
        if (!isset($new_arr[$val])) {
            $new_arr[$val] = $key;
            $dups[$val] = array($key);
        } else {
            if (isset($dups[$val])) {
                $dups[$val][] = $key;
            } else {
                $dups[$val] = array($key);
                // Comment out the previous line, and uncomment the following line to
                // include the initial key in the dups array.
                 $dups[$val] = array($new_arr[$val], $key);
            }
        }
    }
    return $dups;
}

function time_elapsed_string($datetime, $full = false)
{
    $now = time();
    $ago = strtotime($datetime);
    $diff = $now - $ago;

    $seconds = $diff;
    $minutes = round($diff / 60);
    $hours = round($diff / 3600);
    $days = round($diff / 86400);
    $weeks = round($diff / 604800);
    $months = round($diff / 2629440);
    $years = round($diff / 31553280);

    $string = array(
        'year' => $years,
        'month' => $months,
        'week' => $weeks,
        'day' => $days,
        'hour' => $hours,
        'minute' => $minutes,
        'second' => $seconds,
    );
    foreach ($string as $k => &$v) {
        if ($v) {
            $v = $v . ' ' . $k . ($v > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' '.__('global.ago') : __('global.just_now');
}