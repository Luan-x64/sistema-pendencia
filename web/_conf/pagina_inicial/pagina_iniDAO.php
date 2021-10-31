<?php
  class paginaIni {
    private $conexao;
    public function __construct() {
      $this->conexao = new Conexao();
    }

    public function conta_pendAberta() {
      $sql = "SELECT count(*) FROM pendencias_abertas WHERE status_pend = 1";

      $executa = mysqli_query($this->conexao->getCon(), $sql);

      $row = mysqli_num_rows($executa);



  } //finaliza class
?>
