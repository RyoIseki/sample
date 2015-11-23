<?php
require_once('abstractTemplateMethod.php');

/**
*乱数を出力するテーブルを生成するクラス
*template method 使用
*/
class TableDisplay extends AbstractDisplay
{
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
		//生成された文字列を取得
		$passValue = $this->getData();

		if(empty($passValue))
		{
			throw new Exception("Your data is not found.");
		}
		else
		{
			for($i = 1; $i <= count($passValue); $i++ )
			{
				if($i % 3 == 0)
				{
					echo '<td><input type="text" name="password" size="30" maxlength="20" value='.$passValue[$i-1].'></td></tr><tr>';
				}
				else
				{
					echo '<td><input type="text" name="password" size="30" maxlength="20" value='.$passValue[$i-1].'></td>';
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
