<?php
require "Connection.php";
require "../vendor/autoload.php";

use Ramsey\Uuid\Uuid;

class User
{
    public $id;
    public $password;
    public $email;

    public function __construct($password, $email)
    {
        $this->id = Uuid::uuid4();
        $this->password = password_hash($password, PASSWORD_DEFAULT);
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->email = $email;
        } else {
            $this->email = NULL;
        }
    }

    public function save()
    {
        try {
            $conexao = Connection::connect();
            $stmt_check = $conexao->prepare("SELECT COUNT(*) FROM users WHERE email = :email");
            $stmt_check->bindParam(':email', $this->email);
            $stmt_check->execute();
            $result = $stmt_check->fetchColumn();
            if ($result > 0) {
                return false;
            }
            $stmt = $conexao->prepare("INSERT INTO users (id, password, email) VALUES (:id, :password, :email)");
            $stmt->bindParam(':id', $this->id);
            $stmt->bindParam(':password', $this->password);
            $stmt->bindParam(':email', $this->email);

            if ($this->email == NULL) {
                return false;
            }

            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public static function authenticate($email, $password)
    {
        try {
            $conexao = Connection::connect();
            $stmt = $conexao->prepare("SELECT * FROM users WHERE email = :email");
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user) {
                if (password_verify($password, $user['password'])) {
                    return $user;
                }
            }
        } catch (PDOException $e) {
        }

        return null;
    }
}
