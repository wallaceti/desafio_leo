<?php

namespace App\Controllers;

/**
 * Class HomeController.
 */
class HomeController extends Controller
{
    /**
     * Carrega a página inicial do sistema.
     */
    public function index()
    {
        $this->loadView('home', 'home');
    }

}