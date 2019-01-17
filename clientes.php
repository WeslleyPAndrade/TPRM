<?php
session_start();
include("verifica_login.php");
include("header.php");
include("banco.php");
?>

<body>

  <div class="container">

    <!-- Static navbar -->
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
          <a class="navbar-brand" href="painel.php">T.P.R.M.</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="clientes.php">Clientes</a></li>
            <li><a href="cadastro_cliente.php">Cadastrar Novo Cliente</a></li>
            <li><a href="busca_cliente.php">Consultar Clientes</a></li>
          </ul>
        </div>
        <!--/.nav-collapse -->
      </div>
      <!--/.container-fluid -->
    </nav>

    <!-- Main component for a primary marketing message or call to action -->
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
            $resultado = buscarClientes($conexao);
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

  </div> <!-- /container -->


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