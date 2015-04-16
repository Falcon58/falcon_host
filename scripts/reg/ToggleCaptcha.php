<?php
   session_start();
   if(!$code = $_REQUEST['code'])
   {
      return 0;
   }
   if($code == $_SESSION['page_test_code'])
   {
      echo "ok";
   }
   else
   {
      echo "fail";
   }
?>