<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php
   session_start();
?>
<html>
 <head>
  <title>Falcon host</title>
  <meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
<meta http-equiv="Content-Language" content="ru" />
<link rel="stylesheet" href="http://falcon-host.ru/styles/main.css" type="text/css" />
<script type="text/javascript" src="http://falcon-host.ru/scripts/jquery/jquery-2.1.0.min.js"></script>
<script type="text/javascript" src="http://falcon-host.ru/scripts/jquery/jquery.easing.min.js"></script>
<script type="text/javascript" src="http://falcon-host.ru/scripts/jquery/jquery.lavalamp.min.js"></script>
<script type="text/javascript" src="http://falcon-host.ru/scripts/jquery/myriad.js"></script>
<script type="text/javascript" src="http://falcon-host.ru/scripts/main.js"></script>
<script type="text/javascript" src="http://falcon-host.ru/scripts/auth/Auth.js"></script>
  <link rel="stylesheet" href="http://falcon-host.ru/styles/home_style.css" type="text/css" />
  <link rel="shortcut icon" href="http://falcon-host.ru/images/server.ico" />
  <script type="text/javascript" src="http://falcon-host.ru/scripts/home.js"></script>
 </head>
 <body>
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
  <div id="wrapper">
   <div class="darkmenu">
    <ul class="darkBlue" id="five">
     <li <?php if($page == "main") echo "class=\"current\"";?>><a href="http://falcon-host.ru/">�������</a></li>
     <li <?php if($page == "servers") echo "class=\"current\"";?>><a href="http://falcon-host.ru/servers/">�������</a></li>
	 <li <?php if($page == "downloads") echo "class=\"current\"";?>><a href="http://falcon-host.ru/downloads/">��������</a></li>
     <li <?php if($page == "forum") echo "class=\"current\"";?>><a href="http://falcon-host.ru/forum/">�����</a></li>
	 <li <?php if($page == "chat") echo "class=\"current\"";?>><a href="http://falcon-host.ru/chat/">���</a></li>
    </ul>
	<div class="searchbox">
	 <form method="get" action="">
		<input type="text" value="" onfocus="doClear(this)" name="search" class="darksearch" />
	 </form>
    </div>
   </div>
</div>
  <div id="content">
   <div id="left_column">
	
	<div class="block">
     <h2>TOP-Servers</h2>
     <div class="servers">
      <a href="http://falcon-host.ru/minecraft/"><img src="http://cache.www.gametracker.com/server_info/95.83.95.41:25565/b_160_400_1_ffffff_c5c5c5_ffffff_000000_1_1_0.png" border="1" width="160" height="354" alt="�����: mc:falcon-host.ru" /></a>
      <a href="steam://connect/95.83.95.41:7707"><img src="http://cache.www.gametracker.com/server_info/95.83.95.41:7707/b_160_400_1_ffffff_c5c5c5_ffffff_000000_1_1_0.png" border="1" width="160" height="354" alt="�����" /></a>
      <a href="steam://connect/95.83.95.41:27121"><img src="http://cache.www.gametracker.com/server_info/95.83.95.41:27121/b_160_400_1_ffffff_c5c5c5_ffffff_000000_1_1_0.png" border="1" width="160" height="354" alt="�����" /></a>
     </div>
    </div>
	
    <div class="block">
     <h2>�������</h2>
     <div class="content">
     </div>
    </div>
	
</div>
   <div id="right_column">
   
   <div class="post">
	  <div class="news">
	   <a href="#">Left4Dead 2</a>
	  </div>
	  <div class="content">
	   <div align="center">
	    <a href="http://falcon-host.ru/images/content/l4d2.jpg" target="_blank" align="center"><img src="http://falcon-host.ru/images/content/l4d2.jpg"></img></a>
	   </div>
	   <p>������� � ������ ���������� �������� ��� �������� ������ Left4Dead 2. ������ �������� � ���������� �������. � ������ ������� ����� ��������� ����� �������� � �����. �� ���� �������� ��������� � �������������. ������ �������� �� ������ 95.83.95.41:27121</p>
	  </div>
	 <h3>13.11.2012 (Falcon)</h3>
	</div>
	
    <div class="post">
	  <div class="news">
	   <a href="#">Minecraft 1.4.2 server</a>
	  </div>
	  <div class="content">
	   <p>� ��� �������� ��� ����� ���������� ���������, ������ minecraft ��� ��������� ������������.  ���� ��������� �������� � ��������� ������� � ��� ����������. ����� ���� ������ �������� �� ������ ������ � ����� �������� ���� ����������������� ���������� �� ������ ������ ������� mc. ?� ��������� ������ ����� ������� <a href="http://falcon-host.ru/minecraft/map" target="_blank">�����.</a></p><br />
	   <div align="center">
	    <a href="http://falcon-host.ru/images/content/2012-11-12_22.49.36.png" target="_blank" align="center"><img src="http://falcon-host.ru/images/content/mc_1.png"></img></a>
	   </div>
	  </div>
	 <h3>12.11.2012 (Falcon)</h3>
	</div>
   
   </div>
  </div>
  <div id="info">
   <div class="author">
    <p>Powered by Falcon 2012.</p><br />
    <p>Skype: hl2dmigroman</p><br />
    <p>ICQ: 641-571-111</p><br />
    <a href="http://vk.com/falcon_servers" target="_blank"><img src="http://falcon-host.ru/images/vk_logo.png" width="25" height="25" alt="v����� ���������" style="margin-top: 20px;" /></a>
    <a href="http://steamcommunity.com/groups/falcon_servers" target="_blank"><img src="http://falcon-host.ru/images/steam_logo.png" width="25" height="25" alt="v����� ���������" style="margin-top: 20px;" /></a>
   </div>
   <div class="statistic">
    <img id="connect_stats" />
   </div>
</div>
 </body>
</html>