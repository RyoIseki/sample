<!DOCTYPE html>
<html>
<head>
<title>Password Factory</title>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="./css/xxx.css">
</head>
<body>
	<header>
		<h1>パスワード生成</h1>
	</header>
	<?php
		require_once('./class/password/makePassword.php');
		require_once('/class/table/passwordTable.php');

		$passMaker = Password::getInstance();

		//生成ボタン押下
		if(isset($_POST['generate']))
		{
			try
			{
				$passMaker->setPassArray($_POST['number'],$_POST['digit'],$_POST['style']);
				$passValue = $passMaker->getPass();
			}
			catch(Exception $e)
			{
				die($e->getMessage());
			}
		}
		else
		{
			try
			{
				$passMaker->setPassArray(6,6,1);
				$passValue = $passMaker->getPass();
			}
			catch(Exception $e)
			{
				die($e->getMessage());
			}
		}
	?>
	<div id="container">
		<!-- フォーム -->
		<div id="control">
			<form method="post" action="home.php">
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
				<p><input type="submit" name="generate" value="生成">
				</p>
			</form>
		</div>
		<div id="passwordTable">
			<?php
				try
				{
					$display = new TableDisplay($passValue);
					$display->display();
				}
				catch(Exception $e)
				{
					die($e->getMessage);
				}
			?>
			<br/>
			<a>この乱数をダウンロードする</a>
			<form method="post" action="">
				<input type="submit" name="csv" value="download">
			</form>
		</div>
	</div>
	<footer>
		<p>Copyright © Password Factory All Rights Reserved.</p>
	</footer>
</body>
</html>