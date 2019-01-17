<?php
session_start();
include("verifica_login.php");
include("header.php");
?>

<body>

    <div class="container">

        <!-- Static navbar -->
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                        aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="painel.php">T.P.R.M.</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="usuarios.php">Usuários</a></li>
                        <li class="active"><a href="cadastro_usuario.php">Cadastrar Novo Usuário</a></li>
                        <li><a href="busca_usuario.php">Consultar usuários</a></li>
                    </ul>
                </div>
                <!--/.nav-collapse -->
            </div>
            <!--/.container-fluid -->
        </nav>
        <div class="page-header text-center">
            <h2>Cadastrar Usuário</h2>
        </div>
        <form method="POST" class="col-md-6" action="Negocio/neg_cadastrar_usuario.php">
            <?php if(isset($_SESSION['usuario_cadastrado'])) : ?>
            <div class="alert alert-success" role="alert">
                <p>Cadastro realizado com sucesso!</p>
            </div>
            <?php unset($_SESSION['usuario_cadastrado']);
                    endif; 
            ?>
            <?php if(isset($_SESSION['usuario_existe'])) : ?>
            <div class="alert alert-danger" role="alert">
                <p>Usuário informado já cadastrado! Tente novamente.</p>
            </div>
            <?php unset($_SESSION['usuario_existe']);
                    endif; 
            ?>
            <?php if(isset($_SESSION['dados_faltantes'])) : ?>
            <div class="alert alert-danger" role="alert">
                <p>É necessário preencher todo o formulário</p>
            </div>
            <?php unset($_SESSION['dados_faltantes']);
                    endif; 
            ?>
            <div class="form-group">
                <label for="inputNome">Nome</label>
                <input type="text" class="form-control" id="inputNome" name="nome" placeholder="Nome">
            </div>
            <div class="form-group">
                <label for="inputUsuario">Usuário</label>
                <input type="text" class="form-control" id="inputUsuario" name="usuario" placeholder="Usuário">
            </div>
            <div class="form-group">
                <label for="inputSenha">Senha</label>
                <input type="password" class="form-control" id="inputSenha" name="senha" placeholder="Senha">
            </div>

            <button type="submit" class="btn btn-default">Cadastrar</button>
        </form>

    </body>
</html>