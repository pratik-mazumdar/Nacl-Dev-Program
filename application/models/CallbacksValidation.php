<?php 
trait CallbacksValidation{
    public function alpha_dash_space($fullname){
        if (! preg_match('/^[a-zA-Z\s]+$/', $fullname)) {
            $this->form_validation->set_message('alpha_dash_space', 'The %s field may only contain alpha characters and white spaces');
            return FALSE;
        } else {
            return TRUE;
        }
    }
    public function verify_password($password){   
        $this->load->library('SQNile');
        $password_hash = $this->sqnile->fetch("SELECT `password` from developer WHERE dev_id = ?", [$this->session->dev['dev_id']]);
        if (!password_verify($password, $password_hash['password'])){
            $this->form_validation->set_message('verify_password', Strings::INVALID_PASSWORD);
            return false;
        }
        return true;
    }
    public function match_confirm($old_password){
        if ($old_password != null) {
            if ($old_password == $this->input->post('confirm_password', true)) {
                $this->form_validation->set_message('match_confirm', Strings::MATCH_PASSWORD);
                return false;
            }
            return true;
        }
    }
    
}