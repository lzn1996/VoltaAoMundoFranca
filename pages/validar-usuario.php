<?php
require "../model/User.php";

$password = $_POST['password'];
$email = $_POST['email'];

$isRegisterAttemptOk = User::authenticate($email, $password);

if ($isRegisterAttemptOk) {
    session_start();
    $_SESSION['user_email'] = $email;
    header("Location: ./painel.php");
    exit();
} else {
    header("Location: ./login.php?user-invalid=true");
    exit();
}
