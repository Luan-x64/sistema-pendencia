<?php
include ('_conf/conexao.php');
include ('_conf/usuario/usuarioDAO.php');

 ?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Login</title>


<!-- Tell the browser to be responsive to screen width -->
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Bootstrap da página -->
<link rel="stylesheet" href="_css/adminlte.min.css">

<!-- Style de alinhamento do botão na tela de login -->
<style type="text/css">

.col-4{
  width: 350px;
    text-align: center;
    padding: 5px 115px;
    border-radius: 6px;
    font-size: 18px;

}
</style>

</head>
<body class="login-page">
	<div class="login-box">

		<!-- /.login-logo -->

    <?php

       if(isset($_GET['erro'])) {
         echo '<div class="alert alert-danger">Dados de login incorretos</div>';
       }

       if(isset($_GET['success'])) {
         echo '<div class="alert alert-success">Logout efetuado com sucesso</div>';
       }

     ?>


		<div class="card">
			<div class="card-body login-card-body">
				<p class="login-box-msg">Faça o login para iniciar a sessão</p>

				<form method="post" action="valida_login.php">
					<div class="input-group mb-3">
						<input type="text" class="form-control" name="login" id="login"
							placeholder="Login">
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-envelope"></span>
							</div>
						</div>
					</div>
					<div class="input-group mb-3">
						<input type="password" class="form-control" name="senha"
							id="senha" placeholder="Senha">
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-lock"></span>
							</div>
						</div>
					</div>
					<table>
						<tr>
							<th>
								<div class="col-4">
									<button type="submit" value="Acessar"
										class="btn btn-primary" >Acessar</button>
								</div>
							</th>
						</tr>
					</table>
					<!-- /.col -->
				</form>

			</div>
		</div>
	</div>
	<!-- /.login-box -->


</body>
</html>
