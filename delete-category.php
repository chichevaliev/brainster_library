<?php 
require_once __DIR__. '/autoload.php';

$id = $_GET['id'];
$category = new Category($connObj,'');
$category->delete($id);

header('location:dashboard.php');