<?php
require '../model/Commentary.php';

if (empty($_FILES['jsonFile']['tmp_name'])) {
    header('Location: ../pages/comentario.php?empty=true');
    exit;
}

if (isset($_FILES['jsonFile'])) {
    $fileInfo = pathinfo($_FILES['jsonFile']['name']);
    if (strtolower($fileInfo['extension']) !== 'json') {
        header('Location: ../pages/comentario.php?not-json=true');
        exit;
    }

    $jsonContent = file_get_contents($_FILES['jsonFile']['tmp_name']);

    $data = json_decode($jsonContent, true);

    if ($data !== null) {
        foreach ($data as $comment) {
            $nome = $comment['nome'];
            $email = $comment['email'];
            $comentario = $comment['comentario'];

            $commentary = new Commentary();
            $isRegisterAttemptOk = $commentary->save($nome, $email, $comentario);
        }
        echo "Comentários importados com sucesso!";
        header("Location: ../pages/comentario.php?import-success=true");
        exit;
    } else {
        echo "Erro ao decodificar o JSON.";
    }
} else {
    echo "Nenhum arquivo enviado.";
}
