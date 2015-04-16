<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php
   session_start();
?>
<html>
 <head>
  <title>Falcon host</title>
  <?php include("head.php"); ?>
  <link rel="stylesheet" href="http://falcon-host.ru/styles/home_style.css" type="text/css" />
  <link rel="shortcut icon" href="http://falcon-host.ru/images/server.ico" />
  <script type="text/javascript" src="http://falcon-host.ru/scripts/home.js"></script>
 </head>
 <body>
  <?php include("header.php"); ?>
  <?php
     $page = "main";
     include("menu.php");
  ?>
  <div id="content">
   <?php include("left_column.php"); ?>
   <div id="right_column">
   
   <div class="post">
	  <div class="news">
	   <a href="#">Left4Dead 2</a>
	  </div>
	  <div class="content">
	   <div align="center">
	    <a href="http://falcon-host.ru/images/content/l4d2.jpg" target="_blank" align="center"><img src="http://falcon-host.ru/images/content/l4d2.jpg"></img></a>
	   </div>
	   <p>Недавно в список работающих серверов был добавлен сервер Left4Dead 2. —ервер работает в нескольких режимах. ¬ скором времени будут добавлены новые компании и карты. ѕо всем вопросам обращатьс¤ к администрации. —ервер доступен по адресу 95.83.95.41:27121</p>
	  </div>
	 <h3>13.11.2012 (Falcon)</h3>
	</div>
	
    <div class="post">
	  <div class="news">
	   <a href="#">Minecraft 1.4.2 server</a>
	  </div>
	  <div class="content">
	   <p>я рад сообщить что после очередного обновлени¤, сервер minecraft был полностью восстановлен.  Ѕыли проведены изменени¤ в структуре сервера и его параметрах.  арта мира теперь доступна по новому адресу и будет сохран¤ть свою работоспособность независимо от работы самого сервера mc. ?л¤ просмотра полной карты нажмите <a href="http://falcon-host.ru/minecraft/map" target="_blank">здесь.</a></p><br />
	   <div align="center">
	    <a href="http://falcon-host.ru/images/content/2012-11-12_22.49.36.png" target="_blank" align="center"><img src="http://falcon-host.ru/images/content/mc_1.png"></img></a>
	   </div>
	  </div>
	 <h3>12.11.2012 (Falcon)</h3>
	</div>
   
   </div>
  </div>
  <?php include("bottom.php"); ?>
 </body>
</html>