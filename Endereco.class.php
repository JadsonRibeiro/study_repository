<?php

class Endereco
{
	public $bairro;
	public $rua;
	public $numero;

	public function __construct($bairro, $rua, $numero)
	{
		$this->bairro = $bairro;
		$this->rua = $rua;
		$this->numero = $numero;
	}
}