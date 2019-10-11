<?php

class Notify{
	
	public static function notifyUser($type, $message){
		if($type == "success"){
			$_SESSION["success"] = $message;
		}else if($type == "info"){
			$_SESSION["info"] = $message;
		}else if($type == "error"){
			$_SESSION["error"] = $message;
		}
	}
	
	public static function getSuccess(){
		if(isset($_SESSION["success"])){
			return $_SESSION["success"];	
		}
	}
	
	public static function getInfo(){
		if(isset($_SESSION["info"])){
			return $_SESSION["info"];	
		}
	}

	public static function getError(){
		if(isset($_SESSION["error"])){
			return $_SESSION["error"];	
		}
		
	}
	
	public static function clearNotify(){
		unset($_SESSION["success"]);
		unset($_SESSION["error"]); 
		unset($_SESSION["info"]);
	}
}


?>