<?php

  class Conexao {
    private $usuario = 'joao'; //usuario banco de dados
    private $senha = 'joao@54321@'; //senha banco de dados
    private $caminho = 'localhost'; //servidor banco de dados
    private $banco = 'pendencias';  //nome do banco de dados
    private $con;

    public function __construct() {
      $this->con = mysqli_connect($this->caminho, $this->usuario, $this->senha) or die("Conexão com o banco de dados falhou!" . mysqli_error($this->con));

      mysqli_select_db($this->con, $this->banco) or die("Conexão com o banco de dados falhou!" . mysqli_error($this->con));

    }

    public function getCon() {
      return $this->con;
    }
  }
