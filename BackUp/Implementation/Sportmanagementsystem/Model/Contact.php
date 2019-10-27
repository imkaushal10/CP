<?php

class Contact{
    public $id, $name , $email , $subject, $message;
    
    
  public static  function submitcontactinfo(Contact $c){
        $conn = databaseConnect::connection();
        $stmt = $conn->prepare("INSERT INTO contact (name,email,subject,message) VALUES (?, ?, ?,?)");
        $stmt->bind_param("ssss", $c->name, $c->email, $c->subject, $c->message);
        $result = $stmt->execute();
        $stmt->close();
        $conn->close();
        return $result;
    }

    public static function getAllcontactmessage(){
        $conn = databaseConnect::connection();
        $stmt = $conn->prepare("SELECT * FROM contact");
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $conn->close();
        return $result;
    }
    
     public static function deleteContactmessage($id){
        $conn = databaseConnect::connection();
        $stmt = $conn->prepare("DELETE FROM  contact WHERE id = ?");

        $stmt->bind_param("i", $id);
        $result = $stmt->execute();
        $stmt->close();
        $conn->close();
        return $result;
    }
    
     public static function getContactmessageById($id){
        $conn = databaseConnect::connection();
        $stmt = $conn->prepare("SELECT * FROM contact WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $sqlResult = $stmt->get_result();
        $arrayResult = $sqlResult->fetch_assoc();
        $stmt->close();
        $conn->close();
        return $arrayResult;
    }
}