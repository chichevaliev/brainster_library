<?php 
require_once __DIR__. '/autoload.php';




$id = $_POST['id'];

$note = new Note($connObj,'',$bookID);
$note->delete($id);

echo "Note is deleted successfully";