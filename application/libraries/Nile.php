<?php
function is_empty($var){
	return empty($var);
}
require_once "application/libraries/SQNile.php";
class Nile{

	public function trim_input($data){
		$data = urlencode($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	public function check_password($password,$con_password,$old_password = "hi" ){
        if (($old_password == "") || ($password == "") || ($con_password == "")) {
            $_SESSION['msg'] = Strings::EMPTY_INPUT;
            return false;
        }
        if (strlen($password) < 8) {
            $_SESSION['msg'] = Strings::SMALL_PASSWORD;
            return false;
        }
        if ($password != $con_password) {
            $_SESSION['msg'] = Strings::PASSWORD_NOT_MATCH;
            return false;
        }
        return true;
    }
    public function check_name($name){
        $name_pattern = "/^[a-zA-Z ]*$/";
        if ($name == "") {
            $_SESSION['msg'] = Strings::EMPTY_INPUT;
            return false;
        }else if (!preg_match($name_pattern,$name)) {
            $_SESSION['msg'] = Strings::INVALID_NAME_TYPE;
            return false;
        }
        return true;
    }
    public function check_email($email){
        if ($email== ""){
            $_SESSION['msg'] = Strings::EMPTY_INPUT;
            return false;
        }
        return true;
    }


}
