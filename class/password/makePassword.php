<?php

class Password
{

	private static $passInstance;
	private $passArray;
	private $passNum;
	private $passDigit;
	
	protected function __construct(){}
	
	public static function getInstance()
	{
		if(is_null(static::$passInstance))
		{
			static::$passInstance = new Password();
		}
		return static::$passInstance;
	}

	public function setPassArray($num,$digit,$style)
	{
		$this->passNum = $num;
		$this->passDigit = $digit;

		if($style == 0)
		{
			$source = "abcdefghijklmnopqrstuvwxyz";
		}
		else if($style == 1)
		{
			$source = "abcdefghijklmnopqrstuvwxyz1234567890";
		}
		else if($style == 2)
		{
			$source = "abcdefghijklmnopqrstuvwxyz1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		}
		else
		{
			throw new Exception('Style error!!');
		}

		$array = array();
		for($i = 0; $i < $this->passNum ; $i++ )
		{
			$shuffledStrings = str_shuffle($source);
			$array[] = substr($shuffledStrings,0,$this->passDigit);
		}
		$this->passArray = $array;
	}

	public function getPass()
	{
		return $this->passArray;
	}
	
	//クローン禁止
	final public function __clone()
	{
		throw new Exception("This instance is singleton class.");
	}
}
?>
