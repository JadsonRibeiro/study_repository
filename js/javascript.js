$(document).ready(function ($) {
	
	$('#slider').slider({
			max: 1000,
			orientation: "horizontal",
			animate: "fast",
			value: 20
		});

	$('#slider').on('slidechange', function(event, ui) {
		$('.conta_saldo_inicial').val(ui.value);
	});
	
	$("#slider_sacar").slider({
		max : 1000,
		orientation: "horizontal",
		animate: "fast",
		value: 20
	});
	
	$("#slider_sacar").on('slidechange', function (event, ui) {
		$(".value_sacar").val(ui.value);
	});
	
	$("#slider_depositar").slider( {
		max : 1000,
		orientation: "horizontal",
		animate: "fast",
		value: 20
	});
	
	$("#slider_depositar").on('slidechange', function (event, ui) {
		$(".value_depositar").val(ui.value);
	});

	$('#btn_manage_contas').on('click', function () {
		var numero_conta = prompt("Digite o nome da conta");
		if(numero_conta != null){
			location.href = "formulario_manage_contas.php?numero_conta="+numero_conta;
		} else {
			alert("Campo nao pode ficar vazio");
		}
	});

	$('#btn_manage_clients').on('click', function () {
		location.href = "formulario_manage_clientes.php";
	});	
});
	
