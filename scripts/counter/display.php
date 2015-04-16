<?php
   header("Content-type: image/png");
   $database = mysqli_connect('localhost', 'Falcon', '!Falcon-107Penza-58!', 'falcon_host');
   $result = mysqli_query($database, "SELECT `id` FROM `users_all` ORDER BY `id` DESC LIMIT 1");
   $myrow = mysqli_fetch_array($result, MYSQLI_ASSOC);
   $idAll = "Всего посещений: " . $myrow['id'];
   $result = mysqli_query($database, "SELECT `id` FROM `users_today` ORDER BY `id` DESC LIMIT 1");
   $myrow = mysqli_fetch_array($result, MYSQLI_ASSOC);
   $idToday = "Посещений за день: " . $myrow['id'];
   //mysqli_free_result($result1);
   //$width = 150;
   //$height = 50;
   //$image = imagecreatetruecolor($width, $height);
   $image = @imagecreatefrompng("http://falcon-host.ru/images/connection.png");
   //$color = imagecolorallocate($image, 0, 0, 128);
   //imagefilledrectangle($image, 0, 0, $width, $height, $color);
   $color = imagecolorallocate($image, 255, 255, 0);
   imagettftext($image, 8, 0, 5, 12, $color, "../../styles/fonts/ARIAL.TTF", $idAll);
   imagettftext($image, 8, 0, 5, 24, $color, "../../styles/fonts/ARIAL.TTF", $idToday);
   imagepng($image);
?>