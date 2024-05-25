<?php
require "Connection.php";
require "../vendor/autoload.php";

use Ramsey\Uuid\Uuid;

class Usuario {
    public $id;
    public $username;
    public $password;
    public $email;

    public function __construct($username, $password, $email) {
        $this->id = Uuid::uuid4();
        $this->username = strtolower(trim($username));
        $this->password = hash('sha256', $password);
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->email = $email;
        } else {
            $this->email = NULL;
        }
    }

    public function save() {
        try {
            $conexao = Connection::connect();
            $stmt_check = $conexao->prepare("SELECT COUNT(*) FROM users WHERE email = :email");
            $stmt_check->bindParam(':email', $this->email);
            $stmt_check->execute();
            $result = $stmt_check->fetchColumn();
            if ($result > 0) {
                return false; 
            }
            $stmt = $conexao->prepare("INSERT INTO users (id, username, password, email) VALUES (:id, :username, :password, :email)");
            $stmt->bindParam(':id', $this->id);
            $stmt->bindParam(':username', $this->username);
            $stmt->bindParam(':password', $this->password);
            $stmt->bindParam(':email', $this->email);

            if($this->email == NULL){
                return false; 
            } 

            $stmt->execute();
            return true; 
        } catch (PDOException $e) {
            return false;
        }
    }
}
