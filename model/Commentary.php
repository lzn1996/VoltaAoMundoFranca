<?php
require "Connection.php";
class Commentary
{
    public $id;
    public $guest_name;
    public $guest_email;
    public $commentary;

    public function save($guestName, $email, $commentary)
    {
        $this->id = time();
        $this->guest_name = strtolower(trim($guestName));
        $this->guest_email = $email;
        $this->commentary = $commentary;

        try {
            $connection = Connection::connect();
            $stmt = $connection->prepare("INSERT INTO commentaries (id, guest_name, guest_email, commentary, is_valid) VALUES (:id, :guest_name, :guest_email, :commentary, 0)");
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

    public function getCommentary($id)
    {
        try {
            $connection = Connection::connect();
            $stmt = $connection->prepare("SELECT * FROM commentaries WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $commentaries = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return json_encode($commentaries);
            } else {
                return json_encode([]);
            }
        } catch (PDOException $e) {
            return json_encode(["error" => "Erro ao buscar os comentários: " . $e->getMessage()]);
        }
    }

    public function getAllComentaries()
    {
        try {
            $connection = Connection::connect();
            $stmt = $connection->prepare("SELECT * FROM commentaries");
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $commentaries = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return json_encode($commentaries);
            } else {
                return json_encode([]);
            }
        } catch (PDOException $e) {
            return json_encode(["error" => "Erro ao buscar os comentários: " . $e->getMessage()]);
        }
    }

    public static function getAllValidCommentaries()
    {
        try {
            $connection = Connection::connect();

            $stmt = $connection->prepare("SELECT c.id AS commentary_id, c.commentary, c.created_at AS commentary_date,
             c.is_valid, c.guest_name, c.guest_email, r.response, r.created_at AS response_date
            FROM commentaries c
            LEFT JOIN commentaries_response r ON c.id = r.id_commentary
            WHERE c.is_valid = 1");

            $stmt->execute();

            $validCommentaries = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return json_encode($validCommentaries);
        } catch (PDOException $e) {
            return json_encode(["error" => "Erro ao buscar os comentários válidos: " . $e->getMessage()]);
        }
    }

    public function validateCommentary($id)
    {
        try {
            $connection = Connection::connect();
            $stmt = $connection->prepare("UPDATE commentaries SET is_valid = 1 WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Erro ao validar o comentário: " . $e->getMessage();
            return false;
        }
    }

    public function unvalidateCommentary($id)
    {
        try {
            $connection = Connection::connect();
            $stmt = $connection->prepare("UPDATE commentaries SET is_valid = 0 WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Erro ao validar o comentário: " . $e->getMessage();
            return false;
        }
    }


    public function deleteCommentary($id)
    {
        try {
            $connection = Connection::connect();
            $stmt = $connection->prepare("DELETE FROM commentaries WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Erro ao deletar o comentário: " . $e->getMessage();
            return false;
        }
    }
}
