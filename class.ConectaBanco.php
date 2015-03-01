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
			
			$action->bindParam(1, $dados->nome);
			$action->bindParam(2, $dados->foto, PDO::PARAM_LOB);
			$action->bindParam(3, $dados->end_rua);
			$action->bindParam(4, $dados->end_bairro);
			$action->bindParam(5, $dados->end_numero);
			$action->bindParam(6, $dados->conta_agencia);
			$action->bindParam(7, $dados->conta_tipo);
			$action->bindParam(8, $dados->conta_saldo_inicial);
			$action->bindParam(9, $dados->conta_numero);

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

			// $action = $this->con->prepare("UPDATE teste_pdo SET end_rua='?', end_bairro='?', end_numero=? WHERE nome='?'");

			// $action->bindValue(1, $rua);
			// $action->bindValue(2, $bairro);
			// $action->bindValue(3, $numero);
			// $action->bindValue(4, $nome);

			// $this->con->beginTransaction();
			// $action->execute();
			// $this->con->commit();

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
	public function pesquisar($nome)
	{
		$action = $this->con->query("SELECT * FROM teste_pdo WHERE nome='$nome' ");
		$action->bindValue(1, $nome);

		while ($result = $action->fetchObject()) {
			$dados = new Dados_banco($result->nome, $result->foto, $result->end_rua, $result->end_bairro, $result->end_numero, 
				$result->conta_agencia, $result->conta_tipo, $result->conta_numero, $result->conta_saldo_inicial );
			
		}

		return $dados;
	}
	
}
?>