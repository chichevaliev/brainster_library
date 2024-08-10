<?php  

require_once __DIR__. '/autoload.php';




$id = $_POST['id'];
$note = $_POST['note'];

$note = new Note($connObj,$note,'');
$note->update($id);


echo "Private node is edited";