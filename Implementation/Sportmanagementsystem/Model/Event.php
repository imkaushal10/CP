<?php

class Event
{
    public $id, $name, $description, $image, $date, $venue, $type;

    public static function getAllEvents(){
        $conn = databaseConnect::connection();
        $stmt = $conn->prepare("SELECT * FROM event order by id desc");
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $conn->close();
        return $result;
    }

    public static function getEventById($id){
        $conn = databaseConnect::connection();
        $stmt = $conn->prepare("SELECT * FROM event WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $sqlResult = $stmt->get_result();
        $arrayResult = $sqlResult->fetch_assoc();
        $stmt->close();
        $conn->close();
        return $arrayResult;
    }

    public static  function addNewEvent(Event $e){
        $conn = databaseConnect::connection();
        $stmt = $conn->prepare("INSERT INTO event (name,type,description,date,venue,image) VALUES (?, ?, ?,?,?,?)");
        $stmt->bind_param("ssssss", $e->name, $e->type, $e->description, $e->date, $e->venue, $e->image);
        $result = $stmt->execute();
        $stmt->close();
        $conn->close();
        return $result;
    }

    public static function updateEventDetails(Event $e){
        $conn = databaseConnect::connection();
        $stmt = $conn->prepare("UPDATE event set name = ?, type = ?, description = ?, date = ?, venue = ?, image = ? WHERE id = ?");
        $stmt->bind_param("ssssssi", $e->name, $e->type, $e->description, $e->date, $e->venue, $e->image, $e->id);
        $result = $stmt->execute();
        $stmt->close();
        $conn->close();
        return $result;
    }

     public static function deleteEvent($id){
        $conn = databaseConnect::connection();
        $stmt = $conn->prepare("DELETE FROM  event WHERE id = ?");

        $stmt->bind_param("i", $id);
        $result = $stmt->execute();
        $stmt->close();
        $conn->close();
        return $result;
    }

     public static function getEventCount(){
        $conn = databaseConnect::connection();
        $stmt = $conn->prepare("SELECT COUNT(id) AS Count FROM event");
        $stmt->execute();
        $sqlResult = $stmt->get_result();
        $arrayResult = $sqlResult->fetch_assoc();
        $stmt->close();
        $conn->close();
        return $arrayResult["Count"];
    }


        public static function searchEvent($search){

        $conn = databaseConnect::connection();
        $stmt = $conn->prepare("SELECT * FROM event WHERE name like '%$search%' ");
        $stmt->execute();
        $searchResult = $stmt->get_result();
        $stmt->close();
        $conn->close();
        return $searchResult;
    }
}