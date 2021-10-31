<?php
include ('../_conf/_config.php');
include ('pag_list_pend/pagina_pendDAO.php');

//var_dump($_POST['op']);
$requisicao = $_POST['op'];
$name = $_POST['name'];
$data_pend = $_POST['data'];
$obs_pend = $_POST['obs'];
$oc_pend = $_POST['oc'];
$prod = $_POST['prod'];
$pend_stats = $_POST['pend_stats'];
$id_ped = $_POST['id'];
$pend_condPgmt = $_POST['pend_condPgmt'];

if($requisicao == 1){

  echo "teste 1";
} else if($requisicao == 2){

  $pagPend = new pagPends ();
  echo $pagPend->nova_pend($name,$data_pend,$obs_pend,$oc_pend,$prod,$pend_stats,$pend_condPgmt);

} else if($requisicao == 3){
$pagPend = new pagPends ();
    echo $pagPend->abre_pend($id_ped);
} else if($requisicao == 4){
  echo "";
  $pagPend = new pagPends ();
  echo $pagPend->atualiza_pend($id_ped,$oc_pend,$name,$obs_pend,$pend_condPgmt,$pend_stats);
}


?>
