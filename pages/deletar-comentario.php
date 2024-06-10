<?php
if (isset($_GET['id'])) {
    require "../model/Commentary.php";
    $commentID = $_GET['id'];
    $commentary = new Commentary();
    $commentary->deleteCommentary($commentID);
    header("Location: painel.php");
    exit();
} else {
    header("Location: painel.php");
    exit();
}
