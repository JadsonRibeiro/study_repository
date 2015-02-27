<?php

class ConectaBanco 
{
	private $con;

	public function __construct($host, $dbname, $user, $pswd)
	{
		try {
			//MODE DEBBUGING
			$this->con = new PDO("mysql:host={$host};dbname={$dbname}","$user","{$pswd}", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
			// $this->con = new PDO("mysql:host={$host};dbname={$dbname}","$user","{$pswd}");
		} catch (Exception $e) {
			print("ERROR: ".$e->getMessage());
			die();
		}
	}

	public function inserir(Dados_banco $dados)
	{
		try {
			$action = $this->con->prepare("INSERT INTO teste_pdo(nome, end_rua, end_bairro, end_numero, conta_agencia, 
				conta_tipo, conta_saldo_inicial, conta_numero) values(?, ?, ?, ?, ?, ?, ?, ?) ");
			
			$action->bindParam(1, $dados->nome);
			$action->bindParam(2, $dados->end_rua);
			$action->bindParam(3, $dados->end_bairro);
			$action->bindParam(4, $dados->end_numero);
			$action->bindParam(5, $dados->conta_agencia);
			$action->bindParam(6, $dados->conta_tipo);
			$action->bindParam(7, $dados->conta_saldo_inicial);
			$action->bindParam(8, $dados->conta_numero);

			$action->execute();
			
		} catch (Exception $e) {
			$this->con->rollBack();
			throw new Exception("ERRO AO INSERIR - ".$e->getMessage(), 1);
			
		}
	}

	public function atualizar($nome, $rua, $bairro, $numero)
	{
		try {
			$sql = "UPDATE teste_pdo SET end_rua='{$rua}', end_bairro='{$bairro}', end_numero={$numero} WHERE nome='{$nome}'";
			$action = $this->con->exec($sql);
		} catch (Exception $e) {
			$this->con->rollBack();
			throw new Exception("ERRO AO ATUALIZAR - ".$e->getMessage(), 1); //COMMITAR - IMPLEMENTED ERRO HANDLING
		}
	}

	public function deletar($nome) 
	{
		try {

			$this->con->beginTransaction();
			$this->con->exec("DELETE FROM teste_pdo WHERE nome='$nome' ");
			$this->con->commit();
		
		} catch (Exception $e) {
			//if occured a error, will rollBach all changes made
			$this->con->rollBack();
			throw new Exception("ERRO AO DELETAR - ".$e->getMessage(), 1);
		}
	}
	
}
?>