<?php
   session_start();
   $width = 190;
   $height = 60;
   $line_num = 10;
   //ABCDEFGHIJKLMNOPQRSTUVWXYZ
   $characters = "0123456789abcdefghijklmnopqrstuvwxyz";
   $code = "";
   for($i = 0; $i < 10; $i++)
   {
      $code .= $characters[rand(0, strlen($characters))];
   }
   $_SESSION['page_test_code'] = $code;
   $image = imagecreatetruecolor($width, $height);
   $color = imagecolorallocate($image, rand(0, 255), rand(0, 255), rand(0, 255));
   imagefilledrectangle($image, 0, 0, $width, $height, $color);
   $color = imagecolorallocate($image, rand(0, 255), rand(0, 255), rand(0, 255));
   imagettftext($image, 16, 7, 10, 40, $color, "../../styles/fonts/Teslic-s_Document_Cyr_Normal.ttf", $code);
   for($i = 0; $i < $line_num; $i++)
   {
      $color = imagecolorallocate($image, rand(0, 255), rand(0, 255), rand(0, 255));
	  imageline($image, rand(0, $width), rand(1, $height - 10), rand(0, $width), rand(1, $height - 10), $color);
   }
   header("Content-type: image/png");
   imagepng($image);
?>