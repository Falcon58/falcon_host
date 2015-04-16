$(document).ready(Start);

var out_request;

function Start()
{
   if(window.XMLHttpRequest)
   {
	  out_request = new XMLHttpRequest();
   }
   else if(window.ActiveXObject)
   {
      out_request = new ActiveXObject("Microsoft.XMLHTTP");
   }
   else
   {
      return false;
   }
   out_request.onreadystatechange = function()
   {
      if(out_request.readyState == 4)
	  {
	     if(out_request.status == 200)
		 {
		    str = out_request.responseText;
		    if(str.indexOf('ok') + 1)
			{
			   document.getElementById("auth_message").innerHTML = "Вход выполнен";
			   document.getElementById("auth_message").style.color = "#00FF00";
			   setTimeout(refresh, 1000);
			}
			else if(str.indexOf('password_error') + 1)
			{
			   document.getElementById("auth_message").innerHTML = "Неверный пароль";
			   document.getElementById("auth_message").style.color = "#FF0000";
			   document.getElementById("check_button").disabled = 0;
			}
			else if(str.indexOf('user_error') + 1)
			{
			   document.getElementById("auth_message").innerHTML = "Пользователь не найден";
			   document.getElementById("auth_message").style.color = "#FF0000";
			   document.getElementById("check_button").disabled = 0;
			}
			else
			{
			   setTimeout(refresh, 500);
			}
		 }
	  }
   }
}
function refresh()
{
   location.reload();
}
function checkUser(object)
{
   if((object.username.value.length == 0) || (object.password.value.length == 0))
   {
      document.getElementById("auth_message").innerHTML = "Заполните все поля!";
	  document.getElementById("auth_message").style.color = "#FF0000";
   }
   else
   {
      document.getElementById("check_button").disabled = 1;
      var call_text = "login=" + object.username.value + "&password=" + object.password.value;
      out_request.open ('POST', "http://falcon-host.ru/scripts/auth/CheckUser.php", true);
      out_request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
      out_request.send (call_text);
   }
}
function Exit()
{
   out_request.open ('POST', "http://falcon-host.ru/scripts/auth/CheckUser.php", true);
   out_request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
   out_request.send ("");
}