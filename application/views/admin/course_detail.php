<?php include("header.php"); ?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">


        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="<?= base_url(); ?>public/dist/img/AdminLTELogo.png" alt="AdminLTELogo"
                height="60" width="60">
        </div>


        <!-- Sidebar -->

        <?php include("sidebar.php"); ?>
        <!-- Sidebar End -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-center">Add Courses Details</h1>
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
                                <?php echo form_open('admin/CourseForm'); ?>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Course Name</label>
                                    <?php echo form_hidden('createdBy', $this->session->userdata('id')); ?>
                                    <div class="col-sm-6">
                                        <?php echo form_input(['class' => 'form-control', 'name' => 'name', 'id' => 'sname', 'placeholder' => 'Enter Course Name']); ?>
                                    </div>
                                </div>
                                <?php echo form_error('name') ?>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Course fees</label>
                                    <div class="col-sm-6">
                                        <?php echo form_input(['class' => 'form-control', 'name' => 'fees', 'id' => 'scontact', 'placeholder' => 'Enter Course Fees']); ?>
                                    </div>
                                </div>
                                 <?php echo form_error('fees') ?>
                                
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Descirption</label>
                                    <div class="col-sm-6">
                                        <?php echo form_textarea(['class' => 'form-control', 'name' => 'description', 'id' => 'sname', 'placeholder' => 'Enter Desciption']); ?>
                                    </div>
                                    <?php echo form_error('description') ?>
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
                                    <?php echo anchor('admin/AddStudent', '  Go back ', 'class="btn btn-default float-right"');?>
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