<?php
session_start();
include("verifica_login.php");
include("header.php");
include("banco.php");
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
                        <li><a href="cadastro_usuario.php">Cadastrar Novo Usuário</a></li>
                        <li class="active"><a href="busca_usuario.php">Consultar usuários</a></li>
                </div>
                <!--/.nav-collapse -->
            </div>
            <!--/.container-fluid -->
        </nav>
        <div class="page-header text-center">
            <h2>Buscar Usuário</h2>
        </div>
        <form method="POST" class="col-md-6" action="Negocio/neg_buscar_usuario.php">

            <?php if(isset($_SESSION['usuario_existe'])) : ?>
            <div class="alert alert-danger" role="alert">
                <p>Usuário informado já cadastrado! Tente novamente.</p>
            </div>
            <?php unset($_SESSION['usuario_existe']);
                    endif; ?>
            <div class="form-group">
                <label for="inputNome">Nome</label>
                <input type="text" class="form-control" id="inputNome" name="nome" placeholder="Digite o nome do usuário">
            </div>

            <button type="submit" class="btn btn-default">Buscar</button>
        </form>
        
        
    </div>
</body>

</html>