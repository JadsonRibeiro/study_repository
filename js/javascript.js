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
		
		$.ajax({
				type: "POST",
				url : "functions.php",
				data: {
					action : "conta_exists",
					account_number : numero_conta 
				},
				dateType: "json",
				success : function(result) {
					if(result.error) {
						alert(result.msg);
					} else {
						location.href = "formulario_manage_contas.php?numero_conta="+numero_conta;
					}
				}
		});
	});

	$('#btn_manage_clients').on('click', function () {
		location.href = "formulario_manage_clientes.php";
	});	
	
	$('.btn_menu').on('click', function () {
		location.href= "index.php";
	});
});
	
