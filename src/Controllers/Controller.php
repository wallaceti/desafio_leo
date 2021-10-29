<?php

namespace App\Controllers;

/**
 * Class Controller.
 */
class Controller
{
    /**
     * Carrega o arquivo correspondente a View.
     *
     * @param string $folder
     * @param string $view
     */
    public function loadView(string $folder, string $view)
    {
        require_once __DIR__ . "/../Views/{$folder}/{$view}.php";
    }

}
