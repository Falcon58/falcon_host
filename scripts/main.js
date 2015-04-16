$(document).ready(ok);
var connection;
function ok()
{
   $(function() {
			 $("#one,#two,#three,#four,#five,#six,#seven,#eight").lavaLamp({
				fx: "backout", 
				speed: 700,
				//click: function(event, menuItem) {
				//    alert(event + " " + menuItem);
				//	return false;
				//}
			 });
	});
	if(window.XMLHttpRequest)
    {
	   connection = new XMLHttpRequest();
    }
    else if(window.ActiveXObject)
    {
       connection = new ActiveXObject("Microsoft.XMLHTTP");
    }
    else
    {
       return false;
    }
    connection.onreadystatechange = function()
    {
	   if(connection.readyState == 4)
	   {
	      if(connection.status == 200)
		  {
		     document.getElementById("connect_stats").src = "http://falcon-host.ru/scripts/counter/display.php";
		  }
	   }
    }
	connection.open('POST', "http://falcon-host.ru/scripts/counter/counter.php", true);
	connection.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	connection.send("");
}
function ChangeAnim(objName)
{
   $(objName).slideToggle(200, 'linear', function() {
   });
}