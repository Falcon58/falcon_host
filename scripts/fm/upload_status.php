<?php
session_start();
$key = ini_get("session.upload_progress.prefix") . $_SESSION['upload_key_value'];
$percent = 0;
$data = array();
if(isset($_SESSION[$key]) and is_array($_SESSION[$key]))
{
   $percent = ($_SESSION[$key]['bytes_processed'] * 100 ) / $_SESSION[$key]['content_length'];
   $percent = round($percent);
   $data = array('percent' => $percent, 'content_length' => $_SESSION[$key]['content_length'], 'bytes_processed' => $_SESSION[$key]['bytes_processed']);
}
echo json_encode($data);
?>