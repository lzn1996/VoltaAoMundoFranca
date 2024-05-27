<?php

if (isset($_GET['id']) && isset($_GET['action'])) {
    require "../model/Commentary.php";

    $commentary = new Commentary();

    $commentary_id = $_GET['id'];
    $action = $_GET['action'];

    if ($action == 'validate') {
        $commentary->validateCommentary($commentary_id);
    } elseif ($action == 'unvalidate') {
        $commentary->unvalidateCommentary($commentary_id);
    }

    header("Location: painel.php");
    exit;
} else {
    header("Location: erro.php");
    exit;
}
