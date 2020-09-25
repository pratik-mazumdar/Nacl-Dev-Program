<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
require_once "application/models/MainModel.php";
require_once "application/models/CallbacksValidation.php";
require_once "application/models/Mail.php";
require_once "application/models/File.php";
require_once "application/models/Strings.php";

class SignupLogin extends CI_Controller implements Strings{
use MainModel;
use CallbacksValidation;
    public function __construct(){
        parent::__construct();
        $this->load->helper(array('url'));
        $this->load->library('session');
        $this->load->helper("form");
        $this->load->library("form_validation");
        $this->content = $this->set_button();
}

    public function login(){
        $this->form_validation->set_error_delimiters('<div class="error text-center">', '</div>');
        $this->form_validation->set_rules('Email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('Password', 'Password', 'required|min_length[8]');
        if ($this->form_validation->run() != FALSE) {
            $password = $this->input->post("Password");
            $email = $this->input->post("Email",true);
            $this->load->library("SQNile");
            $user = $this->sqnile->fetch("SELECT * from developer WHERE email = ?", [$email]);
            if (!$this->is_empty($user)) {
                if (password_verify($password, $user["password"])) {
                    unset($user["password"]);
                    $this->session->dev = $user;
                    redirect("index");
                } else 
                    $this->content["error_msg"] = array("Email"=>Strings::INVALID_USER);
            }else 
                $this->content["error_msg"] = array("Email"=>Strings::INVALID_USER);
        }else
            $this->content["error_msg"] = $this->form_validation->error_array();                
        
        $this->content["input_type"] = array("Email","Password");
        $this->content["title"] = Strings::LOGIN;
        $this->load->view('form',$this->content);
    }
    
    function signup(){
        $this->content["error_msg"] = $this->session->msg;
        $this->form_validation->set_error_delimiters('<div class="error text-center">', '</div>');
        $this->form_validation->set_rules('Email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('Password', 'Password', 'required|min_length[8]');
        $this->form_validation->set_rules('Company_Name', 'Company Name', 'trim|required|callback_alpha_dash_space');
        
        $this->session->temp = array("email" => $this->input->post("Email",true));
        $this->session->temp = array_merge($this->session->temp, array("comp_name" => $this->input->post("Company_Name",true)));    
        $password = $this->input->post("Password");
        if ($this->form_validation->run() != FALSE) {
            // Check duplicate email from database
            $this->load->library('SQNile');
            if ($this->sqnile->is_unique($this->session->temp["email"], "developer", "email")) {
                $this->session->temp = array_merge($this->session->temp,array("signup"=>true));
                $password = password_hash($password, PASSWORD_BCRYPT);
                $this->session->temp = array_merge($this->session->temp,array("password"=>$password));
                $this->session->mark_as_temp('temp', 180);
                redirect("email_verification");
            } else {
                $this->content["error_msg"]  = array("Email"=>Strings::EXISTING_USER);
            }
        } else {
            if(isset ($_SESSION["msg"])){// use session->msg as flash session
                $this->content["error_msg"]=array_merge(array("Email"=>$_SESSION["msg"],$this->form_validation->error_array()));
            }
            else 
                $this->content["error_msg"]= $this->form_validation->error_array();
        }
                
        
        // Set all content, to be used in view(form.php)
        $this->content["input_type"] = array("Email","Company Name","Password");
        $this->content["title"] = Strings::SIGN_UP;
        
        
        $this->load->view('form',$this->content);
    }
    public function email_verification(){
        if (!$this->session->temp["signup"]){}
            //redirect("signup");
        
        $mail = new Mail();  
        
        if (!isset($_SESSION["realotp"])) {
            try {
                if ($mail->send_otp($this->session->temp["email"])) {
                    $this->session->realotp = $mail->get_otp();
                    $this->session->mark_as_temp('realotp', 180);
                } else
                    $this->content["error_msg"] = array("Email" => Strings::MAIL_NOT_SEND);
            } catch (Exception $e) {
                $this->content["error_msg"] =  array("Email" => Strings::UNKNOWN_ERROR);
            }
        }

        $otp = $this->input->post("OTP",true);
        $this->form_validation->set_error_delimiters('<div class="error text-center">', '</div>');
        $this->form_validation->set_rules('OTP', 'OTP', 'trim|required|exact_length[8]|is_natural');
        if ($this->form_validation->run() != FALSE) {
            if ($this->session->realotp == $otp) {
                $this->session->unset_userdata("realotp");
                unset($_SESSION["temp"]["signup"]);
                $_SESSION["temp"]["email_ver"] = true;
                redirect("signuplogin/registration_done");
            } else
                $this->content["error_msg"] =  array("Email" => Strings::WRONG_OTP);
        } else {
            $this->content["error_msg"] = $this->form_validation->error_array();
        }
       
       
        // Set all content, to be used in view(form.php)
        $this->content["input_type"] = array("OTP");
        $this->content["title"] = "Verify Email";
        $this->load->view('form',$this->content);
    }
    public function registration_done(){    
        if (!$this->session->temp["email_ver"]){
            $this->session->unset_userdata("temp");
            redirect("signup");
        }
        try{
            $this->load->library('SQNile');
            $this->sqnile->query("INSERT INTO developer (comp_name,email,password) VALUES (?,?,?)"
                            , [$this->session->temp["comp_name"],$this->session->temp["email"], $this->session->temp["password"]]);
            $id = $this->sqnile->fetch("SELECT `dev_id` from developer where email = ?",[$this->session->temp["email"]]);
            $this->session->dev = array(
                "email"=>$this->session->temp["email"],
                "comp_name"=>$this->session->temp["comp_name"],
                "dev_id"=> $id["dev_id"]
            ); 
            $this->sqnile->query('INSERT INTO account (dev_id,country) VALUES (?,ind)',[$this->session->dev['dev_id']]);               
            $this->session->unset_userdata("temp");
            mkdir("./uploads/".$this->session->dev["dev_id"]."/");
            redirect("index");
        }catch(Exception $e){
            // incase of an error occured in fetch function, delete user from developer table
            if ($e->getCode() == 1002)
                $this->sqnile->query("DELETE FROM developer WHERE `email` = ?",[$this->session->temp["email"]]);
            $this->session->unset_userdata("temp");
            $this->session->msg = $e->getMessage();
            $this->session->mark_as_flash("msg");
            redirect("signup");
        }
    }
}
