<?php
namespace App\Helpers;

class Redirect
{
    public static function to($url)
    {
        
        $url = $GLOBALS['baseUrlPath'] . "$url";

        var_dump($url);
        
        header("Location: $url");
        die();
    }
}