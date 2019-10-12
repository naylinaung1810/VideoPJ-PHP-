<?php 
include('user_auth.php');
include('user_config.php');

$user=new User();
$user->deleteAccount();