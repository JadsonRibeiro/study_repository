<?php
include_once 'class.ConectaBanco.php';
include_once 'class.Dados_banco.php';

$response = array();

$con = new ConectaBanco("localhost", "estudos_php", "root", "");

if(isset($_POST['action'])) {
	
	switch ($_POST['action']) {
		
		case 'conta_exists':
			$dados = $con->pesquisar($_POST['account_number']);
			if(empty($dados)) {
				$response = array(
						'error' => 1,
						'msg'   => 'Esta conta nao existe'
				);
			} else {
				$response = array(
						'error' => 0,
						'msg'   => 'Conta existente'
				);
			}
			break;
		case 'extrato':
			$dados = $con->pesquisar($_POST['numero_conta']);
			$response = array(
					'nome'            => $dados->getNome(),
					'end_rua'         => $dados->getEnd_Rua(),
					'end_bairro'      => $dados->getEnd_Bairro(),
					'end_numero'      => $dados->getEnd_Numero(),
					'conta_agencia'	  => $dados->getConta_Agencia(),
					'conta_numero'	  => $dados->getConta_Numero(),
					'conta_saldo'     => $dados->getConta_Saldo_Inicial(),
					'conta_tipo'      => $dados->getConta_tipo()
			);
			break;
		
		case 'gera_extrato':
			$dados = $con->pesquisar($_POST['numero_conta']);
			$pointer = fopen("files\\extrato-conta-{$dados->getConta_Numero()}.txt", 'w+');
			$response = array('error' => 1, 'msg' => "sucessfully");
			if ($pointer) {
				$conta_tipo = "";
				if($dados->getConta_tipo()){
					$conta_tipo = "Conta Poupanca";
				} else {
					$conta_tipo = "Conta Corrente";
				}
				$content = " -- EXTRATO -- ".PHP_EOL." Nome: {$dados->getNome()} ".PHP_EOL." Rua: {$dados->getEnd_Rua()} ,{$dados->getEnd_Numero()} ".PHP_EOL." Bairro: {$dados->getEnd_Bairro()} ".PHP_EOL." - DADOS CONTA - ".PHP_EOL." Agencia: {$dados->getConta_Agencia()} ".PHP_EOL." Conta: {$dados->getConta_Numero()} ".PHP_EOL." Tipo: {$conta_tipo} ".PHP_EOL." SALDO: R$ {$dados->getConta_Saldo_Inicial()}";     
				if(!fwrite($pointer, $content)) {
					$response = array('error' => '0', 'msg' => 'erro ao escrever no arquivo');
				}
				!fclose($pointer);
			} else {
				$response = array('error' => '0', 'msg' => 'erro ao abrir no arquivo');
			}
			
	}	
	
	// Necessario para printar
	header( "Content-Type: application/json" );
	echo json_encode($response);
	
} else {
	$response = array('error' => '$_POST nao setado');
}

?>
