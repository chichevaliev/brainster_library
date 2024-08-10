<?php 
require_once __DIR__. '/autoload.php';
session_start();
if(!empty($_POST['comment']) && !empty($_POST['id'])){
    $commentText = $_POST['comment'];
    $bookID = $_POST['id'];
    $comment = new Comment($connObj,$commentText,$bookID);
    $comment->create($_SESSION['username']);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
