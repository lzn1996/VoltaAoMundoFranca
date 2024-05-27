<?php
if (isset($_GET['id'])) {
    $commentID = $_GET['id'];
    require "../model/Commentary.php";
    $commentary = new Commentary();
    $commentary->deleteCommentary($commentID);

    // Redirecionar de volta para a página de comentários após a exclusão
    header("Location: painel.php");
    exit();
} else {
    // Se nenhum ID de comentário foi fornecido, redirecionar para a página de comentários
    header("Location: painel.php");
    exit();
}
