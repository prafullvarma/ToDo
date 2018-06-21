<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

  <body class="bg-dark">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="<?php echo base_url(); ?>home/index">ToDo</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="<?php echo base_url(); ?>home/index">Home</a>
          </li>

          <?php if(! $this->session->userdata('logged_in')) : ?>

          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url(); ?>home/login">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url(); ?>home/register">Register</a>
          </li>

        <?php endif; ?>
        </ul>
      </div>
      <?php if($this->session->userdata('logged_in')) : ?>

      <h6 class="pr-4 pt-2 text-warning">Hello <?php echo $this->session->userdata('user_firstname').' '.$this->session->userdata('user_lastname'); ?> </h6>
      <!-- <a href="<?php echo base_url(); ?>home/logout" class="btn btn-danger" name="button">Logout</a> -->


      <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Logout</button>

      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              Are you sure you want to logout?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <a class="btn btn-primary" href="<?php echo base_url(); ?>home/logout">Logout</a>
            </div>
          </div>
        </div>
      </div>


    <?php endif; ?>
    </nav>

    <p class="bg-success text-center">
      <?php if($this->session->flashdata('login_success')) : ?>
        <?php echo $this->session->flashdata('login_success'); ?>
      <?php endif; ?>
      <?php if($this->session->flashdata('task_created')) : ?>
        <?php echo $this->session->flashdata('task_created'); ?>
      <?php endif; ?>
      <?php if($this->session->flashdata('user_registered')) : ?>
        <?php echo $this->session->flashdata('user_registered'); ?>
      <?php endif; ?>
      <?php if($this->session->flashdata('task_deleted')) : ?>
        <?php echo $this->session->flashdata('task_deleted'); ?>
      <?php endif; ?>
      <?php if($this->session->flashdata('task_marked_complete')) : ?>
        <?php echo $this->session->flashdata('task_marked_complete'); ?>
      <?php endif; ?>
      <?php if($this->session->flashdata('task_marked_active')) : ?>
        <?php echo $this->session->flashdata('task_marked_active'); ?>
      <?php endif; ?>

    </p>
    <p class="bg-danger text-center">
      <?php if($this->session->flashdata('login_failed')) : ?>
        <?php echo $this->session->flashdata('login_failed'); ?>
      <?php endif; ?>
      <?php if($this->session->flashdata('task_not_created')) : ?>
        <?php echo $this->session->flashdata('task_not_created'); ?>
      <?php endif; ?>
      <?php if($this->session->flashdata('user_not_registered')) : ?>
        <?php echo $this->session->flashdata('user_not_registered'); ?>
      <?php endif; ?>
      <?php if($this->session->flashdata('task_not_deleted')) : ?>
        <?php echo $this->session->flashdata('task_not_deleted'); ?>
      <?php endif; ?>
      <?php if($this->session->flashdata('task_not_marked_complete')) : ?>
        <?php echo $this->session->flashdata('task_not_marked_complete'); ?>
      <?php endif; ?>
      <?php if($this->session->flashdata('task_not_marked_active')) : ?>
        <?php echo $this->session->flashdata('task_not_marked_active'); ?>
      <?php endif; ?>

    </p>

    <div class="container-fluid bg-light mt-3">

      <?php $this->load->view($main_view); ?>

    </div>



  </body>
</html>
