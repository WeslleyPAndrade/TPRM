<?php
session_start();
include("../verifica_login.php");
include("../banco.php");

if(buscarCliente($conexao,$_POST['nome'])){
    $resultado = buscarCliente($conexao,$_POST['nome']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>T.P.R.M.</title>
  <!-- Bootstrap -->
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link href="../css/login.css" rel="stylesheet">
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
<div class="container">
<nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
            aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="../painel.php">T.P.R.M.</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="../clientes.php">Clientes</a></li>
            <li><a href="../cadastro_cliente.php">Cadastrar Novo Cliente</a></li>
            <li class="active"><a href="../busca_cliente.php">Consultar Clientes</a></li>
          </ul>
        </div>
        <!--/.nav-collapse -->
      </div>
      <!--/.container-fluid -->
    </nav>
    <div class="table-responsive">
      <table class="table table-bordered">
        <thead>
          <tr>
            
            <th>Nome</th>
            <th>CNPJ</th>
            <th>Endereço</th>
            <th>Telefone</th>
            <th>Email</th>
            <th>Data de Cadastro</th>
            <th colspan="2">Ações</th>

          </tr>
        </thead>
        <tbody>
          <?php 
            
            foreach($resultado as $row) :
          ?>
          <tr>
            
            <td><?= $row['nome']  ?></td>
            <td><?= $row['cnpj']  ?></td>
            <td><?= $row['endereco']  ?></td>
            <td><?= $row['telefone']  ?></td>
            <td><?= $row['email']  ?></td>
            <td><?= $row['data_cadastro']  ?></td>
            <td><a href="edita_cliente.php?id=<?= $row['id'];?>">Editar</td>
            <td><a href="remove_cliente.php?id=<?= $row['id'];?>" >Remover</td>
          </tr>
            <?php endforeach; ?>
        </tbody>

      </table>
    </div>
</div>
 <!-- Bootstrap core JavaScript
================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"><\/script>')</script>
  <script src="https://getbootstrap.com/docs/3.3/dist/js/bootstrap.min.js"></script>
  <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  <script src="https://getbootstrap.com/docs/3.3/assets/js/ie10-viewport-bug-workaround.js"></script>


</body>

</html>