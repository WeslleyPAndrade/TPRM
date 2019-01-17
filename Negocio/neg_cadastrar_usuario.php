<?php
session_start();
include("../verifica_login.php");
include("../banco.php");
if(!(empty($_POST['nome'])|| empty($_POST['usuario']) || empty($_POST['senha'])))
{
    $usuario = array();

    $usuario['nome'] = mysqli_real_escape_string($conexao,trim($_POST['nome']));
    $usuario['usuario'] = mysqli_real_escape_string($conexao,trim($_POST['usuario']));
    $usuario['senha'] = mysqli_real_escape_string($conexao,trim(md5($_POST['senha'])));


    $sql ="select count(*) as total from usuarios where usuario = '{$usuario['usuario']}'";

    $resultado = mysqli_query($conexao,$sql);

    $row = mysqli_fetch_assoc($resultado);


    if($row['total'] == 1){
        $_SESSION['usuario_existe'] = true;
        header("Location:../cadastro_usuario.php");
        exit;
    }else{

        cadastrarUsuario($conexao, $usuario);
        $_SESSION['usuario_cadastrado'] = true;
        header("Location:../usuarios.php");
        exit;
    }
}else{
    $_SESSION['dados_faltantes'] = true;
    header("Location:../cadastro_usuario.php");
    exit;
}
?>
