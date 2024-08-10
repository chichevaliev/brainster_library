<?php require_once __DIR__. "/segments/header.php"; ?>


  <body>
  <div class="hero">
  
  <div class="container-fluid d-flex justify-content-between">
    <a class="navbar-brand badge text-white bg-dark " href="index.php" style="font-size: 25px;">Brainster Library</a>
    
      <div>
        <a href="" class="btn btn-dark">Login</a>
        <a href="register.php" class="btn btn-dark">Register</a>
        </div>
      </div>
      <form class="welcome border p-5 bg-light" method="POST" action="auth.php">
      <?php if($_GET['error']== 'wrongCredentials'){echo '<h4 class=text-danger>Please enter correct credentials</h4>';} ?>
        <h3>Login Form</h3>
        
  <div class="mb-3">
    <label for="loginUsername" class="form-label">Username</label>
    <input type="text" class="form-control" id="loginUsername"  name = "loginUsername" aria-describedby="emailHelp" required>
  </div>
  <div class="mb-3">
    <label for="loginPassword" class="form-label">Password</label>
    <input type="password" class="form-control" id="loginPassword" name= "loginPassword" required>
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
  </div>

      </div>
   
    
      <?php require_once __DIR__. "/segments/footer.php" ?>