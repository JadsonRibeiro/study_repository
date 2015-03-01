<?php

include_once('class.ConectaBanco.php');

abstract class Conta
{
	public $agencia;
	public $cliente;
	public $conta;
	public $status = false;
	//$saldo encapsulada
	private $saldo = 0;
	static $acessos = 0;
	public $Endereco;
	public $con = null;

	/*Metodo __construct()
	*Inicializa os atributos da classe
	*/
	public function __construct($agencia, $cliente, $conta, $Endereco, $saldo)
	{
		$this->con = new ConectaBanco("localhost", "estudos_php", "root", "");
		$this->agencia = $agencia;
		$this->cliente = $cliente;
		$this->conta = $conta;
		$this->status = true;
		$this->saldo = $saldo;
		$this->Endereco = $Endereco;
	}

	/*Metodo __destruct()
	*Finaliza objeto instanciado da classe
	*/
	public function __destruct()
	{
		echo "Objeto Finalizado!<br/>";
	}

	/*Metodo sacar()
	*Diminui o saldo do cliente
	*/
	abstract public function sacar($qnt);

	/*Metodo extrato()
	*Imprime dados da conta
	*/
	abstract public function extrato();

	/*Metodo depositar()
	*Incrementa determinado valor ao saldo
	*/
	abstract public function depositar($qnt);

	/*Metodo getSaldo()
	*Retorna o saldo
	*Nao pode ser sobrescrito pois é declarado como final
	*/
	final public function getSaldo()
	{
		return $this->saldo;
	}

	/*Metodo setSaldo()
	*Seta o saldo
	*Nao pode ser sobrescrito pois é declarado como final
	*/
	final public function setSaldo($valor)
	{
		$this->saldo = $valor;
		$this->con->manage_conta_atualizar_saldo($this->conta, $valor);
	}

	/*Metodo incrementaAcessos()
	*incrementa a variavel estatica sempre que qualquer tipo de conta é acessada
	*/
	final public function incrementaAcessos()
	{
		Conta::$acessos ++;
	}

	/*Metodo final getAcessos()
	*retorna o numero de acessos a conta
	*/
	final public function getAcessos()
	{
		return Conta::$acessos;
	}

	/*Metodo final imprimeEnd()
	*Imprime os dados do endereco
	*/
	final public function imprimeEnd()
	{
		//CONSERTAR ERRO .. FAZER REFERENCIAS A VARIAVEL POR MEIO DO OBJETO 'FORNECEDOR'
		return "Endereco <br> Bairro: {$this->Endereco->bairro} , Rua: {$this->Endereco->rua} , Numero {$this->Endereco->numero}  <br/>";
	}

}

?>