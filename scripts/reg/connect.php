<?php
   $database = mysqli_connect('localhost', 'Falcon', '!Falcon-107Penza-58!', 'falcon_host');
   if(!$database)
   {
      echo "Ошибка подключения (" . mysqli_connect_errno() . ") " . mysqli_connect_error() . ")";
   }
?>