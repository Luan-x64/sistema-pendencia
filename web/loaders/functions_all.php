<?php
include ('../_conf/_conf_add.php');
$conf = new conf();
$pag = $conf->getPag();

if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)){
  unset($_SESSION['login']);
  unset($_SESSION['senha']);
  header('location: ' .$pag);
}
include ('../_conf/_config.php');
include ('../_conf/pagina_inicial/pagina_iniDAO.php');



?>
