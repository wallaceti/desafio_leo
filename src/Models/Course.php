<?php

namespace App\Models;

use App\Models\Image;

/**
 * Class Course.
 */
class Course extends BaseModel
{
    /**
     * Tabela n banco de dados.
     *
     * @var string
     */
    protected $table = 'courses';

    /**
     * Inicialização da classe.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Insere um novo registro no banco de dados.
     *
     * @param $request
     * @return array
     */
    public function create($request)
    {
        try {

            $sqlInsertCourse = '
                INSERT INTO ' . $this->table . ' (title, description, link, image, created_at, updated_at) 
                VALUES (:title, :description, :link, :image, now(), now())
            ';

            $stmtInsertCourse = $this->con->prepare($sqlInsertCourse);

            $stmtInsertCourse->execute([
                'title' => $request['title'],
                'description' => $request['description'],
                'link' => $request['link'],
                'image' => $request['image']
            ]);


        } catch (\Exception$exception) {

            return [
                'status' => false,
                'message' => 'Ocorreu um erro ao tentar criar o curso!',
                'data' => ['log' => $exception->getMessage()]
            ];

        }

        # Retorna a resposta da requisição.
        return [
            'status' => true,
            'message' => 'Curso criado com sucesso.',
            'data' => []
        ];

    }

    /**
     * Retorna todos so registros.
     *
     * @return array
     */
    public static function read()
    {
        $course = new Course;

        return $course->getAll();

    }

    /**
     * Atualiza um registro no banco de dados.
     *
     * @param $request
     * @return array
     */
    public function update($request)
    {
        try {

            $sqlUpdateCourse = '
                UPDATE ' . $this->table . ' SET 
                    title = :title, description = :description, link = :link, image = :image, updated_ate = now() 
                WHERE id = :id 
            ';

            $stmtUpdateCourse = $this->con->prepare($sqlUpdateCourse);

            $stmtUpdateCourse->execute([
                'title' => $request['title'],
                'description' => $request['description'],
                'link' => $request['link'],
                'image' => $request['image'],
                'id' => $request['id']
            ]);


        } catch (\Exception$exception) {

            return [
                'status' => false,
                'message' => 'Ocorreu um erro ao tentar atualizar o curso!',
                'data' => ['log' => $exception->getMessage()]
            ];

        }

        # Retorna a resposta da requisição.
        return [
            'status' => true,
            'message' => 'Curso atualizado com sucesso.',
            'data' => []
        ];

    }

    /**
     * Remove o curso.
     *
     * @return mixed
     */
    public function delete($id)
    {
        try {

            $sqlDeleteCourse = 'DELETE FROM ' . $this->table . ' WHERE id = :id';

            $stmtDeleteCourse = $this->con->prepare($sqlDeleteCourse);

            $stmtDeleteCourse->execute([
                'id' => $id
            ]);

        } catch (\Exception$exception) {

            return [
                'status' => false,
                'message' => 'Ocorreu um erro ao tentar excluir o curso!',
                'data' => ['log' => $exception->getMessage()]
            ];

        }

        # Retorna a resposta da requisição.
        return [
            'status' => true,
            'message' => 'Curso excluido com sucesso.',
            'data' => []
        ];

    }

    /**
     * Retorna todos os cursos.
     *
     * @return array
     */
    public function getAll()
    {
        try {

            # Busca os cursos no banco de dados.
            $sqlSelectCourse = 'SELECT * FROM ' . $this->table;

            $stmtSelectCourse = $this->con->prepare($sqlSelectCourse);

            $stmtSelectCourse->execute();

            $resultCourses = $stmtSelectCourse->fetchAll();

            # Carrega os dados
            $courses = is_array($resultCourses) ? $resultCourses : [];

        } catch (\Exception$exception) {

            return [
                'status' => false,
                'message' => 'Ocorreu um erro ao tentar listar os cursos!',
                'data' => ['log' => $exception->getMessage()]
            ];

        }

        # Retorna a resposta da requisição.
        return [
            'status' => true,
            'message' => 'Curso listados com sucesso.',
            'data' => ['courses' => $courses]
        ];

    }

}