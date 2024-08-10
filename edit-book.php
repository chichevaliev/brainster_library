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
$id = $_GET['id'];
$Book = new Book($connObj,'','','','','','');
$bookRow=$Book->returnRow($id);

foreach($bookRow as $row){


};





if(!empty($_POST)){
    $id = $_POST['id'];
    $bookTitle= $_POST['edit-book-title'];
    $author = $_POST['edit-author'];
    $year = $_POST['edit-year'];
    $pages = $_POST['edit-pages'];
    $imageURL = $_POST['edit-image'];
    $postCategory = $_POST['edit-category'];
    $book = new Book($connObj,$bookTitle,$author,$year,$pages,$imageURL,$postCategory);
    print_r($_POST);
   
    $book->update($id);
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

        <form class="welcome bg-white p-5" action="edit-book.php" method="POST">
  <div class="mb-3">
    <label for="edit-book-title" class="form-label">Add Book title</label>
    <input type="text" class="form-control" id="edit-book-title" name="edit-book-title" aria-describedby="emailHelp" value="<?php echo $row['title'];?>" required>
    
  </div>
  <select class="form-select form-select-lg mb-3" aria-label="Large select example" name="edit-author" required>
  <option selected >Choose Author</option>
  <?php foreach($authorData as $author){
    echo "<option value=$author[id]>$author[firstname] $author[lastname]</option>";
  } ?>
  
</select>
<div class="mb-3">
    <label for="edit-year" class="form-label">Add Book release year</label>
    <input type="number" class="form-control" id="edit-year" name="edit-year" aria-describedby="emailHelp" value="<?php echo $row['release_year'];?>" required>
    
  </div>
  <div class="mb-3">
    <label for="edit-pages" class="form-label">Add Book number of pages</label>
    <input type="number" class="form-control" id="edit-pages" name="edit-pages" aria-describedby="emailHelp" value="<?php echo $row['pages'];?>" required>
    
  </div>
  <div class="mb-3">
    <label for="edit-image" class="form-label">Add Book image URL</label>
    <input type="text" class="form-control" id="edit-image" name="edit-image" aria-describedby="emailHelp" value="<?php echo $row['imageURL'];?>" required>
    
  </div>
  <select class="form-select form-select-lg mb-3" aria-label="Large select example" name="edit-category" required>
  <option selected>Choose Category</option>
  <?php foreach($categoryData as $category) { echo "<option value=$category[id]> $category[type] </option>" ;} ?>
  
  
</select>
<input type='checkbox' value='<?php echo $id?>'  name="id" checked hidden >
  <button type="submit" class="btn btn-primary">Edit</button>
  

</form>


        </div>

        <?php require_once __DIR__. "/segments/footer.php" ?>
