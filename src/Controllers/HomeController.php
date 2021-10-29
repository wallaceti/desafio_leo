<?php

namespace App\Controllers;

use App\Models\Course;

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
        # Carrega os dados dos cursos
        $Course = new Course();

        $GLOBALS['courses'] = $Course->getAll()['data']['courses'];

        # Carrega o código da View.
        $this->loadView(self::FOLDER, 'home');

    }

}
