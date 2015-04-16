<?php
session_start();
$_SESSION['upload_progress_up_files']['cancel_upload'] = true;
unset($_SESSION['upload_key_value']);
?>