<?php

  if($_POST) {
    include ('_conf/_config.php');
    include ('loaders/_class/usuario/usuarioDAO.php');

    $usuario = new UsuarioDAO();

    $login = addslashes($_POST['login']);
    $senha = addslashes($_POST['senha']);

    $user = $usuario->login($login, $senha);
    if($user == true) {

      session_start();
      $_SESSION['login'] = $login;
      $_SESSION['senha'] = $senha;
      $_SESSION['id'] = $usuario->retorna_id($login,$senha);
      header('location: pagina_ini.php');

    } else {
      header('location:index.php?erro=senha');
      //trello
    }

  } else {
    header('location:index.php?erro=senha');
  }

?>
