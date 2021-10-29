<?php

namespace App\Controllers;

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
     *
     * @param $args
     */
    public function create($args)
    {
        var_dump($_REQUEST);
        exit;



        echo "<pre>";
        $uploadService = new ImageUploadService;
        $uploadsData = $uploadService->upload($_FILES['imagem']);
        $imagehash = null;

        foreach($uploadsData as $imageData) {

            if(! $imageData['error']){
                $hash = $imageData['hash'];
                $image = new Image;
                $image->hash = $hash;
                $image->fullpath = $imageData['fullPath'];
                $image->createOrUpdate();

                $imagehash = $image->hash;
            }
        }

        if ($imagehash) {
            $curso = new Curso;
            $curso->titulo = $_POST['titulo'];
            $curso->descricao = $_POST['descricao'];
            $curso->link = ' ';
            $curso->image_hash = $imagehash;
            $curso->create();
        }

        Redirect::to('');

    }

    public function update($args)
    {
        $cursoId = $args['id'];
        $curso = Curso::get($cursoId);

    }

    public function delete($args)
    {

        $cursoId = $args['id'];
        $curso = Curso::get($cursoId);

        if($curso) {
            $curso->delete();
        }

    }

}