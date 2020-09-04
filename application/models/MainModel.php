<?php 
class MainModel extends CI_Controller{
    public function set_button(){
        if (is_empty($this->session->dev)){
            $content["btn1"] =  Strings::SIGN_UP;
            $content["btn2"] =  Strings::LOGIN;
            $content["link1"] = "main/signup";
            $content["link2"] = "main/login";
            $content["get_stared_link"] = "signup";
        }else{
            $content["btn1"] =  $this->session->dev["comp_name"];
            $content["btn2"] = Strings::LOGOUT;
            $content["link1"] = "#";
            $content["link2"] = "main/logout";
            $content["get_stared_link"] = "submit_game";
        }
        return $content;
    }
}