<?php
   //Получение размера файла по URL
   function getFileSize($url)
   {
      $sch = parse_url($url, PHP_URL_SCHEME);
	  if (($sch != "http") && ($sch != "https"))
	  {
	     return false;
	  }
	  if(($sch == "http") || ($sch == "https"))
	  {
	     $headers = get_headers($url, 1);
		 if((!array_key_exists("Content-Length", $headers)))
		 {
		    return false;
		 }
		 return $headers["Content-Length"];
	  }
   }
   //Приведение размера $s(int) <bytes>
   function size($s)
   {
      $sType = array('B', 'KB', 'MB', 'GB', 'TB', 'PB');
	  $i = 0;
	  while($s > 1024)
	  {
	     $s = round($s / 1024, 2);
		 $i++;
	  }
	  return $s . " " . $sType[$i];
   }
   //****************************************************************
   if(!$URL = $_REQUEST['url'])
   {
      return 0;
   }
   $DIR = "W:/falcon_host/downloads" . $URL;   //Коренная директория
   $files = scandir(iconv("utf-8", "windows-1251", $DIR));
   echo "<div class=\"files\">
          <h1>$URL</h1>";
   if($URL != "/")
   {
      echo "<div class='file'>
             <a onClick=\"Back();\"><img src='http://falcon-host.ru/images/back.png' width='25' height='25' alt='Back' align='center' />Назад</a>
	        </div>";
   }
   //Выборка каталогов из массива
   foreach($files as $value)
   {
      if(is_dir(iconv("utf-8", "windows-1251", $DIR) . $value) && $value != "." && $value != "..")
	  {
	     $file = iconv("windows-1251", "utf-8", $value);
	     echo "<div class='file'>
                <a onClick=\"Next('$file/');\"><img src='http://falcon-host.ru/images/fm/folder.png' width='25' height='25' alt='Folder' align='center' />$file</a>
	           </div>";
	  }
   }
   //Выборка файлов из массива
   foreach($files as $value)
   {
      if(!is_dir(iconv("utf-8", "windows-1251", $DIR) . $value) && $value != "." && $value != ".." && $value != "index.php")
	  {
	     $file = iconv("windows-1251", "utf-8", $value);
		 $name = NULL;
		 $type = NULL;
		 for($i = strlen($file) - 1; $i >= 0; $i--)
		 {
		    if($file[$i] == '.')
			{
			   for($j = $i + 1; $j < strlen($file); $j++)
			   {
			      $type .= $file[$j];
			   }
			   for($j = 0 ; $j < $i && $j < 90; $j++)
			   {
			      $name .= $file[$j];
			   }
			   break;
			}
		 }
		 $fStats = stat(iconv("utf-8", "windows-1251", $DIR) . $value);   //Получение информации
		 $fDate = date("d.m.Y H:i", $fStats['mtime']);
		 $http = "http://falcon-host.ru/downloads" . $URL . $file;
		 //$fSize = size(getFileSize($http));
		 $fSize = size(sprintf("%u", $fStats['size']));
		 $image = NULL;
		 if(file_exists("W:/falcon_host/images/fm/" . $type . ".png"))
		 {
		    $image = "http://falcon-host.ru/images/fm/" . $type . ".png";
		 }
		 else
		 {
		    $image = "http://falcon-host.ru/images/unknown.png";
		 }
	     echo "<div class='file'>
                <a href=\"" . $http . "\" target=\"_blank\"><img src='" . $image . "' width='25' height='25' alt='" . $name . "' align='center' />" . $name . "." . $type . "</a><span class='info'>$fDate</span><span class='info'>$fSize</span>
	           </div>";
	  }
   }
   echo "</div>";
?>