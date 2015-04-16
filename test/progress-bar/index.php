<?php
    session_start();
    ?>
<html>
<head>
<script type="text/javascript" src="jquery-1.6.2.min.js"></script>
<script type="text/javascript" src="jquery-ui-1.8.14.custom.min.js"></script>
<script type="text/javascript" src="jquery.form.js"></script>
<link href="jquery-ui-1.8.14.custom.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
var t;
progress = function(){
    $.ajax({
           url: 'upload.php',
           dataType: 'json',
           success: function(data){
           if(data.percent) {
           $("#bar").progressbar({
                                 value: Math.ceil(data.percent),
                                 });
           $('.ui-progressbar-value').text(data.percent+'%');
           }
           }
           });
}
$(document).ready(function() {	
                  $('#form').ajaxForm(
                                      {
                                      type: 'POST',
                                      success: function() { 
                                      clearTimeout(t);
                                      $('#progress').html('<b>Файл был загружен!</b>');
                                      },
                                      beforeSubmit: function() {
                                      $('#upload_form').hide();
                                      $('#progress').show();
                                      t = setInterval("progress()", 10);
                                      }
                                      }
                                      );
                  
                  $('#cancel-form').ajaxForm(
                                             {
                                             success: function() { 
                                             clearTimeout(t);
                                             $('#progress').html('<b>Загрузка была отменена!</b>');
                                             
                                             }
                                             }
                                             );
                  
                  });
</script>
<style type="text/css">
.ui-progressbar-value { 
	background-image: 
	url(images/pbar-ani.gif);
	padding-left:10px;
	font-weight:normal;
}

#upload_form {
display:block;
}
#progress {
display: none;
}

#progress #bar {
height: 22px;
width: 300px;
}
</style>
</head>
<body>
<div id="upload">
<div id="upload_form">
<form id="form" action="upload.php" method="POST" enctype="multipart/form-data">
<input type="hidden" name="<?php echo ini_get("session.upload_progress.name"); ?>" value="test" />
<label for="file1">Файл для загрузки 1:&nbsp;</label><input type="file" name="file1" /><br /><br />
<label for="file2">Файл для загрузки 2:&nbsp;</label><input type="file" name="file2" /><br /><br />
<label for="file3">Файл для загрузки 3:&nbsp;</label><input type="file" name="file3" /><br /><br />
<input type="image" src="http://htmlbook.ru/files/images/html/imgbutton.gif" value="Загрузить" />
</form>
</div>
<div id="progress">
Загрузка файлов<br /><br /><div id="bar"></div><br />
<form id="cancel-form" action="cancel.php" method="POST" enctype="multipart/form-data">
<input type="submit" value="Отмена" />
</form>
</div>
<div id="result"></div>
</div>
</body>
</html>
