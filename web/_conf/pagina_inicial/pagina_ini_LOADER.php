<?php

if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
{
  unset($_SESSION['login']);
  unset($_SESSION['senha']);
  #header('location:index.php');
}

//$logado = $_SESSION['login'];
include ('_conf/_config.php');
include ('_conf/pagina_inicial/pagina_iniDAO.php');

$usuario = new Game();


?>
