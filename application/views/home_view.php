

<?php if(!$this->session->userdata('logged_in')) : ?>

<div class="p-4">

  <h5 class="text-center text-warning">Hello There!</h5>

  <div class="card">

    <div class="card-body">
      <div class="card-title">
        I am building this to-do app.
      </div>
      <div class="card-text">
        Because apparently, I have no better thing to do.
      </div>
    </div>
    <div class="card-footer">
      And if you're checking this, then neither do you.
    </div>

  </div>

</div>

<?php else : ?>

<div class="row">

  <div class="col-lg-2 col-xs-4 pt-3 bg-white mt-3 mb-3">

    <?php echo validation_errors(); ?>

    <?php echo form_open('tasks/create'); ?>

      <h5 class='text-primary text-center'>Create Task</h5>

      <div class="form-group">
        <?php echo form_label('Task Title'); ?>
        <?php $data = array(
          'name'=>'task_name',
          'class'=>'form-control',
          'placeholder'=>'Enter task title'
        ); ?>
        <?php echo form_input($data); ?>
      </div>

      <div class="form-group">
        <?php echo form_label('Task Description'); ?>
        <?php $data = array(
          'name'=>'task_description',
          'class'=>'form-control',
          'placeholder'=>'Enter description'
        ); ?>
        <?php echo form_textarea($data); ?>
      </div>

      <div class="form-group">
        <?php echo form_label('Task Due Date'); ?>
        <?php $data = array(
          'name'=>'task_due_date',
          'class'=>'form-control',
          'type'=>'date'
        ); ?>
        <?php echo form_input($data); ?>
      </div>

      <div class="form-group">
        <?php $data = array(
          'name'=>'create',
          'class'=>'btn btn-warning',
          'value'=>'Create Task'
        ); ?>
        <?php echo form_submit($data); ?>
      </div>

    <?php echo form_close(); ?>

  </div>
  <div class="col-lg-10 col-xs-8">


      <div class="bg-light card-deck pt-4 pb-4" >
        <div class="card">
          <div class="card-header">
            <h5>Acitve Tasks</h5>

          </div>
          <div class="card-body">
            <ul class='list-group'>

              <?php if(!$active_tasks) : ?>
                <h6 class="text-center">No active tasks.</h6>
              <?php else : ?>
                <?php foreach($active_tasks as $task) : ?>
                  <li class="list-group-item list-group-item-warning m-1">
                    <div class="border-warning text-dark">
                      <h6>
                        <?php echo $task->task_name; ?>
                        <div class="float-right">
                          <a href="<?php echo base_url(); ?>tasks/delete/<?php echo $task->task_id; ?>"><i class="fa fa-trash text-danger"></i></a>
                          <a href="<?php echo base_url(); ?>tasks/complete/<?php echo $task->task_id; ?>"><i class="fa fa-check text-success"></i></a>
                        </div>
                      </h6>

                      <small>
                        <?php echo $task->task_description; ?>
                        <div class="text-right">
                          <p> <i class="fa fa-clock"></i> <?php echo $task->task_due_date; ?> </p>
                        </div>
                      </small>
                    </div>
                  </li>
                <?php endforeach; ?>
              <?php endif; ?>

            </ul>
          </div>
        </div>
        <div class="card">
          <div class="card-header">
            <h5>Complete Tasks</h5>
          </div>
          <div class="card-body">
            <ul class='list-group'>
              <?php if(!$complete_tasks) : ?>
                <h6 class="text-center">No complete tasks.</h6>
              <?php else : ?>
                <?php foreach($complete_tasks as $task) : ?>
                  <li class="list-group-item list-group-item-success m-1">
                    <div class="border-warning text-dark">
                      <h6>
                        <?php echo $task->task_name; ?>
                        <div class="float-right">
                          <a href="<?php echo base_url(); ?>tasks/delete/<?php echo $task->task_id; ?>"><i class="fa fa-trash text-danger"></i></a>
                          <a href="<?php echo base_url(); ?>tasks/active/<?php echo $task->task_id; ?>"><i class="fa fa-times text-warning"></i></a>
                        </div>
                      </h6>
                      <small>
                        <?php echo $task->task_description; ?>
                        <div class="text-right">
                          <?php if(!$task->task_completed_date) : ?>
                            <p> <i class="fa fa-clock"></i> <?php echo $task->task_due_date; ?> </p>
                          <?php endif; ?>
                        </div>
                      </small>
                    </div>
                  </li>
                <?php endforeach; ?>
              <?php endif; ?>
            </ul>
          </div>
        </div>
      </div>


  </div>

</div>



<?php endif; ?>
