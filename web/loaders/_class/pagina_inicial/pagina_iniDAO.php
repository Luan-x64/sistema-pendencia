<?php
  class paginaIni {
    private $conexao;


    public function __construct() {
      $this->conexao = new Conexao();
    }

    public function conta_pendAberta($ops, $opsM) {
      if($opsM == 1){ //verificações complexas
        $today = date("mdy");
        $sql = "SELECT * FROM pendencias_abertas WHERE DATE(pend_data) = CURDATE() AND status_pend = $ops";
        $executa = mysqli_query($this->conexao->getCon(), $sql);
        //$row = mysqli_fetch_array($executa, MYSQLI_NUM);
        $row = mysqli_num_rows($executa);
        return $row;
      }

      $sql = "SELECT * FROM pendencias_abertas WHERE status_pend = $ops";
      $executa = mysqli_query($this->conexao->getCon(), $sql);
      $row = mysqli_num_rows($executa);

      return $row;

    }



  } //finaliza class
?>
