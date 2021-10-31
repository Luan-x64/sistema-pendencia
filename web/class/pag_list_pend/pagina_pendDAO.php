<?php
  class pagPends {
    private $conexao;


    public function __construct() {
      $this->conexao = new Conexao();
    }

    public function nova_pend($name,$data_pend,$obs_pend,$oc_pend,$prod,$pend_stats,$pend_condPgmt) {
      session_start();
      $id = $_SESSION['id'];
      $sql = "INSERT INTO pendencias_abertas (user_add_id, status_pend, pend_data, pend_cliente, pend_obs, pend_oc, pend_condPgmt) VALUES ('$id','$pend_stats', CURRENT_TIMESTAMP, '$name', '$obs_pend', '$oc_pend', '$pend_condPgmt')";

      $executa = mysqli_query($this->conexao->getCon(), $sql);

    }
    public function atualiza_pend($id_ped,$oc_pend,$name,$obs_pend,$pend_condPgmt,$pend_stats){
      session_start();
      $id = $_SESSION['id'];
      //$sql = "INSERT INTO pendencias_abertas (user_add_id, status_pend, pend_data, pend_cliente, pend_obs, pend_oc, pend_condPgmt) VALUES ('$id','$pend_stats', CURRENT_TIMESTAMP, '$name', '$obs_pend', '$oc_pend', '$pend_condPgmt')";
      if($pend_stats == 0){
        $sql = "UPDATE pendencias_abertas SET pend_dataFinalizada=CURRENT_TIMESTAMP,status_pend='$pend_stats',pend_cliente='$name',pend_obs='$obs_pend',pend_oc='$oc_pend', pend_condPgmt='$pend_condPgmt' WHERE id='$id_ped'";

      } else if(!$pend_stats == 0) {
        $sql = "UPDATE pendencias_abertas SET status_pend='$pend_stats',pend_cliente='$name',pend_obs='$obs_pend',pend_oc='$oc_pend', pend_condPgmt='$pend_condPgmt' WHERE id='$id_ped'";

      }
      $executa = mysqli_query($this->conexao->getCon(), $sql);

    }

    public function abre_pend($id){
      $output = array();
      $sql = "SELECT DATE_FORMAT(pendencias_abertas.pend_data,'%d/%m/%Y') as data, pendencias_abertas.*,usuario.login FROM pendencias_abertas INNER JOIN usuario ON pendencias_abertas.user_add_id = usuario.id Where pendencias_abertas.id =  $id";
        $executa = mysqli_query($this->conexao->getCon(), $sql);
        while($data = mysqli_fetch_array($executa)){
          $output[] = $data;

        }
          header('Content-Type: application/json');
          echo json_encode($output);

         //printf("%s %s %s\n", $row['status_pend'], $row['name'], $row['price']);

    }



  } //finaliza class
?>
