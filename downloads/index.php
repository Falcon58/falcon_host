<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php
   session_start();
?>
<html>
 <head>
  <title>Falcon host</title>
  <?php include("../head.php"); ?>
  <link rel="stylesheet" href="http://falcon-host.ru/styles/downloads.css" type="text/css" />
  <link rel="shortcut icon" href="http://falcon-host.ru/images/server.ico" />
  <script type="text/javascript" src="http://falcon-host.ru/scripts/jquery/jquery-ui.js"></script>
  <script type="text/javascript" src="http://falcon-host.ru/scripts/jquery/jquery.form.min.js"></script>
  <script type="text/javascript" src="http://falcon-host.ru/scripts/fm/fm.js"></script>
 </head>
 <body>
  <?php include("../header.php"); ?>
  <?php
     $page = "downloads";
     include("../menu.php");
  ?>
  <div id="content">
   <?php include("../left_column.php"); ?>
   <div id="right_column">
    <div id="server_files">
	
	</div>
	<?php
	if(!empty($_SESSION['id']))
	{
	echo "
	<div id=\"upload\">
    <div id=\"up_form\">
	 <form id=\"form_for_files\" action=\"../scripts/fm/upload.php\" method=\"POST\" enctype=\"multipart/form-data\">";
	  
	   $key_name = ini_get("session.upload_progress.name");
	   $key_value = "file_id_" . mt_rand();
	   $_SESSION['upload_key_value'] = $key_value;
       echo "<input type=\"hidden\" name=\"$key_name\" value=\"$key_value\" />";
	  
      echo "<input type=\"file\" name=\"user_file\" /><br /><br />
      <input type=\"submit\" value=\"Загрузить\" />
     </form>
	</div>
	<div id=\"up_progress\">
	 <span id=\"up_text\">Загрузка: 0 / 0</span>
	 <div class=\"up_bar\">
	  <div id=\"up_line\">
	  </div>
	  <span id=\"up_percent\">0%</span>
	  <form id=\"cancel_form\" action=\"../scripts/fm/cancel.php\" method=\"POST\" enctype=\"multipart/form-data\">
       <input type=\"submit\" value=\"Отмена\" />
	  </form>
	 </div>
	 </div>
    </div>";
	}
	else
	{
	   echo "
	   <div id=\"upload\">
    <div id=\"up_form\">
	<hr>
	 <span id=\"warning_text\">Загружать файлы могут только авторизированные пользователи. Войдите или  <a href=\"http://falcon-host.ru/registration\">зарегистрируйтесь.</a></span>
	<hr>
	</div>
    </div>";
	}
	?>
   </div>
   
  </div>
  <?php include("../bottom.php"); ?>
 </body>
</html>