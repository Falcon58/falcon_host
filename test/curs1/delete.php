<html>

	<head>
		<title>"Справочник покупателя"</title>
		<link type="text/css" rel="stylesheet" href="style.css" />

	</head>
	<body>
		<center>
		<ul>
		<li><a href="index.php">Поиск </a></li>
		<li><a href="add.php">Добавление покупателя</a></li>
		<li><a href="tovar.php">Товар</a></li>
		<li><a href="delete.php">Удаление покупателя</a></li>
		</ul>
		<hr>
		<form name="drop_atr" action="delete.php" method="post">
			<label class="label">ID клиента</label><input name="ID" type="text"><br>
			<label class="label"><input type="submit" value="Удалить" name="button"></label>
			<?php
			   if(isset($_POST['ID']))
			   {
			      require("connect.php");
				  $id = $_POST['ID'];
				  $sql = "DELETE FROM `clients` WHERE `id` = $id";
				  $result1 = mysqli_query($database, $sql);
                  if ($result1)
                  {
                     echo "<span>Удалено!</span>";
                  }
                  else
                  {
                     echo "<span>" . mysqli_error($database) . "</span>";
                  }
			   }
			?>
			<br>
		</form>

	</body>
</html>

