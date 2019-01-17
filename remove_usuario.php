<?php
session_start();
include("verifica_login.php");
include("header.php");
include("banco.php");

?>
<body>
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-md-5 col-md-push-4">
            <div class="panel panel-danger text-center">
                <p>Deseja realmente excluir o usuário <?= consultaNomeUsuario($conexao,$_GET['id']);?>?</p>
                <a class="btn btn-default" href="Negocio/neg_remover_usuario.php?id=<?= $_GET['id']; ?>" role="button">Excluir</a>
                <a class="btn btn-default" href="usuarios.php" role="button">Cancelar</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>