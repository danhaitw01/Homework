<html>
	<head>
		<title>作業四</title>
	</head>
	<body>
		<form action="" method="post">
			<b>請輸入姓名:</b>
				<input type="text" name="name" placeholder="輸入姓名" required><br>
			<b>請輸入出生西元年:</b>
				<input type="number" name="bornyear" placeholder="輸入出生西元年" max=2022 required><br>
			<b>請選擇年級:</b>
				<select name="level" required>
					<option>大學一年級</option>
					<option>大學二年級</option>
					<option>大學三年級</option>
					<option>大學四年級</option>
					<option>碩士一年級</option>
					<option>碩士二年級</option>
					<option>博士一年級</option>
					<option>博士二年級</option>
					<option>博士三年級</option>
				</select><br>
			<b>請選擇性別:</b>
				<input type="radio" name="sex" value="生理男性" required>生理男性</input>
				<input type="radio" name="sex" value="生理女性" required>生理女性</input>
				<input type="radio" name="sex" value="不願透露" required>不願透露</input><br>
				<input type="submit" name="submit">
		</form>
		<?php
			if (isset($_POST["submit"])){
				$name=$_POST["name"];
				$year=$_POST["bornyear"];
				$level=$_POST["level"];
				$sex=$_POST["sex"];
				echo("姓名:$name<br>");
				echo("出生年:$year<br>");
				echo("目前年級:$level<br>");
				echo("性別:$sex");}
		?>
	</body>
</html>
