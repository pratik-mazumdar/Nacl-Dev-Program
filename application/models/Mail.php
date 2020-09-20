<?php
require_once 'application/libraries/phpmailer/Exception.php';
require_once 'application/libraries/phpmailer/SMTP.php';
require_once 'application/libraries/phpmailer/PHPMailer.php';

use phpDocumentor\Reflection\DocBlock\Tags\Throws;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'application/libraries/vendor/autoload.php';

class Mail{

    public function send_mail($email,$msg){
        try{  
            $mail = new PHPMailer(true);
            $mail->IsSMTP();
            $mail->Host = '	smtp.mail.yahoo.com';
            $mail->SMTPSecure = 'ssl';
            $mail->Username = '';
            $mail->Password = '';
            $mail->Port = 465;
            $mail->SMTPAuth = true;
            $mail->setFrom('', 'NACL');
            $mail->addAddress($email);
            $mail->isHTML(true);
            $mail->Subject = 'Payout';
            $mail->Body    = $msg;
            return null;
        }catch(Exception $e){
            return $e->getMessage();
        }
    
    }

    private $realotp;
    public function send_otp($email){
        try{  
                $mail = new PHPMailer(true);
                $mail->IsSMTP();
                $mail->Host = '	smtp.mail.yahoo.com';
                $mail->SMTPSecure = 'ssl';
                $mail->Username = '';
                $mail->Password = '';
                $mail->Port = 465;
                $mail->SMTPAuth = true;
                $mail->setFrom('', 'NACL');
                $mail->addAddress($email);
                $this->realotp=mt_rand(10000000,99999999);
                $mail->isHTML(true);
                $mail->Subject = 'Authorize log-in';
                $mail->Body    = $this->load_body($this->realotp);
                $mail->AltBody = 'Your Verification code is: '.$this->realotp;
                $mail->send();
                return true;
        }catch(Exception $e){
            echo $e->getMessage();
            return false;
        }
    }
    private function load_body($realotp){
        return'<span style="background:rgb(66,64,61);color:white;font-size:150%;padding:4%">
        Your Verification code is: '.$realotp.'</span>';
    }
    public function get_otp(){
        return $this->realotp;
    }
    public function check_otp($otp){
        if ($otp == $this->realotp)
            return true;
        return false;
    }
}
