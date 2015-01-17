<?php

use Classes\CadastroUsuario;
use Classes\CompraProduto;

include_once('autoload.php');

$cadastro = new CadastroUsuario();
$compra = new CompraProduto();

$cadastro->cadastro();
$compra->compra();
