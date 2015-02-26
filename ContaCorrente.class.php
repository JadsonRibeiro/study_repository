<?php
include_once('Conta.class.php');

//Classe ContaCorrente nao pode ser extendida : definida como final
final class ContaCorrente extends Conta
{
	const taxa = 0.5;
	const tipoConta = "Corrente";

	/*Metodo sobreescrito sacar();
	*Decrementa saldo junto com o desconto da taxa por movimento
	*/
	public function sacar($qnt)
	{
		if ($qnt > parent::getSaldo()) {
			echo "Seu saldo é insuficiente para esse movimento <br/>";
		} else {
			parent::setSaldo((parent::getSaldo() - $qnt) - self::taxa);
			echo "Saldo atual: ".parent::getSaldo()." <br/>";
		}
		parent::incrementaAcessos();
	}

	/*Metodo sobreescrito depositar()
	*Incrementa o saldo mas incrementa o valor da taxa por movimento
	*/
	public function depositar($qnt)
	{
		parent::setSaldo(parent::getSaldo() + $qnt);
		parent::setSaldo(parent::getSaldo() - self::taxa);
		echo "Saldo atual: ".parent::getSaldo()." <br/>";
		parent::incrementaAcessos();
	}

	/*Metodo sobrescrito extrato()
	*Imprime os dados da conta
	*/
	public function extrato()
	{
		echo "Cliente {$this->cliente} possui a conta $this->conta na agencia $this->agencia com saldo
		 ".parent::getSaldo()." e conta tipo ".self::tipoConta." <br/>";
	}
}