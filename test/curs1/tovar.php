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
		
			<form name="add_atr" action="tovar.php" method="post" onSubmit="return valid_add(add_atr)"> 
		                        
					<label class="text">Наименования товара:</label><input name="tName" type="text"><br>
										<label class="text">Стомиость товара: </label>
            <select name="Price" size="1">
	  <option value="$400">$400 </option>
	  <option value="$500">$500</option>
      <option value="$600">$600</option>
      <option value="$700 ">$700</option>
      <option value="$800 ">$800 </option>
	  <option value="Без ">Без огроничений</option>
	  </select><br>
					             <label class="text">Код товара</label>
								 
								 <input name="Code" type="text"><br>
								 <label class="text">Количество</label>
								 <select name="Num" size="1">
	  <option value="Один ">Один </option>
	  <option value="Два ">Два </option>
      <option value="Три ">Три </option>
      <option value="Четыре ">Четыре </option>
      <option value="Пять ">Пять </option>
	  <option value="Без ">Без огроничений</option>
	  </select><br>
								 
         
			<label class="label"><input type="submit" value="Добавить запись" name="button"></label>
			<?php
			   if(isset($_POST['tName']) && isset($_POST['Price']) && isset($_POST['Code']) && isset($_POST['Num']))
			   {
			      require("connect.php");
			      $tName = $_POST['tName'];
				  $Price = $_POST['Price'];
				  $Code = $_POST['Code'];
				  $Num = $_POST['Num'];
				  $sql = "INSERT INTO `store` (`name`, `count`, `code`, `price`) VALUES('$tName', '$Num', '$Code', '$Price');";
				  $result1 = mysqli_query($database, $sql);
                  if ($result1)
                  {
                     echo "<span>Запись добавлена</span>";
                  }
                  else
                  {
                     echo "<span>" . mysqli_error($database) . "</span>";
                  }
                  mysqli_free_result($result1);
                  mysqli_close($database);
			   }
			?>
			<br>
		</form>
		<form name="search_atr" action="tovar.php" method="post">
		<center><label class="label">Наименование товара</label><input name="tName" type="text"><br>
			<label class="label">Сортировать по:  </label> <select name="sort" size="1">
				<option selected="selected" value="0">Имени</option>
				<option value="1">id</option></center>
			</select><br>
				<label class="label"><input type="submit" value="Поиск" name="button"></label><br><br>
				<?php
				   if(isset($_POST['tName']) && isset($_POST['sort']))
				   {
				      require("connect.php");
				      $tName = $_POST['tName'];
					  $Sort = $_POST['sort'];
					  $sql = "SELECT * FROM `store` WHERE `name` LIKE '%" . $tName . "%'";
					  switch($Sort)
					  {
					     case 0:
						    $sql .= " ORDER BY `name`";
							break;
						 case 1:
						    $sql .= " ORDER BY `id`";
					  }
					  $sql .= ";";
					  $result1 = mysqli_query($database, $sql);
					  $temp = mysqli_num_rows($result1);
					  echo "<table width='100%' border='3' cellspacing='0' cellpadding='4'>
         <tr><td>ID</td><td>Наименование</td><td>Количество</td><td>Код твоара</td><td>Цена</td></tr>";
		              for($i = 0; $i < $temp; $i++)
					  {
					     $myrow = mysqli_fetch_array($result1);
	                     echo "<tr><td>" . $myrow['id'] . "</td>
						 <td>" . $myrow['name'] . "</td>
	                     <td>" . $myrow['count'] . "</td>
			             <td>" . $myrow['code'] . "</td>
			             <td>" . $myrow['price'] . "</td></tr>";
					  }
					  echo "</table>";
				   }
				?>
	</center></form>
	</body>
</html>