<?php

namespace App\Controllers;

use App\Helpers\Json;
use App\Services\ImageUploadService;
use App\Helpers\Redirect;
use App\Models\Course;
use App\Models\Image;

/**
 * Class CourseController.
 */
class CourseController extends Controller
{
    /**
     * Cria um novo curso.
     */
    public function create()
    {
        # Mover a imagem para o servidor.
        $ImageUploadService = new ImageUploadService;
        $upload = $ImageUploadService->upload($_FILES['image']);

        if ($upload['status'] == false) {
            Redirect::to('');
        }

        $_POST['image'] = $upload['data']['path'];

        # Salvar o curso.
        $Course = new Course();

        $create = $Course->create($_POST);

        # Retorna para a Home.
        Redirect::to('');

    }

    /**
     * Carrega os dados para edição do curso..
     *
     * @param $args
     */
    public function read($args)
    {
        $course_id = $args['id'];
        $course = (array) Course::get($course_id);

        echo \json_encode($course);
        exit;

    }

    /**
     * Atualiza o curso.
     */
    public function update()
    {
        # Carrega os dados do curso.
        $course_id = $_POST['id'];
        $course = (array) Course::get($course_id);

        # Mover a imagem para o servidor.
        if (isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])) {

            // Remove o arquivo anterior.
            @unlink($course['image']);

            // Adiciona o novo arquivo.
            $ImageUploadService = new ImageUploadService;
            $upload = $ImageUploadService->upload($_FILES['image']);

            if ($upload['status'] == false) {
                Redirect::to('');
            }

            $_POST['image'] = $upload['data']['path'];

        } else {
            $_POST['image'] = $course['image'];
        }

        # Salvar o curso.
        $Course = new Course();

        $update = $Course->update($_POST);

        # Retorna para a Home.
        Redirect::to('');

    }

    /**
     * Remove um curso.
     *
     * @param $args
     */
    public function delete($args)
    {
        # Busca os dados do curso.
        $course = (array) Course::get($args['id']);

        # Remove o arquivo do servidor.
        @unlink($course['image']);

        # Exclui o curso.
        $Course = new Course();

        $Course->delete($args['id']);

        # Retorna para a Home.
        Redirect::to('');

    }

}