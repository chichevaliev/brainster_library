<?php
require_once __DIR__. '/autoload.php';
session_start();
$book = new Book($connObj,'','','','','','');
$booksData = $book->return();
$category = new Category($connObj,'');
$categoryData = $category->return();


require_once __DIR__. "/segments/header.php";
?>


  <body>
  <div class="hero">
  
  <div class="container-fluid d-flex justify-content-between">
    <a class="navbar-brand badge text-white bg-dark " href="index.php" style="font-size: 25px;">Brainster Library</a>
    
      <div>
    <?php  if($_SESSION['logged']){ ?>
      <a href="logout.php" class="btn btn-dark">Logout</a> <?php  ?>
        <?php } elseif($_SESSION['admin']) { ?> 
          <a href="dashboard.php" class="btn btn-dark">Dashboard</a>
        <a href="logout.php" class="btn btn-dark">Logout</a> <?php  ?> 
        <?php } elseif((!$_SESSION['logged']) && (!$_SESSION['admin'])) { ?> 
          <a href="login.php" class="btn btn-dark">Login</a> <?php  ?> 
          <a href="register.php" class="btn btn-dark">Register</a> <?php } ?> 
        </div>
      </div>
      <div class="welcome text-center  ">
      <h1 class="display-2 bg-transparent">Welcome to Brainster Library</h1>
      <a href="#books-container" class="btn btn-dark">View all books</a>
      </div>
  </div>
  
      </div>
      <div id="books-container" class="container-fluid">
        <?php foreach($categoryData as $data) {echo " <div class='btn-group mb-5' role='group' aria-label='Basic checkbox toggle button group'>
  <input type='checkbox' class='btn-check checkbox' id='$data[id]' data-id='$data[type]'  autocomplete='off'>
  <label class='btn btn-outline-dark' for='$data[id]'>$data[type]</label> </div>" ;}?>
        <div class="row d-flex justify-content-between">
            <?php foreach($booksData as $bookData){echo "<div class= '$bookData[type] card p-3 mb-5' style='width: 18rem;'>
           <div class= 'h-100'>
            <img src=$bookData[imageURL] class='card-img-top h-100'   $bookData[type]' alt='card image'>
         </div>
  
  <div class='card-body '>
    <h5 class='card-title'>$bookData[title]</h5>
    <p class='card-text'>$bookData[type]</p>
    <p class='card-text'>Author : $bookData[firstname] $bookData[lastname]</p>
    <p class='card-text'>Released : $bookData[release_year] </p>
    <p class='card-text'>Number of pages : $bookData[pages]</p>
    <a href='view-book.php?bookid=$bookData[id]' class='btn btn-primary '>View Book</a>
    </div>
</div>"; }?> 
        
        </div>
        </div>

        
    

        
   
    <?php require_once __DIR__. "/segments/footer.php" ?>
    