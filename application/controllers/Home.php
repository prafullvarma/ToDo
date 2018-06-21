<?php
defined('BASEPATH') or exit('No direct access script allowed.');

class Home extends CI_Controller{

  public function index(){

    if($this->session->userdata('logged_in')){
      $data['active_tasks'] = $this->task_model->get_tasks($this->session->userdata('user_id'), true);
      $data['complete_tasks'] = $this->task_model->get_tasks($this->session->userdata('user_id'), false);
    }

    $data['main_view'] = 'home_view.php';

    $this->load->view('main', $data);

  }

  public function login(){

    $this->form_validation->set_rules('email','Email','trim|required|valid_email');
    $this->form_validation->set_rules('password','Password','trim|required');

    if($this->form_validation->run() == FALSE){
      $data['main_view'] = 'login_view';
      $this->load->view('main', $data);
    }else{

      $email = $this->input->post('email');
      $password = $this->input->post('password');

      // First check for email id, then verify if password matches, if so then set sessions, and get id.

      $user_data = $this->home_model->login_user($email, $password);

      if($user_data){

        $this->session->set_userdata($user_data);
        $this->session->set_userdata('logged_in', true);

        redirect('home/index');

      }else{
        redirect('home/login');
      }

    }

  }

  public function register(){

    $this->form_validation->set_rules('first_name','First Name','trim|required');
    $this->form_validation->set_rules('last_name','Last Name','trim|required');
    $this->form_validation->set_rules('email','Email','trim|required|is_unique[users.user_email]|valid_email');
    $this->form_validation->set_rules('password','Password','trim|required|min_length[3]');
    $this->form_validation->set_rules('password_conf','Confirm Password','trim|required|min_length[3]|matches[password]');

    if($this->form_validation->run()==FALSE){

      $data['main_view'] = 'register_view';

      $this->load->view('main',$data);

    }else{

      if($this->home_model->register_user()){

        $this->session->set_flashdata('user_registered','You have successfully registered. Try logging in.');

        redirect('home/login');

      }else{

        $this->session->set_flashdata('user_not_registered',"there was some issue with registration");

        redirect('home/register');

      }

    }

  }

  public function logout(){

    $this->session->sess_destroy();

    redirect('home/index');

  }

}






?>
