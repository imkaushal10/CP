<?php

include_once ("../Model/init.php");
if (isset($_REQUEST['email'])||isset($_REQUEST['password'])||($_REQUEST['id'])){
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];
    $_SESSION['email'] = $email;
    $_SESSION['password'] = $password;
}
if(isset($_POST["login"])){
    $error = null;
    if(empty($_POST["email"])){
        $error = "Email is required.<br />";
    }

    if(empty($_POST["password"])){
        $error =  "Password is required.";
    }

    if(!empty($error)){
        Notify::notifyUser("error" , $error);
        header("Location: ../view/login.php");
        exit();
    }
    
    $conn = databaseConnect::connection();
    $email = $conn->real_escape_string($_POST["email"]);
    $password = $conn->real_escape_string($_POST["password"]);
    $role = $conn->real_escape_string($_POST["role"]);
    $conn->close();

    $user = new User();
    $isValidUser = $user->validateUser($email, $password, $role);

    if($isValidUser){
        //header("Location: ../view/index.php");
        if(($role =='User') && ($_SESSION['email'] != "kb@hotmail.com")){
         Notify::notifyUser("info", "Welcome ". $_SESSION['email']);    
         header("Location: ../view/index.php");
        }
        else if(($role =='User') && ($_SESSION['email'] = "kb@hotmail.com")){
         Notify::notifyUser( "error","Invalid login! You are Admin.");    
         header("Location: ../view/login.php");
        }
        else if(($role =='Admin') && ($_SESSION['email'] == "kb@hotmail.com")){
         Notify::notifyUser("info", "Welcome to Admin Dashboard ". $_SESSION['email']);    
         header("Location: ../view/admindashboard.php");    
        }
       else if(($role =='Admin') && ($_SESSION['email'] != "kb@hotmail.com")){
        Notify::notifyUser( "error","Invalid login! You don't have permission to access as Admin.");

        header("Location: ../view/login.php");
         }
   }
   else{
       Notify::notifyUser( "error","Invalid Email/Password.");
       header("Location: ../view/login.php"); 
   }
}


/*if(isset($_GET["logout"]) && $_GET["logout"] == true){
    unset($_SESSION["loggedin_user"]);
    header("Location: ../view/index.php");
}*/