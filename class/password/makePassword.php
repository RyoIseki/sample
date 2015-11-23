<?php
/**
*乱数を生成するクラス
*singleton method 使用
*/
class Password
{
	/**
	* @param Password $passInstance
	* @param array $passArray
	*/
	private static $passInstance;
	private $passArray;
	
	protected function __construct(){}
	
	public static function getInstance()
	{
		if(is_null(static::$passInstance))
		{
			static::$passInstance = new Password();
		}
		return static::$passInstance;
	}
	
	/**
	*乱数を生成
	*/
	public function setPassArray($num,$digit,$style)
	{
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
		for($i = 0; $i < $num ; $i++ )
		{
			$shuffledStrings = str_shuffle($source);
			$array[] = substr($shuffledStrings,0,$digit);
		}
		$this->passArray = $array;
	}
	
	/**
	* 乱数を返す
	* @return array $passarray
	*/
	public function getPass()
	{
		return $this->passArray;
	}
	
	/**
	* クローン禁止
	*/
	final public function __clone()
	{
		throw new Exception("This instance is singleton class.");
	}
}
?>
