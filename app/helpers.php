<?php

use Illuminate\Support\Facades\Session;

if (!function_exists('getLang')) {
    function getLang($key)
    {
        $lang = __($key);

        if ($lang == $key)
            $lang = str_replace('_', ' ', $lang);
        return $lang;
    }
}

if (!function_exists('universalDateFormatter')) {
    function universalDateFormatter($date)
    {
        return $date ? $date->format('Y/m/d h:i:s') : '';
    }
}

if (!function_exists('flashSession')) {
    function flashSession($message, $type = 'success')
    {
        Session::flash('message', $message);
        Session::flash('alert-class', 'alert-' . $type);
    }
}

if (!function_exists('flashSuccess')) {
    function flashSuccess($message)
    {
        flashSession($message);
    }
}
if (!function_exists('flashError')) {
    function flashError($message)
    {
        flashSession($message, 'error');
    }
}
if (!function_exists('flashInfo')) {
    function flashInfo($message)
    {
        flashSession($message, 'info');
    }
}
if (!function_exists('flashWarning')) {
    function flashWarning($message)
    {
        flashSession($message, 'warning');
    }
}
if (!function_exists('getUnit')) {
    function getUnit()
    {
        return \App\Models\Unit::all();
    }
}
if (!function_exists('getCompanies')) {
    function getCompanies()
    {
        return \App\Models\Company::all();
    }
}
if (!function_exists('getProducts')) {
    function getProducts()
    {
        return \App\Models\Product::all();
    }
}
if (!function_exists('getServices')) {
    function getServices()
    {
        return \App\Models\Service::all();
    }
}
if (!function_exists('getReferrals')) {
    function getReferrals()
    {
        return \App\Models\Client::all();
    }
}
if (!function_exists('getBranches')) {
    function getBranches()
    {
        return \App\Models\Branch::all();
    }
}
if (!function_exists('getReferrals')) {
    function getReferrals()
    {
        return \App\Models\Client::all();
    }
}
if (!function_exists('lgUId')) {
    function lgUId(): int
    {
        return \Illuminate\Support\Facades\Auth::user()->id ?? 0;
    }
}
if (!function_exists('getGroupedPermissions')) {
    function getGroupedPermissions()
    {
        $permissions = \Spatie\Permission\Models\Permission::all();
        return $permissions->mapToGroups(function ($item, $key) {
            return [$item['group'] => $item['name']];
        });

    }
}
if (!function_exists('loggedInUserId')) {
    function loggedInUserId()
    {
        return \Illuminate\Support\Facades\Auth::user()->id;

    }
}
function getUserCourses()
{
    return \Illuminate\Support\Facades\Auth::user()->courses;
}
