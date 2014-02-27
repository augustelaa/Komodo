<?php
class SecureClient extends Soap{
	public function informationMap($informationRaw){

		if($informationRaw['serverSecure'])
			$protocol = 'https://';
		else
			$protocol = 'http://';


		$information['cleanLocation'] = $protocol.$informationRaw['serverAddress'];
		$information['location'] = $protocol.$informationRaw['serverAddress'].$informationRaw['serverPath'];
		$information['uri'] = $protocol.$informationRaw['serverUri'].$informationRaw['serverPath'];
		$information['trace'] = $informationRaw['serverTrace'];
		$information['login'] = $informationRaw['serverLogin'];
		$information['password'] = $informationRaw['serverPassword'];
		$information['proxy_port'] = $informationRaw['serverPort'];		

		$map = new InformationMap;
		$map->__set('location', $information['location']);		
		$map->__set('uri', $information['uri']);
		$map->__set('trace', $information['trace']);
		$map->__set('login', $information['login']);
		$map->__set('password', $information['password']);
		$map->__set('proxy_port', $information['proxy_port']);
		$map->__set('cleanLocation', $information['cleanLocation']); //intern use only
		parent::__set('mapConnection', $map);
	}
	public function checkMap(){
		$map = parent::__get('mapConnection');
		$cleanLocation = $map->__get('cleanLocation');		
		try{
			
			$res = fopen($cleanLocation, 'r');						
			if(empty($res))
				throw new SoapException('Location '.$cleanLocation.' is down.', 01);

			fclose($res);		

		}catch(SoapException $e){print_r($e);}
	}
	protected function invokeClient(){
		$information = parent::__get('mapConnection');
		parent::invokeConnection($information);		
	}
	public function checkConnection(){
		$connection = parent::__get('clientConnection');
		if(!empty($connection))
			return true;
		else
			return false;		
	}
	public function __construct(){
		parent::__construct();
		$information = array
		(
			'serverAddress' => Configuration::getConfiguration('serverAddress'),
			'serverUri' => Configuration::getConfiguration('serverUri'),
			'serverPath' => Configuration::getConfiguration('serverPath'),
			'serverSecure' => Configuration::getConfiguration('serverSecure'),
			'serverTrace' => Configuration::getConfiguration('serverTrace'),
			'serverLogin' => Configuration::getConfiguration('serverLogin'),
			'serverPassword' => Configuration::getConfiguration('serverPassword'),
			'serverPort' => Configuration::getConfiguration('serverPort')
		);
		self::informationMap($information);
		self::checkMap();
		self::invokeClient();		
	}
}