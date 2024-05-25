<?php
// Verifica se o usuário está logado, caso contrário, redireciona para a página de login
// session_start();
// if (!isset($_SESSION['user_id'])) {
//     header("Location: login.php");
//     exit;
// }

require "../model/Commentary.php";

$commentary = new Commentary();
$commentaries = $commentary->getAllComentaries();

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Painel Administrativo</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="styles.css" />
    <style>
        body {
            padding-top: 56px;
        }

        /* Sidebar Styles */
        .sidebar {
            position: fixed;
            top: 56px;
            bottom: 0;
            left: 0;
            z-index: 100;
            padding: 48px 0 0;
            box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
            width: 250px;
            background-color: #f8f9fa;
            transition: all 0.3s;
        }

        .sidebar-sticky {
            position: relative;
            top: 0;
            height: calc(100vh - 56px);
            padding-top: .5rem;
            overflow-x: hidden;
            overflow-y: auto;
        }

        .sidebar .nav-link {
            font-weight: 500;
            color: #333;
        }

        .sidebar .nav-link:hover {
            color: #007bff;
        }

        .sidebar-heading {
            font-size: .75rem;
            text-transform: uppercase;
        }

        .content {
            margin-left: 250px;
            padding: 20px;
        }

        .navbar-toggler {
            color: #333;
            border-color: #333;
        }

        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3e%3cpath stroke='rgba%280, 0, 0, 0.5%29' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        }

        @media (min-width: 768px) {
            .sidebar {
                left: 0;
            }

            .content {
                margin-left: 250px;
            }
        }

        @media (max-width: 767.98px) {
            .sidebar {
                left: -250px;
            }

            .content {
                margin-left: 0;
            }
        }

        .table-fixed {
            width: 100%;
            table-layout: fixed;
        }

        .table-fixed thead th {
            position: sticky;
            top: 0;
            z-index: 1;
        }

        .table-fixed th,
        .table-fixed td {
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .comment-tooltip {
            display: none;
            position: absolute;
            z-index: 999;
            background-color: white;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .comment-cell {
            cursor: no-drop;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <a class="navbar-brand" href="#">Painel Administrativo</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse d-lg-none" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../index.html">Início</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="comentarios.php">Comentários</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Sair</a>
                </li>
            </ul>
    </nav>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <nav class="sidebar-sticky">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="../index.html">Início</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../pages/painel-comentario.html">Comentários</a>
                </li>
            </ul>
        </nav>
    </div>
    <!-- Main Content -->
    <div class="content">
        <h1 class="mt-4">Bem-vindo ao Painel Administrativo</h1>
        <p>Aqui você pode gerenciar os comentários do site.</p>

        <div class="comment-tooltip"></div>
        <div class="table-responsive">
            <table class="table table-bordered table-fixed">
                <thead>
                    <tr>
                        <th>Nome do Visitante</th>
                        <th>Email do Visitante</th>
                        <th>Comentário</th>
                        <th>Data de Envio</th>
                        <th>Estado</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!empty($commentaries)) {
                        foreach ($commentaries as $commentary) {
                            $bgColor = $commentary['is_valid'] ? 'bg-success' : 'bg-danger';
                            $btnText = $commentary['is_valid'] ? 'Válido' : 'Validar';
                    ?>
                            <tr>
                                <td><?php echo $commentary['guest_name']; ?></td>
                                <td><?php echo $commentary['guest_email']; ?></td>
                                <td class="comment-cell"><?php echo $commentary['commentary']; ?></td>
                                <td><?php echo date('d/m/Y H:i', strtotime($commentary['created_at'])); ?></td>

                                <td class="<?php echo $bgColor; ?>"><?php echo $commentary['is_valid'] ? 'Válido' : 'Inválido'; ?></td>
                                <td>
                                    <button class="btn btn-primary"><?php echo $btnText; ?></button>
                                    <button class="btn btn-danger">Deletar</button>
                                </td>
                            </tr>
                        <?php
                        }
                    } else {
                        // Caso não haja comentários disponíveis, exibe uma mensagem na tabela
                        ?>
                        <tr>
                            <td colspan="6">Não há comentários disponíveis.</td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            $(".navbar-toggler").click(function() {
                $("#sidebar").toggleClass("show");
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.comment-cell').hover(function() {
                var comentario = $(this).text();
                var tooltip = $('.comment-tooltip');
                tooltip.text(comentario);

                var leftPos = ($(window).width() - tooltip.outerWidth()) / 2;
                var topPos = ($(window).height() - tooltip.outerHeight()) / 2;

                tooltip.css({
                    top: topPos,
                    left: leftPos
                });
                tooltip.show();
            }, function() {
                $('.comment-tooltip').hide();
            });
        });
    </script>

</body>

</html>