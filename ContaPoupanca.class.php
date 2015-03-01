<?php
require_once('Conta.class.php');

//Classe ContaPoupanca nao podera ter subclasses : definida como final ] OutraConta extends ContaPoupanca
// É uma mae que nao tem filhos
final class ContaPoupanca extends Conta
{
	public $dataEmissao;
	public $tipoConta = "Poupanca";

	/*Metodo sobreescrito sacar()
	*Decrementa o valor do $saldo
	*/
	public function sacar($qnt)
	{
		if ($qnt > parent::getSaldo()) {
			echo "Seu saldo é insuficiente <br/>";
		} else {
			parent::setSaldo(parent::getSaldo() - $qnt);
			//echo "Saldo atual: ".parent::getSaldo()." <br/>";
		}
		parent::incrementaAcessos();
	}

	/*Metodo sobrescrito depositar();
	*Incrementa o valor de $saldo
	*/
	public function depositar($qnt)
	{
		parent::setSaldo(parent::getSaldo() + $qnt);
		echo "Saldo atual: ".parent::getSaldo()." <br/>";
		parent::incrementaAcessos();
	}

	/*Metodo sobrescrio extrato()
	*Imprime dados da conta
	*/
	public function extrato()
	{
		echo "Cliente {$this->cliente} possui a conta $this->conta na agencia $this->agencia 
		com saldo ".parent::getSaldo()." e conta tipo $this->tipoConta <br/>";
	}
}