<?php

namespace App\Helpers;

/**
 * Class Redirect.
 */
class Json
{
    /**
     * Trata o encode.
     *
     * @param $inputArray
     * @return mixed
     */
    public static function encodeArrayToJSON($inputArray)
    {
        $arrTemp = $inputArray;

        array_walk_recursive($arrTemp, 'toUTF8');

        return $arrTemp;

    }

}
