<?php include("header.php"); ?>

<body class="hold-transition sidebar-mini layout-fixed">


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



            <h1 class="m-0 text-center"> Student Details</h1>

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

        <!-- Small boxes (Stat box) -->

        <!-- small box -->
        <div class="container">
            <?php echo form_open_multipart('admin/StudentForm'); ?>
            <?php echo form_hidden('created_by', $this->session->userdata('id')); ?>
            <div class="form-goup row mt-2">
                <label for="exampleInputEmail1" class="col-sm-2 col-form-label">Full Name</label>
                <div class=" col-sm-6">
                    <?php echo form_input(['class' => 'form-control', 'name' => 'name', 'id' => 'sname', 'placeholder' => 'Enter Full Name']); ?>
                </div>
            </div>
            <?php echo form_error('name') ?>

            <div class="form-goup row mt-2">
                <label for="exampleInputPassword1" class="col-sm-2 col-form-label">Contact Number</label>
                <div class=" col-sm-6">
                    <?php echo form_input(['class' => 'form-control', 'name' => 'contact', 'id' => 'scontact', 'placeholder' => 'Enter Contact']); ?>
                </div>
            </div>
            <?php echo form_error('contact') ?>
            <div class="form-goup row mt-2">
                <label for="exampleInputEmail1" class="col-sm-2 col-form-label">Remark</label>
                <div class=" col-sm-6">
                    <?php echo form_input(['class' => 'form-control', 'name' => 'remark', 'id' => 'sname', 'placeholder' => 'Enter Remarks']); ?>
                </div>
            </div>
            <?php echo form_error('remark') ?>
            <div class=" col-sm-6 mb-2">
                <span class="d-inline-block" style="margin:30px 0 0 176px" tabindex="0" data-bs-toggle="tooltip" data-bs-title="Disabled tooltip">
                    <a href="<?= base_url('admin/WEbcam'); ?>" type="file" class="btn btn-success">Capture
                        Image</a>
                    </li>
                </span>
            </div>
            <?php validation_errors(); ?>
            <div class="card-footer">
                <button type="submit" class="btn btn-info">Save</button>
                <?php echo anchor('admin/StudentAdmission', '  Go back ', 'class="btn btn-default float-right"');?>
            </div>

            </form>


        </div>



    </div>
    </div>

    <?php include("footer.php"); ?>
</body>

</html>