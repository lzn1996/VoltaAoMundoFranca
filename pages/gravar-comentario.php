<?php
require "../model/Commentary.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $guest_name = $_POST['nome'];
    $guest_email = $_POST['email'];
    $guest_commentary = $_POST['comentario'];
}

$commentary = new Commentary();
$commentary->save($guest_name, $guest_email, $guest_commentary);
