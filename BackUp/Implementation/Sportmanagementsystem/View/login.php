<?php
require_once("../Model/init.php");
require_once("../includes/header.php");
require_once("../includes/notification.php");
/*if(empty($_SESSION['user'])){
    Notify::notifyUser("error", "Access Denied");
 	$_SESSION['error']= "Access denied!";
  	header('location: ../view/login.php');
  	exit;   
 }*/
?>

<div class="container-fluid vh-100 bg-dark">
	<div class="row mx-3">
        <div class="col-md-4 offset-md-4 bg-light card mt-5">
            <div class="text-center ">
                <h3>LOGIN</h3>
            </div>

             <form class="card-body" action="../Controller/logincontroller.php" method="POST" enctype="multipart/form-data">

                <div class="card-body">
                <div class="form-group">
                    <label>Email</label>
                <input type="email" name="email" placeholder="Enter your email" class="form-control">
                </div>
            
                <div class="form-group">
                 <label>Password</label>
                <input type="password" name="password" placeholder="Enter your password" class="form-control">
                </div>
                    
                <div class="form-group">   
                <input type="radio" name="role" value="User">&nbsp User<br>
                <input type="radio" name="role" value="Admin">&nbsp Admin    
                </div>
                 
                <div class="form-group">
                   <input type="checkbox">&nbsp<label>Remember Me</label> 
                </div>    
                </div>
             
                <div class="card-footer">
                <div class="form-group text-center">
                  <input type="submit" class="btn btn-primary"  value="Login" name="login"><br><br>
                    <a href='register.php'>Don't have an account?</a>
                </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php

//include_once("../includes/footer.php");
