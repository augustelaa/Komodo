<?php
abstract class Configuration{
	public static $file;
	public static function invokeConfiguration($path){	
		self::$file = parse_ini_file($path);
	}
	public static function getConfiguration($name){
		return self::$file[$name];
	}
}