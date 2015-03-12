<?php
class MyException_DataBase extends Exception
{
	public function __toString()
	{
		return __CLASS__." codigo: {$this->code} Mensagem: {$this->message}".PHP_EOL;
	}
}