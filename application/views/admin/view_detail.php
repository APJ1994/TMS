<?php include("header.php"); ?>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <?php include("sidebar.php"); ?>

        <div class="content-wrapper">


            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">

                            <div class="invoice p-3 mb-3">

                                <div class="row">
                                    <div class="col-12">
                                        <h4>
                                            <i class="fas fa-globe"></i>IBT.
                                            <small class="float-right">Date: 2/10/2014</small>
                                        </h4>
                                    </div>

                                </div>

                                <div class="row invoice-info">


                                    <div class="col-sm-4 invoice-col">
                                        To
                                        <?php if (count($student)) : ?>
                                            <?php foreach ($student as $stu) : ?>
                                                <address>
                                                    <strong><?= $stu['name'] ?></strong><br>
                                                    <?= $stu['contact']; ?><br>

                                                    Email: <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="aec4c1c6c080cac1cbeecbd6cfc3dec2cb80cdc1c3">[email&#160;protected]</a>
                                                </address>
                                            <?php endforeach; ?>
                                        <?php else : ?>
                                        <?php endif; ?>
                                    </div>

                                    <div class="col-sm-4 invoice-col">
                                        <b>Invoice #007612</b><br>
                                        <br>

                                        <b>Account:</b> 968-34567
                                    </div>

                                </div>


                                <div class="row">
                                    <div class="col-12 table-responsive">

                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title">Courses</h3>
                                            </div>

                                            <div class="card-body">
                                                <?php $count = 0;
                                                $fee_sum = 0;
                                                $paidfee = 0;
                                                foreach ($courses as $c) : ?>
                                                    <div id="accordion">
                                                        <div class="card card-primary">
                                                            <div class="card-header">
                                                                <h4 class="card-title w-100">
                                                                    <a class="d-block w-100" data-toggle="collapse" href="#collapse<?= $c["stu_course_id"] ?>">
                                                                        Course Name -
                                                                        <?php $fee_sum += $c["fees"]; ?>
                                                                        <?php echo $c["name"] . " | Course Fee -  " . $c["fees"] ?>
                                                                    </a>
                                                                </h4>
                                                            </div>
                                                            <div id="collapse<?= $c["stu_course_id"] ?>" class="collapse <?= $count == 0 ? "show" : "" ?> " data-parent="#accordion">
                                                                <div class="card-body">

                                                                    <?php
                                                                    $res = $this->db->get_where("fees", ["pursue_id" => $c["stu_course_id"]]);
                                                                    if ($res->num_rows() > 0) {
                                                                        $res = $res->result_array();
                                                                    ?>
                                                                        <table class="table table-striped">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>Date</th>
                                                                                    <th>Amount</th>
                                                                                    <th>Created By</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>

                                                                                <?php foreach ($res as $r) : ?>
                                                                                    <?php $paidfee += $r["amount"]; ?>


                                                                                    <tr>
                                                                                        <td><?php echo $r["createdDate"] ?></td>
                                                                                        <td><?php echo $r["amount"] ?></td>
                                                                                        <td><?php echo $user[0]['username'];  ?>
                                                                                        </td>



                                                                                    </tr>
                                                                                <?php endforeach; ?>



                                                                            </tbody>
                                                                        </table>
                                                                    <?php } else {
                                                                        echo "No Records";
                                                                    } ?>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                <?php $count++;
                                                endforeach;  ?>
                                            </div>

                                        </div>

                                    </div>

                                </div>

                                <div class="row">


                                    <div class="col-12">
                                        <p class="lead"></p>
                                        <div class="table-responsive">
                                            <table class="table">


                                                <tr>
                                                    <th style="width:50%">Total Fee:</th>
                                                    <td>₹<?php echo $fee_sum; ?></td>
                                                </tr>


                                                <tr>
                                                    <th>Paid:</th>
                                                    <td>₹<?php echo $paidfee; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Remaining</th>
                                                    <td>₹<?php echo $fee_sum - $paidfee; ?></td>
                                                </tr>

                                            </table>
                                        </div>
                                    </div>

                                </div>


                                <!-- <div class="row no-print">
                                    <div class="col-12">
                                        <a href="invoice-print.html" rel="noopener" target="_blank"
                                            class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                                        <button type="button" class="btn btn-success float-right"><i
                                                class="far fa-credit-card"></i> Submit
                                            Payment
                                        </button>
                                        <button type="button" class="btn btn-primary float-right"
                                            style="margin-right: 5px;">
                                            <i class="fas fa-download"></i> Generate PDF
                                        </button>
                                    </div>
                                </div> -->
                            </div>

                        </div>
                    </div>
                </div>
            </section>

        </div>

        <?php include("footer.php"); ?>
</body>

</html>