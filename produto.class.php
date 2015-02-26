<?php

class Produto
{
	
	public $valor = 0.0;
	public $nome = "";

	public function __construct($valor, $nome){
		$this->valor = $valor;
		$this->nome = $nome;
	}

	//sempre será chamada quando tentarem atribuir um valor a uma variavel inacessivel ou inexistente
	public function __set($propriedade, $valor) {
		echo "$propriedade foi associada ao valor $valor";
	}
}

?>