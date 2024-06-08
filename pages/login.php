<?php
$failedInAuthenticationErrorMessage = '';
if (isset($_GET['user-invalid']) && $_GET['user-invalid'] === 'true') {
  $failedInAuthenticationErrorMessage = "Usuário ou senha inválidos. Por favor, digite corretamente.";
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />
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
              <a class="nav-link link-underline text-dark-emphasis list text-shadow" href="./comentario.html">Comentário</a>
            </li>
            <li class="nav-item d-flex justify-content-center">
              <a class="nav-link link-underline link-underline text-dark-emphasis list text-shadow" href="">Painel</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <main class="not-index container-fluid ">
    <section class="container-fluid wrapper not-index" style="gap:10vh;padding-inline: 10vw">
      <h2 class="place-title text-center">Acessar o painel</h2>
      <?php if (!empty($failedInAuthenticationErrorMessage)) : ?>
        <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
          <?php echo $failedInAuthenticationErrorMessage; ?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Fechar" onclick="removeErrorParam()">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <?php endif; ?>
      <form method='POST' class="mt-5" action="validar-usuario.php">
        <div class="form-group">
          <label for="email">E-mail:</label>
          <input type="text" class="form-control" id="email" placeholder="Digite seu e-mail" name='email' />
        </div>
        <div class="form-group">
          <label for="password">Senha:</label>
          <input type="password" class="form-control" id="password" placeholder="Digite sua senha" name='password' />
        </div>
        <div style="margin-top: -20px; display: flex; justify-content: flex-end">
          <a href="./cadastro.php" class='d-block mt-2'>Crie sua conta</a>
        </div>
        <div class="d-flex justify-content-center">
          <button type="submit" class="btn btn-primary btn-ld mt-4">
            Entrar
          </button>
        </div>
      </form>

    </section>
  </main>

  <footer class="footer mt-auto py-3 bg-light">
    <div class="container text-center">
      <span class="text-muted">© 2024 Luan DSM Fatec Itapira - Todos os direitos reservados.</span>
    </div>
  </footer>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="../linksStyle.js"></script>
  <script>
    function removeErrorParam() {
      const urlWithoutParam = window.location.href.split('?')[0];
      window.history.replaceState({}, document.title, urlWithoutParam);
    }
  </script>
</body>

</html>