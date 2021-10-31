<?php
session_start();
if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)){
  unset($_SESSION['login']);
  unset($_SESSION['senha']);
  header('location:index.php');
}


?>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="_css/icon.png">

    <title>Sistema de pendencias</title>
    <link rel="stylesheet" type="text/css"  href="_css/site.css">
    <link rel="stylesheet" type="text/css"  href="_css/pagIni.css">
    <link rel="stylesheet" type="text/css"  href="_css/bootstrap.css">
    <script src="js/jquery.js" ></script>
    <script src="js/bootstrap.min.js"></script>

  <body >
    <main style="" >
      <?php
      require("nav.php");
      ?>


      <div style="margin-top:5%;"  class="container">
        <div  class="card-deck mb-3 text-center">
          <div class="card mb-4 shadow-sm">
            <div class="card-header">
              <h4 class="my-0 font-weight-normal"><span style="color:red"> Pendencias abertas</span></h4>
            </div>
            <div  class="card-body">
              <h1 id="nPend_aberta" class="card-title pricing-card-title">0</h1>
              <ul class="list-unstyled mt-3 mb-4">
                <li>Vencem hoje: <span style="color:red" id="pendVencHoje">0</span></li>
                <li >Pendencias atrasadas: <span style="color:red;" id="pendAtrasa">0</span></li>
                <li>Pendencias finalizadas: <span style="color:green;" id="pendFinalizada">0</span></li>
              </ul>
              <button onclick="location.href='lista_pend_aberta.php'" type="button" class="btn btn-lg btn-block btn-outline-primary">Abrir pendencias</button>
            </div>
          </div>
          <div class="card mb-4 shadow-sm">
            <div class="card-header">
              <h4 class="my-0 font-weight-normal">Caixa distribuidora</h4>
            </div>
            <div class="card-body">
              <h1 class="card-title pricing-card-title"> <small class="text-muted">R$ 15</small></h1>
              <ul class="list-unstyled mt-3 mb-4">
                <li>Valor caixa: <span style="color:red;">R$ 0,00</span></li>

              </ul>
              <button type="button" id="btnPersol"  class="btn btn-lg btn-block btn-outline-primary">Abrir caixa</button>
            </div>
          </div>

        </div>

      <script type="text/javascript">
        $( document ).ready(function() {
          var ops = 1;
          console.log( "eqw!" );
          $.ajax({    //create an ajax request to display.php
            type: 'POST',
            dataType: 'json',
            //url: 'loaders/pagina_ini_.php',
            url: 'loaders/pagina_ini_LOADER.php',
            //async: true,
            data: 'op='+ops,
            success: function(response){
              $("#nPend_aberta").html(response.pendAberta);
              $("#pendFinalizada").html(response.pendFinalizada);
              $("#pendVencHoje").html(response.pendvencHoje);
              console.log(response.pendsAtsd);


              //$.each(response, function(i, resp){
              //});

                //alert(response);
            }

        });
        });

      </script>
    </main>
    <footer class="footer foot fixed-bottom">
      <div class="inner">
        <p>2020 © Copyright - Todos os direitos reservados | Desenvolvimento <a href="http://netmast.ddns.net:8080/hospedagem/">NetMast</a></p>
      </div>
    </footer>
    </body>
</html>
