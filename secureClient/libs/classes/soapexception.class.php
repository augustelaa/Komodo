<?php
class SoapException extends Exception{
	public function __construct($result, $code){					
		parent::__construct($result, $code);
    }
}