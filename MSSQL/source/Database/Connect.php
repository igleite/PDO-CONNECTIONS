<?php


namespace Source\Database;

use \PDO;
use \PDOException;

class Connect
{
    private const SERVER = "localhost\SQLEXPRESS";
    private const USER = "sa";
    private const PASSWORD = "";
    private const DATABASE = "PDO";

    /**
     * OPÇÕES DE INICIALIZAÇÃO
     */
    private const OPTIONS = [
       // PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_CASE => PDO::CASE_NATURAL,
    ];

    /**
     * Armazena o objeto PDO
     * Garante que não tenha duas conexões por usuário
     */

    private static $instance;

    /**
     * @return PDO
     */
    public static function getInstance(): PDO
    {
        if (empty(self::$instance)) {
            try {
                self::$instance = new PDO(
                    "sqlsrv:Server=" . self::SERVER . ";Database=" . self::DATABASE,
                    self::USER,
                    self::PASSWORD,
                    self::OPTIONS
                );
            } catch (PDOException $exception) {
                die("<h1 style='color: red'>Ops! Erro ao conectar...</h1>");
            }
        }
        return self::$instance;
    }

    /**
     * Não permite que Construa novos objetos
     * Nem que clone esses objetos
     */

    final function __construct()
    {
    }

    final function __clone()
    {
    }
}
