<?php

/*session_start();*/
include_once ("../Model/init.php");

$user = new User();

/*if(isset($_POST["deleteUserID"])){
    $id = $_POST["deleteUserID"];
    $user->deleteUser($id);
}*/

if(isset($_POST["deleteUserId"])){
    $UserId  = $_POST["deleteUserId"];
    $user = User::getUserById($UserId);
    if(User::deleteUser($UserId)){
        Notify::notifyUser("success", "User has been deleted successfully.");
    }else{
        Notify::notifyUser("error", "Sorry ! something went wrong.</br>Please try again.");
    }
    header ("Location: ../view/admviewusers.php");
}

/*
if(isset($_POST["resetAttempt"])){
    $id = $_POST["resetAttempt"];
    $adminUser->resetFailedAttempt($id);
}
*/

if(isset($_POST["adduser"])){
    $error = null;
    
    if(User::checkEmailExists($_POST["email"])){
        $error = "Email already exists.";
        
    }

    if(empty($_POST["name"])){ $error .= "Please enter full name. </br>"; }

    if(empty($_POST["email"])){ $error .= "Please enter email. </br>"; }

    if(empty($_POST["password"])){ $error .= "Please enter password. </br>"; }

    if(empty($_POST["cpassword"])){ $error .= "Please enter confirm password. </br>"; }

    if(!empty($_POST["password"]) && !empty($_POST["cpassword"])){
        if($_POST["password"] != $_POST["cpassword"]){
            $error .= "Password and confirm password dosen't match. </br>";
        }
    }
    if(!empty($error)){
        Notify::notifyUser("error", $error);
        header("Location: ../view/register.php");//-------------//
        exit();
    }
    $conn= databaseConnect::connection();
    $user= new User();
    $user->name = $conn->real_escape_string($_POST["name"]);
    $user->email = $conn->real_escape_string($_POST["email"]);
    $user->password = $conn->real_escape_string($_POST["password"]);
    $user->role = $conn->real_escape_string($_POST["role"]);

    $user->addUsers($user);
}

?>
