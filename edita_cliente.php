<?php
session_start();
include("verifica_login.php");
include("header.php");
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
                        <li><a href="clientes.php">Clientes</a></li>
                        <li class="active"><a href="cadastro_cliente.php">Cadastrar Novo Cliente</a></li>
                        <li><a href="busca_cliente.php">Consultar Clientes</a></li>
                    </ul>
                </div>
                <!--/.nav-collapse -->
            </div>
            <!--/.container-fluid -->
        </nav>

        <div class="page-header text-center">
            <h2>Editar Usuário</h2>
        </div>
        <form method="POST" class="col-md-6" action="Negocio/neg_editar_cliente.php">
            <?php if(isset($_SESSION['erro_editar'])) : ?>
            <div class="alert alert-danger" role="alert">
                <p>Houve algum problema ao atualizar o usuário! Tente novamente.</p>
            </div>
            <?php unset($_SESSION['erro_editar']);
                    endif; 
            ?>
            <?php if(isset($_SESSION['dados_faltantes'])) : ?>
            <div class="alert alert-danger" role="alert">
                <p>É necessário preencher todo o formulário</p>
            </div>
            <?php unset($_SESSION['dados_faltantes']);
                    endif; 
            ?>
            <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
            <div class="form-group">
                <label for="inputNome">Nome</label>
                <input type="text" class="form-control" id="inputNome" name="nome" placeholder="Nome">
            </div>
            <div class="form-group">
                <label for="inputCnpj">CNPJ</label>
                <input type="text" class="form-control" id="inputCnpj" name="cnpj" placeholder="CNPJ">
            </div>
            <div class="form-group">
                <label for="inputEndereco">Endereço</label>
                <input type="text" class="form-control" id="inputEndereco" name="endereco" placeholder="Endereço">
            </div>
            <div class="form-group">
                <label for="inputTelefone">Telefone</label>
                <input type="text" class="form-control" id="inputTelefone" name="telefone" placeholder="Telefone">
            </div>
            <div class="form-group">
                <label for="inputEmail">Email</label>
                <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Email">
            </div>

            <button type="submit" class="btn btn-default">Alterar</button>
        </form>