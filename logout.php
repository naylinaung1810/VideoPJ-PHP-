<?php
session_start();

unset($_SESSION['my_login']);
unset($_SESSION['id']);
if($_SESSION['admin']==true)
    unset($_SESSION['admin']);

header("location: login.php");