<?php
require_once('abstractTemplateMethod.php');

class TableDisplay extends AbstractDisplay
{
	/**
	*header style
	*/
	protected function DisplayHeader()
	{
		echo "<table>";
	}

	/**
	*body style
	*/
	protected function DisplayBody()
	{
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
	*footer style
	*/
	protected function DisplayFooter()
	{
		echo "</table>";
	}
}
?>
