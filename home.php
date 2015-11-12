<!DOCTYPE html>
<html>
	<head>
	<title>Password Factory</title>
	<meta charset="UTF-8">
	</head>
	<body>
	<h3>パスワード生成</h3>
	<?php
		require_once('./makePassword.php');

		$passfactory = Password::getInstance();
		$passfactory->setPassArray(6,6,1);
		$passValue = $passfactory->getPass();

		if(isset($_POST['number']) && isset($_POST['digit']) && isset($_POST['style']))
		{
			$passfactory->setPassArray($_POST['number'],$_POST['digit'],$_POST['style']);
			$passValue = $passfactory->getPass();
		}
	?>
	<form method="post" action="index.php">
		<p>個数<br>
		<input type="radio" name="number" value="6" checked> 6個
		<input type="radio" name="number" value="8"> 8個
		<input type="radio" name="number" value="10"> 10個
		</p>

		<p>桁数<br>
		<input type="radio" name="digit" value="6" checked> 6個
		<input type="radio" name="digit" value="8"> 8個
		<input type="radio" name="digit" value="10"> 10個
		</p>
		
		<p>スタイル<br>
		<input type="radio" name="style" value="0" checked> 半角英字
		<input type="radio" name="style" value="1"> 半角英字＆数字
		<input type="radio" name="style" value="2"> 半角英字(大小)＆数字
		</p>
		
		<p><input type="submit" value="生　成"></p>
	</form>

		<table>
			<tr>
				<?php
				for($i = 1; $i <= count($passValue); $i++ )
				{
					if($i % 3 == 0)
					{
						echo '<td><input type="text" name="password" 
						size="30" maxlength="20" value='.$passValue[$i-1].'></td></tr><tr>';
					}
					else
					{
						echo '<td><input type="text" name="password" 
						size="30" maxlength="20" value='.$passValue[$i-1].'></td>';
					}
				}
				?>
		</table>
	</body>
</html>