$(document).ready(Start);

var tLogin = false;
var tPassword = false;
var tcPassword = false;
var tEmail = false;
var tCode = false;
var request;
var elementId;
var message_box;

function Start()
{
   UpdateCaptcha();
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
		    str = request.responseText;
		    ChangeTStatus(str.indexOf('ok') + 1);
		 }
	  }
   }
}
function ChangeTStatus(tValue)
{
   switch(elementId)
   {
      case "login_message_box":
		 if(tValue)
		 {
		    tLogin = true;
		    message_box.innerHTML = "OK";
			message_box.style.color = "#00BFFF";
			Test();
		 }
		 else
		 {
		    message_box.innerHTML = "Логин уже используется";
			message_box.style.color = "#FF0000";
		 }
	     break;
	  case "email_message_box":
		 if(tValue)
		 {
		    tEmail = true;
		    message_box.innerHTML = "OK";
			message_box.style.color = "#00BFFF";
			Test();
		 }
		 else
		 {
		    message_box.innerHTML = "Эта почта уже используется";
			message_box.style.color = "#FF0000";
		 }
	     break;
	  case "code_message_box":
		 if(tValue)
		 {
		    tCode = true;
		    message_box.innerHTML = "OK";
			message_box.style.color = "#00BFFF";
			Test();
		 }
		 else
		 {
		    message_box.innerHTML = "Не корректный код";
			message_box.style.color = "#FF0000";
		 }
	     break;
      case "status_message_box":
	     if(tValue)
		 {
		    message_box.innerHTML = "Регистрация успешно завершена!\nТеперь вы можете войти на сайт.";
			message_box.style.color = "#00BFFF";
			setTimeout(refresh, 3000);
		 }
		 else
		 {
		    message_box.innerHTML = "Неизвестная ошибка, повторите попытку поже.";
			message_box.style.color = "#FF0000";
		 }
	     break;
   }
}
function ToggleLogin(object)
{
   elementId = "login_message_box";
   message_box = document.getElementById(elementId);
   if(object.username.value.length == 0)
   {
      message_box.innerHTML = "";
   }
   else
   {
      if(/^([a-zA-Zа-яА-Я0-9_\-\.]+)$/.test(object.username.value))
	  {
	     var call_text = "login=" + object.username.value;
		 request.open('POST', "../scripts/reg/ToggleLogin.php", true);
		 request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		 request.send(call_text);
	  }
	  else
	  {
	     message_box.innerHTML = "Логин содержит недопустимые символы!";
		 message_box.style.color = "#FF0000";
	  }
   }
}
function TogglePassword(object)
{
   message_box = document.getElementById("pass_message_box");
   if(object.password.value.length == 0)
   {
      message_box.innerHTML = "";
	  return;
   }
   if(object.password.value.length > 3)
   {
      if(/^[a-zа-я]+$|^[0-9]+$|^[A-ZА-Я]+$/.test(object.password.value))
	  {
	     message_box.innerHTML = "Плохой";
		 message_box.style.color = "#FFFF00";
		 tPassword = true;
		 Test();
	  }
	  else if(/^[a-zA-Zа-яА-Я0-9]+$|^[a-zA-Zа-яА-Я]+$|^[A-ZА-Я0-9]+$/.test(object.password.value))
	  {
	     message_box.innerHTML = "Нормальный";
		 message_box.style.color = "#00FF00";
		 tPassword = true;
		 Test();
	  }
	  else if(/^[a-zA-Zа-яА-Я0-9\W]+$/.test(object.password.value))
	  {
	     message_box.innerHTML = "Хороший";
		 message_box.style.color = "#00BFFF";
		 tPassword = true;
		 Test();
	  }
   }
   else
   {
      message_box.innerHTML = "Пароль должен содержать минимум 4 символа";
	  message_box.style.color = "#FF0000";
   }
}
function ComparePassword(object)
{
   message_box = document.getElementById("cpass_message_box");
   if(object.ret_password.value.length != 0)
   {
      if(object.ret_password.value == object.password.value)
	  {
	     message_box.innerHTML = "OK";
		 message_box.style.color = "#00BFFF";
		 tcPassword = true;
		 Test();
	  }
	  else
	  {
	     message_box.innerHTML = "Пароли не совпадают";
		 message_box.style.color = "#FF0000";
	  }
   }
   else
   {
      message_box.innerHTML = "";
   }
}
function ToggleEmail(object)
{
   elementId = "email_message_box";
   message_box = document.getElementById(elementId);
   if(object.email.value.length == 0)
   {
      message_box.innerHTML = "";
   }
   else
   {
      if(/^([a-z0-9_\-]+\.)*[a-z0-9_\-]+@([a-z0-9][a-z0-9\-]*[a-z0-9]\.)+[a-z]{2,4}$/i.test(object.email.value))
	  {
	     var call_text = "email=" + object.email.value;
		 request.open ('POST', "../scripts/reg/ToggleEmail.php", true);
		 request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		 request.send (call_text);
	  }
	  else
	  {
	     message_box.innerHTML = "Недопустимый формат!";
		 message_box.style.color = "#FF0000";
	  }
   }
}
function ToggleCode(object)
{
   elementId = "code_message_box";
   message_box = document.getElementById(elementId);
   if(object.code.value.length != 0)
   {
	  var call_text = "code=" + object.code.value;
	  request.open ('POST', "../scripts/reg/ToggleCaptcha.php", true);
	  request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	  request.send (call_text);
   }
   else
   {
      message_box.innerHTML = "";
   }
}
function SaveData(object)
{
   document.getElementById("ok_button").disabled = 1;
   elementId = "status_message_box";
   message_box = document.getElementById(elementId);
   var call_text = "login=" + object.username.value + "&password=" + object.password.value + "&email=" + object.email.value + "&code=" + object.code.value;
   request.open ('POST', "../scripts/reg/SaveData.php", true);
   request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
   request.send (call_text);
   //alert(call_text);
}
function Focus(object)
{
   document.getElementById("ok_button").disabled = 1;
   if(object == "username")
   {
      tLogin = false;
   }
   else if(object == "password")
   {
      tPassword = false;
   }
   else if(object == "ret_password")
   {
      tcPassword = false;
   }
   else if(object == "email")
   {
      tEmail = false;
   }
   else
   {
      tCode = false;
   }
}
function Test()
{
   if(tLogin && tPassword && tcPassword && tEmail && tCode)
   {
	  document.getElementById("ok_button").disabled = 0;
   }
}
function refresh()
{
   location.href='http://falcon-host.ru/';
}