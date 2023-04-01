<?php include("header.php"); ?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="<?= base_url(); ?>public/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div>



        <?php include("sidebar.php"); ?>
        <!-- Sidebar End -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-center"> Student Enquiry Details</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <!-- <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol> -->
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg-12 col-12">
                            <!-- small box -->
                            <div class="container">
                                <?php echo form_open('admin/StudentEnquiryForm'); ?>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Full Name</label>
                                    <?php echo form_hidden('created_By', $this->session->userdata('id')); ?>
                                    <div class="col-sm-6">
                                        <?php echo form_input(['class' => 'form-control', 'name' => 'name', 'id' => 'sname', 'placeholder' => 'Enter Full Name']); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Contact</label>
                                    <div class="col-sm-6">
                                        <?php echo form_input(['class' => 'form-control', 'name' => 'contact', 'id' => 'scontact', 'placeholder' => 'Enter Contact']); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-6">
                                        <?php echo form_input(['class' => 'form-control', 'name' => 'email', 'id' => 'scontact', 'placeholder' => 'Enter Email']); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Interest in
                                        Course</label>
                                    <div class="col-sm-6">
                                        <?php echo form_input(['class' => 'form-control', 'name' => 'interest_course', 'id' => 'scontact', 'placeholder' => 'Enter Course']); ?>
                                    </div>
                                </div>
                                <!-- <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Courses</label>
                    <div class="col-sm-10">
                    <?php echo form_input(['class' => 'form-control', 'name' => 'scourse', 'id' => 'scourse', 'placeholder' => 'Enter Course']); ?>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">DOJ</label>
                    <div class="col-sm-10">
                    <?php echo form_input(['class' => 'form-control', 'name' => 'sdoj', 'id' => 'sname', 'placeholder' => 'Enter Date of Joining']); ?>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Total Fess</label>
                    <div class="col-sm-10">
                    <?php echo form_input(['class' => 'form-control', 'name' => 'sfees', 'id' => 'sfees', 'placeholder' => 'Enter Total Fees']); ?>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Advanced Fess</label>
                    <div class="col-sm-10">
                    <?php echo form_input(['class' => 'form-control', 'name' => 'sname', 'id' => 'sname', 'placeholder' => 'Enter Full Name']); ?>
                    </div>
                   </div>
                    <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Balance</label>
                    <div class="col-sm-10">
                    <?php echo form_textarea(['class' => 'form-control', 'name' => 'sname', 'id' => 'sname', 'placeholder' => 'Enter Full Name']); ?>
                    </div>
                  </div> -->
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Remark</label>
                                    <div class="col-sm-6">
                                        <?php echo form_textarea(['class' => 'form-control', 'name' => 'remark', 'id' => 'sname', 'placeholder' => 'Enter Remarks']); ?>
                                    </div>
                                    <?php validation_errors(); ?>
                                    <!-- <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                      <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck2">
                        <label class="form-check-label" for="exampleCheck2">Remember me</label>
                      </div>
                    </div>
                  </div> -->
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-info">Save</button>
                                    <button type="submit" class="btn btn-default float-right">Go Back</button>
                                </div>
                                <!-- /.card-footer -->
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    <!-- /.card -->

    <!-- DIRECT CHAT -->

    <!-- /.content-wrapper -->
    <!-- Footer -->
    <?php include("footer.php"); ?>
</body>

</html>