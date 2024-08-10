<?php
require_once __DIR__. '/autoload.php';
session_start();
if(!$_SESSION['admin']){
    header('location:index.php');
}

if(!empty($_POST['category-title']))
{
    $title = $_POST['category-title'];
    $category = new Category($connObj,$title);
    $category->create();
    header('location:dashboard.php');

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

        <form class="welcome bg-white p-5" action="add-category.php" method="POST">
  <div class="mb-3">
    <label for="category-title" class="form-label">Add Category title</label>
    <input type="text" class="form-control" id="category-title" name="category-title" aria-describedby="emailHelp" required>
    
  </div>
 
  <button type="submit" class="btn btn-primary">Submit</button>
</form>


        </div>

        <?php require_once __DIR__. "/segments/footer.php" ?>
