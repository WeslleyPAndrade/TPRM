<?php
session_start();
include("../verifica_login.php");
include("../banco.php");
if(!(empty($_POST['nome'])|| empty($_POST['cnpj']) || !validar_cnpj($_POST['cnpj']) || empty($_POST['telefone'])))
{
    $cliente = array();

    $cliente['nome'] = mysqli_real_escape_string($conexao,trim($_POST['nome']));
    $cliente['cnpj'] = mysqli_real_escape_string($conexao,trim($_POST['cnpj']));
    $cliente['endereco'] = mysqli_real_escape_string($conexao,trim($_POST['endereco']));
    $cliente['telefone'] = mysqli_real_escape_string($conexao,trim($_POST['telefone']));
    $cliente['email'] = mysqli_real_escape_string($conexao,trim($_POST['email']));

    $sql ="select count(*) as total from clientes where cnpj = '{$cliente['cnpj']}'";

    $resultado = mysqli_query($conexao,$sql);

    $row = mysqli_fetch_assoc($resultado);


    if($row['total'] == 1){
        $_SESSION['cliente_existe'] = true;
        header("Location:../cadastro_cliente.php");
        exit;
    }else{

        cadastrarCliente($conexao,$cliente);
    header("Location:../clientes.php");
    exit;
    }
    

}else{
    $_SESSION['dados_faltantes'] = true;
    header("Location:../cadastro_cliente.php");
    exit;
}
?>
