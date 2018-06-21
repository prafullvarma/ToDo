<div class="p-3">

  <?php echo validation_errors(); ?>

  <?php echo form_open('home/login'); ?>

    <div class="form-group">
      <?php echo form_label('Email'); ?>
      <?php $data = array(
        'name' => 'email',
        'class' => 'form-control',
        'placeholder' => 'Enter your email id',
        'value' => set_value('email')
      ); ?>
      <?php echo form_input($data); ?>
    </div>

    <div class="form-group">
      <?php echo form_label('Password'); ?>
      <?php $data = array(
        'name' => 'password',
        'class' => 'form-control',
        'placeholder' => 'Enter your password'
      ); ?>
      <?php echo form_password($data); ?>
    </div>

    <div class="form-group">
      <?php $data = array(
        'name' => 'login',
        'class' => 'btn btn-warning',
        'value' => 'Login'
      ); ?>
      <?php echo form_submit($data); ?>
    </div>

  <?php echo form_close(); ?>

</div>
