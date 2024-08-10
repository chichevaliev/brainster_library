<?php 
require_once __DIR__. '/autoload.php';

$id = $_GET['id'];
$author = new Author($connObj,'','','');
$author->delete($id);

header('location:dashboard.php');