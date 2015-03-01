<?php

include_once('class.ConectaBanco.php');																									
include_once('class.Dados_banco.php');
include_once('ContaCorrente.class.php');
include_once('ContaPoupanca.class.php');
include_once('Endereco.class.php');

//$conecta_banco = new ConectaBanco("localhost", "estudos_php", "root", "ab1936");	
$conecta_banco = new ConectaBanco("localhost", "estudos_php", "root", "");
$data_url = "";

if(isset($_POST['btn_inserir'])) {
	
	$foto = fopen($_FILES['foto']['tmp_name'], 'rb');	
	$dados_inserir = new Dados_banco($_POST['nome'], $foto, $_POST['end_rua'], $_POST['end_bairro'], $_POST['end_numero'], $_POST['conta_agencia'], $_POST['conta_tipo'], $_POST['conta_numero'], $_POST['conta_saldo_inicial']);
	$conecta_banco->inserir($dados_inserir);

} elseif(isset($_POST['btn_deletar'])) {

	//ESTA ENTRANDO NESSA VERIFICACAO
	$conecta_banco->deletar($_POST['del_name']);

} elseif (isset($_POST['btn_atualizar'])) {

	$conecta_banco->atualizar($_POST['atualiza_nome'], $_POST['atualiza_rua'], $_POST['atualiza_bairro'], $_POST['atualiza_numero']);

} elseif (isset($_POST['btn_pesquisar'])) {

	$dados = $conecta_banco->pesquisar($_POST['pesquisa_nome']);
	
	//DEBBUG - ERRO Nos 'geters'
	$data_url= "?resp_nome=$dados->getNome()&resp_end_rua=$dados->getEnd_Rua()&resp_end_bairro=$dados->getEnd_Bairro()&resp_end_numero=$dados->getEnd_Numero()";

} elseif (isset($_POST['btn_sacar'])) {

	$numero_conta = $_POST['numero_conta'];
	$value = $_POST['value_sacar'];
	$dados = $conecta_banco->pesquisar($numero_conta);
	$end = new Endereco($dados->getEnd_Bairro(), $dados->getEnd_Rua(), $dados->getEnd_Numero());
	
	if ($dados->getConta_tipo == 'corrente') {

		$contaCorrente = new ContaCorrente($dados->getConta_Agencia(), $dados->getNome(), $dados->getConta_Numero(), $end, $dados->getConta_Saldo_Inicial());
		$contaCorrente->sacar($value);
	
	} else {

		$contaPoupanca = new ContaPoupanca($dados->getConta_Agencia(), $dados->getNome(), $dados->getConta_Numero(), $end, $dados->getConta_Saldo_Inicial());
		$contaPoupanca->sacar($value);
	
	}
	
} elseif (isset($_POST['btn_depositar'])) {
	
	$numero_conta = $_POST['numero_conta'];
	$value = $_POST['value_depositar'];
	$dados = $conecta_banco->pesquisar($numero_conta);
	$end = new Endereco($dados->getEnd_Bairro(), $dados->getEnd_Rua(), $dados->getEnd_Numero());
	
	if ($dados->getConta_tipo == 'corrente') {
		
		$contaCorrente = new ContaCorrente($dados->getConta_Agencia(), $dados->getNome(), $dados->getConta_Numero(), $end, $dados->getConta_Saldo_Inicial());
		$contaCorrente->depositar($value);
		
	} else {
		
		$contaPoupanca = new ContaPoupanca($dados->getConta_Agencia(), $dados->getNome(), $dados->getConta_Numero(), $end, $dados->getConta_Saldo_Inicial());
		$contaPoupanca->depositar($value);
		
	}
	
}
	
header("location:formulario_manage_clientes.php$data_url");

?>