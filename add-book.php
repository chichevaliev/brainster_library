<?php
require_once __DIR__. '/autoload.php';
session_start();
if(!$_SESSION['admin']){
    header('location:index.php');
}

$category = new Category($connObj,'');
$author = new Author($connObj,'','','');
$categoryData = $category->return();
$authorData =$author->return();


if(!empty($_POST)){
    $bookTitle= $_POST['book-title'];
    $author = $_POST['author'];
    $year = $_POST['year'];
    $pages = $_POST['pages'];
    $imageURL = $_POST['image'];
    $postCategory = $_POST['category'];
    $book = new Book($connObj,$bookTitle,$author,$year,$pages,$imageURL,$postCategory);
    $book->create();
    header("location:dashboard.php");

}






require_once __DIR__. "/segments/header.php";
?>

<body>
  <div class="hero">
  
  <div class="container-fluid d-flex justify-content-between">
    <a class="navbar-brand badge text-white bg-dark " href="index.php" style="font-size: 25px;">Brainster Library</a>
    
      <div>
      <a href="dashboard.php" class="btn btn-dark">Dashboard</a>
        <a href="logout.php" class="btn btn-dark">Logout</a>
        </div>
        </div>

        <form class="welcome bg-white p-5" action="add-book.php" method="POST">
  <div class="mb-3">
    <label for="book-title" class="form-label">Add Book title</label>
    <input type="text" class="form-control" id="book-title" name="book-title" aria-describedby="emailHelp" required>
    
  </div>
  <select class="form-select form-select-lg mb-3" aria-label="Large select example" name="author" required>
  <option selected>Choose Author</option>
  <?php foreach($authorData as $author){
    echo "<option value=$author[id]>$author[firstname] $author[lastname]</option>";
  } ?>
  
</select>
<div class="mb-3">
    <label for="year" class="form-label">Add Book release year</label>
    <input type="number" class="form-control" id="year" name="year" aria-describedby="emailHelp" required>
    
  </div>
  <div class="mb-3">
    <label for="pages" class="form-label">Add Book number of pages</label>
    <input type="number" class="form-control" id="pages" name="pages" aria-describedby="emailHelp" required>
    
  </div>
  <div class="mb-3">
    <label for="image" class="form-label">Add Book image URL</label>
    <input type="text" class="form-control" id="image" name="image" aria-describedby="emailHelp" required>
    
  </div>
  <select class="form-select form-select-lg mb-3" aria-label="Large select example" name="category" required>
  <option selected>Choose Category</option>
  <?php foreach($categoryData as $category) { echo "<option value=$category[id]> $category[type] </option>" ;} ?>
  
  
</select>
 
  <button type="submit" class="btn btn-primary">Submit</button>
</form>


        </div>

        <?php require_once __DIR__. "/segments/footer.php" ?>
