<?php
class Soap extends SoapObject{
	public function __construct(){
		parent::__construct();
	}	
	public function openConnection($informationMap){
		$information = array
		(
			'uri' => $informationMap->__get('uri')			
		);
		$server = new SoapServer(NULL, $information);
		parent::__set('serverConnection', $server);
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