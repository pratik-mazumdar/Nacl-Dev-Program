<?php

use phpDocumentor\Reflection\DocBlock\Tags\Reference\Url;

defined('BASEPATH') OR exit('No direct script access allowed');
require_once "application/models/MainModel.php";
require_once "application/models/Mail.php";
require_once "application/models/File.php";
require_once "application/models/Strings.php";

class Main extends CI_Controller implements Strings{
use MainModel;
    public function __construct(){
                parent::__construct();
                $this->load->helper(array('url'));
                $this->load->library('session');
                $this->content = $this->set_button();
    }

    function file_not_found(){
        $this->load->view("404.php");
    }
    function index(){
        $this->load->view('index',$this->content);
    }
    
    function submit_game(){
        if (!$this->is_online()){
            $this->session->msg = Strings::LOGIN_REQUIRED;
            $this->session->mark_as_flash("msg");
            redirect("signup");    
        }
        $this->load->helper("form"); 
        $this->load->view('submit_game',$this->content);
    }   
    function things_to_know(){
        $this->load->view('things_to_know',$this->content);
    } 
    function session(){
        print_r($_SESSION);
    }
    function logout(){
        session_destroy();  
        redirect("");     
    }
    function upload_thumbnail(){
        if ($this->input->get_request_header('X-CSRF-Token', TRUE) == $this->security->get_csrf_hash()  && $this->is_online()){
            $this->load->library('SQNile');
            $filename = $this->sqnile->fetch("SELECT thumbnail from games WHERE `dev_id` = ?",[$this->session->dev["dev_id"]]);
            $filename != null ? $filename = $filename["thumbnail"]+2 : $filename = 2 ;
            $config['upload_path']  = './uploads/'.$this->session->dev["dev_id"]."/";
            $config['allowed_types']  = 'jpeg|jpg|png';
            $config['file_name']  = $filename.'.png';
            $config['overwrite'] = true;
            $this->load->library('upload', $config);
            print_r($filename);
            if ($this->upload->do_upload('filepond'))
                $this->session->thumbnail = $filename;
            else
                throw new Exception(Strings::UNKNOWN_ERROR);
        }else
            throw new Exception(Strings::UNKNOWN_ERROR);
    }
    function upload_apk(){
        if ($this->input->get_request_header('X-CSRF-Token', TRUE) == $this->security->get_csrf_hash() && $this->is_online()){
            $this->load->library("SQNile");
            $this->session->apk = $this->sqnile->fetch("SELECT apk from games WHERE `dev_id` = ?",[$this->session->dev["dev_id"]]);
            $this->session->apk != null ? $this->session->apk += 2 : $this->session->apk = 1 ;
            $config['upload_path']  = './uploads/'.$this->session->dev["dev_id"]."/";
            $config['allowed_types']  = 'apk';
            $config['file_name']  = $this->session->apk.'.apk';
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('filepond'))
                throw new Exception(Strings::UNKNOWN_ERROR);
        }else
            throw new Exception(Strings::UNKNOWN_ERROR);
    }
    function upload_game(){
        $this->load->helper("form");
        $this->load->library("form_validation");

        $this->form_validation->set_rules('title', 'Title', 'trim|required|min_length[3]|max_length[12]|callback_alpha_dash_space');
        $this->form_validation->set_rules('price', 'Price', 'trim|required|is_natural_no_zero');
        $this->form_validation->set_rules('message', 'Desicription', 'trim|required|callback_alpha_dash_space|min_length[20]|max_length[1024]');
        if ($this->form_validation->run() != FALSE){
            $this->load->library("SQNile");
            try{
                $this->sqnile->query("INSERT INTO games (dev_id,apk,thumbnail,price,title,description,time) VALUES (?,?,?,?,?,?,?)",
                [   $this->session->dev["dev_id"],
                    $this->session->apk,    
                    $this->session->thumbnail,
                    $this->input->post("price",true),
                    $this->input->post("title",true),
                    $this->input->post("message",true),
                    time()
                ]);
                echo Strings::GAME_UPLOADED; 
            }catch(Exception $e){ 
                if ($e->getCode() === 1001) echo Strings::UPLOAD_REQUIRED;
                else echo Strings::UNKNOWN_ERROR;    
            }
        }else
            echo validation_errors();
    }
    function dashboard(){
        /*if (!$this->is_online()){
            $this->session->msg = Strings::LOGIN_REQUIRED;
            $this->session->mark_as_flash('msg');
            redirect('signup');    
        }*/
        $this->load->view('user_setting');
    }
    function payout(){
        if (!$this->is_online()){
            $this->session->msg = Strings::LOGIN_REQUIRED;
            $this->session->mark_as_flash('msg');
            redirect('signup');    
        }
        $this->load->model('Mail');
        $error = $this->mail->send_mail(
            'pratikmazumdar680@protonmail.com',
            $this->session->dev['dev_id']
        );
        $error == null ? $this->session->msg = String::PAYOUT_DONE : $this->session->msg = Strings::UNKNOWN_ERROR;


    }
    function update_dev(){
        
    }
    function test(){
        
    }
}