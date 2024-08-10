<?php
require_once __DIR__. '/autoload.php';
session_start();
extract($_POST);

$note = $_POST['note'];
$id =  $_POST['noteCheck'];
$user = $_SESSION['username'];

$newNote = new Note($connObj,$note,$id);
$newNote->create($user);

echo "Note submited succesfully";


