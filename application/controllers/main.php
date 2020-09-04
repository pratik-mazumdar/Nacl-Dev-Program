<?php

use phpDocumentor\Reflection\DocBlock\Tags\Throws;
use phpDocumentor\Reflection\Types\String_;

defined('BASEPATH') OR exit('No direct script access allowed');
require_once "application/models/MainModel.php";
require_once "application/models/Mail.php";
require_once "application/models/File.php";
require_once "application/models/Strings.php";

class Main extends MainModel implements Strings{

    public function __construct()        {
                parent::__construct();
                $this->load->helper(array('url'));
                $this->load->library('session');
                $this->load->library('Nile');
                $this->content = $this->set_button();
        }


    function index(){
       
        $this->load->view('index',$this->content);
    }
    
    function submit_game(){
        
        $this->load->view('submit_game',$this->content);
    }   
    function things_to_know(){
        
        $this->load->view('things_to_know',$this->content);
    } 
    public function login(){
        // sets login/signup button or company_users_name with logout
         

        if ( $this->session->temp != null)
            $this->content["error"] = true;
        else{
           $this->session->msg = Strings::EMPTY_STRING; 
            $this->content["error"] = false;
        }
        
        // Checks if request is coming from post
        if ($this->input->post("start") == true){
            $password = $this->input->post("Password");
            $email = $this->input->post("Email");
            if ( $this->nile->check_password($password,$password) && $email != ""){
                $this->load->library("SQNile");
                $user = $this->sqnile->fetch("SELECT * from developer WHERE email = ?", [ $email]);
                if (!is_empty($user)){
					if (password_verify($password, $user["password"])) {
						unset($user["password"]);
                        $this->session->dev = $user;
                        redirect("main/index");
                    }else{
                        $this->session->temp = array("msg" => Strings::INVALID_USER); 
                        $this->content["error"] = true;
                   }
                }else{
                    $this->session->temp = array("msg" => Strings::INVALID_USER);
                    $this->content["error"] = true;
                }
                
            }else
                $this->content["error"] = true;
        }
        $this->content["input_type"] = array("Email","Password");
        $this->content["title"] = Strings::LOGIN;
        $this->content["error"] = $this->session->msg;
        $this->session->unset_userdata("temp");
        $this->load->view('form',$this->content);
    }
    
    function signup(){
  // sets login/signup button or company_users_name with logout
         
       if ( $this->session->msg != "")
            $this->content["error"] = true;
        else{
            $this->session->msg = Strings::EMPTY_STRING; 
            $this->content["error"] = false;
        }
        if ($this->input->post("start") == true){
            $this->session->temp =array("password"=>$this->input->post("Password"));
            $this->session->temp =array_merge($this->session->temp , array("email"=>$this->input->post("Email")));
            $this->session->temp =array_merge($this->session->temp , array("comp_name"=>$this->input->post("Company_Name")));
            if ( $this->nile->check_password($this->session->temp["password"],$this->session->temp["password"]) && 
                $this->nile->check_email($this->session->temp["email"]) && $this->nile->check_name($this->session->temp["comp_name"])){
            
                // Check duplicate email from database
                $this->load->library('SQNile');
                if ($this->sqnile->is_unique($this->session->temp["email"],"developer","email")){
                    $this->session->msg  = "";
                    $_SESSION["temp"]["signup"]= true;
                    $this->session->temp["password"] = password_hash($this->session->temp["password"], PASSWORD_DEFAULT);
                    $this->session->mark_as_temp('temp', 180); 
                    redirect("main/email_verification");
                }else{
                    $this->content["error"] = true;
                    $this->session->msg  = Strings::EXISTING_USER;
                }  
            }
            else{
                $this->content["error"] = true;
            }
        }   
        // Set all content, to be used in view(form.php)
        $this->content["input_type"] = array("Email","Company Name","Password");
        $this->content["title"] = Strings::SIGN_UP;
        $this->content["error"] = $this->session->msg; 
        $this->session->unset_userdata("msg");
        $this->load->view('form',$this->content);
    }
    public function email_verification(){
        if (!$this->session->temp["signup"])
             redirect("main/signup");
        $this->session->msg= Strings::EMPTY_STRING;
        $this->content["error"] = false; // Show the error dialog box or not
        $mail = new Mail();  
        $otp = $this->input->post("OTP");
        try{
            if (isset($_SESSION["realotp"])){
                if ($this->session->realotp == $otp){
                    $this->session->unset_userdata("realotp");
                    unset($_SESSION["temp"]["signup"]);
                    $_SESSION["temp"]["email_ver"] = true;
                    redirect("main/registration_done");
                }
                else{
                $this->session->msg = Strings::WRONG_OTP;
                    $this->content["error"] = true;
                }
            }else{
                if($mail->send_otp($_SESSION["temp"]["email"])){
                    $this->session->realotp = $mail->get_otp();  
                    $this->session->mark_as_temp('realotp', 180); 
                }
                else{
                $this->session->msg = Strings::MAIL_NOT_SEND;
                    $this->content["error"] = true;
                }
            }
        }catch(Exception $e){
            $this->session->msg = Strings::UNKNOWN_ERROR;
        }
       
        // Set all content, to be used in view(form.php)
        $this->content["input_type"] = array("OTP");
        $this->content["title"] = "Verify Email";
        $this->content["error"] =$this->session->msg; 
        $this->session->unset_userdata("msg");
        $this->load->view('form',$this->content);
    }
    public function registration_done(){    
        if (!$this->session->temp["email_ver"]){
            $this->session->unset_userdata("temp");
            redirect("main/signup");
        }
        try{
            $this->load->library('SQNile');
            $this->sqnile->query("INSERT INTO developer (comp_name,email,password) VALUES (?,?,?)"
                            , [$this->session->temp["comp_name"],$this->session->temp["email"], $this->session->temp["password"]]);
            $this->sqnile->fetch("SELECT id from developer where email = ?",[$this->session->temp["email"]]);
            $this->session->dev = array(
                "email"=>$this->session->temp["email"],
                "comp_name"=>$this->session->temp["comp_name"]
            );                
            $this->session->unset_userdata("temp");
            mkdir("./uploads/".$this->session->dev["id"]."/");
            redirect("main/index");
        }catch(Exception $e){
            // incase of error occured in fetch function delete user from developer table
            if ($e->getCode() == 1002)
                $this->sqnile->query("DELETE FROM developer WHERE id = ?",[$this->session->temp["email"]]);
            $this->session->unset_userdata("temp");
            $this->session->msg = $e->getMessage();
            redirect("main/signup");
            
           
        }
    }
    public function test(){
        $this->load->view('test');
    }
    public function session(){
        print_r($this->session);
    }
    public function logout(){
        session_destroy();  
        redirect("main/index");     
    }
    function filepond_upload(){
        if ($this->input->get_request_header('X-CSRF-Token', TRUE) == $this->security->get_csrf_hash()){
            $config['upload_path']  = './uploads/'.$this->session->dev["id"]."/";
            $config['allowed_types']  = 'apk|jpeg|jpg|png';
            $this->load->library('upload', $config);
            if ( ! $this->upload->do_upload('filepond'))
                throw new Exception(Strings::UNKNOWN_ERROR);
        }else
            throw new Exception(Strings::UNKNOWN_ERROR);
    }
}