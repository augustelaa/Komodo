<?php
class SecureServer extends Soap{
	public function informationMap($informationRaw){
		
		$information['uri'] = $informationRaw['uri'];
	
		$map = new InformationMap;		
		$map->__set('uri', $information['uri']);
		parent::__set('mapConnection', $map);
	}	
	protected function openServer(){
		$information = parent::__get('mapConnection');
		parent::openConnection($information);		
	}
	public function checkConnection(){
		$connection = parent::__get('serverConnection');
		if(!empty($connection))
			return true;
		else
			return false;		
	}
	protected function tankServer(){
		if(self::checkConnection())
		{
			$connection = parent::__get('serverConnection');
			$connection->setClass('KomodoServer');
			$connection->handle();
		}		
	}
	public function __construct(){
		parent::__construct();
		$information = array
		(
			'uri' => 'http://192.168.0.119/secureServer/server.php'			
		);			
		self::informationMap($information);	
		self::openServer();	
		self::tankServer();	
	}
}