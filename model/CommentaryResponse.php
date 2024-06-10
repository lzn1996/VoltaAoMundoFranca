<?php
require "Connection.php";
class CommentaryResponse
{
    public $id;
    public $id_commentary;
    public $response;

    public function save($commentaryId, $response)
    {
        $existingResponse = $this->getByCommentaryId($commentaryId);

        if ($existingResponse) {
            try {
                $connection = Connection::connect();
                $stmt = $connection->prepare("UPDATE commentaries_response SET response = :response WHERE id_commentary = :id_commentary");
                $stmt->bindParam(':response', $response);
                $stmt->bindParam(':id_commentary', $commentaryId);
                $stmt->execute();
                return true;
            } catch (PDOException $e) {
                echo "Erro ao atualizar a resposta: " . $e->getMessage();
                return false;
            }
        } else {
            $this->id = time();
            $this->id_commentary = $commentaryId;
            $this->response = $response;

            if (empty($response) || empty($commentaryId)) {
                return false;
            }

            try {
                $connection = Connection::connect();
                $stmt = $connection->prepare("INSERT INTO commentaries_response (id, id_commentary, response) VALUES (:id, :id_commentary, :response)");
                $stmt->bindParam(':id', $this->id);
                $stmt->bindParam(':id_commentary', $this->id_commentary);
                $stmt->bindParam(':response', $this->response);
                $stmt->execute();
                return true;
            } catch (PDOException $e) {
                echo "Erro ao salvar a resposta: " . $e->getMessage();
                return false;
            }
        }
    }

    public function getByCommentaryId($commentaryId)
    {
        try {
            $connection = Connection::connect();
            $stmt = $connection->prepare("SELECT * FROM commentaries_response WHERE id_commentary = :id_commentary");
            $stmt->bindParam(':id_commentary', $commentaryId);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo "Erro ao obter a resposta: " . $e->getMessage();
            return false;
        }
    }
}
