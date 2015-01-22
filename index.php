<?php

include('Carro.class.php');

$carro = new Carro();

$carro->ano = "2012";
$carro->modelo = "C4";
$carro->cor = "amarelo";
$carro->fabricante = "Citroen";

$carro->mostrarDescricao();