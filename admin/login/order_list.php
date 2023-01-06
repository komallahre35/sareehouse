<?php 
session_start();
error_reporting(0);
$contact_active = 'active';
require_once('database/connection.php');
require_once('../data/connection.php');

      date_default_timezone_set('Asia/Kolkata');// change according timezone
      $currentTime = date( 'd-m-Y h:i:s A', time () );

 if($_GET['action']==1){
     $msg = "Data Has been Inserted Successfully";
     }
     if($_GET['action']==2){
     $msg = "Data Has been Updated Successfully";
     }
     if($_GET['action']==3){
     $msg = "Data Has been Deleted Successfully";
     }



?>



<!DOCTYPE html>
<html lang="en">

<head>
  <?php 
  include'include/header.php';
  ?>
</head>

<body>

  <!-- ======= Header ======= -->
  <?php

  include"include/headbar.php";

  ?>
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <?php
  include"include/navigation.php";

  ?>
  <!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Order List</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Order List</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">


        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">


            <!-- Sales Card -->
            <div class="card">
            <div class="card-body">
              <h5 class="card-title">Order List</h5>
              <center> <span style="color:red;"> <h5> <?php echo $msg; ?></h5 ></span></center>
              <div class="card-tools">
                <!-- <a href="vender_add.php" class="btn btn-flat btn-primary" id="create_new"><span class="fas fa-plus"></span>  Create New Vender</a> -->
			          <div class="card-right">
            <div class="card-body">

              
              
            </div>
          </div>
		          </div>

              <!-- table start -->
              <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">

              

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>

                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Order Date</th>
                    <th scope="col">Order Code</th>
                    <!-- <th scope="col">Vender Code</th> -->
                    <th scope="col">Total Amount</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                      $sn =1;
                      $sqli = "SELECT vender_id, bus_name, ven_name, ven_phone, ven_img, v_password, vender_status FROM vender_list where 1 ";
                      $result = mysqli_query($con, $sqli);

                      if (mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) {

                          $id = $row["vender_id"];
                          $bus_name = $row["bus_name"];
                          $ven_name = $row["ven_name"];
                          
                          $ven_phone = $row["ven_phone"];
                          $ven_img = $row["ven_img"];
                          $v_password = $row["v_password"];

                  ?>
                  <tr>
                    <th scope="row"><?php echo $sn++; ?></th>
                    <td><?php echo date("Y-m-d H:i",strtotime($row['date_created'])) ?></td>
                    <td><?php echo ucwords($row['ven_name']); ?></td>
                    
                    <td><?php echo ucwords($row['ven_phone']); ?></td>
                    <td class="">
                                                <?php if($row['vender_status'] == 1): ?>
                                                <span class="badge bg-primary"> Active </span>
                                                <?php else: ?>
                                                <span class="badge bg-danger">Inactive</span>
                                                <?php endif; ?>
                                             </td>
                    <td>
                         <a class="btn btn-info btn-sm" href="vender_add.php?vender_id=<?php echo $row['vender_id']; ?>">Edit</a>
                         <a class="btn btn-danger btn-sm " href="vender_add.php?delid=<?php echo $row['vender_id']; ?>" onclick="return confirm('are you sure want to delete this record')">Delete</a>
                           <!-- <a class="btn btn-outline-danger btn-sm " href="javascript:void(0);" class="palavras_delete" data-id="<?php echo $row['vender_id'] ?>">Delete</a> -->
                     </td>
                    
                  </tr>

                </tbody>
                <?php } } ?>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>
              <!-- end table -->

          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">

          <!-- Recent Activity -->
          <!-- End Recent Activity -->

          <!-- Budget Report -->
          <!-- End Budget Report -->

          <!-- Website Traffic -->
          <!-- End Website Traffic -->

          <!-- News & Updates Traffic -->
          <!-- End News & Updates -->

        </div><!-- End Right side columns -->

      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php

              include'include/footer.php';

              ?> <!-- End Footer -->

  <!-- <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a> -->

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
