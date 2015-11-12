<?php require('inc/header.inc') ?>

<script type="text/javascript" src="js/javascript.js"></script>
<?php
	$numero_conta = $_GET['numero_conta'];
?>

<body>
	<div class="container">
		<div class="row">
			<button class="btn_menu waves-effect waves-light btn col s12 m3"> MENU </button>
			<div class="col s12 m6">
				<div class="col s12">
					<form action="manipula_banco.php" method="post">
						<div class="input-field">
							<input type="hidden" name="numero_conta" value="<?php echo $numero_conta ?>">
							<input type="text" id="value_depositar" name="value_depositar" class="value_depositar"> <br/>
							<p class="range-field">
								<input type="range" id="slider_depositar" min="0" max="1000" onchange="update_value_depositar(this.value)">
							</p>
							<label for="value_depositar"> Valor a ser depositado </label>
						</div>
						<input class="waves-effect waves-light btn" type="submit" value="DEPOSITAR" name="btn_depositar" id="btn_depositar">
					</form>
				</div>
				<div class="col s12">
					<form action="manipula_banco.php" method="post">
						<div class="input-field">
							<input type="hidden" name="numero_conta" value="<?php echo $numero_conta ?>">
							<input type="text" id="value_sacar" name="value_sacar" class="value_sacar"> <br/>
							<p class="range-field">
								<input type="range" id="slider_sacar" min="0" max="1000" onchange="update_value_sacar(this.value)">
							</p>
							<label for="value_sacar"> Valor a ser sacado </label>
						</div>	
						<input class="waves-effect waves-light btn" type="submit" value="SACAR" name="btn_sacar" id="btn_sacar"> 
					</form>
				</div>
			</div>
			<div class="divider"></div>
			<div class="col s12 m3">
				<div id="form_extrato" class="col s12">
					<!-- javascript: void(0) força browser nao chamar pagina alguma -->
					<form action="javascript:void(0)">
						<input type="hidden" class="numero_conta" name="numero_conta" value="<?php echo $numero_conta ?>">
						<input class="waves-effect waves-light btn" type="submit" value="EXTRATO" name="btn_extrato" id="btn_extrato">
					</form>
				</div>
				<div id="form_gera_extrato" class="col s12">
					<form action="javascript:void(0)">
						<input type="hidden" class="numero_conta" name="numero_conta" value="<?php echo $numero_conta ?>">
						<input class="waves-effect waves-light btn" type="submit" value="GERAR EXTRATO" name="btn_gera_extrato" id="btn_gera_extrato">
					</form>
				</div> 	
				<div id="field_download_extrato" class="col s12"></div> 
				<div id="field_ler_extrato" class="col s12">
					<button class="btn_ler_extrato waves-effect waves-light btn"> LER EXTRATO </button>
				</div>
			</div>
		</div>	
	</div>
</body>
</html>