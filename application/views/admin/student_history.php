<?php include("header.php"); ?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <button type="button" class="btn btn-info">Info</button>
        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="<?= base_url(); ?>public/dist/img/AdminLTELogo.png" alt="AdminLTELogo"
                height="60" width="60">
        </div>



        <!-- Main Sidebar Container -->


        <?php include("sidebar.php"); ?>
        <!-- Sidebar End -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Student History</h3>
                        </div>

                        <div class="box-body no-padding">
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Student Name</th>
                                        <th>Courses Count</th>
                                        <th>View Detail</th>
                                    </tr>
                                    <?php $count = 0; ?>
                                    <?php if (count($student)) :

                                    ?>


                                    <?php foreach ($student as $stu) : ?>
                                    <tr>

                                        <td><?php echo $stu['id']; ?></td>
                                        <td><?php echo $stu['name']; ?></td>
                                        <td><span class="badge bg-blue"><?php echo $stu['count']; ?></span></td>

                                        <td>
                                            <a href="<?php echo base_url('admin/StudentDetailed/' . $stu['id']); ?>"
                                                class="btn btn-primary">View More</a>
                                            <!-- <button type="button" class="btn btn-block btn-primary">View More</button> -->
                                        </td>
                                        <!-- <?= form_hidden('id', $stu->id) ?> -->
                                        <?php $count++;
                                        endforeach; ?>
                                        <?php else : ?>
                                        <?php endif; ?>
                                    </tr>


                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </section>
            <!-- /.card -->

            <!-- DIRECT CHAT -->

            <!-- /.content-wrapper -->
            <!-- Footer -->
        </div>
    </div>
    <?php include("footer.php"); ?>
</body>

</html>