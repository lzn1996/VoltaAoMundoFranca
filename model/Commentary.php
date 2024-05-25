<?php
require "Connection.php";
class Commentary{
    public $id;
    public $guest_name;
    public $guest_email;
    public $commentary;

    public function __construct($username, $password) {

        $this->id = uniqid(time(), true);
        $this->username = strtolower(trim($username));
        $this->password = hash('sha256', $password);
    }

    public function save() {
        try {
            $connection = Connection::connect();
            $stmt = $connection->prepare("INSERT INTO commentary (id, guest_name, guest_email, commentary) VALUES (:id, :guest_name, :guest_email, :commentary)");
            $stmt->bindParam(':id', $this->id);
            $stmt->bindParam(':guest_name', $this->guest_name);
            $stmt->bindParam(':guest_email', $this->guest_email);
            $stmt->bindParam(':commentary', $this->commentary);

            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            echo "Erro ao salvar o comentário: " . $e->getMessage();
            return false;
        }
    }
}