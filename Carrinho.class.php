<?php

class Carrinho
{
	public $itens;

	public function inserirItem(Produto $item){
		$this->itens[] = $item; 
	}

	public function mostrarItens() {
		$lista = "";
		foreach ($this->itens as $item) {
			$lista = $lista." ".$item->nome;
		}
		echo $lista;
	}

	public function total() {
		$total = 0;
		foreach ($this->itens as $produto) {
			$total = $total + $produto->valor;
		}
		return $total;
	}
}

?>