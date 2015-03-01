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
		$resp_nome = "";
		$resp_end_rua = "";
		$resp_end_bairro = "";
		$resp_end_numero = "";
		if(isset($_GET['resp_nome'])) {
			$resp_nome = $_GET['resp_nome'];
			$resp_end_rua = $_GET['resp_end_rua'];
			$resp_end_bairro = $_GET['resp_end_bairro'];
			$resp_end_numero = $_GET['resp_end_numero'];
		}
	?>
</head>

<body>
	<div id="container_inserir">
		<div id="block_form">
			<form method="POST" action="manipula_banco.php" enctype="multipart/form-data">
				<div id="block">
					Nome: <input type="text" name="nome" value="<?php echo $resp_nome ?>"> <br/>
					Foto: <input type="file" name="foto"> <br/>
				</div>
				<div id="block">
					Rua: <input type="text" name="end_rua" value="<?php echo $resp_end_rua ?>"> <br/>
					Bairro: <input type="text" name="end_bairro" value="<?php echo $resp_end_bairro ?>"> <br/>
					Número: <input type="text" name="end_numero" value="<?php echo $resp_end_numero ?>"> <br/>
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
		</div>
	</div>
	<div id="container_deletar_atualizar">
		<div id="block_form">
			<form method="POST" action="manipula_banco.php">
				Nome: <input type="text" name="del_name"> <br/>
				<input type="submit" value="DELETAR" name="btn_deletar" class="btn_deletar"> 
			</form>
		</div>
		<div id="block_form">
			<form method="POST" action="manipula_banco.php">
				Nome: <input type="text" name="atualiza_nome"> <br/>
				Rua: <input type="text" name="atualiza_rua"> <br/>
				Bairro: <input type="text" name="atualiza_bairro"> <br/>
				Numero: <input type="text" name="atualiza_numero"> <br/>
				<input type="submit" value="ATUALIZAR" name="btn_atualizar">
			</form>
		</div>
		<div id="block_form">
			<form method="POST" action="manipula_banco.php">
				Numero da Conta: <input type="text" name="pesquisa_nome">
				<input type="submit" value="PESQUISAR" name="btn_pesquisar">
			</form>
		</div>
	</div>

	<script type="text/javascript" src="js/javascript.js"></script>

</body>

</html>