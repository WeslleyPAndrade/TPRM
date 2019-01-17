<?php
session_start();
include("../verifica_login.php");
include("../banco.php");

removerUsuario($conexao,$_GET['id']);
header("Location: ../usuarios.php");
exit;
?>