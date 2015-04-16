<?php
   $client_ip = $_SERVER['REMOTE_ADDR'];
   $datetime = date("Y-m-d H:i:s");
   $date = date("Y-m-d");
   $database = mysqli_connect('localhost', 'Falcon', '!Falcon-107Penza-58!', 'falcon_host');
   $result = mysqli_query($database, "SELECT `id` FROM `users_all` WHERE `ip`='$client_ip';");
   if(mysqli_num_rows($result) == 0)
   {
      mysqli_query($database, "INSERT INTO `users_all` (ip, reg_date) VALUES('$client_ip', '$datetime');");
   }
   else
   {
      mysqli_query($database, "UPDATE `users_all` SET `reg_date`='$datetime' WHERE `ip`='$client_ip';");
   }
   mysqli_free_result($result1);
   $result = mysqli_query($database, "SELECT `id` FROM `users_today` WHERE `reg_date` >= '$date';");
   if(mysqli_num_rows($result) == 0)
   {
      mysqli_query($database, "TRUNCATE `users_today`;");
	  mysqli_query($database, "INSERT INTO `users_today` (ip, reg_date) VALUES('$client_ip', '$datetime');");
   }
   else
   {
      $result = mysqli_query($database, "SELECT `id` FROM `users_today` WHERE `ip`='$client_ip';");
	  if(mysqli_num_rows($result) == 0)
	  {
	     mysqli_query($database, "INSERT INTO `users_today` (ip, reg_date) VALUES('$client_ip', '$datetime');");
	  }
	  else
	  {
	     mysqli_query($database, "UPDATE `users_today` SET `reg_date`='$datetime' WHERE `ip`='$client_ip';");
	  }
   }
   mysqli_free_result($result1);
?>