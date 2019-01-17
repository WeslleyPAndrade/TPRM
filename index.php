<?php
 session_start();
 unset($_SESSION['usuario']);
 include("header.php");
 ?>

<body>
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-md-4 col-md-push-4">
        <div class="panel panel-default">
          <div class="panel-body">
            <form class="form-signin" method="post" action="login.php">
              <h2 class="form-signin-heading text-center">Login</h2>
              <?php if(isset($_SESSION['nao_autenticado'])) :?>
                <div class="alert alert-danger" role="alert">
                  <p>Erro: Usuário ou senha inválidos!</p>
                </div>
              <?php 
                  unset($_SESSION['nao_autenticado']);
                  endif; ?>
              <label for="inputUsuario" class="sr-only">usuario</label>
              <input type="text" id="inputUsuario" name="usuario" class="form-control" placeholder="Usuário" required
                autofocus>
              <label for="inputSenha" class="sr-only">senha</label>
              <input type="password" id="inputSenha" name="senha" class="form-control" placeholder="Senha" required>
              <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>

</html>