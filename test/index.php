<!DOCTYPE html>
<html>
<head>
    <script>
        function myTimer()
        {
            var xmlhttp;
            if (window.XMLHttpRequest)
              {// code for IE7+, Firefox, Chrome, Opera, Safari
              xmlhttp=new XMLHttpRequest();
              }
            else
              {// code for IE6, IE5
              xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
              }
            xmlhttp.onreadystatechange=function()
              {
                  if (xmlhttp.readyState==4 && xmlhttp.status==200)
                    {
                        document.getElementById("percentageDiv").innerHTML=xmlhttp.response;
                        alert(xmlhttp.response);
                    }
              }
            xmlhttp.open("GET","getter.php",true);
            xmlhttp.send();
        }

        function loop(){
            var loop_index = document.getElementById("loop_nr").value;
            var xmlhttp;
            if (window.XMLHttpRequest)
              {// code for IE7+, Firefox, Chrome, Opera, Safari
              xmlhttp=new XMLHttpRequest();
              }
            else
              {// code for IE6, IE5
              xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
              }
            xmlhttp.onreadystatechange=function()
              {
                  if (xmlhttp.readyState==4 && xmlhttp.status==200)
                    {
                        document.getElementById("sumDiv").innerHTML="Total sum = " + xmlhttp.response;
                        clearInterval(myVar);
                    }
              }
            xmlhttp.open("GET","server_side.php?nr="+loop_index,true);
            xmlhttp.send();
            var myVar=setInterval(function(){myTimer()},1000);
        }
    </script>
</head>
<body>
<div id="percentageDiv"> Percentage div</div>
<div id="sumDiv"></div>
<input type="text" id="loop_nr">
<input type="submit" onclick="loop()">

</body>
</html>