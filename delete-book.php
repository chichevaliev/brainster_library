<?php 
require_once __DIR__. '/autoload.php';

$id = $_GET['id'];
$book = new Book($connObj,'','','','','','');
$book->delete($id);

header('location:dashboard.php');