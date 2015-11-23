<?php

abstract class AbstractDisplay
{

	private $data;

	/**
	* コンストラクタ
	* @param array $data　
	*/
	public function __construct($data)
	{
		if(!is_array($data))
		{
			$data = array($data);
		}
		$this->data = $data;
	}

	/**
	* ヘッダ・ボディ・フッタを出力
	*/
	public function display()
	{
		$this->displayHeader();
		$this->displayBody();
		$this->displayFooter();
	}

	/**
	* データ取得
	*/
	public function getData()
	{
		return $this->data;
	}

	/**
	*ヘッダ表示
	*/
	protected abstract function displayHeader();

	/**
	*ボディ表示
	*/
	protected abstract function displayBody();

	/**
	*フッタ表示
	*/
	protected abstract function displayFooter();

}

?>
