<?php


  class Task_model extends CI_Model{

    public function create_task($data){

      $query = $this->db->insert('tasks',$data);

      return $query;

    }


    public function get_tasks($user_id, $status = true){

      $this->db->where('task_user_id', $user_id);

      if($status==false){
        $this->db->where('is_complete', 1);
      }else{
        $this->db->where('is_complete',0);
      }

      $query = $this->db->get('tasks');

      if($query->num_rows()==0) return 0;

      return $query->result();

    }

    public function delete_task($task_id){

      $this->db->where('task_id',$task_id);

      $query = $this->db->delete('tasks');

      return $query;

    }

    public function complete_task($task_id){

      $this->db->where('task_id',$task_id);

      $data = array('is_complete' => 1);

      $query = $this->db->update('tasks', $data);

      return $query;

    }

    public function active_task($task_id){

      $this->db->where('task_id',$task_id);

      $data = array('is_complete' => 0);

      $query = $this->db->update('tasks', $data);

      return $query;


    }

  }



?>
