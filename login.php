<?php
session_start();
include("conexao.php");

if(empty($_POST['usuario']) || empty($_POST['senha']))
{
    header("Location:index.php");
    exit();
}

$usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);

$query = "SELECT * FROM usuarios WHERE usuario = '{$usuario}' AND senha = md5('{$senha}')";

$resultado = mysqli_query($conexao,$query);
$row = mysqli_num_rows($resultado);

if($row == 1)
{
    $_SESSION['usuario'] = $usuario['usuario'];
    header("Location:painel.php");
    exit;
}else{
    $_SESSION['nao_autenticado'] = true;
    header("Location:index.php");
    exit;
}

