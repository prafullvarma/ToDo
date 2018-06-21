<?php

  class Home_model extends CI_Model{

    public function login_user($email, $password){

      $this->db->where('user_email', $email);

      $res = $this->db->get('users');

      if($res->num_rows()==0){
        $this->session->set_flashdata('login_failed','This email id is not registered');
        return false;
      }else{

        $password_hash = $res->row(4)->user_password_hash;
        if(password_verify($password, $password_hash)){
          $this->session->set_flashdata('login_success','You have successfully logged in');
          $user_data = array(
            'user_id' => $res->row(0)->user_id,
            'user_firstname' =>$res->row(1)->user_firstname,
            'user_lastname' =>$res->row(1)->user_lastname,
            'user_email' =>$res->row(1)->user_email
          );
          return $user_data;
        }else{
          $this->session->set_flashdata('login_failed','Your password is incorrect');
          return false;
        }

      }

    }

    public function register_user(){

      $password_hash = password_hash($this->input->post('password'), PASSWORD_BCRYPT);

      $data = array(
        'user_firstname' =>$this->input->post('first_name'),
        'user_lastname' =>$this->input->post('last_name'),
        'user_email' => $this->input->post('email'),
        'user_password_hash'=>$password_hash
      );

      $result = $this->db->insert('users',$data);

      return $result;

    }

  }




?>
