<?php
require_once __DIR__. '/autoload.php';
session_start();
$id = $_GET['bookid'];
$comment = new Comment($connObj,'','');
$comment->disapprove($id);
header('Location: ' . $_SERVER['HTTP_REFERER']);