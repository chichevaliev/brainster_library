<?php
require_once __DIR__. '/autoload.php';
session_start();
$id = $_GET['bookid'];
$username = $_SESSION['username'];
$book = new Book($connObj,'','','','','','');
$bookData = $book->returnRow($id);
$category1 = new Category($connObj,'');
$author1 = new Author($connObj,'','','');
$comment = new Comment($connObj,'','');
$approvedComments = $comment->returnAproved($id);
$note = new Note($connObj,'',$id);
$noteData = $note->return($username);
$jsonNotes = json_encode($noteData);
print_r($jsonNotes);
foreach ($bookData as $data)
$authorData = $author1->returnRow($data['author']);
$categoryData = $category1->returnRow($data['category']);
foreach ($authorData as $author)
foreach ($categoryData as $category)


require_once __DIR__. "/segments/header.php";
?>


  <body>

  
      
  
      </div>
  <div class="hero ">
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
      
    
    <div class="d-flex justify-content-center align-items-center">

    <div class="w=50 text-end"><img src="<?php echo $data['imageURL'];?>" style="width:40%; height:60%" alt=""></div>
    <div class=" w-50 text-start text-uppercase">
        <h3 class=" bg-light w-50"><?php echo $data['title']?></h3>
        <p class=" bg-light w-50" >Author :<?php echo $author['firstname'] .' '. $author['lastname']?> </p>
        <p class=" bg-light w-50">Released :<?php echo $data['release_year'] ?> </p>
        <p class=" bg-light w-50" >Number of pages :<?php echo $data['pages'] ?> </p>
        <p class=" bg-light w-50" >Category :<?php echo $category['type'] ?> </p>
    </div >
    </div>
    <?php if($_SESSION['logged']) { ?>
    <form action="add-comment.php" method="POST">
    <div class="form-floating w-50 offset-3 mt-4">
  <textarea class="form-control" placeholder="Leave a comment here" id="comment" name="comment"> </textarea>
  <label for="comment">Comments</label>
  <input type='checkbox' value="<?php echo $id?>"  name=id checked hidden>
  <button class="btn btn-primary" type="submit">Add Public Comment</button>
  </form>
  
  </div>
  <?php } ?> 
  <?php if($_SESSION['logged']) { ?>
    <form id="private-note-form">
    <div class="form-floating w-50 offset-3 mt-4">
  <textarea class="form-control" placeholder="Leave a private note here" id="note" name="note"> </textarea>
  <label for="note">Private Note</label>
  <input type='checkbox' value="<?php echo $id?>" id='noteCheck' name='noteCheck' checked hidden>
  <button class="btn btn-primary" id="private-note-btn" >Add Private Note</button>
  </form>
  <div id="success" class="text-success bg-light "></div>
  </div>
  <?php } ?> 
  <div class="row w-100">
  <div class=" col col-5 offset-1">
    <?php if (!empty($approvedComments)) {?>
<h4 class="text-center bg-light  mt-2 rounded">Comments </h4> <?php } ?>
<?php foreach ($approvedComments as $comment) {?>
  <div class="text-uppercase fw-bold mt-2 bg-light  rounded">
<p> User : <?php echo $comment['user'] ; ?></p>
<p> Comment : <?php echo "$comment[content]" ; if($_SESSION['username'] == $comment['user']) {echo " <span > <a href=delete-comment.php?id=$comment[id]><i  class='fa-solid fa-trash' style='color:red;'></i></a></span>" ;} ?></p>
</div> <?php } ?> </div>
<div class=" col-5 ">
  <?php if($notes['user']== $username)?>
<h4 class = "bg-light mt-2 text-center rounded"><?php if($_SESSION['logged'] && (!empty($noteData)) ){ ?>Private Notes</h4><?php } ?>
 <?php foreach($noteData as $notes)  { ?> 
  
  <p class="bg-light mt-2 text-center rounded"><?php echo $notes['content'];?> <a href="" id="edit-note" data-id = "<?php echo $notes['id'];?>"><i class= 'fas fa-edit'  ></i></a>  <a href="" id="delete-note" data-value="<?php echo $notes['id'] ?>" ><i  class='fa-solid fa-trash' style='color:red;'></i></a>  <?php } ?> </p>
  <p id="note-success" class="text-success"></p>
  
</div>
</div>
</div>
</div>  
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="./note.js"></script>
   
   <?php require_once __DIR__. "/segments/footer.php" ?>