﻿<?php

abstract class AbstractDisplay
{

	private $data;

	/**
	* コンストラクタ
	* @param mixed 表示するデータ 配列として保存
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
	* template methodに相当
	*/
	public function display()
	{
		$this->displayHeader();
		$this->displayBody();
		$this->displayFooter();
	}

	/**
	* データを取得する
	*/
	public function getData()
	{
		return $this->data;
	}

	/**
	*ヘッダ表示
	*実装はサブクラス
	*/
	protected abstract function displayHeader();

	/**
	*ボディ表示
	*実装はサブクラス
	*/
	protected abstract function displayBody();

	/**
	*振った表示
	*実装はサブクラス
	*/
	protected abstract function displayFooter();

}

?>
