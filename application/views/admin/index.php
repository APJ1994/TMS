<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Training Center</title>
    <?=link_tag("Assets/css/bootstrap.min.css")?>
    
</head>
<body>
<?php include("header.php");?>
<h1 class="text-center mt-4">Admin Form</h1>
<?php if($error=$this->session->flashdata('Login_Failed')){?>
  <?php echo $error;?>

  <?php }?>
<!-- <?php
$user_class=$this->session->flashdata('user_class')

?>

<div class="row">
<div class="col-lg-6">
<div class="alert <?= $user_class ?>">
<?= $user; ?>
</div>
</div>
</div> -->
<?php echo form_open('admin/index')?>
<div class="container">
<div class="row">
  <div class="col-lg-6">
    <div class="form-group">
<form>
  <div class="mb-3 mt-4" >
    <label for="exampleInputEmail1" class="form-label">Username</label>
    <?php echo form_input(['class'=>'form-control','name'=>'uname','placeholder'=>'Enter Your Username','value'=>'uname']);?>
    <div id="emailHelp" class="form-text">We'll never share your Username with anyone else.</div>
  </div>
  <div class="col-lg-6">
    <?php echo form_error('uname');?>
  </div>
  </div>
  </div>
</div>
  <div class="row">
  <div class="col-lg-6">
    <div class="form-group">
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    </div>
    <?php echo form_password(['class'=>'form-control','name'=>'pass','placeholder'=>'Enter Your Password','value'=>'pass']);?>
  </div>
  <div class="col-lg-6">
    <?php echo form_error('pass');?>
  </div>
  </div>
  </div>
  <!-- <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div> -->
  <?php echo form_submit(['type'=>'submit','class'=>'btn btn-primary','name'=>'submit','value'=>'Submit']);?>
  <?php echo form_reset(['type'=>'reset','class'=>'btn btn-default','name'=>'submit','value'=>'Reset']);?>
  <?php echo anchor('admin/register/','Sign up?','class="link-class"') ?>
</form>
</div>
<!-- <?php echo validation_errors();?> -->
<?php include("footer.php");?>
</body>


</html>