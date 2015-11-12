<html>
<head>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/materialize.min.css">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css">
	<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.3.min.js"> </script>
	<script type="text/javascript" src="jquery-ui/jquery-ui.min.js"></script>
	<script type="text/javascript" src="js/javascript.js"></script>
	<script type="text/javascript" src="js/materialize.min.js"></script>

	<!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
</body>
	<ul id="dropdown_item" class="dropdown-content">
		<li><a href="formulario_manage_contas.php"> Contas </a></li>
		<li><a href="formulario_manage_clientes.php"> Clientes</a></li>
	</ul>
	<div class="navbar-fixed">
		<nav>
			<div class="nave-wrapper">
				<a href="index.php" class="brand-logo center">Inicio</a>
				<ul class="right hide-on-med-and-down">
					<li><a href="formulario_manage_clientes.php"> Clientes </a></li>
					<li><a href="formulario_manage_contas.php"> Contas </a></li>
					<li><a href="#" class="dropdown-button" data-activates="dropdown_item"> Manage <i class="material-icons right">arrow_drop_down</i></a></li>
				</ul>
			</div>
		</nav>
	</div>