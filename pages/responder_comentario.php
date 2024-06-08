<?php
// Aqui você pode incluir qualquer lógica necessária para obter os detalhes do comentário que está sendo respondido, se necessário
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Responder Comentário</title>
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
        <section class="container-fluid wrapper not-index" style="padding-inline: 10vw">
            <div class="row justify-content-center">
                <div class="col-12 mb-5">
                    <h2 class="text-center mb-5 place-title">Responder Comentário</h2>
                    <form action="#" class="container" method="POST">
                        <!-- Adicione aqui os campos do formulário para responder o comentário -->
                        <div class="form-group">
                            <label for="resposta">Resposta:</label>
                            <textarea class="form-control" id="resposta" rows="3" placeholder="Digite sua resposta" name="resposta"></textarea>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary btn-md mt-4">
                                Enviar Resposta
                            </button>
                        </div>
                    </form>
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
</body>

</html>