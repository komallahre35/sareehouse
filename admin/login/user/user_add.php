<?php 
require_once('../data/connection.php');
if($_GET['vender_id']!=''){
    $keyvalue = $_GET['vender_id'];
   }else{
    $keyvalue = 0;
   }
   $btn_name = 'Submit';
   if (isset($_POST['submit'])) {
       $bus_name = $_POST['bus_name'];
       $ven_name = $_POST['ven_name'];
       $ven_code = $_POST['ven_code'];
       $ven_phone = $_POST['ven_phone'];
       $ven_img = $_POST['ven_img'];
       $v_password = $_POST['v_password'];
       $vender_status = $_POST['vender_status'];
   
    if($keyvalue==0){
      // insert code start
       mysqli_query($con, "INSERT INTO vender_list (bus_name, ven_name, ven_phone, ven_img, `v_password`, `vender_status`) VALUES ('$bus_name', '$ven_name', '$ven_phone', '$ven_img', '$v_password', '$vender_status')"); 
       $action = 1;
       // insert code end
    }else{
      // update code start
        mysqli_query($con, "UPDATE vender_list SET bus_name='$bus_name', ven_name='$ven_name', ven_phone='$ven_phone',ven_img='$ven_img', v_password='$v_password',vender_status='$vender_status' where vender_id='$keyvalue'"); 
        $action = 2;
      // update code end
    }
       echo "<script>location='vender.php?action=$action';</script>";
  }

// Delete code start
  if($_GET['delid']!=""){
    mysqli_query($con,"DELETE  FROM vender_list where vender_id='$_GET[delid]'");
    $action = 3;
    echo "<script>location='vender.php?action=$action';</script>";
  }
// Delete code end

// edit code start
  if($_GET['vender_id']!=""){
      $btn_name = 'Update';
      $sql = mysqli_query($con,"SELECT * FROM vender_list where vender_id='$keyvalue'");
      $rowedit = mysqli_fetch_array($sql);
    
      $bus_name = $rowedit['bus_name'];
      $ven_name = $rowedit['ven_name'];
      // $ven_code = $rowedit['ven_code'];
      $ven_phone = $rowedit['ven_phone'];
      $ven_img = $rowedit['ven_img'];
      $v_password = $rowedit['v_password'];
      $vender_status = $rowedit['vender_status'];
  }else{
      $bus_name = '';
      $ven_name = '';
      // $ven_code = '';
      $ven_phone = '';
      $ven_img = '';
      $v_password = '';
      $vender_status = '';
  }

// if (isset($_POST['submit'])) {
//     $bus_name = $_POST['bus_name'];
//     $ven_name = $_POST['ven_name'];
//     $ven_code = $_POST['ven_code'];
//     $ven_phone = $_POST['ven_phone'];
//     $ven_img = $_POST['ven_img'];
//     $v_password = $_POST['v_password'];

//     mysqli_query($con, "INSERT INTO vender_list (bus_name, ven_name, ven_code, ven_phone, ven_img, v_password) VALUES ('$bus_name', '$ven_name', '$ven_code', '$ven_phone', '$ven_img', '$v_password')"); 
//     $_SESSION['message'] = "Address saved"; 
//     header('location: ');
//   }



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
      <h1>Vender Create Account</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Vender Create Account</li>
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
              
              

              <!-- table start -->
              <div class="card-center">
            <div class="card-body">
              

              <!-- Multi Columns Form -->
              <form class="row g-3" method="post">
                <div class="col-md-12">
                  
                  <input type="hidden" class="form-control" id="id" name="id" value="" >
                </div>
                <div class="col-md-6">
                  <label for="inputEmail5" class="form-label">First Name</label>
                  <input type="text" class="form-control" id="bus_name" name="bus_name" placeholder="Enter Your Business Name" value="<?php echo $bus_name; ?>" >
                </div>
                <div class="col-md-6">
                  <label for="inputAddress2" class="form-label">Last Name</label>
                  <input type="text" class="form-control" id="ven_name" name="ven_name" placeholder="Enter Your Vender Name" value="<?php echo $ven_name; ?>" >
                </div>
                <!-- <div class="col-md-6">
                  <label for="inputAddress2" class="form-label">Vender Code</label>
                  <input type="number" class="form-control" id="ven_code" name="ven_code" placeholder="">
                </div> -->
                <div class="col-md-6">
                  <label for="inputAddress2" class="form-label">Username</label>
                  <input type="phone" class="form-control" id="ven_phone" name="ven_phone" placeholder="Enter Your Number" value="<?php echo $ven_phone; ?>">
                </div>
              <div class="col-md-6">
                  <label for="inputAddress2" class="form-label">Password</label>
                  <input type="password" class="form-control" id="v_password" name="v_password" value="<?php echo $v_password; ?>" placeholder="Enter Your Password">
                </div>
                <div class="col-md-6">
                                 <label for="status" class="form-label">Login Types</label>
                                 <select name="vender_status" id="vender_status" class="form-control" value="<?php echo $vender_status; ?>" required>
                                    <option value="1" <?php echo isset($vender_status) && $vender_status == 1 ? 'selected' : '' ?>>Active</option>
                                    <option value="0" <?php echo isset($vender_status) && $vender_status == 0 ? 'selected' : '' ?>>Inactive</option>
                                 </select>
                              </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary" id="submit" name="submit"><?php echo $btn_name; ?></button>  
                </div>
              </form><!-- End Multi Columns Form -->

            </div>
          </div>
              
              <!-- end table -->
          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">

          

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