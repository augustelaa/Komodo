<?php
class KomodoClient extends SoapObject{	
	public function __construct($clientConnection){		
		parent::__set('clientConnection', $clientConnection);
	}
	public function welcomeServer($info, $hash){
		$client = parent::__get('clientConnection');
		return $client->welcomeServer($info, $hash);
	}
}