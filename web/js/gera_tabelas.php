<?php
require "_config/config.php";

$acao = $_GET['tipo'];





if($acao != null){
  if($acao == 'conta'){
    $busca = $_GET['busca'];
    $resultt = "SELECT COUNT(*) As conta FROM produtos where Descricao like '%$busca%' or idProd like '%$busca%'";
    $numeros = mysqli_query($conn, $resultt);
    $row = mysqli_fetch_assoc($numeros);
    echo $row['conta'];
    //processa a listagem que faz contagem da pesquisa
  } else if($acao == 'lista'){
    $busca = $_GET['busca'];
    $pag =$_GET['pag'];
    $maximo =$_GET['maximo'];
    $inicio = ($pag * $maximo) - $maximo;
    $queryy = " SELECT * FROM produtos where Descricao like '%$busca%' or idProd like '%$busca%' limit $inicio, $maximo ";
    $result = mysqli_query($conn, $queryy);
    $total = mysqli_num_rows($result);


    while($rows_cursos = mysqli_fetch_array($result)){
      echo "<tr id='linha' data-value=".$rows_cursos['id'].">";
           echo "<th scope='row'>".$rows_cursos['idProd']."</th>";
           echo "<td> " . $rows_cursos['Descricao']."</td>";
           echo "<td> </td>";
            echo "<td> </td>";

      echo "</tr>";
    }
  } else if($acao == 'deleta'){
    $queryy = " DELETE FROM produtos WHERE idProd = ";
    $result = mysqli_query($conn, $queryy);
    $total = mysqli_num_rows($result);

  } else if ($acao == 'infoProd') {
      $myArray = array();
      $id = $_GET['id'];
      $sql5 = "SELECT * FROM `produtos` WHERE id = '$id'";
      $result5 = mysqli_query($conn, $sql5);
      while($row = mysqli_fetch_array($result5)) {
          $myArray[]['id'] = $row['id'];
          $myArray[]['idProd'] = $row['idProd'];
          $myArray[]['Descricao'] = $row['Descricao'];
          $myArray[]['valCompra'] = $row['valCompra'];
          $myArray[]['valPorce'] = $row['valPorce'];
          $myArray[]['famProd'] = $row['famProd'];
          $myArray[]['ativo'] = $row['ativo'];

   }

    echo json_encode($myArray);
    }
  }  else {
    echo "eu";
      //header('Location: ../index.php');
  }

  ?>
