<?php
   $database = mysqli_connect('localhost', 'Falcon', 'falcon_230115', 'test');
   if(!$database)
   {
      echo "Ошибка подключения (" . mysqli_connect_errno() . ") " . mysqli_connect_error() . ")";
   }
?>