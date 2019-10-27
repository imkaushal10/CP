<?php
class User
{
    public $id, $name, $email, $password, $role, $isAuthenticated;

    public function validateUser($email, $password){
        $isValidUser = false;
        $user = new User;
        $user->isAuthenticated = false;

        $conn = databaseConnect::connection();
        $stmt = $conn->prepare("select * from user where email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0){
            $userDetails = $result->fetch_assoc();
            $user->id = $userDetails["id"];
            $user->eamil = $userDetails["email"];
            $user->name = $userDetails["name"];
            $user->password = $userDetails["password"];
            $user->role = $userDetails["role"];
            

            if($user->password == $password){

                $user->isAuthenticated = true;
                $_SESSION["loggedin_user"] =  new User;
                $_SESSION["loggedin_user"] = serialize($user);

                $isValidUser = true;
            }
        }else{
            $isValidUser = false;
            Notify::notifyUser("error", "Invalid login credentials.");
            header ('Location: ../view/login.php');
        }
        $conn->close();
        return $isValidUser;
    }

    public function getAllUsers(){
        $conn = databaseConnect::connection();
        $query = "select * from user";
        $run = $conn->query($query);
        $conn->close();
        return $run;
    }


    public function deleteUser($id){
        $conn = databaseConnect::connection();
        $stmt = $conn->prepare("DELETE FROM user WHERE id = ?");

        $stmt->bind_param("i", $id);
        $result = $stmt->execute();
        $stmt->close();
        $conn->close();
        return $result;
    }

    public function addUsers(User $a){
        $conn = databaseConnect::connection();
        $query = "INSERT INTO user (name,email,password) VALUES ('$a->name', '$a->email','$a->password')";
        $conn->query($query);
        if($conn->affected_rows > 0){
            Notify::notifyUser("success", $a->name . " ,your account has been created successfully.You may now login.");
            header("Location: ../view/login.php");
        }else{
            Notify::notifyUser("error", "Something went wrong please try again .");
            header("Location: ../view/register.php");
        }
        $conn->close();
    }

     public static function getUserById($id){
        $conn = databaseConnect::connection();
        $stmt = $conn->prepare("SELECT * FROM user WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $sqlResult = $stmt->get_result();
        $arrayResult = $sqlResult->fetch_assoc();
        $stmt->close();
        $conn->close();
        return $arrayResult;
    }
    
    public static function getUserObject($id){
        $conn = databaseConnect::connection();
        $query = "SELECT * FROM user WHERE id = ".$id ;
        $result = $conn->query($query);
        $User = $result->fetch_assoc();
        $conn->close();
        return $User;

    }

    public function updateUser(User $user){
        $conn = databaseConnect::connection();
        $query = "UPDATE user SET name = '$user->name', email = '$user->email',password = '$user->password' WHERE id = $user->id";
        $conn->query($query);
        if($conn->affected_rows > 0){
            Notify::notifyUser("success", $user->name . " details has been updated successfully.");
            header("Location: ../profile.php");
        }else{
            Notify::notifyUser("info", $user->name . " details has been saved without any changes.");
            header("Location: ../profile.php");
        }
        $conn->close();
    }

    public function searchUsers($search){

        $conn = databaseConnect::connection();
        $query = "select * from user where name like '%".$search."%' or email like '%". $search ."%'";
        $run = $conn->query($query);
        $conn->close();
        return $run;
    }

    public static function getUserRole($id){
        $role = "";
        $conn = databaseConnect::connection();
        $query = "select role from user where id = ".$id;
        $run = $conn->query($query);
        if($run->num_rows > 0){
            $userDetails = $run->fetch_assoc();
            $role = $userDetails["role"];
        }
        $conn->close();
        return $role;
    }

    public static function getUserCount(){
        $conn = databaseConnect::connection();
        $stmt = $conn->prepare("SELECT COUNT(id) AS UserCount FROM user");
        $stmt->execute();
        $sqlResult = $stmt->get_result();
        $arrayResult = $sqlResult->fetch_assoc();
        $count = $arrayResult["UserCount"];
        $stmt->close();
        $conn->close();
        return $count;
    }

    public static function checkEmailExists($email){
        $conn = databaseConnect::connection();
        $stmt = $conn->prepare("SELECT COUNT(id) AS UserCount FROM user WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $sqlResult = $stmt->get_result();
        $arrayResult = $sqlResult->fetch_assoc();
        $count = $arrayResult["UserCount"];
        $stmt->close();
        $conn->close();

        if($count > 0){
            return true;
        }else{
            return false;
        }
    }
}