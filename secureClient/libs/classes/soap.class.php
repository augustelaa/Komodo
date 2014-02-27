<?php
class Soap extends SoapObject{
	public function __construct(){
		parent::__construct();
	}	
	public function invokeConnection($informationMap){
		$information = array
		(
			'location' => $informationMap->__get('location'),		
			'uri' => $informationMap->__get('uri'),
			'trace' => $informationMap->__get('trace'),
			'login' => $informationMap->__get('login'),
			'password' => $informationMap->__get('password'),
			'proxy_port' => $informationMap->__get('proxy_port')
		);
		$client = new SoapClient(NULL, $information);
		parent::__set('clientConnection', $client);
	}
}
class InformationMap extends Soap{
	var $location;
	var $uri;
	var $trace;
	var $login;
	var $password;
	var $proxy_port;

	public function __construct(){
		parent::__set('location', '');	
		parent::__set('uri', '');
		parent::__set('trace', 0);
		parent::__set('login', '');
		parent::__set('password', '');
		parent::__set('proxy_port', '');
	}
}