<?php
class SoapObject{
	public function __construct(){

	}
	public function __get($name){
		$value = (self::__isset($name))?$this->$name:'';
		return $value;
	}
	public function __set($name, $value){
		$this->$name = $value;
	}
	public function __isset($name){
		return isset($this->$name);
	}
}