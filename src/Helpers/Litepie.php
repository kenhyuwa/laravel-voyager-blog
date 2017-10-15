<?php 

if (!function_exists('litepie_asset')) {
    function litepie_asset($path, $secure = null)
    {
        return asset(config('litepie.assets_path').'/'.$path, $secure);
    }
}