<?php
require_once __DIR__. '/autoload.php';
session_start();
if(!$_SESSION['admin']){
    header('location:index.php');
}
$id = $_GET['id'];
$editFirstName = $_GET['firstname'];
$editLastName = $_GET['lastname'];
$editBio = $_GET['bio'];


if( isset($_POST['edit-author-bio']) && strlen($_POST['edit-author-bio'])<20){
    header("location:edit-author.php?error=bio");
}

elseif(isset($_POST['edit-author-bio']) && (strlen($_POST['edit-author-bio'])>19))
{
    $firstName = $_POST['edit-author-firstname'];
    $lastName = $_POST['edit-author-lastname'];
    $bio = $_POST['edit-author-bio'];
   
    $author = new Author($connObj,$firstName,$lastName,$bio);
    $author->update($_POST['id']);
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

        <form class="welcome bg-white p-2" action="edit-author.php" method="POST">
        <?php if($_GET['error']== 'bio'){echo '<h4 class=text-danger>Your bio should have at least 20 characters</h4>';} ?>
  <div class="mb-3">
    <label for="edit-author-firstname" class="form-label">Author's First Name</label>
    <input type="text" class="form-control" id="edit-author-firstname" name="edit-author-firstname" aria-describedby="emailHelp" value=<?php echo $editFirstName?> required >
    
  </div>
  <div class="mb-3">
    <label for="edit-author-lastname" class="form-label">Author's Last Name</label>
    <input type="text" class="form-control" id="edit-author-lastname" name="edit-author-lastname" aria-describedby="emailHelp" value=<?php echo $editLastName?>  required>
    
  </div>
  <div class="mb-3">
    <label for="edit-author-bio" class="form-label">Author's Bio</label>
    <input type="text" class="form-control" id="edit-author-bio" name="edit-author-bio" aria-describedby="emailHelp" value=<?php echo $editBio?>  required>
    <div id="bioHelp" class="form-text text-danger">Bio shoud have minimum 20 characters </div>
    <input type='checkbox' value=<?php echo $id?>  name=id checked hidden>
    
  </div>
  
 
  <button type="submit" class="btn btn-primary">Submit</button>
</form>


        </div>

        <?php require_once __DIR__. "/segments/footer.php" ?>