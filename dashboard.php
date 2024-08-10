<?php
require_once __DIR__. '/autoload.php';
session_start();
if(!$_SESSION['admin']){
    header('location:index.php');
}
$category = new Category($connObj,'');
$categoryData = $category->return();
$author = new Author($connObj,'','','');
$authorData = $author->return();
$book = new Book($connObj,'','','','','','');
$booksData = $book->return();
$comment = new Comment($connObj,'','');
$allComents = $comment->return();
$disaprovedComments = $comment->returnDisaproved();


require_once __DIR__. "/segments/header.php";
?>

  <body>
  <div class="hero">
  
  <div class="container-fluid d-flex justify-content-between">
    <a class="navbar-brand badge text-white bg-dark " href="index.php" style="font-size: 25px;">Brainster Library</a>
    
      <div>
        
        <a href="logout.php" class="btn btn-dark">Logout</a>
        </div>
        
      </div>
      <div class="container-fluid">
        <div class="row">
          <div class="col col-lg-6">
          <div class="mb-3">
            <h5 class="text-center text-body-emphasis">CATEGORIES</h5>
      <table class="table table-hover">
       
      <thead>
          <th>Title</th>
          <th>Action</th>
          
        </thead>
        <?php foreach($categoryData as $data){ 
         echo "<tr>
        <td> $data[type] </td>
        <td><a href=edit-category.php?data=$data[type]&id=$data[id]><i class= 'fas fa-edit'  ></i></a><a href=delete-category.php?id=$data[id]> <i class='fa-solid fa-trash' style='color:red;'></i></a></td>
        </tr>"; }?>
       
  
</table>
<a href="add-category.php" class="btn btn-dark">Add New Category</a>
  
</div>
          </div>
          <div class="col col-lg-6">
          <div class="mb-3">
          <h5 class="text-center text-body-emphasis">AUTHORS</h5>
      <table class="table table-hover">
        
      <thead>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Bio</th>
          <th>Action</th>
        </thead>
        <?php foreach($authorData as $author){
          echo "<tr>
          <td>$author[firstname]</td>
          <td>$author[lastname]</td>
          <td>$author[bio]</td>
          <td><a href=edit-author.php?firstname=$author[firstname]&id=$author[id]&lastname=$author[lastname]&bio=$author[bio]><i class= 'fas fa-edit'  ></i></a><a href=delete-author.php?id=$author[id]> <i class='fa-solid fa-trash' style='color:red;'></i></a></td>
          </tr>";
        } ?>
       
  
</table>
<a href="add-author.php" class="btn btn-dark">Add New Author</a>
</div>
</div>

<div class="row">
<div class="col-6 col-lg-12">
          <div class="mb-3">
          <h5 class="text-center text-body-emphasis">BOOKS</h5>
      <table class="table table-hover">
        
      <thead>
          <th>Title</th>
          <th>Author</th>
          <th>Year of publishing</th>
          <th>Number of pages</th>
          <th>Image URL</th>
          <th>Category</th>
          <th>Action</th>
        </thead>
        <?php foreach($booksData as $bookData){ echo "<tr>
          <td>$bookData[title]</td>
          <td>$bookData[firstname] $bookData[lastname]</td>
          <td>$bookData[release_year]</td>
          <td>$bookData[pages]</td>
          <td>$bookData[imageURL]</td>
          <td>$bookData[type]</td>
          <td><a href=edit-book.php?id=$bookData[id]><i class= 'fas fa-edit'  ></i></a><a class='delete' href=delete-book.php?id=$bookData[id]> <i  class='fa-solid fa-trash' style='color:red;'></i></a></td>
          
          </tr>";
      } ?>
        
       
  
</table>
<a href="add-book.php" class="btn btn-dark">Add New Book</a>

  
</div>
</div>
         
        </div>
        <div class="row">
<div class="col-6 col-lg-12">
          <div class="mb-3">
          <h5 class="text-center text-body-emphasis">REVIEW COMMENTS</h5>
      <table class="table table-hover">
        
      <thead>
          <th>Comment</th>
          <th>For book</th>
          <th>Action</th>
        </thead>
        <?php foreach($allComents as $comments){ echo "<tr>
          <td>$comments[content] </td>
          <td>$comments[title] </td>
          <td><a href='approve-comment.php?bookid=$comments[bookID]'><i class='fas fa-check-circle' style='color: #63E6BE;'></i> </a> <a href=disaprove-comment.php?bookid=$comments[bookID]><i class='fa-solid fa-x text-danger'></i></a></td>
          
          </tr> ";}?>
        </table>


  
</div>
</div>
         
        </div>
        <div class="row">
<div class="col-6 col-lg-12">
          <div class="mb-3">
          <h5 class="text-center text-body-emphasis">DISAPROVED COMMENTS</h5>
      <table class="table table-hover">
        
      <thead>
          <th>Comment</th>
          <th>For book</th>
          <th>Approve</th>
        </thead>
        <?php foreach($disaprovedComments as $disapproved){ echo "<tr>
          <td>$disapproved[content] </td>
          <td>$disapproved[title] </td>
          <td><a href='approve-comment.php?bookid=$disapproved[bookID]'><i class='fas fa-check-circle' style='color: #63E6BE;'></i> </a> </td>
          
          </tr> ";}?>
        </table>
      </div>
     
  </div>
  <?php require_once __DIR__. "/segments/footer.php" ?>