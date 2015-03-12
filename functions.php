<?php
include_once 'class.ConectaBanco.php';
include_once 'class.Dados_banco.php';
include_once 'fpdf/fpdf.php';
include_once 'php-init.php';

$response = array();


$con = new ConectaBanco(DB_HOST, DB_NAME, DB_USER, DB_PSWD);
// $con = new ConectaBanco("localhost", "estudos_php", "root", "ab1936");

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
			$response = array('error' => 0, 'msg' => "");
			
				//GERA ARQUIVO NORMAL
			 $pointer = fopen("files\\Extratos - TXT\\Extrato_{$dados->getConta_Numero()}.txt", 'w+');
			
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
				$response = array('error' => '0', 'msg' => 'erro ao abrir arquivo - gera TXT');
			} 
			
				//GERA ARQUIVO PDF
			
			$conta_tipo = "";
			if($dados->getConta_tipo()){
				$conta_tipo = "Conta Poupanca";
			} else {
				$conta_tipo = "Conta Corrente";
			}
				
			$content = " -- EXTRATO -- \r\n Nome: {$dados->getNome()} ".PHP_EOL." Rua: {$dados->getEnd_Rua()} ,{$dados->getEnd_Numero()} ".PHP_EOL." Bairro: {$dados->getEnd_Bairro()} ".PHP_EOL." - DADOS CONTA - ".PHP_EOL." Agencia: {$dados->getConta_Agencia()} ".PHP_EOL." Conta: {$dados->getConta_Numero()} ".PHP_EOL." Tipo: {$conta_tipo} ".PHP_EOL." SALDO: R$ {$dados->getConta_Saldo_Inicial()}";
				
			try {
				//create a object FPDF with default values
				$fpdf = new FPDF();
				
				//Add a page
				$fpdf->AddPage();
				
				//set formatation: font, style and size
				$fpdf->SetFont('Arial', 'B', 16);
				
				//set break line
				$fpdf->Ln(1);
			
				$picture = $dados->getFoto(); 
				if(!empty($picture)) {
					
					$p = fopen("files\\Extratos - PDF\\Foto_".$dados->getConta_Numero().".jpg", "w+");
					fwrite($p, $dados->getFoto());
					
					//Add image
					$fpdf->Image("files\\Extratos - PDF\\Foto_".$dados->getConta_Numero().".jpg", 100, 10, 30);
					
				}
				
				//Add content in page
				$fpdf->MultiCell(0, 10, utf8_decode($content));
				
				//Close and show the file on the browser
				//Output($name, $destino)
				$fpdf->Output("files\\Extratos - PDF\\Extrato_{$dados->getConta_Numero()}.pdf");
				$response = array('Error' => 1, 'msg' => "Arquivo gerado com sucesso");
				
// 				if(chmod("files\\Extratos - PDF\\Foto_".$dados->getConta_Numero().".jpg", 0777))
//  					unlink("files\\Extratos - PDF\\Foto_".$dados->getConta_Numero().".jpg");
				
			} catch (Exception $e) {
				$response = array('Error' => 0, 'msg' => "Erro ao gerar arquivo -> ".$e->getMessage());
			}
			break;
			
		case 'ler_extrato':
			$numero_conta = $_POST['numero_conta'];
			$file_content = "";
			
			if(!file_exists("files\\Extratos - TXT\\Extrato_".$numero_conta.".txt")){
				$response = array('error' => 0, 'msg' => 'Arquivo ainda nao gerado');
				break;
			}
			
			if(!$pointer = fopen("files\\Extratos - TXT\\Extrato_".$numero_conta.".txt", "r")){
				$response = array('error' => 0, 'msg' => "Erro ao abrir arquivo files\\Extratos - TXT\\Extrato_".$numero_conta.".txt");
			}
				
			while (!feof($pointer)) {
				$file_content .= fgets($pointer);
			}	
				
			$response = array('content' => $file_content);
	}	
	
	// Necessario para printar
	header( "Content-Type: application/json" );
	echo json_encode($response);
	
} else {
	$response = array('error' => '$_POST nao setado');
}

?>
