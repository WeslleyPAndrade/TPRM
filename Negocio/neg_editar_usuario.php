<?php
session_start();
include("../verifica_login.php");
include("../banco.php");

$usuario = array();
$usuario['id'] = mysqli_real_escape_string($conexao,trim($_POST['id']));
$usuario['nome'] = mysqli_real_escape_string($conexao,trim($_POST['nome']));
$usuario['usuario'] = mysqli_real_escape_string($conexao,trim($_POST['usuario']));
$usuario['senha'] = mysqli_real_escape_string($conexao,trim(md5($_POST['senha'])));


$sql ="select count(*) as total from usuarios where id = '{$usuario['id']}'";

$resultado = mysqli_query($conexao,$sql);

$row = mysqli_fetch_assoc($resultado);


if($row['total'] == 1){

    editarUsuario($conexao,$usuario);
    header("Location:../usuarios.php");
    exit;
}else{
    $_SESSION['erro_editar'] = true;
    header("Location:../edita_usuario.php");
    exit;
}

?>