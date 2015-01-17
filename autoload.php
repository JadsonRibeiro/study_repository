<?php

define("HOME", dirname(__FILE__));
define("DS", DIRECTORY_SEPARATOR);

spl_autoload_register( function($class)
{
	$nome = str_replace("\\", DS, $class.'.php');
	
	if (file_exists(HOME. DS. $nome)) {
		include_once(HOME. DS.  $nome);
	} else { 
		echo 'arquivo nao existe';
	}
});