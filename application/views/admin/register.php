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

<<?php if($this->session->flashdata('error')){?>
<p style="color:red"><?php  echo $this->session->flashdata('error');?></p>	
<?php } ?>
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
<?php echo form_open('admin/UserRegister')?>
<div class="container">
    <form>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Username</label>
    <?php echo form_input(['class'=>'form-control','name'=>'uname','placeholder'=>'Enter Your Username']);?>
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <?php echo form_password(['class'=>'form-control','id'=>'newpassword','name'=>'pass','placeholder'=>'Enter Your Password']);?>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
    <?php echo form_password(['class'=>'form-control','id'=>'cpassword','name'=>'cpass','placeholder'=>'Enter Your Confirm Password']);?>
  </div>
  <!-- <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div> -->
  <?php echo form_submit(['type'=>'submit','class'=>'btn btn-primary','value'=>'Submit']);?>
  <div class="registrationFormAlert" style="color:green;" id="CheckPasswordMatch">
</form>
</div>
<?php echo validation_errors();?>
<?php include("footer.php");?>
<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>

<script>
  function CheckPassword(){
    var password=$("#newpassword").val();
    var confirmpassword=$("#cpassword").val();
    if(password!=confirmpassword){
      $("#CheckPasswordMatch").html('Password Does not Match');
    }
    else{
      $("#CheckPasswordMatch").html('Password Match');
    }
  }
    $(document).ready(function(){
      $("#cpassword").keyup(CheckPassword);
    });
  

</script>
</body>


</html>