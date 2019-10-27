<?php
include_once ("../Model/init.php");

if(isset($_POST["submitcontactinfo"])){
    $msg = "";
    if(empty($_POST["name"])){
        $msg .= "Name is required. </br>";
    }
    
    if(empty($_POST["email"])){
        $msg .= "Email is required. </br>";
    }
    
    if(empty($_POST["subject"])){
        $msg .= "Subject is required. </br>";
    }

    if(empty($_POST["message"])){
        $msg .= "Message is required. </br>";
    }
    
    if(!empty($msg)){
        Notify::notifyUser("error", $msg);
        header("Location: ../view/contact.php");
        exit();
    }else{
                $conn = databaseConnect::connection();
                $c = new Contact();
                $c->name = $conn->real_escape_string($_POST["name"]);
                $c->email = $conn->real_escape_string($_POST["email"]);
                $c->subject = $conn->real_escape_string($_POST["subject"]);
                $c->message = $conn->real_escape_string($_POST["message"]);

                if(Contact::submitcontactinfo($c)){
                    Notify::notifyUser("success", "Your contact info has been sent to admin successfully.");
                }else{
                    Notify::notifyUser("error", "Sorry ! something went wrong.</br>Please try again later.");
                }
                header ('Location: ../view/contact.php');

        }
}

if(isset($_POST["DeleteContactmessage"])){
    $ContactId  = $_POST["DeleteContactmessage"];
    $contact = Contact::getContactmessageById($ContactId);
    if(Contact::deleteContactmessage($ContactId)){
        Notify::notifyUser("success", "Contacted Message has been deleted successfully.");
    }else{
        Notify::notifyUser("error", "Sorry ! something went wrong.</br>Please try again.");
    }
    header ("Location: ../view/admviewmessage.php");
}




