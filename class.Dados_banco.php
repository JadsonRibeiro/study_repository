<?php

class Dados_banco {
	private $nome ;
	private $foto;
	private $end_rua ;
	private $end_bairro ;
	private $end_numero ;
	private $conta_agencia ;
	private $conta_tipo ;
	private $conta_numero ;
	private $conta_saldo_inicial ;

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
	
	public function getNome() {
		return $this->nome;
	}

	public function setNome( $value) {
		$this->nome = $value;		
	}

	public function getEnd_Rua() {
		return $this->end_rua;
	}

	public function setEnd_Rua( $value) {
		$this->end_rua = $value;		
	}

	public function getEnd_Bairro() {
		return $this->end_bairro;
	}

	public function setEnd_Bairro($value) {
		$this->end_bairro = $value;
	}

	public function getEnd_Numero() {
		return $this->end_numero;
	}	

	public function setEnd_Numero( $value) {
		$this->end_numero = $value;		
	}

	public function getConta_Agencia() {
		return $this->conta_agencia;
	}

	public function setConta_Agencia( $value) {
		$this->conta_agencia = $value;		
	}

	public function getConta_Numero() {
		return $this->conta_numero;
	}

	public function setConta_Numero( $value) {
		$this->conta_numero = $value;		
	}

	public function getConta_tipo() {
		return $this->conta_tipo;
	}

	public function setConta_Tipo( $value) {
		$this->conta_tipo = $value;		
	}

	public function getConta_Saldo_Inicial() {
		return $this->conta_saldo_inicial;
	}

	public function setConta_Saldo_Inicial( $value) {
		$this->conta_saldo_inicial = $value;		
	}

	public function getFoto() {
		return $this->foto;
	}

	public function setFoto( $value) {
		$this->foto = $value;		
	}

}

?>