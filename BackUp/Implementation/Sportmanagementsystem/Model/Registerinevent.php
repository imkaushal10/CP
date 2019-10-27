<?php
class Registerinevent
{
    
    /*public static function getAllRegistrationinEventByUser(){
        $conn = databaseConnect::connection();
        $stmt = $conn->prepare("SELECT E.id as event_id, E.name, E.image, RE.id as reginevent_id, RE.username FROM event E,  registerin_event RE WHERE RE.event_id = E.id and RE.id = ?");
        $query = "SELECT E.id as event_id, E.name, E.image FROM event E INNER JOIN registerin_event ON event.id = registerin_event.event_id ";

        $result = mysqli_query($conn, $query) or die ( mysqli_error());
        $row = mysqli_fetch_assoc($result);
        $conn->close();

        return $result;
    }*/
    
        public static function deleteUserRegistrationInEvent($reginevent_id){
        $conn = databaseConnect::connection();
        $stmt = $conn->prepare("DELETE FROM  registerin_event WHERE reginevent_id = ?");

        $stmt->bind_param("i", $reginevent_id);
        $result = $stmt->execute();
        $stmt->close();
        $conn->close();
        return $result;
    }
    
  public static function getAllRegistrationinEventByUser(){
        $conn = databaseConnect::connection();
        $stmt = $conn->prepare("SELECT * FROM registerin_event");
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $conn->close();
        return $result;
    }
    

    
    public static  function registerUserinEvent($email,$eventid){
        $conn = databaseConnect::connection();
        $stmt = $conn->prepare("INSERT INTO registerin_event (username,event_id) VALUES (?,?)");
        $stmt->bind_param("si",$email,$eventid);

        $result = $stmt->execute();
        $stmt->close();
        $conn->close();
        return $result;
    }
    
    
    
    

}