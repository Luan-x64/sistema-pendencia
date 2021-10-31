<?php


$logado = $_SESSION['login'];
include ('../_conf/_config.php');
include ('_class/pagina_inicial/pagina_iniDAO.php');

$request = $_POST['op'];



if($request == 1){
  //pend 1 = aberta // 0 = fechada // 2 = pendencia // 3 = fora do prazo
  $paginaLoader = new paginaIni();
  $pendAberta = $paginaLoader->conta_pendAberta(1,0);
  $pendFinlzd = $paginaLoader->conta_pendAberta(0,0);
  $pendAtrsda = $paginaLoader->conta_pendAberta(1,1);
  $pendvencHj = $paginaLoader->conta_pendAberta(1,1);

  $id = "treewq";
  $data = array("pendAberta" => $pendAberta, "pendFinalizada" => $pendFinlzd, "pendvencHoje" => $pendvencHj);

  header('Content-Type: application/json');
  echo json_encode($data);

} else if($request == 2){

} else {
  echo "Error 500";
}

//$usuario = new paginaIni();
//$conta = $usuario->conta_pendAberta();

?>
