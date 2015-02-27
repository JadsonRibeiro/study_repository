<?php

class Dados_banco {
	public $nome = "";
	public $foto;
	public $end_rua = "";
	public $end_bairro = "";
	public $end_numero = "";
	public $conta_agencia = "";
	public $conta_tipo = "";
	public $conta_numero = "";
	public $conta_saldo_inicial = "";

	public function __construct($nome, $foto, $end_rua, $end_bairro, $end_numero, $conta_agencia, $conta_tipo, $conta_numero, $conta_saldo_inicial)
	{
		$this->nome = $nome;
		$this->foto = $foto;
		$this->end_rua = $end_rua;
		$this->end_bairro = $end_bairro;
		$this->end_numero = $end_numero;
		$this->conta_agencia = $conta_agencia;
		$this->conta_tipo = $conta_tipo;
		$this->conta_numero = $conta_numero;
		$this->conta_saldo_inicial = $conta_saldo_inicial;	
	}
}

?>