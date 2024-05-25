<?php
require "../model/Usuario.php";

$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];

$user = new Usuario($username, $password, $email);
$userSaved = $user->save();

if($userSaved === true) {
    echo "Usuário registrado com sucesso!";
} else{
    echo "Erro ao gravar o usuário. Dados já existentes, ou tente novamente mais tarde.";
}
?>
