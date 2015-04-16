<?php
   session_start();
   require("connect.php");
   $login = $_REQUEST['login'];
   $password = $_REQUEST['password'];
   $email = $_REQUEST['email'];
   if(!$code = $_REQUEST['code'])
   {
      return 0;
   }
   if($code == $_SESSION['page_test_code'])
   {
      $login = addslashes($login);
      $email = addslashes($email);
      $login = trim($login);
      $password = md5(md5(addslashes(trim($password))));
      $email = trim($email);
      $today = date("Y-m-d H:i:s");
      $IP = $_SERVER['REMOTE_ADDR'];
      $result1 = mysqli_query($database, "INSERT INTO users (nickname,password,email,immunity_level,registerdate,registerip) VALUES('$login','$password','$email','1','$today','$IP')");
      //$result2 = mysqli_query($database, "");
      if ($result1)
      {
         echo "ok";
      }
      else
      {
         echo "fail";
      }
      //mysqli_free_result($result1);
      mysqli_close($database);
   }
   else
   {
      echo "fail";
   }
   unset($_SESSION['page_test_code']);
?>