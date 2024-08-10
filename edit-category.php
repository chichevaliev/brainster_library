<?php
require_once __DIR__. '/autoload.php';
session_start();

$data = $_GET['data'];
$id = $_GET['id'];
if(!$_SESSION['admin']){
    header('location:index.php');
}



if(!empty($_POST['edit-category-title']))
{
    
    $id = $_POST['id'];
    $title = $_POST['edit-category-title'];
    $category = new Category($connObj,$title);
    $category->update($id);
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

        <form class="welcome" action="edit-category.php" method="POST">
  <div class="mb-3">
    <label for="category-title" class="form-label">Edit Category title</label>
    <input type="text" class="form-control" id="edit-category-title" name="edit-category-title" aria-describedby="emailHelp" value="<?php echo "$data"  ?>" required>
    <input type='checkbox' value="<?php echo $id?>"  name=id checked hidden>
  </div>
 
  <button type="submit" class="btn btn-primary">Edit</button>
</form>


        </div>

        <?php require_once __DIR__. "/segments/footer.php" ?>
