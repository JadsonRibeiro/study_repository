<html>
<head>
	<title> FORMULARIO </title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css">
	<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.3.min.js"> </script>
	<script type="text/javascript" src="jquery-ui/jquery-ui.min.js"></script>
	<script type="text/javascript">
		function teste() {
			var text = jQuery('.btn_inserir').val()+' - '+jQuery('.btn_deletar').val();
			alert(text);
		}
	</script>
	<?php

		// teste ok
		$text1 = '';
		$text2 = '';
		if(isset($_POST['btn_inserir'])) {
			$text1 = "btn_inserir - setado";		
		} 
		if(isset($_POST['btn_deletar'])) {
			$text2 = "btn_deletar - setado";
		}
	?>
</head>

<body>
	<div id="container_inserir">
		<form method="POST" action="manipula_banco.php">
			<div id="block">
				Nome: <input type="text" name="nome"> <br/>
			</div>
			<div id="block">
				Rua: <input type="text" name="end_rua"> <br/>
				Bairro: <input type="text" name="end_bairro"> <br/>
				Número: <input type="text" name="end_numero"> <br/>
			</div>
			<div id="block">
				Agencia: <input type="text" name="conta_agencia"> <br/>
				Conta: <input type="text" name="conta_numero"> <br/>
				Tipo da Conta: 
				<select name="conta_tipo">
					<option value="corrente"> Conta Corrente </option>
					<option value="poupanca"> Conta Poupanca </option>
				</select>
				<br/>
				Saldo Inicial: <div id="slider"> </div> R$ <input type="text" class="conta_saldo_inicial" name="conta_saldo_inicial" size="1px" value="20">
			</div>
			<input type="submit" value="INSERIR" name="btn_inserir" class="btn_inserir">
		</form>
		<div id="block">
			<form method="POST" action="manipula_banco.php">
				Nome: <input type="text" name="del_name"> <br/>
				<input type="submit" value="DELETAR" name="btn_deletar" class="btn_deletar"> 
			</form>
		</div>
		<div id="block">
			<form method="POST" action="manipula_banco.php">
				Nome: <input type="text" name="atualiza_nome"> <br/>
				Rua: <input type="text" name="atualiza_rua"> <br/>
				Bairro: <input type="text" name="atualiza_bairro"> <br/>
				Numero: <input type="text" name="atualiza_rua"> <br/>
				<input type="submit" value="ATUALIZAR" name="btn_atualizar">
			</form>
		</div>
	</div>

	<script>
		jQuery('#slider').slider({
			max: 1000,
			orientation: "horizontal",
			animate: "fast",
			value: 20
		});

		jQuery('#slider').on('slidechange', function(event, ui) {
			jQuery('.conta_saldo_inicial').val(ui.value);
		});
	</script>
</body>

</html>