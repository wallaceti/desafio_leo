<?php

namespace App\Helpers;

/**
 * Class Redirect.
 */
class Redirect
{
    /**
     * Realiza o redireecionamento.
     *
     * @param $url
     */
    public static function to($url)
    {
        $url = $GLOBALS['baseUrlPath'] . "$url";

        header("Location: $url");
        die();

    }

}
