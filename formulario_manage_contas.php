<html>
<head>
	<link rel="stylesheet" href="css/style.css	">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css">
	<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.3.min.js"> </script>
	<script type="text/javascript" src="jquery-ui/jquery-ui.min.js"></script>
	<script type="text/javascript" src="js/javascript.js"></script>
	<?php
		$numero_conta = $_GET['numero_conta'];
	?>
</head>

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
		<form action="manipula_banco.php">
			<input type="hidden" name="numero_conta" value="<?php echo $numero_conta ?>">
			<input type="submit" value="EXTRATO" name="btn_extrato" id="btn_extrato">
		</form>
	</div>
</body>
</html>