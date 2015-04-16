<?php
   if(!$login = $_REQUEST['login'])
   {
      return 0;
   }
   $login = stripslashes($login);
   $login = trim($login);
   require("connect.php");
   $result = mysqli_query($database, "SELECT user_id FROM users WHERE nickname='$login'");
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