<?php
  class paginaPend {
    private $conexao;


    public function __construct() {
      $this->conexao = new Conexao();
    }

    public function cad_pend(){
      $sql = "";
    }
    public function lista_pend() {
      $test = array();
      $sql = "SELECT *, date_format(pend_data,'%d/%m/%Y') as data_formatada FROM pendencias_abertas WHERE status_pend != 0 ORDER BY data_formatada DESC ";
      //$sql = "SELECT *, date_format(pend_data,'%d/%m/%Y') as data_formatada FROM pendencias_abertas where status_pend != 0";
      $executa = mysqli_query($this->conexao->getCon(), $sql);
      //$row = mysqli_fetch_array($executa, MYSQLI_NUM);
      while($rows = mysqli_fetch_assoc($executa)){
        $test[] = $rows;
      }
      return json_encode($test);
    }

    public function list_pendFechada(){
      $test = array();
      $sql = "SELECT *, date_format(pend_dataFinalizada,'%d/%m/%Y') as data_formatada FROM pendencias_abertas WHERE status_pend = '0' ORDER BY id DESC";
      //$sql = "SELECT *, date_format(pend_data,'%d/%m/%Y') as data_formatada FROM pendencias_abertas where status_pend != 0";
      $executa = mysqli_query($this->conexao->getCon(), $sql);
      //$row = mysqli_fetch_array($executa, MYSQLI_NUM);
      while($rows = mysqli_fetch_assoc($executa)){
        $test[] = $rows;
      }
      return json_encode($test);
    }
    public function lista_pend_busca($dados) {
      $test = array();
      $sql = "SELECT *, date_format(pend_data,'%d/%m/%Y') as data_formatada FROM pendencias_abertas where pend_cliente like '%$dados%' ORDER BY data_formatada DESC";
      //$sql = "SELECT *, date_format(pend_data,'%d/%m/%Y') as data_formatada FROM pendencias_abertas where status_pend != 0";
      $executa = mysqli_query($this->conexao->getCon(), $sql);
      //$row = mysqli_fetch_array($executa, MYSQLI_NUM);
      while($rows = mysqli_fetch_assoc($executa)){
        $test[] = $rows;
      }
      return json_encode($test);
    }



  } //finaliza class
?>
