<?php
include('conexao.php');

function cadastrarUsuario($conexao,$usuario)
{
    $sqlGravar = "INSERT INTO usuarios (nome,usuario,senha,data_cadastro) 
    VALUES ('{$usuario['nome']}','{$usuario['usuario']}','{$usuario['senha']}', NOW())";

    mysqli_query($conexao,$sqlGravar);
}

function buscarUsuarios($conexao)
{
    $query = "SELECT * FROM usuarios";

    $resultados = mysqli_query($conexao,$query);

    return $resultados;
}

function buscarUsuario($conexao,$nome)
{
    $query = "SELECT * FROM usuarios WHERE nome like '%{$nome}%'";
    
    $resultado = mysqli_query($conexao,$query);
    
    return $resultado;

}


function editarUsuario($conexao,$usuario)
{
        
    $query = "UPDATE usuarios SET
    nome = '{$usuario['nome']}',
    usuario = '{$usuario['usuario']}',
    senha = '{$usuario['senha']}'
    WHERE id = '{$usuario['id']}'";
    
    mysqli_query($conexao,$query);
}

function removerUsuario($conexao,$id)
{
    $query ="DELETE FROM usuarios WHERE id = {$id}";
    mysqli_query($conexao,$query);
}

function consultaNomeUsuario($conexao,$id)
{
    $query = "SELECT nome FROM usuarios WHERE id = {$id}";
    
    $resultado = mysqli_query($conexao,$query);
    $nome = mysqli_fetch_assoc($resultado);
    return $nome['nome'];

}
//----------------------------------Clientes----------------------------------------
function cadastrarCliente($conexao,$cliente)
{
    $sqlGravar = "INSERT INTO clientes (nome,cnpj,endereco,telefone,email,data_cadastro) 
    VALUES ('{$cliente['nome']}','{$cliente['cnpj']}','{$cliente['endereco']}', '{$cliente['telefone']}',
    '{$cliente['email']}',NOW())";

    mysqli_query($conexao,$sqlGravar);
}

function buscarClientes($conexao)
{
    $query = "SELECT * FROM clientes";

    $resultados = mysqli_query($conexao,$query);

    return $resultados;
}

function buscarCliente($conexao,$nome)
{
    $query = "SELECT * FROM clientes WHERE nome like '%{$nome}%'";
    
    $resultado = mysqli_query($conexao,$query);
    
    return $resultado;

}


function editarCliente($conexao,$cliente)
{
        
    $query = "UPDATE clientes SET
    nome = '{$cliente['nome']}',
    cnpj = '{$cliente['cnpj']}',
    endereco = '{$cliente['endereco']}',
    telefone = '{$cliente['telefone']}',
    email = '{$cliente['email']}'
    WHERE id = '{$cliente['id']}'";
    
    mysqli_query($conexao,$query);
}

function removerCliente($conexao,$id)
{
    $query ="DELETE FROM clientes WHERE id = {$id}";
    mysqli_query($conexao,$query);
}

function consultaNomeCliente($conexao,$id)
{
    $query = "SELECT nome FROM clientes WHERE id = {$id}";
    
    $resultado = mysqli_query($conexao,$query);
    $nome = mysqli_fetch_assoc($resultado);
    return $nome['nome'];

}

function validar_cnpj($cnpj)
{
	$cnpj = preg_replace('/[^0-9]/', '', (string) $cnpj);
	// Valida tamanho
	if (strlen($cnpj) != 14)
		return false;
	// Valida primeiro dígito verificador
	for ($i = 0, $j = 5, $soma = 0; $i < 12; $i++)
	{
		$soma += $cnpj{$i} * $j;
		$j = ($j == 2) ? 9 : $j - 1;
	}
	$resto = $soma % 11;
	if ($cnpj{12} != ($resto < 2 ? 0 : 11 - $resto))
		return false;
	// Valida segundo dígito verificador
	for ($i = 0, $j = 6, $soma = 0; $i < 13; $i++)
	{
		$soma += $cnpj{$i} * $j;
		$j = ($j == 2) ? 9 : $j - 1;
	}
	$resto = $soma % 11;
	return $cnpj{13} == ($resto < 2 ? 0 : 11 - $resto);
}

?>