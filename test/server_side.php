<?php
    session_start();
    $index=$_GET["nr"];
    $progress = 0 ;
    $sum = 0 ;

    for ($i = 1; $i <= $index; $i++) {
        $sum = $sum + $i;
        $progress++;
        $_SESSION['progress'] = $progress;
    }
    echo $sum;
?>