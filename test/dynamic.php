<?php
if(!isset($_GET['page'])){
    $page = 'main';
}
else{
    $page = addslashes(strip_tags(trim($_GET['page'])));
}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>������� ������������ ����</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
</head>
<body>
<div id="page">
    <div id="header">
    </div>
    <div id="menu">
        <ul>
            <li><a href="/">�������</a></li>
            <li><a href="/index.php?page=about">� ���</a></li>
            <li><a href="/index.php?page=article">������</a></li>
            <li><a href="/index.php?page=foto">�����������</a></li>
            <li><a href="/index.php?page=contact">��������</a></li>
        </ul>
    </div>
    <div id="content">
        <?php
            include ('pages/'.$page.'.php');
        ?>
    </div>
    <div class="clear"></div>
    <div id="footer">
        <p>&copy; ����� ����������</p>
    </div>
</div>
</body>
</html>