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
	}	
	
	// Necessario para printar
	header( "Content-Type: application/json" );
	echo json_encode($response);
	
} else {
	$response = array('error' => '$_POST nao setado');
}

?>
