<?php

  class UsuarioDAO {
    private $conexao;

    public function __construct() {
      $this->conexao = new Conexao();
    }

    // efetua login
    public function login($login, $senha) {

      $sql = "SELECT * FROM usuario WHERE LOGIN = '$login' AND SENHA = '$senha'";

      $executa = mysqli_query($this->conexao->getCon(), $sql);

      if(mysqli_num_rows($executa) > 0) {
        return true;
      } else {
        return false;
      }
    }

    public function retorna_id($login, $senha) {

      $sql = "SELECT * FROM usuario WHERE LOGIN = '$login' AND SENHA = '$senha'";

      $executa = mysqli_query($this->conexao->getCon(), $sql);

      if(mysqli_num_rows($executa) > 0) {
        while($data = mysqli_fetch_array($executa)){
          $output[] = $data['id'];
        }
        return $output[0];
      } else {
        return false;
      }
    }


    // Verifica se já existe login com o nome escolhido
    public function unico($login) {

      $unic = "SELECT * FROM usuario WHERE LOGIN = '$login'";

      $exec = mysqli_query($this->conexao->getCon(), $unic);

      if(mysqli_num_rows($exec) > 0) {
        return false;
      } else {
        return true;
      }
    }

    // cadastra o usuário
    public function cadastra($login,$senha) {

      $sql = "INSERT INTO usuario (LOGIN,SENHA) VALUES ('$login','$senha')";

      $executa = mysqli_query($this->conexao->getCon(), $sql);

      if(mysqli_affected_rows($this->conexao->getCon()) > 0) {
        return true;
      } else {
        return false;
      }
    }

    // efetua logout
    public function logout() {

      session_start();

      session_destroy();

      //setcookie("login" , "" , time()-60*5);
      header("Location:index.php?success=logout");
      exit();
    }

  }
