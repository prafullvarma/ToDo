<div class="p-3">

  <?php echo validation_errors(); ?>

  <?php echo form_open('home/register'); ?>

  <div class="form-group">
    <?php echo form_label('First Name'); ?>
    <?php $data = array(
      'name'=>'first_name',
      'class'=>'form-control',
      'placeholder'=>'Enter your first name',
      'value'=>set_value('first_name')
    ); ?>
    <?php echo form_input($data); ?>
  </div>

  <div class="form-group">
    <?php echo form_label('Last Name'); ?>
    <?php $data = array(
      'name'=>'last_name',
      'class'=>'form-control',
      'placeholder'=>'Enter your last name',
      'value'=>set_value('last_name')
    ); ?>
    <?php echo form_input($data); ?>
  </div>

  <div class="form-group">
    <?php echo form_label('Email'); ?>
    <?php $data = array(
      'name'=>'email',
      'class'=>'form-control',
      'placeholder'=>'Enter your Email id',
      'value'=>set_value('email')
    ); ?>
    <?php echo form_input($data); ?>
  </div>

  <div class="form-group">
    <?php echo form_label('Password'); ?>
    <?php $data = array(
      'name'=>'password',
      'class'=>'form-control',
      'placeholder'=>'Enter your password'
    ); ?>
    <?php echo form_password($data); ?>
  </div>

  <div class="form-group">
    <?php echo form_label('Confirm Password'); ?>
    <?php $data = array(
      'name'=>'password_conf',
      'class'=>'form-control',
      'placeholder'=>'Confirm your password'
    ); ?>
    <?php echo form_password($data); ?>
  </div>

  <div class="form-group">
    <?php $data = array(
      'name'=>'register',
      'class'=>'btn btn-warning',
      'value'=>'Register'
    ); ?>
    <?php echo form_submit($data); ?>
  </div>

  <?php echo form_close(); ?>


</div>
