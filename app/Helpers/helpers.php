<?php

use Illuminate\Support\Facades\Route;

/* Predefined Messages */
define('FAIL', 'Failed to create');
define('SUCCESS', 'Successfully created');
define('UPDATE_FAIL', 'Failed to update');
define('UPDATE_SUCCESS', 'Successfully updated');
define('DELETE_FAIL', 'Failed to delete');
define('DELETE_SUCCESS', 'Successfully deleted');
define('SERVER_ERROR', 'Internal server error!');
define('PERMISSION_DENIED', 'Insufficient Permissions!');
define('UNAUTHORIsZED', 'These credentials do not match our records.');

// remove slash http(s) from given url
if (!function_exists('urlToStr')) {
    function urlToStr($url)
    {
        return preg_replace('#^[^:/.]*[:/]+#i', '', preg_replace('{/$}', '', config('app.url')));
    }
}

/**
 * check current url with route
 */
if (!function_exists('isActiveRoute')) {
    function isActiveRoute($routes, $output = 'active')
    {
        if (is_string($routes)) {
            return (Route::currentRouteName() == $routes) ? $output : '';
        }

        foreach ($routes as $route) {
            if (Route::currentRouteName() == $route) {
                return $output;
            }
        }
    }
}

/**
 * Remove spaces from string
 */
if (!function_exists('removeSpace')) {
    function removeSpace($str, $repBy = '')
    {
        return empty($str) ? null : preg_replace('/\s+/', $repBy, $str);
    }
}

/**
 * convert datetime to human readable
 */
if (!function_exists('dateFormat')) {
    function dateFormat($date, $format = 'l, d F Y', $repBy = null)
    {
        if (!empty($date) && !empty($repBy)) {
            $date = str_replace('/', $repBy, $date);
        }
        return $date ? date($format, strtotime($date)) : null;
    }
}

/**
 * Flash message with label
 * @Param String $message
 * @param String $level ='info'
 * @Return null
 */
if (!function_exists('flash')) {
    function flash($message, $level = 'success', $important = false)
    {
        session()->flash('flash_message', $message);
        session()->flash('flash_message_level', $level);
        session()->flash('flash_important', $important);
    }
}

/**
 * Common json error response
 */
if (!function_exists('respondError')) {
    function respondError($message, $code = 500, $status = false)
    {
        return response()->json([
            'success' => $status,
            'message' => $message
        ], $code);
    }
}

/**
 * Common json any response
 */
if (!function_exists('respond')) {
    function respond($message, $code = 200, $status = true)
    {
        return response()->json([
            'success' => $status,
            'message' => $message
        ], $code);
    }
}

/**
 * Is impersonate user
 */
if (!function_exists('isSuperAdminImpersonate')) {
    function isSuperAdminImpersonate()
    {
        return session()->has('IS_IMPERSONATE') ? true : null;
    }
}

/**
 * Get orgInfo
 */
if (!function_exists('orgInfo')) {
    function orgInfo()
    {
        return App\Models\OrgInfo::getOrgInfo();
    }
}