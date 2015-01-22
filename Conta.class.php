<?php

class Conta
{
	public $agencia;
	public $cliente;
	public $conta;
	public $saldo = 0;
	public $status = false;

	/*Metodo __construct()
	*Inicializa os atributos da classe
	*/
	public function __construct($agencia, $cliente, $conta)
	{
		$this->agencia = $agencia;
		$this->cliente = $cliente;
		$this->conta = $conta;
		$this->status = true;
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
	public function sacar($qnt)
	{
		if ($qnt > $this->saldo) {
			echo "Voce nao tem saldo suficiente <br/>";
		} else {
			$this->saldo -= $qnt;
			$this->extrato();	
		}
		
	}

	/*Metodo extrato()
	*Imprime dados da conta
	*/
	public function extrato()
	{
		echo "O Cliente {$this->cliente} da Agencia {$this->agencia} que possui a Conta {$this->conta} tem saldo {$this->saldo}<br/>";
	}

	/*Metodo depositar()
	*Incrementa determinado valor ao saldo
	*/
	public function depositar($qnt)
	{
		$this->saldo += $qnt;
		$this->extrato();
	}
}
