<?php

include 'user_auth.php';
include 'post_config.php';
$id=$_GET['id'];

$post=new Post();
$post->delete_movie($id);