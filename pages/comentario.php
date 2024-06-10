<?php

require "../model/Commentary.php";

$commentaries = Commentary::getAllValidCommentaries();

$commentaries_json = json_decode($commentaries, true);

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Comentário</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="preload" href="../assets/" as="image" />
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
            <li class="nav-item d-flex justify-content-center">
              <a class="nav-link link-underline text-dark-text-dark-emphasis list text-shadow" href="./onde-ir.html">Onde ir <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item d-flex justify-content-center">
              <a class="nav-link link-underline text-dark-emphasis list text-shadow" href="./historia.html">História</a>
            </li>
            <li class="nav-item d-flex justify-content-center">
              <a class="nav-link link-underline text-dark-emphasis list text-shadow" href="">Comentário</a>
            </li>
            <li class="nav-item d-flex justify-content-center">
              <a class="nav-link link-underline link-underline text-dark-emphasis list text-shadow" href="./login.php">Painel</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <main>
    <section class="container-fluid wrapper" style="padding-inline: 10vw; margin-top: 15vh">
      <div class="row justify-content-center">
        <div class="col-12 mb-5">
          <h2 class="text-center mb-5 place-title">Deixe seu comentário</h2>
          <form action="./gravar-comentario.php" class="container p-0 p-lg-3" method="POST">
            <div class="form-group">
              <label for="nome">Nome:</label>
              <input type="text" class="form-control" id="nome" placeholder="Digite seu nome" name="nome" />
            </div>
            <div class="form-group">
              <label for="email">E-mail:</label>
              <input type="email" class="form-control" id="email" placeholder="Digite seu email" name="email" />
            </div>
            <div class="form-group">
              <label for="comentario">Comentário:</label>
              <textarea class="form-control" id="comentario" rows="3" placeholder="Digite seu comentário" name="comentario"></textarea>
            </div>
            <div class="d-flex justify-content-center">
              <button type="submit" class="btn btn-primary btn-md mt-4">
                Salvar
              </button>
            </div>
          </form>
        </div>
      </div>
    </section>
    <section class="container-fluid wrapper" style='margin-top: -30vh;'>
      <div class="row justify-content-center">
        <div class="col-12 p-lg-5">
          <h2 class="text-center mb-5 place-title">Comentários recebidos</h2>
          <div class="row">
            <?php if (!empty($commentaries_json)) : ?>
              <?php foreach ($commentaries_json as $comment) : ?>
                <div class="col-md-6 mb-4">
                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title"><?php echo $comment['guest_name']; ?></h5>
                      <h6 class="card-subtitle mb-2 text-muted"><?php echo $comment['guest_email']; ?></h6>
                      <p class="card-text"><?php echo $comment['commentary']; ?></p>
                      <?php if (isset($_SESSION['user_email'])) : ?>
                        <a href="./responder_comentario.php?id=<?php echo $comment['commentary_id']; ?>" class="btn btn-primary">Responder</a>
                      <?php endif; ?>
                    </div>
                    <?php if (!empty($comment['response'])) : ?>
                      <div class="card-footer">
                        <div class="mini-card">
                          <p class="mb-0"><strong>Resposta:</strong> <?php echo $comment['response']; ?></p>
                          <p class="mb-0"><strong>Respondido pelo ADM</strong><strong> em:</strong> <?php echo date('d/m/Y \à\s H:i', strtotime($comment['response_date'])); ?></p>
                        </div>
                      </div>
                    <?php endif; ?>
                  </div>
                </div>
              <?php endforeach; ?>
            <?php else : ?>
              <div class="col-12 text-center">
                <p>Não há comentários disponíveis.</p>
              </div>
            <?php endif; ?>
          </div>
        </div>
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
  ...
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const params = new URLSearchParams(window.location.search);
      const successParam = params.get("success");

      if (successParam !== null) {
        const message =
          successParam === "true" ?
          "Comentário gravado com sucesso! Obrigado!" :
          "Erro ao gravar o comentário.";
        const alertClass =
          successParam === "true" ? "alert-success" : "alert-danger";

        const alertDiv = document.createElement("div");
        alertDiv.className = "alert " + alertClass;
        alertDiv.setAttribute("role", "alert");
        alertDiv.innerHTML =
          message +
          `<button type="button" class="close" data-dismiss="alert" aria-label="Fechar">
            <span aria-hidden="true">&times;</span>
          </button>`;


        const container = document.querySelector(".container");
        container.insertBefore(alertDiv, container.firstChild);

        setTimeout(function() {
          container.removeChild(alertDiv);
          const urlWithoutSuccessParam = window.location.href.split("?")[0];
          history.replaceState({}, document.title, urlWithoutSuccessParam);
        }, 3000);
      }
    });
  </script>
  ...
</body>

</html>