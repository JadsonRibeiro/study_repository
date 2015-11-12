<?php require('inc/header.inc') ?>

<script type="text/javascript" src="js/javascript.js"></script>
<?php
	$numero_conta = $_GET['numero_conta'];
?>

<body>
	<div id="form_depositar">
		<form action="manipula_banco.php" method="post">
			<input type="hidden" name="numero_conta" value="<?php echo $numero_conta ?>">
			<div id="slider_depositar"></div>
			 R$ <input type="text" name="value_depositar" value="20" class="value_depositar"> <br/>
			<input type="submit" value="DEPOSITAR" name="btn_depositar" id="btn_depositar">
		</form>
	</div>
	<div id="form_sacar">
		<form action="manipula_banco.php" method="post">
			<input type="hidden" name="numero_conta" value="<?php echo $numero_conta ?>">
			<div id="slider_sacar"></div>
			R$ <input type="text" name="value_sacar" class="value_sacar" value="20"> <br/>
			<input type="submit" value="SACAR" name="btn_sacar" id="btn_sacar"> 
		</form>
	</div>
	<div id="form_extrato">
		<!-- javascript: void(0) for�a browser nao chamar pagina alguma -->
		<form action="javascript:void(0)">
			<input type="hidden" class="numero_conta" name="numero_conta" value="<?php echo $numero_conta ?>">
			<input type="submit" value="EXTRATO" name="btn_extrato" id="btn_extrato">
		</form>
	</div>
	<div id="form_gera_extrato">
		<form action="javascript:void(0)">
			<input type="hidden" class="numero_conta" name="numero_conta" value="<?php echo $numero_conta ?>">
			<input type="submit" value="GERAR EXTRATO" name="btn_gera_extrato" id="btn_gera_extrato">
		</form>
	</div> 
	<div id="field_download_extrato"></div> 
	<div id="field_ler_extrato">
		<button class="btn_ler_extrato"> LER EXTRATO - TXT </button>
	</div>
	
	<button class="btn_menu"> MENU </button>
</body>
</html>