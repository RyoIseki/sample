<?php
require_once('abstractTemplateMethod.php');

/**
*乱数を出力するテーブルを生成するクラス
*template method 使用
*/
class TableDisplay extends AbstractDisplay
{
	/**
	* @param String $tableTag テーブルボディタグ
	* @param String $tableTagEnd テーブルボディタグ(改行なし)
	* @param String $tableTagReturn テーブルボディタグ(改行あり)
	*/
	private $tableTag = '<td><input type="text" name="password" size="30" maxlength="20" value=';
	private $tableTagEnd = '></td>';
	private $tableTagReturn = '></td></tr><tr>';
	
	/**
	*ヘッダ表示
	*/
	protected function DisplayHeader()
	{
		echo "<table>";
	}

	/**
	*テーブルボディ表示
	*/
	protected function DisplayBody()
	{
		//生成された乱数を取得
		$passValue = $this->getData();

		if(empty($passValue))
		{
			throw new Exception("Your data is not found.");
		}
		else
		{
			//テーブル形式で乱数を出力
			for($i = 1; $i <= count($passValue); $i++ )
			{
				if($i % 3 == 0)
				{
					echo $this->tableTag.$passValue[$i-1].$this->tableTagReturn;
				}
				else
				{
					echo $this->tableTag.$passValue[$i-1].$this->tableTagEnd;
				}
			}
		}
	}
	/**
	*フッタ表示
	*/
	protected function DisplayFooter()
	{
		echo "</table>";
	}
}
?>
