<html>

	<head>
		<title>"Справочник покупателя"</title>
		<link type="text/css" rel="stylesheet" href="style.css" />

	</head>
	<body>
			<ul><center>
		<li><a href="index.php">Поиск </a></li>
		<li><a href="add.php">Добавление покупателя</a></li>
		<li><a href="tovar.php">Товар</a></li>
		<li><a href="delete.php">Удаление покупателя</a></li>
		</ul></center>
		<hr>
		<form name="search_atr" action="index.php" method="post">
		<center><label class="label">Фамиилия покупателя</label><input name="LastName" type="text"><br>
			<label class="label">Сортировать по:  </label> <select name="sort" size="1">
				<option selected="selected" value="0">Имени</option>
				<option value="1">id</option></center>
			</select><br>
				<label class="label"><input type="submit" value="Поиск" name="button"></label><br><br>
				<?php
				   if(isset($_POST['LastName']) && isset($_POST['sort']))
				   {
				      require("connect.php");
				      $LastName = $_POST['LastName'];
					  $Sort = $_POST['sort'];
					  $sql = "SELECT * FROM `clients` WHERE `lastname` LIKE '%" . $LastName . "%'";
					  switch($Sort)
					  {
					     case 0:
						    $sql .= " ORDER BY `Name`";
							break;
						 case 1:
						    $sql .= " ORDER BY `id`";
					  }
					  $sql .= ";";
					  $result1 = mysqli_query($database, $sql);
					  $temp = mysqli_num_rows($result1);
					  echo "<table width='100%' border='3' cellspacing='0' cellpadding='4'>
         <tr><td>ID</td><td>Имя</td><td>Фамилия</td><td>Товар</td><td>Адрес</td><td>Телефон</td></tr>";
		              for($i = 0; $i < $temp; $i++)
					  {
					     $myrow = mysqli_fetch_array($result1);
	                     echo "<tr><td>" . $myrow['id'] . "</td>
						 <td>" . $myrow['name'] . "</td>
	                     <td>" . $myrow['lastname'] . "</td>
			             <td>" . $myrow['tname'] . "</td>
						 <td>" . $myrow['address'] . "</td>
			             <td>" . $myrow['phone'] . "</td></tr>";
					  }
					  echo "</table>";
				   }
				?>
	</center></form>

	</body>
</html>
