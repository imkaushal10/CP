<?php
 include_once ("../Model/init.php");

if(isset($_POST["EventRegistrationConfirm"])){
    /*if(isset($_SESSION['email'])) {
     echo $_SESSION['email'];
    }*/
      
    $jsonData = array();
    $jsonData["isUserLogged"] = false;
    $jsonData["isSuccessful"] = false;

    if(!isset($_SESSION["email"])){
        Notify::notifyUser("error", "Please login to register in event.");
        header ('Location: ../view/login.php');
    }
    else{
        $event_id = $_POST["EventRegistrationConfirm"];
        $email = $_SESSION["email"];

        if(Registerinevent::registerUserinEvent($email,$event_id)){
            Notify::notifyUser("success", "Your registration in event has been completed successfully.");
            $jsonData["isUserLogged"] = true;
            $jsonData["isSuccessful"] = true;
        }else{
            Notify::notifyUser("error", "Sorry ! something went wrong.</br>Please try again later.");
        }
        header ('Location: ../view/eventfrontview.php');
    }

    /*echo json_encode($jsonData);*/
}


if(isset($_POST["EventRegistrationCancel"])){
    if(empty($_SESSION["email"]))
    {
       Notify::notifyUser("error", "You must login to cancel registered event."); 
       header('Location: ../view/login.php');   
       
    }
    else{
    $Cancel = $_POST["EventRegistrationCancel"];
    if(Registerinevent::deleteUserregistrationinEvent($Cancel)){
        Notify::notifyUser("success", "Your registration in event has been cancelled.");
    }else{
        Notify::notifyUser("error", "Sorry ! something went wrong.</br> Please try again later.");
    }

    header ('Location: ../view/eventfrontview.php');
    }

}

if(isset($_POST["DeleteRegistration"])){
    $EventId  = $_POST["DeleteRegistration"];
    $event = Event::getEventById($EventId);
    if(Event::deleteEvent($EventId)){
        unlink("../images/".$event["image"]);
        Notify::notifyUser("success", "Event has been deleted successfully.");
    }else{
        Notify::notifyUser("error", "Sorry ! something went wrong.</br>Please try again.");
    }
    header ("Location: ../view/admviewevent.php");
}

if(isset($_POST["deleteregistrationinevent"])){
    
    $RegEventId  = $_POST["deleteregistrationinevent"];
    $event = Registerinevent::deleteUserRegistrationInEvent($RegEventId);
    if(Registerinevent::deleteUserRegistrationInEvent($RegEventId)){
        Notify::notifyUser("success", "User Registration has been deleted successfully.");
    }else{
        Notify::notifyUser("error", "Sorry ! something went wrong.</br>Please try again.");
    }
    /*header ("Location: ../view/admuserregisteredinevent.php");*/
  }



