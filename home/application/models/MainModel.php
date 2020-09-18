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
            $content["link1"] = "#";
            $content["link2"] = "main/logout";
            $content["get_stared_link"] = "submit_game";
        }
        return $content;
    }
    public function is_empty($var){
        return empty($var);
    }
    public function is_online(){
        return $this->session->dev != null;
    }
    public function alpha_dash_space($fullname){
        if (! preg_match('/^[a-zA-Z\s]+$/', $fullname)) {
            $this->form_validation->set_message('alpha_dash_space', 'The %s field may only contain alpha characters and white spaces');
            return FALSE;
        } else {
            return TRUE;
        }
    }
}