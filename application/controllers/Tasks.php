<?php
defined('BASEPATH') or exit('No direct access script allowed.');

class Tasks extends CI_Controller{

  public function create(){

    $this->form_validation->set_rules('task_name','Task Title','trim|required|min_length[3]');
    $this->form_validation->set_rules('task_description','Task Description','trim|required');
    $this->form_validation->set_rules('task_due_date','Task Due Date','required');

    if($this->form_validation->run() == FALSE){

      $this->session->set_flashdata('task_not_created','Task has not been created, you must have done something wrong.');

      redirect('home/index');

    }else{

      $data = array(
        'task_user_id' => $this->session->userdata('user_id'),
        'task_name' => $this->input->post('task_name'),
        'task_description' =>$this->input->post('task_description'),
        'task_due_date' => $this->input->post('task_due_date')
      );

      if($this->task_model->create_task($data)){

        $this->session->set_flashdata('task_created','Task has been successfully created.');

        redirect('home/index');

      }else{

        $this->session->set_flashdata('task_not_created','Task has been successfully created. Must be a database issue.');

        redirect('home/index');

      }

    }

  }

  public function delete($task_id){

    if($this->task_model->delete_task($task_id)){
      $this->session->set_flashdata('task_deleted', 'Task has been deleted');
    }else{
      $this->session->set_flashdata('task_not_deleted','Task has not been deleted maybe because of some code error.');
    }
    redirect('home/index');
  }

  public function complete($task_id){

    if($this->task_model->complete_task($task_id)){
      $this->session->set_flashdata('task_marked_complete', 'Task has been marked complete.');
    }else{
      $this->session->set_flashdata('task_not_marked_complete','Task has not been marked complete.');
    }

    redirect('home/index');

  }

  public function active($task_id){

    if($this->task_model->active_task($task_id)){
      $this->session->set_flashdata('task_marked_active', 'Task has been marked as acitve.');
    }else{
      $this->session->set_flashdata('task_not_marked_active','Task has not been marked as active.');
    }

    redirect('home/index');

  }

}





?>
