<?php

include('Carro.class.php');
include('Conta.class.php');

$conta = new Conta("Papicu", "Jadson Ribeiro", "051 02-5");

$conta->extrato();
$conta->sacar(45);
$conta->depositar(100);
$conta->sacar(45);