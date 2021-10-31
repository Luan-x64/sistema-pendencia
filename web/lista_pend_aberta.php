
<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="_css/icon.png">
    <title>Sistema de pendências</title>
    <link rel="stylesheet" type="text/css"  href="_css/site.css">
    <link rel="stylesheet" type="text/css"  href="_css/bootstrap.css">
    <script src="js/jquery.js" ></script>
    <script src="js/bootstrap.min.js"></script>
  </head>

  <body>
    <?php
    require("nav.php");
    ?>

    <div style="margin-left:1%;margin-top:1%;position:inherit;" class="container" id="acoes">
      <div class="row">
        <div class="col-sm">
            <button id="novaPend" type="button" class="btn btn-success">Nova pendencia</button>
        </div>

        <div class="col">
            <div class="input-group mb-1">
            <div class="input-group-prepend">
              <span class="input-group-text" >Procurar</span>
            </div>
              <input type="text" id="procurarIN" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" >
            </div>
        </div>

        <div class="col-6">
            <div class="form-check">
              <input type="checkbox" class="form-check-input" id="checkMostraPendFinaLizada">
              <label class="form-check-label" for="checkMostraPendFinaLizada">Pendencias finalizadas</label>
            </div>
        </div>

      </div>

    </div>

    <div style="margin-top:1%;" id="tabela">
        <table style="" class="table table-striped">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Cliente</th>
              <th scope="col">Status</th>
              <th scope="col" id="thEdit">Data de criação</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody id="tabela-tab" >

          </tbody>
        </table>
    </div>
    <?php
        require("_pags/modais.php");
      ?>


    <script type="text/javascript">
    var busca;
    var ult_id_pendOpen;
    function infoProd(id){
      //alert("Numero do modal é: " +id);
      $("#pedCliente").html(id);
      ult_id_pendOpen = id;

      $.ajax({
          type: 'POST',
          url: 'class/pagina_obs.php',
          data: 'op=3'+'&id='+id,
          //contentType: "application/json; charset=utf-8",

          //dataType: 'json',
          success: function(response){
            response.forEach(function(i,v){
              var stats_pnd = i.status_pend;

              $("#nameLi").val(i.pend_cliente)
              $("#statusPendL").val(stats_pnd);
              $("#pendObsL").val(i.pend_obs);
              $("#ocPendLi").val(i.pend_oc);
              $("#pendDataL").val(i.data);
              $("#ocUserInfo").val(i.login )
              $('#ocCondPgmtL').val(i.pend_condPgmt);
             })

            //  $("#pendObsL").val(response);
          }
        });
    }
    function refresh_list_pend(){
      $('#tabela-tab').html("");
      ajax_find("lista", "");
    }
    function btn_salv_1(){
      var name = document.getElementById('name').value;
      var data = document.getElementById('pendData').value;
      var oc   = document.getElementById('ocPend').value;
      var obs  = document.getElementById('pendObs').value;
      var pend_stats = document.getElementById('selectStatus').value;
      var pend_condPgmt = document.getElementById('ocCondPgmt').value;

      $.ajax({    //create an ajax request to display.php
          type: 'POST',
        //  dataType: 'json',
          //url: 'loaders/pagina_ini_.php',
          url: 'class/pagina_obs.php',
          //async: true,
            //data: 'op=2' + '&name='+name+'&oc='+oc,
          data: 'op=2'+'&name='+name+'&data='+data+'&oc='+oc+'&obs='+obs+'&pend_stats='+pend_stats+'&pend_condPgmt='+pend_condPgmt,
          success: function(response){
            refresh_list_pend()
            $('#form_nov_pend input').val("");

             $('#form_nov_pend selectStatus').find('option[value=""]').attr("Aberto",false);
            $('#form_nov_pend textarea').val("");
            $('#modNovaPend').modal('hide');


              //alert(response);
          }//,complete: function(err){
            //    console.log(err);
            //}
        });
      }

    //quando inicia a pagina
    $( document ).ready(function() {
      $("#checkMostraPendFinaLizada").trigger("click");
      $("#checkMostraPendFinaLizada").click(function(e){
        if($(this).is(":checked")){
            $("#thEdit").text("Finalizada");
            $('#tabela-tab').html("");
            ajax_find("lista", "");
        }else{
            $("#thEdit").text("Data de criação");
            $('#tabela-tab').html("");
            ajax_find("listFina", "");
        }

      })
      $("#btn_atualizar").click(function(e){

        var name = document.getElementById('nameLi').value;
        var oc   = document.getElementById('ocPendLi').value;
        var obs  = document.getElementById('pendObsL').value;
        var pend_stats = document.getElementById('statusPendL').value;
        var pend_condPgmt = document.getElementById('ocCondPgmtL').value;
        $.ajax({    //create an ajax request to display.php
            type: 'POST',
          //  dataType: 'json',
            //url: 'loaders/pagina_ini_.php',
            url: 'class/pagina_obs.php',
            //async: true,
              //data: 'op=2' + '&name='+name+'&oc='+oc,
            data: 'op=4'+'&id='+ult_id_pendOpen+'&name='+name+'&oc='+oc+'&obs='+obs+'&pend_stats='+pend_stats+'&pend_condPgmt='+pend_condPgmt,
            success: function(response){
              refresh_list_pend();

              $('#modPend').modal('hide');


                //alert(response);
            }//,complete: function(err){
              //    console.log(err);
              //}
          });


      })
      $("#abremodalInfo").click(function(e){
        $('#modPendViewInfo').modal("show");
      });
      $('#btnfecharInfo').click(function(e){
        $('#modPendViewInfo').modal("hide");
      })

      if(busca == null){

        ajax_find("lista", "");
      } else{
        ajax_find("lista", "");
      }

      $( "#procurarIN" ).keyup(function() {
        busca = $(this).val();

        if(busca == ""){
          $('#tabela-tab').html("");
          ajax_find("lista", busca);

        } else{
          $('#tabela-tab').html("");
          ajax_find("listaEa", busca);
          //alert(busca);
        }



      });

        var obsEnabled = 0;
        $("#enableObsNovProd").click(function(e){
          if(obsEnabled == 0){
              obsEnabled = 1;
              $("#pendObsdiv").css("visibility", "visible");
          } else{
            obsEnabled = 0;
              $("#pendObsdiv").css("visibility", "hidden");
          }
        })
        $('#novaPend').click(function(e){
          $('#modNovaPend').modal('show');
        })

        $('#editProdPend').click(function(e){
        $("#modPendEditItem").modal("show");
        })
        $("#addPendProd").click(function(e){
          $("#modalAddProdPend").modal("show");
        })

        $('#btnAtualizaItem').click(function(e){
          $('#modPendEditItem').modal("hide");
        })
        $(document).on('click', '#linha', function(e){
      		e.preventDefault;

      	 	id = $(this).parent().parent().find(this).data('value');
      		$('#modPend').modal('show');
      		infoProd(id);
        });

    });

    function vrf_status(status){
      switch (status) {
        case "0":
          return "<span style='color:green'>Finalizado</span>";
          break;
        case "1":
          return "<span style='color:red'>Aberto</span>";
          break;
        case "2":
          return "<span style='color:orange'>Incompleto</span>";
          break;
        case "3":
          return "<span style='color:blue'>Aguard. Cliente</span>";
          break;

        default:

      }
    }
    function vrf_cor(status){
    //  console.log("status " +status);
      switch (status) {
        case "0":
        return "background-coloR:rgb(89, 255, 0,0.5);";
          break;
        case "1":
          return "background-coloR:rgba(255,25,60,0.5)";
          break;
        case "2":
          return "background-coloR:rgba(219,130,20,0.5)";
          break;
        case "3":
          return "background-coloR:rgba(555,515,20,0.5)";
          break;

        default:

      }

    }
    function ajax_find(lista,dados){

      $.ajax({    //create an ajax request to display.php
        type: 'POST',
        dataType: 'json',
        //url: 'loaders/pagina_ini_.php',
        url: 'loaders/pagina_pend_LOADER.php',
        //async: true,
        data: 'op='+lista + '&'+'data='+dados,
        success: function(response){
          //console.log(response);
          $.each(response, function(i, resp){
          //  console.log(resp[1]);
          });
          var trHTML = '';
          $.each(response, function(i, item) {
            //old trHTML += '<tr id="linha" data-value='+item.id+' style="'+vrf_cor(item.status_pend)+'"> <td> '+ item.id +' </td><td> '+ item.pend_cliente + '</td><td>'+ vrf_status(item.status_pend) + '</td><td>' + item.data_formatada + '</td><td><button type="button" class="btn btn-warning">Produtos</button></td></tr>';
            trHTML += '<tr id="linha" data-value='+item.id+'> <td> '+ item.id +' </td><td> '+ item.pend_cliente + '</td><td>'+ vrf_status(item.status_pend) + '</td><td>' + item.data_formatada + '</td><td><button type="button" class="btn btn-warning">Produtos</button></td></tr>';
          //  $('#tabela-tabe').append(trHTML);
        });

        $('#tabela-tab').append(trHTML);
            //alert(response);
        },//complete: function(err){
          //    console.log(err);
          //}
    });
    }
    </script>
  </body>
</html>
