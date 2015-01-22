<?php

class Carro
{
	public $ano;
	public $modelo;
	public $cor;
	public $fabricante;

	public function mostrarDescricao()
	{
		echo "Ano $this->ano\n Modelo $this->modelo\n Cor $this->cor";
	}
}