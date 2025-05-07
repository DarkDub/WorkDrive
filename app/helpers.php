<?php

if (!function_exists('active_class')) {
    function active_class($routeName)
    {
        return request()->routeIs($routeName) ? 'bg-secondary text-white' : '';
    }

    function icon_class($routeName)
    {
        return request()->routeIs($routeName) ? 'bg-secondary text-white' : '';
    }
}
