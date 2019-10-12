<?php
include 'user_auth.php';
include 'post_config.php';
$post=new Post();

$name=$_POST['name'];
$poster=$_FILES['poster'];
$video=$_FILES['video'];
$cat_id=$_POST['cat_id'];

$post->add_Movie($name,$poster,$video,$cat_id);