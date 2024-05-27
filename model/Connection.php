<?php
class Connection
{
    private static $host = 'localhost';
    private static $dbname = 'volta_ao_mundo_franca';
    private static $port = '3312';
    private static $username = 'root';

    public static function connect()
    {
        try {
            $dsn = "mysql:host=" . self::$host . ";port=" . self::$port . ";dbname=" . self::$dbname;
            $pdo = new PDO($dsn, self::$username);
            return $pdo;
        } catch (PDOException $e) {
            echo "Erro de conexão: " . $e->getMessage();
            exit;
        }
    }
}
