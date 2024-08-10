<?php 
require_once __DIR__. '/autoload.php';

$id = $_GET['id'];
$comment = new Comment($connObj,'',$bookID);
$comment->delete($id);



header('Location: ' . $_SERVER['HTTP_REFERER']);