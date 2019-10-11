<?php

class Auth{

	public static function getRole(){
		$loggedInUser = unserialize($_SESSION["loggedin_user"]);
		$role = $loggedInUser->role;
		return $role;
	}
	
	public static function getID(){
		$loggedInUser = unserialize($_SESSION["loggedin_user"]);
		$id = $loggedInUser->id;
		return $id;
	}
	
	public static function isAuth(){
		$loggedInUser = unserialize($_SESSION["loggedin_user"]);
		$isAuthenticated = $loggedInUser->isAuthenticated;
		return $isAuthenticated;
	}

	public static function getUsername(){
        $loggedInUser = unserialize($_SESSION["loggedin_user"]);
        $email = $loggedInUser->email;
        return $username;
    }

    public static function getFullName(){
        $loggedInUser = unserialize($_SESSION["loggedin_user"]);
        $Name = $loggedInUser->name;
        return $Name;
    }

    public static function getLoggedUserObject(){

        $user = unserialize($_SESSION["loggedin_user"]);

        return $user;
    }
}

?>