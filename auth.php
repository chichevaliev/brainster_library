<?php 
require_once __DIR__. '/autoload.php';
session_start();

$user = new User($connObj,'','','');
$allData = $user->return();

foreach ($allData as $user){

    
    $allUsername[]=$user['username'];
    $allPassword[]=$user['password'];
    $admin[] = $user['is_admin'];
    
   
}

$loginUsername = $_POST['loginUsername'];
$loginPassword = $_POST['loginPassword'];
$_SESSION['username']= $loginUsername;


for($i=0;$i<count($allUsername);$i++){
    if((md5($loginPassword) == $allPassword[$i]) && ($loginUsername ==$allUsername[$i]) ){
        if($admin[$i]){
            $_SESSION['admin']= true;
           
            
            header('location:dashboard.php');
            break;
        }
        $_SESSION['logged']=true;
        header('location:index.php');
        break;

}
else header('location:login.php?error=wrongCredentials'); }


