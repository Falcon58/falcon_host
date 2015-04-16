<div id="wrapper">
   <div class="darkmenu">
    <ul class="darkBlue" id="five">
     <li <?php if($page == "main") echo "class=\"current\"";?>><a href="http://falcon-host.ru/">Главная</a></li>
     <li <?php if($page == "servers") echo "class=\"current\"";?>><a href="http://falcon-host.ru/servers/">Сервера</a></li>
	 <li <?php if($page == "downloads") echo "class=\"current\"";?>><a href="http://falcon-host.ru/downloads/">Загрузки</a></li>
     <li <?php if($page == "forum") echo "class=\"current\"";?>><a href="http://falcon-host.ru/forum/">Форум</a></li>
	 <li <?php if($page == "chat") echo "class=\"current\"";?>><a href="http://falcon-host.ru/chat/">Чат</a></li>
    </ul>
	<div class="searchbox">
	 <form method="get" action="">
		<input type="text" value="" onfocus="doClear(this)" name="search" class="darksearch" />
	 </form>
    </div>
   </div>
</div>