<div id="banner">
   <a href="http://falcon-host.ru/"><img id="logo" src="http://falcon-host.ru/images/logo.gif"></img></a>
   <div class="reg">
   <?php
    if(!empty($_SESSION['id']))
	{
	   echo "<span><a onclick=\"alert('Test!')\">" . $_SESSION['login'] . "</a> | <a onclick=\"Exit();\">�����</a></span>";
	}
	else
	{
    echo "<span><a onclick=\"ChangeAnim('#banner .reg .form')\">����</a> | <a href=\"http://falcon-host.ru/registration/\">�����������</a></span>
	<div class=\"form\">
	 <form name=\"auth_data\" method='post' accept-charset='UTF-8'>
	  <input type=\"text\" name=\"username\" placeholder=\"�����\">
	  <input type=\"password\" name=\"password\" placeholder=\"������\"><br>
	  <input id=\"check_button\" type=\"button\" name=\"auth_button\" onclick=\"checkUser(auth_data)\" value=\"�����\">
	  <span id=\"auth_message\">
      <!--<input type=\"checkbox\" name=\"checkbox\">
       <label for=\"checkbox\">���������</label>-->
      </span>    
	 </form>
	</div>";
	}
	?>
   </div>
</div>