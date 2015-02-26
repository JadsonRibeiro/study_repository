<?php

header("location:formulario.php");

// require_once('ContaCorrente.class.php');
// require_once('ContaPoupanca.class.php');
// require_once('Endereco.class.php');

// $end = new Endereco("Maraponga", "Fabiano de Cristo", 48);

// $corrente = new ContaCorrente("1993", "Jadson Ribeiro", "8888-13", $end, 500);
// $poupanca = new ContaPoupanca("1998", "Jose Gustavo", "9999-12", $end, 400);

// $corrente->sacar(50);
// $corrente->depositar(25);
// $corrente->extrato();
// echo "<hr/>";
// $poupanca->sacar(45);
// $poupanca->depositar(35);
// $poupanca->extrato();
// echo "<hr/>";

include('class.Dados_banco.php');

$con = new PDO("mysql:host=localhost;dbname=estudos_php","root","ab1936");

$nome = "jadson";
$agencia = "15214";

$dados = new Dados_banco($nome, "", "", "", "", "", "", "");

$stmt = $con->prepare("INSERT INTO teste_pdo(nome, conta_agencia) values (?,?)");
$stmt->bindParam(1, $dados->nome);
$stmt->bindParam(2, $agencia);

$stmt->execute();