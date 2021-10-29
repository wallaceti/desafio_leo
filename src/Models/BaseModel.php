<?php

namespace App\Models;

use App\Services\Database;

/**
 * Class BaseModel
 */
class BaseModel
{
    /**
     * Interface de conexão com o banco de dados.
     *
     * @var \App\Services\PDO
     */
    protected $con;

    /**
     * Chave primária padrão.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Instancia uma conexão com o banco de dados.
     */
    public function __construct()
    {
        $this->con = Database::conect(DB_HOST, DB_NAME, DB_USER, DB_PASS);
    }

    /**
     * Carrega os dados do Model.
     *
     * @param $modelData
     */
    protected function loadData($modelData)
    {
        foreach($modelData as $property=>$value) {
            $this->$property = $value;
        }

    }

    /**
     * Uso estático - Busca o registro de acordo com o Id infomado na assinatura da requisição.
     *
     * @param $primaryKeyValue
     * @return mixed
     */
    public static function get($primaryKeyValue)
    {
        $class = get_called_class();

        $model = new $class;

        return $model->getFirstByKey($primaryKeyValue);
        
    }

    /**
     * Busca o registro de acordo com o Id infomado na assinatura da requisição.
     *
     * @param $primaryKeyValue
     * @return $this|null
     */
    public function getFirstByKey($primaryKeyValue)
    {
        try {

            $q = $this->con->prepare('SELECT * FROM ' . $this->table . ' WHERE ' . $this->primaryKey . '= :value limit 1');
            $q->bindValue(':value', $primaryKeyValue);
            $q->execute();

            $data = $q->fetch();

            if ($data) {

                $this->loadData($data);

                return $this;

            }

        } catch (\Exception $exception) {
            return null;
        }

        return null;

    }

}
