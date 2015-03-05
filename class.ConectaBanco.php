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

	/*
	* Insert data on database
	*/
	public function inserir(Dados_banco $dados)
	{
		try {
			$action = $this->con->prepare("INSERT INTO teste_pdo(nome, foto, end_rua, end_bairro, end_numero, conta_agencia, 
				conta_tipo, conta_saldo_inicial, conta_numero) values(?, ?, ?, ?, ?, ?, ?, ?, ?) ");
			
			$action->bindValue(1, $dados->getNome());
			$action->bindValue(2, $dados->getFoto(), PDO::PARAM_LOB);
			$action->bindValue(3, $dados->getEnd_Rua());
			$action->bindValue(4, $dados->getEnd_Bairro());
			$action->bindValue(5, $dados->getEnd_Numero());
			$action->bindValue(6, $dados->getConta_Agencia());
			$action->bindValue(7, $dados->getConta_Tipo());
			$action->bindValue(8, $dados->getConta_Saldo_Inicial());
			$action->bindValue(9, $dados->getConta_Numero());

			$this->con->beginTransaction();
			$action->execute();
			$this->con->commit();
			
		} catch (Exception $e) {
			$this->con->rollBack();
			throw new Exception("ERRO AO INSERIR - ".$e->getMessage(), 1);
			
		}
	}

	/*
	* Update data with the same 'name'
	*/
	public function atualizar($nome, $rua, $bairro, $numero)
	{
		try {
			$sql = "UPDATE teste_pdo SET end_rua='{$rua}', end_bairro='{$bairro}', end_numero={$numero} WHERE nome='{$nome}'";
			$action = $this->con->exec($sql);		

		} catch (Exception $e) {
			$this->con->rollBack();
			throw new Exception("ERRO AO ATUALIZAR - ".$e->getMessage(), 1); 
		}
	}

	/*
	* Delete data with de below name
	*/
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

	/*
	* Seaching data with the below name
	*/
	public function pesquisar($numero_conta)
	{
		$action = $this->con->query("SELECT * FROM teste_pdo WHERE conta_numero='$numero_conta' ");
		
		$dados = array();

		while ($result = $action->fetchObject()) {
			//DEBBUG aqui nao eh o erro
			$dados = new Dados_banco($result->nome, $result->foto, $result->end_rua, $result->end_bairro, $result->end_numero, 
				$result->conta_agencia, $result->conta_tipo, $result->conta_numero, $result->conta_saldo_inicial );
			
		}

		return $dados;
	}
	
	public function manage_conta_atualizar_saldo($numero_conta, $value) 
	{
		try {
			$action = $this->con->exec("UPDATE teste_pdo SET conta_saldo_inicial=$value WHERE conta_numero='$numero_conta'");
		} catch (Exception $e){
			throw new Exception("ERRO AO ATUALIZAR SALDO".$e->getMessage(), 1);
		}
	} 
	
}
?>