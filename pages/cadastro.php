<?php
require "../model/Usuario.php";


$successMsg = '';
$errorMsg = '';

if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $email = $_POST['email'];

  $user = new Usuario($username, $password, $email);
  $isRegisterAttemptOk = $user->save();

  if ($isRegisterAttemptOk) {
    $successMsg = 'Usuário cadastrado com sucesso!';
    $errorMsg = '';
  } else {
    $errorMsg = 'Já existe um usuário cadastrado com esse email.';
    $successMsg = '';
  }
}


?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Onde ir</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="preload" href="../assets/img/1.jpg" as="image" />
  <link rel="preload" href="../assets/img/6.jpg" as="image" />
  <link rel="preload" href="../assets/img/3.jpg" as="image" />
  <link rel="preload" href="../assets/img/4.jpg" as="image" />
  <link rel="stylesheet" href="../styles.css" />
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top w-100 bg-transparent blur flex-row padding py-3">
    <div class="d-flex justify-content-between w-100 flex-lg-row align-items-center">
      <a href="../index.html" class="text-decoration-none">
        <div class="logo logo-up h-100 d-flex p-2">
          <h1>
            <span class="header-title title-begin text-shadow">Fr</span><span class="header-title title-mid text-shadow">an</span><span class="header-title title-end text-shadow">ça</span>
          </h1>
        </div>
      </a>
      <div class="d-flex flex-column">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto text-dark-emphasis" style="gap: 20px !important">
            <li class="nav-item d-flex justify-content-center">
              <a class="nav-link link-underline list text-dark-emphasis text-shadow" href="../index.html">Início</a>
            </li>
            <li class="nav-item d-flex justify-content-center">
              <a class="nav-link link-underline text-dark-emphasis list text-shadow" href="./cultura.html">Cultura</a>
            </li>
            <li class="nav-item active d-flex justify-content-center">
              <a class="nav-link link-underline text-dark-text-dark-emphasis list text-shadow" href="./onde-ir.html">Onde ir</a>
            </li>
            <li class="nav-item d-flex justify-content-center">
              <a class="nav-link link-underline text-dark-emphasis list text-shadow" href="./historia.html">História</a>
            </li>
            <li class="nav-item d-flex justify-content-center">
              <a class="nav-link link-underline link-underline text-dark-emphasis list text-shadow" href="./comentario.html">Comentário</a>
            </li>
            <li class="nav-item d-flex justify-content-center">
              <a class="nav-link link-underline link-underline text-dark-emphasis list text-shadow" href="">Painel</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <main class="not-index container-fluid">
    <section class="d-flex flex-column align-items-center mt-3" style="gap:10vh">
      <h2 class="mt-4">Criar conta para ADMIN</h2>
      <?php if ($successMsg != '') echo "<p style='color: green'>$successMsg</p>"; ?>
      <?php if ($errorMsg != '') echo "<p style='color: red'>$errorMsg</p>"; ?>
      <form method="post" action="#">
        <label for="username">Nome de Usuário</label><br>
        <input type="text" id="username" name="username" required><br>
        <label for="email">E-mail</label><br>
        <input type="email" id="email" name="email" required><br>
        <label for="password">Senha</label><br>
        <input type="password" id="password" name="password" required><br><br>
        <div style="margin-top: -20px; display: flex; justify-content: flex-end">
          <a href="./login.php">Fazer login</a>
        </div>
        <div class="d-flex justify-content-center">
          <input type="submit" class="btn btn-primary btn-md mt-4" value="Salvar">
        </div>


      </form>
      <div id="loadingIndicator" style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 9999;">
        <div class="spinner-border text-primary" role="status">
          <span class="sr-only">Carregando...</span>
        </div>
        <span>Carregando...</span>
      </div>

    </section>
  </main>

  <footer class="footer mt-auto py-3 bg-light">
    <div class="container text-center">
      <span class="text-muted">© 2024 Luan DSM Fatec Itapira - Todos os direitos reservados.</span>
    </div>
  </footer>
  <!-- Bootstrap JS e jQuery (opcional, se necessário) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="../linksStyle.js"></script>
</body>

</html>