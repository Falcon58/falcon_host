$(document).ready(Start);

var message_box;   //ID блока вывода
var request;
var URL = "/";
var trigger = false;   //Ограничение нажатий
var trigger2 = false;
var time;
var up_percent;
var up_line;
var up_text;
//Инициализация
function Start()
{
   $('#form_for_files').ajaxForm({
      type: 'POST',
	  success: function() {
	     clearTimeout(time);
		 trigger2 = false;
		 up_percent.innerHTML = "100%";
		 up_line.style.width = 100 + "%";
		 up_text.innerHTML = 'Загрузка: Готово!';
		 setTimeout(refresh, 3000);
	  },
	  beforeSubmit: function() {
	     trigger2 = true;
		 $("#up_form").hide();
		 $("#up_progress").show();
	     time = setInterval("get_progress()", 500);
	  }
   });
   $('#cancel_form').ajaxForm({
      success: function() {
	     clearTimeout(time);
		 up_text.innerHTML = 'Загрузка: Отменено!';
		 setTimeout(refresh, 3000);
	  }
   });
   up_percent = document.getElementById("up_percent");
   message_box = document.getElementById("server_files");
   up_line = document.getElementById("up_line");
   up_text = document.getElementById("up_text");
   if(window.XMLHttpRequest)
   {
	  request = new XMLHttpRequest();
   }
   else if(window.ActiveXObject)
   {
      request = new ActiveXObject("Microsoft.XMLHTTP");
   }
   else
   {
      return false;
   }
   request.onreadystatechange = function()
   {
      if(request.readyState == 4)
	  {
	     if(request.status == 200)
		 {
		    trigger = true;
			message_box.innerHTML = request.responseText;
		 }
	  }
   }
   var url = "url=" + URL;
   request.open ('POST', "../scripts/fm/fm.php", true);
   request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
   request.send(url);
}
function refresh()
{
   location.reload();
}
function get_progress()
{
   $.ajax({
      url: '../scripts/fm/upload_status.php',
	  dataType: 'json',
	  success: function(data){
		 if(data.percent && trigger2)
		 {
		    up_percent.innerHTML = data.percent + "%";
			up_text.innerHTML = 'Загрузка: ' + size(data.bytes_processed) + ' / ' + size(data.content_length);
			up_line.style.width = data.percent + "%";
		 }
	  }
   });
}
//Следующий каталог nURL(String) <catalog/>
function Next(nURL)
{
   if(trigger)
   {
      trigger = false;
      URL = URL + nURL;
      var url = "url=" + URL;
      request.open ('POST', "../scripts/fm/fm.php", true);
      request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
      request.send(url);
   }
}
//На каталог вверх
function Back()
{
   if(trigger)
   {
      URL = URL.replace(/[^\/]+\/$/, '');
      var url = "url=" + URL;
      request.open ('POST', "../scripts/fm/fm.php", true);
      request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
      request.send(url);
   }
}
function size(s)
{
   var sType = new Array('B', 'KB', 'MB', 'GB', 'TB', 'PB');
   var i = 0;
   while(s > 1024)
   {
      s = Math.round((s / 1024) * 100) / 100;
	  i++;
   }
   return s + " " + sType[i];
}