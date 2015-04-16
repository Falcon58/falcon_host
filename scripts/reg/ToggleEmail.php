<?php
   if(!$email = $_REQUEST['email'])
   {
      return 0;
   }
   $email = stripslashes($email);
   $email = trim($email);
   require("connect.php");
   $result = mysqli_query($database, "SELECT user_id FROM users WHERE email='$email'");
   $myrow = mysqli_fetch_array($result, MYSQLI_ASSOC);
   if(empty($myrow['user_id']))
   {
      echo "ok";
   }
   else
   {
      echo "fail";
   }
   mysqli_free_result($result);
   mysqli_close($database);
?>