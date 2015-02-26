<html>
<head>
	<title> FORMULARIO </title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css">
	<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.3.min.js"> </script>
	<script type="text/javascript" src="jquery-ui/jquery-ui.min.js"></script>
	<script type="text/javascript">
		function teste() {
			var botoes = jQuery('.btn_enviar').val()+' - '+jQuery('.btn_atualizar').val()+' - '+jQuery('.btn_deletar').val();
			alert(botoes);
		}
	</script>
	<?php
		function testePhp(){
			echo $_POST['btn'];
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
			<input type="submit" value="INSERIR" name="btn" class="btn_enviar">
			<input type="submit" value="ATUALIZAR" name="btn" class="btn_atualizar">
		</form>
	</div>
	<div id="block">
		<form method="POST" action="manipula_banco.php">
			Nome: <input type="text" name="del_nome"> <br/>
			<input type="submit" value="DELETAR" name="btn_del">
		</form>
	</div>

	<script type="text/javascript" src="js/javascript.js"></script>

</body>

</html>