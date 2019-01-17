<?php
session_start();
include("../verifica_login.php");
include("../banco.php");
if(!(empty($_POST['nome'])|| empty($_POST['cnpj']) || empty($_POST['telefone'])))
{
    $cliente = array();

    $cliente['id'] = mysqli_real_escape_string($conexao,trim($_POST['id']));
    $cliente['nome'] = mysqli_real_escape_string($conexao,trim($_POST['nome']));
    $cliente['cnpj'] = mysqli_real_escape_string($conexao,trim($_POST['cnpj']));
    $cliente['endereco'] = mysqli_real_escape_string($conexao,trim($_POST['endereco']));
    $cliente['telefone'] = mysqli_real_escape_string($conexao,trim($_POST['telefone']));
    $cliente['email'] = mysqli_real_escape_string($conexao,trim($_POST['email']));


    $sql ="select count(*) as total from clientes where id = '{$cliente['id']}'";

    $resultado = mysqli_query($conexao,$sql);

    $row = mysqli_fetch_assoc($resultado);


    if($row['total'] == 1){
        
        editarCliente($conexao,$cliente);
        header("Location:../clientes.php");
        exit;
    }else{
        $_SESSION['erro_editar'] = true;
        header("Location:../edita_cliente.php?id=".$_POST['id']);
        exit;
    }
}else{
    $_SESSION['dados_faltantes'] = true;
    header("Location:../edita_cliente.php?id=".$_POST['id']);
    exit;
}
?>