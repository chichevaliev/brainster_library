<?php 
require_once __DIR__. '/autoload.php';

$email = $_POST['registerEmail'];
  $username = $_POST['registerUsername'];
  $password = $_POST['registerPassword'];
  $user = new User($connObj,$email,$password,$username);
  $usersData = $user->return();
  foreach ($usersData as $singleUser){

    
    $allUsername[]=$singleUser['username'];
    $allPassword[]=$singleUser['password'];
   
};

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  if ((empty($_POST['registerEmail'])) || (!filter_var($_POST['registerEmail'], FILTER_VALIDATE_EMAIL))){
    header("Location:register.php?error=invalidEmail");
    
    
}
elseif((empty($_POST['registerUsername'])) || (strlen($_POST['registerUsername'])<3) ) {
  header("Location:register.php?error=invalidUsername");
}
elseif((!empty($_POST['registerPassword'])) &&  (preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/', $_POST['registerPassword']))){


  if(in_array($username,$allUsername)){
    header('location:register.php?error=usernameTaken');
  } else { $user->create();
    header('location:login.php');}
  
 
 }

else {
  header("Location:register.php?error=invalidPassword");
};

};


require_once __DIR__. "/segments/header.php";

?>



  <body>
  <div class="hero">
  
  <div class="container-fluid d-flex justify-content-between">
    <a class="navbar-brand badge text-white bg-dark " href="index.php" style="font-size: 25px;">Brainster Library</a>
    
      <div>
        <a href="login.php" class="btn btn-dark">Login</a>
        <a href="register.php" class="btn btn-dark">Register</a>
        </div>
      </div>
      <form class="welcome border p-5 bg-light" method="POST" action="register.php">

        <p class="text-warning"><?php  if($_GET['error']=='invalidEmail'){echo 'Please enter valid email';}?> </p>
        <p class="text-warning"><?php  if($_GET['error']=='invalidUsername'){echo 'Please enter valid username';}?> </p>
        <p class="text-warning"><?php  if($_GET['error']=='usernameTaken'){echo 'This username is already taken, please try with different one';}?> </p>
        <p class="text-warning"><?php  if($_GET['error']=='invalidPassword'){echo 'Your password must contain at least 1 lowercase letter, 1 uppercase letter and 1 number';}?> </p>
        <h3>Register Form</h3>
        <div class="mb-3">
    <label for="registerEmail" class="form-label">Email address</label>
    <input type="email" class="form-control" id="registerEmail"  name = "registerEmail" aria-describedby="emailHelp" required>
    <div id="emailHelp" class="form-text text-danger">Please enter valid email adress</div>
  </div>
  <div class="mb-3">
    <label for="registerUsername" class="form-label">Username</label>
    <input type="text" class="form-control" id="registerUsername"  name = "registerUsername" aria-describedby="emailHelp" required>
    <div id="usernamelHelp" class="form-text text-danger">Username shoud have minimum 3 characters </div>
  </div>
  <div class="mb-3">
    <label for="registerPassword" class="form-label">Password</label>
    <input type="password" class="form-control" id="registerPassword" name= "registerPassword" required>
    <div id="passwordHelp" class="form-text media text-danger">Password must contain at least 1 lowercase letter, 1 uppercase letter and 1 number.</div>
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
  </div>

      </div>
   
    
      <?php require_once __DIR__. "/segments/footer.php" ?>