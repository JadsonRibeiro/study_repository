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
	
	$('#form_extrato').on('submit', function() {
		var numero_conta = $('#form_extrato .numero_conta').val();
		
		$.ajax({
			type: "POST",
			url: "functions.php",
			data : {
				numero_conta: numero_conta,
				action: "extrato"
			},
			dataType: "json",
			success: function(res) {
				alert(
						"  -- EXTRATO -- \n Nome: "+res.nome +" \n Rua: "+res.end_rua +" \n Bairro: "+res.end_bairro +" \n Numero: "+res.end_numero +" \n Agencia: "+res.conta_agencia +" \n Numero: "+res.conta_numero +" \n Tipo: "+res.conta_tipo +" \n Saldo: "+res.conta_saldo 
						);
			}
		});
	});
	
	$(".btn_ler_extrato").on('click', function() {
		var numero_conta = $('#form_gera_extrato .numero_conta').val();
		
		$.ajax({
			type: "POST",
			url: "functions.php",
			data: {
				numero_conta : numero_conta,
				action : "ler_extrato"
			},
			dataType: "json",
			success: function(res) {
				if(res.error == 0){
					alert(res.msg);
				} else {
					alert(res.content);
				}
			}
		});
	});
	
	$('#form_gera_extrato').on('submit', function() {
		var numero_conta = $('#form_gera_extrato .numero_conta').val();
		
		$.ajax({
			type: "POST",
			url: "functions.php",
			data: {
				numero_conta: numero_conta,
				action: "gera_extrato"
			},
			dataType: "json",
			success: function(res) {
				if(res.error) {
					alert(res.msg);
				} else {
					alert(res.msg);
					$("#field_download_extrato").html("<a href='/EstudosPHP/files/Extratos - PDF/Extrato_"+numero_conta+".pdf' download> <button class='btn_download_extrato'> BAIXAR EXTRATO - PDF </button> </a>");
				}
			}
		});
	});
	
	
});
	
