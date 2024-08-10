<?php
require_once __DIR__ . "/classes/db.php";
require_once __DIR__ . "/classes/user.php";
require_once __DIR__. "/classes/category.php";
require_once __DIR__. "/classes/author.php";
require_once __DIR__. "/classes/book.php";
require_once __DIR__. "/classes/comments.php";
require_once __DIR__. "/classes/note.php";




$createConn = new Connection("mysql", "localhost", "brainster_library", "root", "");
$createConn->connect();
$connObj = $createConn->getConnection();
