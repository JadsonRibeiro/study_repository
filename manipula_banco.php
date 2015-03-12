<?php

include_once('class.ConectaBanco.php');																									
include_once('class.Dados_banco.php');
include_once('ContaCorrente.class.php');
include_once('ContaPoupanca.class.php');
include_once('Endereco.class.php');
include_once('php-init.php');

//$conecta_banco = new ConectaBanco("localhost", "estudos_php", "root", "ab1936");	
$conecta_banco = new ConectaBanco(DB_HOST, DB_NAME, DB_USER, DB_PSWD);

$data_url = "";
$url = "";
$destinations = array("formulario_manage_clientes.php", "formulario_manage_contas.php");

if(isset($_POST['btn_inserir'])) {
	
	$foto = fopen($_FILES['foto']['tmp_name'], 'rb');	
	$dados_inserir = new Dados_banco($_POST['nome'], $foto, $_POST['end_rua'], $_POST['end_bairro'], $_POST['end_numero'], $_POST['conta_agencia'], $_POST['conta_tipo'], $_POST['conta_numero'], $_POST['conta_saldo_inicial']);
	$conecta_banco->inserir($dados_inserir);
	$url = $destinations[0];

} elseif(isset($_POST['btn_deletar'])) {

	//ESTA ENTRANDO NESSA VERIFICACAO
	$conecta_banco->deletar($_POST['del_name']);
	$url = $destinations[0];

} elseif (isset($_POST['btn_atualizar'])) {

	$conecta_banco->atualizar($_POST['atualiza_nome'], $_POST['atualiza_rua'], $_POST['atualiza_bairro'], $_POST['atualiza_numero']);
	$url = $destinations[0];

} elseif (isset($_POST['btn_pesquisar'])) {

	$dados = $conecta_banco->pesquisar($_POST['pesquisa_conta']);
	
	$data_url= "?resp_nome={$dados->getNome()}&resp_end_rua={$dados->getEnd_Rua()}&resp_end_bairro={$dados->getEnd_Bairro()}&resp_end_numero={$dados->getEnd_Numero()}";
	$url = $destinations[0];

} elseif (isset($_POST['btn_sacar'])) {

	$numero_conta = $_POST['numero_conta'];
	$value = $_POST['value_sacar'];
	$dados = $conecta_banco->pesquisar($numero_conta);
	$end = new Endereco($dados->getEnd_Bairro(), $dados->getEnd_Rua(), $dados->getEnd_Numero());
	
	// 0 => false e 1 => true
	if ($dados->getConta_tipo() == 1) {

		$contaPoupanca = new ContaPoupanca($dados->getConta_Agencia(), $dados->getNome(), $dados->getConta_Numero(), $end, $dados->getConta_Saldo_Inicial());
		$contaPoupanca->sacar($value);
		$data_url = "?numero_conta={$numero_conta}&sacado_conta_poupanca=true";
		
	} else {

		$contaCorrente = new ContaCorrente($dados->getConta_Agencia(), $dados->getNome(), $dados->getConta_Numero(), $end, $dados->getConta_Saldo_Inicial());
		$contaCorrente->sacar($value);
		$data_url = "?numero_conta={$numero_conta}&sacado_conta_corrente=true";
		
	}
	
	$url = $destinations[1];
	
} elseif (isset($_POST['btn_depositar'])) {
	
	$numero_conta = $_POST['numero_conta'];
	$value = $_POST['value_depositar'];
	$dados = $conecta_banco->pesquisar($numero_conta);
	$end = new Endereco($dados->getEnd_Bairro(), $dados->getEnd_Rua(), $dados->getEnd_Numero());
	
	if ($dados->getConta_tipo() == 1) {

		$contaPoupanca = new ContaPoupanca($dados->getConta_Agencia(), $dados->getNome(), $dados->getConta_Numero(), $end, $dados->getConta_Saldo_Inicial());
		$contaPoupanca->depositar($value);
		$data_url = "?numero_conta={$numero_conta}&depositado_conta_poupanca=true";
		
	} else {
		
		$contaCorrente = new ContaCorrente($dados->getConta_Agencia(), $dados->getNome(), $dados->getConta_Numero(), $end, $dados->getConta_Saldo_Inicial());
		$contaCorrente->depositar($value);
		$data_url = "?numero_conta={$numero_conta}&depositado_conta_corrente=true";
		
	}
	
	$url = $destinations[1];
}
	
header("location:".$url."".$data_url);

?>