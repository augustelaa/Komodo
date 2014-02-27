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
	var $uri;	

	public function __construct(){		
		parent::__set('uri', '');		
	}
}