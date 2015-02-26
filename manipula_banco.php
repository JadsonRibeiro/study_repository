<?php

include_once('class.ConectaBanco.php');
include_once('class.Dados_banco.php');
	
$dados = new Dados_banco($_POST['nome'], $_POST['end_rua'], $_POST['end_bairro'], $_POST['end_numero'], $_POST['conta_agencia'], $_POST['conta_tipo'], $_POST['conta_numero'], $_POST['conta_saldo_inicial']);

$conecta_banco = new ConectaBanco("localhost", "estudos_php", "root", "ab1936");

if(isset($_POST['btn_enviar'])) {
	
	$conecta_banco->inserir($dados);

} elseif (isset($_POST['btn_atualizar'])) {
	
	$conecta_banco->atualizar($dados);

} elseif(isset($_POST['btn_deletar'])) {
	
	$conecta_banco->deletar($_POST['nome']);
	
}

header("location:formulario.php");
?>