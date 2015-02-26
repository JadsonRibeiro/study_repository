<?php

class ConectaBanco 
{
	private $con;

	public function __construct($host, $dbname, $user, $pswd)
	{
		$this->con = new PDO("mysql:host={$host};dbname={$dbname}","$user","{$pswd}");
	}

	public function inserir(Dados_banco $dados)
	{
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
	}

	public function atualizar(Dados_banco $dados)
	{
		$action = $this->con->prepare("UPDATE teste_pdo SET nome=?, end_rua=?, end_bairro=?, end_numero=?, conta_agencia=?, 
			conta_tipo=?, conta_saldo_inicial=?, conta_numero=? WHERE nome='?'");
		
		$action->bindParam(1, $dados->nome);
		$action->bindParam(2, $dados->end_rua);
		$action->bindParam(3, $dados->end_bairro);
		$action->bindParam(4, $dados->end_numero);
		$action->bindParam(5, $dados->conta_agencia);
		$action->bindParam(6, $dados->conta_tipo);
		$action->bindParam(7, $dados->conta_saldo_inicial);
		$action->bindParam(8, $dados->conta_numero);
		$action->bindParam(9, $dados->nome);

		$action->execute();	
	}

	public function deletar($nome) 
	{
		$action = $this->con->prepare("DELETE FROM teste_pdo WHERE nome='?'");

		// $action->bindParam(1, $nome);
		
		$action->execute(array($nome));
	}
	
}
?>