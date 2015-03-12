<?php
class MyException_Files extends Exception 
{
		public function __toString() 
		{
			return __CLASS__." codigo: {$this->code} MENSAGEM: {$this->message} ".PHP_EOL;
		}
}