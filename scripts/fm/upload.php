<?php
   session_start();
   $uploaddir = "W:\\falcon_host\\downloads\\";
   $types = array("php", "html");
   if(is_uploaded_file($_FILES['user_file']['tmp_name']))
   {
      $uploadfile = $uploaddir . basename($_FILES['user_file']['name']);
	  $uploadfile = iconv("utf-8", "windows-1251", $uploadfile);
      $file_type = substr($_FILES['user_file']['name'], 1 + strrpos($_FILES['user_file']['name'], "."));
	  if(!in_array($file_type, $types))
	  {
         move_uploaded_file($_FILES['user_file']['tmp_name'], $uploadfile);
	  }
   }
   unset($_SESSION['upload_key_value']);
?>