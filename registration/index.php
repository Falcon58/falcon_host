<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php
   session_start();
?>
<html>
 <head>
  <title>Falcon host</title>
  <?php include("../head.php"); ?>
  <link rel="stylesheet" href="http://falcon-host.ru/styles/reg.css" type="text/css" />
  <link rel="shortcut icon" href="http://falcon-host.ru/images/server.ico" />
  <script type="text/javascript" src="http://falcon-host.ru/scripts/reg/toggle_form.js"></script>
 </head>
 <body>
  <?php include("../header.php"); ?>
  <?php include("../menu.php"); ?>
  <div id="content">
   <?php include("../left_column.php"); ?>
   <div id="right_column">
   
    <div class="reg_form">
	 <h1>Регистрация</h1>
	 <?php
	 if(!empty($_SESSION['id']))
	 {
	    header("Location: http://falcon-host.ru/");
	 }
	 else
	 {
	  $database = mysqli_connect('localhost', 'Falcon', '!Falcon-107Penza-58!', 'falcon_host');
	  if($database)
	  {
	     echo "<form name=\"reg_data\" method='post' accept-charset='UTF-8'>
	      <input type=\"text\" name=\"username\" placeholder=\"Логин\" onFocus=\"Focus(this.name);\" onBlur=\"ToggleLogin(reg_data);\"><span id=\"login_message_box\"></span><br />
	      <input type=\"password\" name=\"password\" placeholder=\"Пароль\" onFocus=\"Focus(this.name);\" onBlur=\"TogglePassword(reg_data);\"><span id=\"pass_message_box\"></span><br />
	      <input type=\"password\" name=\"ret_password\" placeholder=\"Повторите пароль\" onFocus=\"Focus(this.name);\" onBlur=\"ComparePassword(reg_data);\"><span id=\"cpass_message_box\"></span><br />
	      <input type=\"text\" name=\"email\" placeholder=\"Почта\" onFocus=\"Focus(this.name);\" onBlur=\"ToggleEmail(reg_data);\"><span id=\"email_message_box\"></span><br /><br />
		  <img id=\"captcha_code\" /><br />
		  <a id=\"captcha_text\" onclick=\"UpdateCaptcha();\">Мне не видно</a><br />
		  <input type=\"text\" name=\"code\" placeholder=\"Код проверки\" onFocus=\"Focus(this.name);\" onBlur=\"ToggleCode(reg_data);\"><span id=\"code_message_box\"></span><br /><br /><br />
	      <input id=\"ok_button\" type=\"button\" name=\"button\" value=\"Зарегистрироваться\" onclick=\"SaveData(reg_data);\" disabled>
	     </form>
	     <span id=\"status_message_box\"></span>";
	  }
	  else
	  {
	     echo "<span id=\"status_message_box\">Сервер баз данных не доступен, повторите попытку поже.</span>";
	  }
	  mysqli_close($database);
	 }
	 ?>
	</div>
   
   </div>
  </div>
  <?php include("../bottom.php"); ?>
 </body>
</html>