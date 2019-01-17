<?php
session_start();
include("verifica_login.php");
include("header.php");
?>

<body>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-4 col-md-push-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form class="form-signin" method="post" action="login.php">

                            <h2 class="form-signin-heading text-center">Sistema de Cadastro</h2>
                            
                            <a id="inputCadUsuario" class="btn btn-default navbar-btn form-control" href='usuarios.php'>Usuários do Sistema</a>
                            <a id="inputCadFuncionario" class="btn btn-default navbar-btn form-control" href='clientes.php'>Clientes</a>
                            <a id="logout" class="btn btn-default navbar-btn form-control" href='logout.php'>Sair</a>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>

</html>