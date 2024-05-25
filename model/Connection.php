<?php
class Connection {
    private static $host = 'localhost'; 
    private static $dbname = 'volta_ao_mundo_franca'; // Nome do banco de dados
    private static $username = 'root'; 
    private static $password = '';

    public static function connect() {
        try {
            $dsn = "mysql:host=" . self::$host . ";dbname=" . self::$dbname;
            $options = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            );
            $pdo = new PDO($dsn, self::$username, self::$password, $options);
            return $pdo;
        } catch (PDOException $e) {
            echo "Erro de conexão: " . $e->getMessage();
            exit;
        }
    }
}
