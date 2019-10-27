

<?php
include_once ("../Model/init.php");

if(isset($_POST["addevent"])){
    $msg = "";
    if(empty($_POST["name"])){
        $msg .= "Event name is required. </br>";
    }
    
    if(empty($_POST["type"])){
        $msg .= "Event type is required. </br>";
    }

    if(empty($_POST["description"])){
        $msg .= "Description of event is required. </br>";
    }
    
    if(empty($_POST["date"])){
        $msg .= "Event date is required. </br>";
    }
    
    if(empty($_POST["venue"])){
        $msg .= "Event venue is required. </br>";
    }

    if(empty($_FILES["image"]["name"])){
        $msg .= "Image of event to be featured is required. </br>";
    }

    if(!empty($msg)){
        Notify::notifyUser("error", $msg);
        header("Location: ../view/events.php");
        exit();
    }else{
        $validimages = array("jpg", "jpeg", "png", "svg");
        $imageType = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);

        if(in_array($imageType, $validimages)){

            $location = "../images/";
            $fileName = "Event_".date("YmdHis")."_".$_FILES["image"]["name"];
            $storedLocation = $location.$fileName;
            $imageLocation = $_FILES["image"]["tmp_name"];
            $success = move_uploaded_file("$imageLocation", "$storedLocation");

            if($success){
                $conn = databaseConnect::connection();
                $e = new Event();
                $e->name = $conn->real_escape_string($_POST["name"]);
                $e->type = $conn->real_escape_string($_POST["type"]);
                $e->description = $conn->real_escape_string($_POST["description"]);
                $e->date = $conn->real_escape_string($_POST["date"]);
                $e->venue = $conn->real_escape_string($_POST["venue"]);
                $e->image= $conn->real_escape_string($fileName);

                if(Event::addNewEvent($e)){
                    Notify::notifyUser("success", "New event has been added successfully.");
                }else{
                    Notify::notifyUser("error", "Sorry ! something went wrong.</br>Please try again later.");
                }


            }else{
                Notify::notifyUser("error", "Sorry ! something went wrong.</br>Please try again later.");
            }
            header("Location: ../view/admviewevent.php");
        }
    }
}

if(isset($_POST["updateevent"])){

    $msg = "";
    if(empty($_POST["name"])){
        $msg .= "Name of event is required. </br>";
    }
    
    if(empty($_POST["type"])){
        $msg .= "Event type is required. </br>";
    }

    if(empty($_POST["description"])){
        $msg .= "Description of training is required. </br>";
    }
    
    if(empty($_POST["date"])){
        $msg .= "Event date is required. </br>";
    }
    
    if(empty($_POST["venue"])){
        $msg .= "Event venue is required. </br>";
    }

    if(!empty($msg)){
        Notify::notifyUser("error", $msg);
        header("Location: ../view/events.php");
        exit();
    }else {

        $preEventDetails = Event::getEventById($_POST["id"]);
        $conn = databaseConnect::connection();
        $e = new Event();
        $e->image = $preEventDetails["image"];
        if (!empty($_FILES["image"]["name"])) {
            $validimages = array("jpg", "jpeg", "png", "svg");
            $imageType = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);

            if (in_array($imageType, $validimages)) {

                $location = "../images/";
                $fileName = "Event_" . date("YmdHis") . "_" . $_FILES["image"]["name"];
                $storedLocation = $location . $fileName;
                $imageLocation = $_FILES["image"]["tmp_name"];
                $success = move_uploaded_file("$imageLocation", "$storedLocation");

                if ($success) {
                    unlink("../images/" . $preEventDetails["image"]);
                    $e->image = $conn->real_escape_string($fileName);
                }else{
                    Notify::notifyUser("error", "File couldn't be saved.");
                    header("Location: ../view/events.php");
                    exit();
                }
            }else{
                Notify::notifyUser("error", "Invalid file format.</br> Please upload JPG, JPEG, PNG and SVG file.");
                header("Location: ../view/events.php");
                exit();
            }
        }

        $e->id = $conn->real_escape_string($_POST["id"]);
        $e->name = $conn->real_escape_string($_POST["name"]);
        $e->type = $conn->real_escape_string($_POST["type"]);
        $e->description = $conn->real_escape_string($_POST["description"]);
        $e->date = $conn->real_escape_string($_POST["date"]);
        $e->venue = $conn->real_escape_string($_POST["venue"]);

        if(Event::updateEventDetails($e)){           
            Notify::notifyUser("success", "Event details has been updated successfully.");
        }
        
        else{
            Notify::notifyUser("error", "Sorry ! something went wrong.</br>Please try again.");
        }
        header("Location: ../view/admviewevent.php");
    }
}

if(isset($_POST["DeleteEventId"])){
    $EventId  = $_POST["DeleteEventId"];
    $event = Event::getEventById($EventId);
    if(Event::deleteEvent($EventId)){
        unlink("../images/".$event["image"]);
        Notify::notifyUser("success", "Event has been deleted successfully.");
    }else{
        Notify::notifyUser("error", "Sorry ! something went wrong.</br>Please try again.");
    }
    header ("Location: ../view/admviewevent.php");
}


if(isset($_POST["search"])){
    if(empty($_POST["valuetosearch"]))
    {
        Notify::notifyUser("error","Search field is empty");
        header("Location: ../view/eventfrontview.php");
    }
    else if(!empty($_POST["valuetosearch"])){
    $search = $_POST["valuetosearch"];
    $searchResult = Event::searchEvent($search);
    }
}





