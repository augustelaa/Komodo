<?php
class KomodoServer extends SoapObject{
	public function welcomeServer($info, $hash){
		return $info.'<br/>'.$hash;
	}
}