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
		
			<form name="add_atr" action="add.php" method="post" onSubmit="return valid_add(add_atr)"> 
			<label class="text">Имя:</label>
			<input name="Name" type="text"><br>
		  <label class="text">Фамилия:</label><input name="LastName" type="text"><br>
                        
					<label class="text">Наименования товара:</label><input name="tName" type="text"><br>
					<label class="text">Адрес:</label><input name="Address" type="text"><br>
					             <label class="text">Пол</label>
								 <input name="Pol" type="text"><br>
								 <label class="text">Телефон</label>
            <input name="Phone" type="text"><br>
                       
			
			<label class="label"><input type="submit" value="Добавить запись" name="button"></label>
			<?php
			   if(isset($_POST['Name']) && isset($_POST['LastName']) && isset($_POST['tName']) && isset($_POST['Address']) && isset($_POST['Pol']) && isset($_POST['Phone']))
			   {
			      require("connect.php");
				  $Name = $_POST['Name'];
				  $LastName = $_POST['LastName'];
			      $tName = $_POST['tName'];
				  $Address = $_POST['Address'];
				  $Pol = $_POST['Pol'];
				  $Phone = $_POST['Phone'];
				  $sql = "INSERT INTO `clients` (`name`, `lastname`, `tname`, `address`, `pol`, `phone`) VALUES('$Name', '$LastName', '$tName', '$Address', '$Pol', '$Phone');";
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
	</body>
</html>

				
		