<?php

use Core\Library\Session;

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="AtomPHP, microframework">
        <meta name="autho" content="Aldecir fonseca">

        <title>AtomPHP | FASM 2025</title>

        <link href="<?= baseUrl() ?>assets/img/AtomPHP-icone.png" rel="icon" type="image/png">

        <link href="<?= baseUrl() ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <script src="<?= baseUrl() ?>assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    </head>
    <body>
        <header class="container-fluid">
                <nav class="navbar navbar-expand-lg">
                    <div class="container-fluid px-5">
                    <a class="navbar-brand" href="<?= baseUrl() ?>"><img src="/assets/img/logo6.png" alt="EmpregaMur" height="80"></a>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarLinks">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarLinks">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item px-2">
                            <a class="nav-link active" href="#"><img src="/assets/img/work.png" alt="vagas"></a>
                        </li>
                        <li class="nav-item px-2">
                            <a class="nav-link" href="#"><img src="/assets/img/bell.png" alt="notificações"></a>
                        </li>
                        <li class="nav-item px-2">
                            <a class="nav-link" href="#"><img src="/assets/img/person.png" alt="perfil"></a>
                        </li>
                        </ul>
                    </div>
                    </div>
                </nav>
        </header>

        <main class="container">
