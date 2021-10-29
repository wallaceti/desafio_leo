<?php

namespace App\Services;

/**
 * Class Database.
 */
class Database
{
    /**
     * Variável que guarda a conexão PDO.
     *
     * @var PDO
     */
    protected static $db;

    /**
     * Driver de conexão com o banco de dados.
     *
     * @var
     */
    private $driver = 'mysql';

    /**
     * Garante que a classe só possa ser instanciada internamente.
     *
     * @param $servidor
     * @param $database
     * @param $user
     * @param $senha
     */
    private function __construct($db_host, $db_name, $db_user, $db_pass)
    {
        try {
            # Atribui o objeto PDO à variável $db.
            self::$db = new \PDO($this->driver . ":host=$db_host; dbname=$db_name", $db_user, $db_pass);

            # Garante que o PDO lance exceções durante erros.
            self::$db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

            # Garante que os dados sejam armazenados com codificação UFT-8.
            self::$db->exec('SET NAMES utf8');

        } catch (\PDOException $e) {

            # Então não carrega nada mais da página.
            die("Connection Error: " . $e->getMessage());

        }

    }

    /**
     * Acessível sem instanciação.
     *
     * @param $db_host
     * @param $db_name
     * @param $db_user
     * @param $db_pass
     * @return PDO
     */
    public static function conect($db_host, $db_name, $db_user, $db_pass)
    {
        # Garante uma única instância. Se não existe uma conexão, criamos uma nova.
        if (!self::$db) {
            new Database($db_host, $db_name, $db_user, $db_pass);
        }

        # Retorna a conexão.
        return self::$db;

    }

}
