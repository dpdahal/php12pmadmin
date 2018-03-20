<?php

if (!function_exists('to')) {
    function to($path = '')
    {
        if (empty($path)) return false;
        $redirectPath = $path;
        header('Location:' . $redirectPath);
        exit();

    }
}