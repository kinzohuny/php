<?php
session_start();
echo 'mobile='.$_SESSION['mobile'].'<br>';
echo 'isBinded='.$_SESSION['isBinded'].'<br>';
echo 'isFinished='.$_SESSION['isFinished'];

?>
