<?php
require '../model/CommentaryResponse.php';


$commentary_id = $_POST['commentary_id'];
$answer = $_POST['resposta'];

$response = new CommentaryResponse();
$saveResponse = $response->save($commentary_id, $answer);



if ($saveResponse) {
    header("Location: ../pages/comentario.php");
    exit();
} else {
    echo 'Erro ao salvar a resposta.';
    exit();
}
