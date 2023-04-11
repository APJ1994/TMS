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
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <!-- <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol> -->
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <?php if ($msg = $this->session->flashdata('msg')) {
                $msg_class = $this->session->flashdata('msg_class')

            ?>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="alert <?= $msg_class ?>">
                            <?php echo  $msg; ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
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
                                <div class="col-lg-6" style="margin-top: 40px;">
                                    <?php echo form_error('name') ?>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Contact</label>
                                    <div class="col-sm-6">
                                        <?php echo form_input(['class' => 'form-control', 'name' => 'contact', 'id' => 'scontact', 'placeholder' => 'Enter Contact']); ?>
                                    </div>
                                </div>
                                <div class="col-lg-6" style="margin-top: 40px;">
                                    <?php echo form_error('name') ?>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-6">
                                        <?php echo form_input(['class' => 'form-control', 'name' => 'email', 'id' => 'scontact', 'placeholder' => 'Enter Email']); ?>
                                    </div>
                                </div>
                                <div class="col-lg-6" style="margin-top: 40px;">
                                    <?php echo form_error('email') ?>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Interest in
                                        Course</label>
                                    <div class="col-sm-6">
                                        <?php echo form_input(['class' => 'form-control', 'name' => 'interest_course', 'id' => 'scontact', 'placeholder' => 'Enter Course']); ?>
                                    </div>
                                </div>
                                <div class="col-lg-6" style="margin-top: 40px;">
                                    <?php echo form_error('interest_course') ?>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Remark</label>
                                    <div class="col-sm-6">
                                        <?php echo form_textarea(['class' => 'form-control', 'name' => 'remark', 'id' => 'sname', 'placeholder' => 'Enter Remarks']); ?>
                                    </div>
                                    <div class="col-lg-6" style="margin-top: 40px;">
                                        <?php echo form_error('remark') ?>
                                    </div>
                                    <?php validation_errors(); ?>

                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-info">Save</button>
                                    <?php echo anchor('admin/Dashboard', '  Go back ', 'class="btn btn-default float-right"');?>
                                    <!-- <button type="submit" class="btn btn-default float-right">Go Back</button> -->
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