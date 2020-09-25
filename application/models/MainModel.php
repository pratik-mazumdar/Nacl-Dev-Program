<?php 
trait MainModel{
    public function set_button(){
        if ($this->is_empty($this->session->dev)){
            $content["btn1"] =  Strings::SIGN_UP;
            $content["btn2"] =  Strings::LOGIN;
            $content["link1"] = "signup";
            $content["link2"] = "login";
            $content["get_stared_link"] = "signup";
        }else{
            $content["btn1"] =  Strings::DASHBOARD;
            $content["btn2"] = Strings::LOGOUT;
            $content["link1"] = "dashboard";
            $content["link2"] = "main/logout";
            $content["get_stared_link"] = "submit_game";
        }
        return $content;
    }
    // Wrapper of empty function
    public function is_empty($var){
        return empty($var);
    }
    // Checks if developer is online
    public function is_online(){
        return $this->session->dev != null;
    }
    //Redirects with a session message
    public function redirect_msg($msg,$location){
        $this->session->msg = $msg;
        $this->session->mark_as_flash("msg");
        redirect($location);    
    }
}