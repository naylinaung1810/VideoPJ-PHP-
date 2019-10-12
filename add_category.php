<?php
include 'user_config.php';
include 'post_config.php';
$cat_name=$_POST['cat_name'];

$post=new Post();
$post->addCategory($cat_name);


