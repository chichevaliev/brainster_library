<?php
require_once __DIR__. '/autoload.php';
session_start();
if(!$_SESSION['admin']){
    header('location:index.php');
}

if( isset($_POST['author-bio']) && strlen($_POST['author-bio'])<20){
    header("location:add-author.php?error=bio");
}

elseif(isset($_POST['author-bio']) && (strlen($_POST['author-bio'])>19))
{
    $firstName = $_POST['author-firstname'];
    $lastName = $_POST['author-lastname'];
    $bio = $_POST['author-bio'];
    $author = new Author($connObj,$firstName,$lastName,$bio);
    $author->create();
    print_r($author);
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

        <form class="welcome bg-white p-5" action="add-author.php" method="POST">
        <?php if($_GET['error']== 'bio'){echo '<h4 class=text-danger>Your bio should have at least 20 characters</h4>';} ?>
  <div class="mb-3">
    <label for="author-firstname" class="form-label">Author's First Name</label>
    <input type="text" class="form-control" id="author-firstname" name="author-firstname" aria-describedby="emailHelp" required>
    
  </div>
  <div class="mb-3">
    <label for="author-lastname" class="form-label">Author's Last Name</label>
    <input type="text" class="form-control" id="author-lastname" name="author-lastname" aria-describedby="emailHelp" required>
    
  </div>
  <div class="mb-3">
    <label for="author-bio" class="form-label">Author's Bio</label>
    <input type="text" class="form-control" id="author-bio" name="author-bio" aria-describedby="emailHelp" required>
    <div id="bioHelp" class="form-text text-danger">Bio shoud have minimum 20 characters </div>
    
  </div>
  
 
  <button type="submit" class="btn btn-primary">Submit</button>
</form>


        </div>

        <?php require_once __DIR__. "/segments/footer.php" ?>
