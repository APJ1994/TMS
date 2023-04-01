<?php include("header.php"); ?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="<?= base_url(); ?>public/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
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
                            <h1 class="m-0 text-center"> Fees Details</h1>
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
                                <?php echo form_open('admin/InsertFeeDetail'); ?>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Student Name</label>
                                    <?php echo form_hidden('createdBy', $this->session->userdata('id')); ?>
                                    <select class="form-select" name="sname" id="sname" aria-label="Default select example">
                                        <option selected>Select Student Name</option>
                                        <?php if (count($student)) : ?>
                                            <?php foreach ($student as $stu) : ?>
                                                <option value=<?php echo $stu['id']; ?>><?php echo $stu['name']; ?></option>
                                            <?php endforeach; ?>
                                        <?php else : ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                                <div class="container me-4">
                                    <div class="form-group row ">
                                        <label for="inputPassword3" class="col-sm-2 col-form-label">Student
                                            Course</label>
                                        <select class="form-select" name="scourse" id="scourse" aria-label="Default select example">
                                            <option>Select Student Course</option>

                                        </select>
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
                    <?php echo form_input(['class' => 'form-control', 'name' => 'sname', 'id' => 'sname', 'placeholder' => 'Enter Full Name']); ?>
                    </div>
                  </div> -->
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Student Total
                                        Fees</label>
                                    <div class="col-sm-2">
                                        <?php echo form_input(['class' => 'form-control', 'name' => 'tfees', 'id' => 'stotal', 'placeholder' => 'Enter Total Fees', 'readonly' => 'readonly']); ?>
                                    </div>

                                    <!-- <div class="form-group row"> -->
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Remaining
                                        Fees</label>
                                    <!-- </div> -->
                                    <div class="col-sm-2">
                                        <?php echo form_input(['class' => 'form-control', 'name' => 'rfees', 'id' => 'srem', 'placeholder' => 'Enter Remaining Fees']); ?>
                                    </div>
                                    <!-- </div> -->

                                    <!-- <div class="form-group row"> -->
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Paid
                                        Fees</label>
                                    <div class="col-sm-2">
                                        <?php echo form_input(['class' => 'form-control', 'name' => 'pfees', 'id' => 'pfees', 'placeholder' => 'Paid Fees']); ?>
                                    </div>
                                </div>

                            </div>
                            <?php validation_errors(); ?>
                            <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

                            <script>
                                $(document).ready(function() {
                                    $('#sname').change(function() {
                                        var id = $('#sname').val();
                                        // alert(id);
                                        if (id != '') {
                                            $.ajax({
                                                url: "<?php echo base_url(); ?>admin/fetchPurseDetailByStudent/" +
                                                    id,
                                                success: function(data) {
                                                    $('#scourse').html(data);
                                                }

                                            });
                                        }
                                    });
                                    $("#stotal").val("");

                                    $('#scourse').change(function() {
                                        var id = $('#scourse').val();
                                        if (id != '') {
                                            $.ajax({
                                                url: "<?php echo base_url(); ?>admin/fetchFeesByPurseId/" +
                                                    id,
                                                success: function(data) {
                                                    if (data == 0) {

                                                    } else {
                                                        data = JSON.parse(data);
                                                        console.log("data", data)
                                                        $("#stotal").val(data.total);
                                                        $("#srem").val(data.remaining);
                                                        $("#pfees").val(data.paid);
                                                    }
                                                }

                                            });
                                        }
                                    });


                                    // $(document).ready(function(){
                                    //   $('#scourse').change(function(){
                                    //     var sid=$('#scourse').val();
                                    //     if(sid!='')
                                    //     {
                                    //       $.ajax({
                                    //         url:"<?php echo base_url(); ?>admin/",
                                    //         method:"POST",
                                    //         data:{sid:sid},
                                    //         sucess:function(data)
                                    //         {
                                    //           $('#stotal').html(data);
                                    //           $('#srem').html('');
                                    //         }
                                    //       });
                                    //       else{
                                    //         $('#stotal').html();
                                    //         $('#srem').html();

                                    //       }
                                    //     }
                                    //   });
                                    //   $(document).ready(function(){
                                    //     $('#stotal').change(function(){
                                    //       var tid=$('#stotal').val();
                                    //       if(tid!='')
                                    //       {
                                    //         $.ajax({
                                    //           url:"<?php echo base_url(); ?>admin/",
                                    //           method:"POST",
                                    //           data:{tid:tid},
                                    //           success:function(data)
                                    //           {
                                    //             $('#srem').html();
                                    //           }
                                    //         });
                                    //         else{
                                    //           $('#rem').html();
                                    //         }
                                    //       }
                                    //     });
                                    //   });

                                });
                            </script>
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


        <!-- /.card -->

        <!-- DIRECT CHAT -->

        <!-- /.content-wrapper -->
        <!-- Footer -->
        <?php include("footer.php"); ?>
</body>

</html>