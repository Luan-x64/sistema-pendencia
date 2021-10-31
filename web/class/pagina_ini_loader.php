<?php
include ('../_conf/_config.php');
include ('class/pag_list_pend/pag_pendDAO.php');

//var_dump($_POST['op']);
$requisicao = $_POST['op'];
$name = $_POST['name'];
$data_pend = $_POST['data'];
$obs_pend = $_POST['obs'];
$oc_pend = $_POST['oc'];
$prod = $_POST['prod'];

if($requisicao == 1){

  echo "teste 1";
} else if($requisicao == 2){
  $pagPend = new pagPends();
  $pagPend->nova_pend();
}


?>
