<?php
$login = $_SESSION['login'];
$option = $_POST['op'];
$data = $_POST['data'];
if(isset($_SESSION['login'])){
  //echo "heqw";
}

//verifica se a variavel $option existe
if(!isset($option) == true){
  echo "ewqeqw";
} else {
  include ('../_conf/_config.php');
  include ('_class/pagina_pendencias/pagina_pendDAO.php');
  $class = new paginaPend();
//caso ela exista, verifica se ele é igual a lista
  if($option == 'lista'){
    echo $class->lista_pend();
  } elseif ($option == 'listaEa') {
    echo $class->lista_pend_busca($data);
  } elseif ($option == 'listFina'){
    echo $class->list_pendFechada();
  }


}

?>
