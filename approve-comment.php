<?php
require_once __DIR__. '/autoload.php';
session_start();
$id = $_GET['bookid'];
$comment = new Comment($connObj,'','');
$comment->approve($id);
header('Location: ' . $_SERVER['HTTP_REFERER']);