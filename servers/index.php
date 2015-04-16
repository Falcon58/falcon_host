<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php
   session_start();
?>
<html>
 <head>
  <title>Falcon host</title>
  <?php include("../head.php"); ?>
  <link rel="stylesheet" href="http://falcon-host.ru/styles/servers.css" type="text/css" />
  <link rel="shortcut icon" href="http://falcon-host.ru/images/server.ico" />
 </head>
 <body>
  <?php include("../header.php"); ?>
  <?php
     $page = "servers";
     include("../menu.php");
  ?>
  <div id="content">
   <?php include("../left_column.php"); ?>
   <div id="right_column">
   
   <?php
      require __DIR__ . '/ServerMonitor/SourceQuery.php';
	  $Query = new SourceQuery();
	  try
	  {
	     $Query->Connect('10.50.50.2', 27118, 3, SourceQuery :: SOURCE);
		 $ServerInfo = $Query->GetInfo();
		 if($Query->GetConnect() && $ServerInfo['AppID'] != 0)
		 {
		    $ServerRules = $Query->GetRules();
			$image =NULL;
			if(file_exists("W:/falcon_host/images/servers/" . $ServerInfo['Map'] . ".png"))
			{
			   $image = "http://falcon-host.ru/images/servers/" . $ServerInfo['Map'] . ".png";
			}
			else
			{
			   $image = "http://falcon-host.ru/images/no_image.png";
			}
			$god = "Не активен";
			$noclip = "Не активен";
			if($ServerRules['sbox_godmode'])
			{
			   $god = "Активен";
			}
			if($ServerRules['sbox_noclip'])
			{
			   $noclip = "Активен";
			}
			echo "
			 <div class='post'>
			  <div class='news'>
	           <a href='http://falcon-host.ru/servers/garrysmod/'>" . $ServerInfo['HostName'] . "</a>
	          </div>
			  <div class='content'>
			    <img src=" . $image . " width='150' height='150'></img>
			    <div class='param'>
				 <div class='key'>
				  <span>Игра:</span><br>
				  <span>Режим игры:</span><br>
				  <span>Игроки:</span><br>
				  <span>Карта:</span><br>
				  <span>GodMode:</span><br>
				  <span>Noclip:</span><br>
				  <br><br><span>IP:</span>
				 </div>
				 <div class='value'>
				  <span>Garry's Mod</span><br>
				  <span>" . $ServerInfo['ModDesc'] . "</span><br>
				  <span>" . $ServerInfo['Players'] . "/" . $ServerInfo['MaxPlayers'] . "</span><br>
				  <span>" . $ServerInfo['Map'] . "</span><br>
				  <span>" . $god . "</span><br>
				  <span>" . $noclip . "</span><br>
				  <br><br><a href='steam://connect/95.83.95.41:27118/'>95.83.95.41:27118</a>
				 </div>
				 <div class='info'>
				  <a href='http://steamcommunity.com/sharedfiles/filedetails/?id=212507216' target='_blank'>ВНИМАНИЕ: для комфортной игры рекомендуется установить необходимые аддоны!<br>(Нажмите для перехода)</a>
				 </div>
				</div>
			  </div>
			  <h3>Server version: " . $ServerInfo['Version'] . "</h3>
			 </div>
			";
		 }
	  }
	  catch(Exception $e)
	  {
	     echo $e->getMessage();
	  }
	  $Query->Disconnect();
	  try
	  {
	     $Query->Connect('10.50.50.1', 27116, 3, SourceQuery :: SOURCE);
		 $ServerInfo = $Query->GetInfo();
		 if($Query->GetConnect() && $ServerInfo['AppID'] != 0)
		 {
		    $ServerRules = $Query->GetRules();
			$image =NULL;
			if(file_exists("W:/falcon_host/images/servers/" . $ServerInfo['Map'] . ".png"))
			{
			   $image = "http://falcon-host.ru/images/servers/" . $ServerInfo['Map'] . ".png";
			}
			else
			{
			   $image = "http://falcon-host.ru/images/no_image.png";
			}
			echo "
			 <div class='post'>
			  <div class='news'>
	           <a href='#'>" . $ServerInfo['HostName'] . "</a>
	          </div>
			  <div class='content'>
			    <img src=" . $image . " width='150' height='150'></img>
			    <div class='param'>
				 <div class='key'>
				  <span>Игра:</span><br>
				  <span>Игроки:</span><br>
				  <span>Боты:</span><br>
				  <span>Карта:</span><br>
				  <br><br><br><br><span>IP:</span>
				 </div>
				 <div class='value'>
				  <span>Counter-Strike: Global Offensive</span><br>
				  <span>" . $ServerInfo['Players'] . "/" . $ServerInfo['MaxPlayers'] . "</span><br>
				  <span>" . $ServerInfo['Bots'] . "</span><br>
				  <span>" . $ServerInfo['Map'] . "</span><br>
				  <br><br><br><br><a href='steam://connect/95.83.95.41:27116/'>95.83.95.41:27116</a>
				 </div>
				</div>
			  </div>
			  <h3>Server version: " . $ServerInfo['Version'] . "</h3>
			 </div>
			";
		 }
	  }
	  catch(Exception $e)
	  {
	     echo $e->getMessage();
	  }
	  $Query->Disconnect();
	  try
	  {
	     $Query->Connect('10.50.50.1', 27117, 3, SourceQuery :: SOURCE);
		 $ServerInfo = $Query->GetInfo();
		 if($Query->GetConnect() && $ServerInfo['AppID'] != 0)
		 {
		    $ServerRules = $Query->GetRules();
			$image =NULL;
			if(file_exists("W:/falcon_host/images/servers/" . $ServerInfo['Map'] . ".png"))
			{
			   $image = "http://falcon-host.ru/images/servers/" . $ServerInfo['Map'] . ".png";
			}
			else
			{
			   $image = "http://falcon-host.ru/images/no_image.png";
			}
			echo "
			 <div class='post'>
			  <div class='news'>
	           <a href='#'>" . $ServerInfo['HostName'] . "</a>
	          </div>
			  <div class='content'>
			    <img src=" . $image . " width='150' height='150'></img>
			    <div class='param'>
				 <div class='key'>
				  <span>Игра:</span><br>
				  <span>Игроки:</span><br>
				  <span>Боты:</span><br>
				  <span>Карта:</span><br>
				  <span>Следующая:</span><br>
				  <br><br><br><span>IP:</span>
				 </div>
				 <div class='value'>
				  <span>Team Fortress 2</span><br>
				  <span>" . $ServerInfo['Players'] . "/" . $ServerInfo['MaxPlayers'] . "</span><br>
				  <span>" . $ServerInfo['Bots'] . "</span><br>
				  <span>" . $ServerInfo['Map'] . "</span><br>
				  <span>" . $ServerRules['sm_nextmap'] . "</span><br>
				  <br><br><br><a href='steam://connect/95.83.95.41:27117/'>95.83.95.41:27117</a>
				 </div>
				</div>
			  </div>
			  <h3>Server version: " . $ServerInfo['Version'] . "</h3>
			 </div>
			";
		 }
	  }
	  catch(Exception $e)
	  {
	     echo $e->getMessage();
	  }
	  $Query->Disconnect();
	  try
	  {
	     $Query->Connect('10.50.50.1', 27115, 3, SourceQuery :: SOURCE);
		 $ServerInfo = $Query->GetInfo();
		 if($Query->GetConnect() && $ServerInfo['AppID'] != 0)
		 {
		    $ServerRules = $Query->GetRules();
			$image =NULL;
			if(file_exists("W:/falcon_host/images/servers/" . $ServerInfo['Map'] . ".png"))
			{
			   $image = "http://falcon-host.ru/images/servers/" . $ServerInfo['Map'] . ".png";
			}
			else
			{
			   $image = "http://falcon-host.ru/images/no_image.png";
			}
			echo "
			 <div class='post'>
			  <div class='news'>
	           <a href='#'>" . $ServerInfo['HostName'] . "</a>
	          </div>
			  <div class='content'>
			    <img src=" . $image . " width='150' height='150'></img>
			    <div class='param'>
				 <div class='key'>
				  <span>Игра:</span><br>
				  <span>Режим игры:</span><br>
				  <span>Игроки:</span><br>
				  <span>Карта:</span><br>
				  <span>Следующая:</span><br>
				  <br><br><br><span>IP:</span>
				 </div>
				 <div class='value'>
				  <span>Half-Life 2 Deathmatch</span><br>
				  <span>" . $ServerInfo['ModDesc'] . "</span><br>
				  <span>" . $ServerInfo['Players'] . "/" . $ServerInfo['MaxPlayers'] . "</span><br>
				  <span>" . $ServerInfo['Map'] . "</span><br>
				  <span>" . $ServerRules['sm_nextmap'] . "</span><br>
				  <br><br><br><a href='steam://connect/95.83.95.41:27115/'>95.83.95.41:27115</a>
				 </div>
				</div>
			  </div>
			  <h3>Server version: " . $ServerInfo['Version'] . "</h3>
			 </div>
			";
		 }
	  }
	  catch(Exception $e)
	  {
	     echo $e->getMessage();
	  }
	  $Query->Disconnect();
    ?>
    <hr>
	 <a href="http://falcon-host.ru/servers/list.php" style="padding: 5px; font-size: 12px;">Чтобы посмотреть весь список доступных игр воспользуйтесь этой ссылкой.</a>
	<hr>
   </div>
  </div>
  <?php include("../bottom.php"); ?>
 </body>
</html>