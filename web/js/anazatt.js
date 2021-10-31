var numitens=20;
var pagina=1;
var	busca;
var valCompra;
var valPorcentagem;
var valPorcentagem2;
var total;
var unidade;
var desconto;
var famProd;
var id;
var savAtivo;
var mostraAtivos= 1;

if(busca == null){
	busca = '';
}
$( document ).ready(function() {

	//executa busca
	$( "#formBusca" ).submit(function() {
		busca = $('#buscar1').val();
		getitens(1, numitens, busca, 1);

		return false;
	});


  getitens(pagina, numitens, busca, mostraAtivos);

});

$('#apenasInativos').click(function(){
  $('#paginador').hide();
  $('#formBusca').hide();
  getitens(1, 1000, busca, 0);

})
$('#apenasAtivos').click(function(){
  $('#paginador').show();
  $('#formBusca').show();
  getitens(pagina, numitens, busca, mostraAtivos);

})

$('#voltarTabela').click(function(){
  window.location.href = "tabela.php";

})

function getitens(pag, maximo, pesquisa, ativos){
	//alert(pag + " " + maximo + "" + pesquisa + " " + ativos);

	if(pesquisa == null){
		pesquisa = ' ';
	}
	if(ativos == null){
		ativos = 1;
	}
	pagina=pag;
	savAtivo = ativos;
	$.ajax({
	type: 'GET',
	data: 'tipo=lista&pag='+pag +'&maximo='+maximo+'&busca='+pesquisa+'&ativos='+ativos,
	url:'carregador.php',
		success: function(retorno){
			$('#conteudo').html(retorno);
			contador();
			}
		})
}
function contador(){
	$.ajax({
				type: 'GET',
				data: 'tipo=conta&busca='+busca,
				url:'carregador.php',
			success: function(eu){
					paginador(eu);
				}
		})
}

function paginador(cont){

		if(cont<=numitens){ //Verificando se há mais de uma página
			$('#paginador').html('')

		}else{
			$('#paginador').html('');
			var qtdpaginas=Math.ceil(cont/numitens); //arredondando divisão fracionada para cima
			if(pagina!=1){
				$('#paginador').append('<li class="page-item"><button class="page-link" onclick="getitens('+(pagina-1)+', '+numitens+', '+'busca'+')">Anterior</button></li>');
				}
			if(pagina!=qtdpaginas){
				$('#paginador').append('<li class="page-item"><button class="page-link" onclick="getitens('+(pagina+1)+', '+numitens+', '+'busca'+')">Próximo</button></li>')
			}
		}
}

function infoProd(id){
	$.ajax({
				type: 'GET',
				data: 'tipo=infoProd&id='+id,
				url:'carregador.php',
			success: function(eu){
				$('#aquieu').html(eu);





				}
		})
}

//envia dados editados

//envia dados editados


$('#mudar').on('click', function(){
	$(this).hide();
	$("#muda").show();
	//valPorcentagem = "1." +	$("#ValPorcenTa").val();
	$("#valCompra").hide();
	total = (valCompra * valPorcentagem);
	$('#total').val(total.toFixed(2));


});

$('#edita').on('click', function(){
window.location.href = "edit_prod.php";


});



$(document).on('click', '#linha', function(e){
		e.preventDefault;

	 	id = $(this).parent().parent().find(this).data('value');
		$('#abreinfo').modal('show');
		infoProd(id);



});

//essa função é executada quando se fecha o modal
