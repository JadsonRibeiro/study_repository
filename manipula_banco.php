<?php

include_once('class.ConectaBanco.php');																									
include_once('class.Dados_banco.php');

$conecta_banco = new ConectaBanco("localhost", "estudos_php", "root", "ab1936");	
// $conecta_banco = new ConectaBanco("localhost", "estudos_php", "root", "");

if(isset($_POST['btn_inserir'])) {
	
	$dados_inserir = new Dados_banco($_POST['nome'], $_POST['end_rua'], $_POST['end_bairro'], $_POST['end_numero'], $_POST['conta_agencia'], $_POST['conta_tipo'], $_POST['conta_numero'], $_POST['conta_saldo_inicial']);
	$conecta_banco->inserir($dados_inserir);

} elseif(isset($_POST['btn_deletar'])) {
	//ESTA ENTRANDO NESSA VERIFICACAO
	$conecta_banco->deletar($_POST['del_name']);
	
} elseif (isset($_POST['btn_atualizar'])) {

	$conecta_banco->atualizar($_POST['atualiza_nome'], $_POST['atualiza_rua'], $_POST['atualiza_bairro'], $_POST['atualiza_numero']);
}
	
header("location:formulario.php");
?>