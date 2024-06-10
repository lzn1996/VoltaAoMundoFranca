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
        date_default_timezone_set('America/Sao_Paulo');
        $currentTime = date("Y-m-d H:i:s");

        if ($existingResponse) {
            try {
                $connection = Connection::connect();
                $stmt = $connection->prepare("UPDATE commentaries_response SET response = :response, created_at = :created_at WHERE id_commentary = :id_commentary");
                $stmt->bindParam(':response', $response);
                $stmt->bindParam(':created_at', $currentTime);
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
                $stmt = $connection->prepare("INSERT INTO commentaries_response (id, id_commentary, response, created_at) VALUES (:id, :id_commentary, :response, :created_at)");
                $stmt->bindParam(':id', $this->id);
                $stmt->bindParam(':id_commentary', $this->id_commentary);
                $stmt->bindParam(':response', $this->response);
                $stmt->bindParam(':created_at', $currentTime);
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
