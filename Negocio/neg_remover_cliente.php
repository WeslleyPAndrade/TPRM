<?php
session_start();
include("../verifica_login.php");
include("../banco.php");

removerCliente($conexao,$_GET['id']);
header("Location: ../clientes.php");
exit;
?>