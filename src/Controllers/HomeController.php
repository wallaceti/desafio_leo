<?php

namespace App\Controllers;

/**
 * Class HomeController.
 */
class HomeController extends Controller
{
    /**
     * Pasta que contém as Views
     */
    const FOLDER = 'home';

    /**
     * Carrega a página inicial do sistema.
     */
    public function index()
    {
        $this->loadView(self::FOLDER, 'home');
    }

}
