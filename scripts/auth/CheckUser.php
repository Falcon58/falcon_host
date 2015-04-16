<?php
   session_start();
   require("../reg/connect.php");
   if((!$login = $_REQUEST['login']) || (!$password = $_REQUEST['password']))
   {
      unset($_SESSION['id']);
	  unset($_SESSION['login']);
	  unset($_SESSION['level']);
      return 0;
   }
   $login = addslashes($login);
   $login = trim($login);
   $password = md5(md5(addslashes(trim($password))));
   $result = mysqli_query($database, "SELECT * FROM users WHERE nickname='$login'");
   $myrow = mysqli_fetch_array($result, MYSQLI_ASSOC);
   if(!empty($myrow['user_id']))
   {
      if($myrow['password'] == $password)
	  {
	     $today = date("Y-m-d H:i:s");
		 $IP = $_SERVER['REMOTE_ADDR'];
		 $_SESSION['id'] = $myrow['user_id'];
		 $_SESSION['login'] = $myrow['nickname'];
		 $_SESSION['level'] = $myrow['immunity_level'];
		 mysqli_query($database, "UPDATE users SET  lastlogindate='$today', lastloginip='$IP' WHERE  nickname='$login'");
		 echo "ok";
	  }
	  else
	  {
	     echo "password_error";
	  }
   }
   else
   {
      echo "user_error";
   }
   mysqli_free_result($result);
   mysqli_close($database);
?>