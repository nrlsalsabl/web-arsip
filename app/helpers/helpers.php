<?php

use App\Models\Setting;
use Illuminate\Support\Arr;

if (!function_exists('inputBgClass')) {
    function inputBgClass($value)
    {
        return filled($value) ? 'bg-gray-200 dark:bg-gray-700' : '';
    }
}

if (!function_exists('setting')) {
    function setting($key, $default = null)
    {
        return Setting::get($key, $default);
    }
}
