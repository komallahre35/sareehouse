<?php 
session_start();
error_reporting(0);
require_once('../data/connection.php');
if(strlen($_SESSION['alogin'])==1)
   {  
      
      }
      else{
      date_default_timezone_set('Asia/Kolkata');// change according timezone
      $currentTime = date( 'd-m-Y h:i:s A', time () );

if($_GET['user_id']!=''){
    $keyvalue = $_GET['user_id'];
   }else{
    $keyvalue = 0;
   }
   $btn_name = 'Submit';
   if (isset($_POST['submit'])) {
       $user_first = $_POST['user_first'];
       $user_last = $_POST['user_last'];
       $user_usename = $_POST['user_usename'];
       $user_password = $_POST['user_password'];
       $user_logintype = $_POST['user_logintype'];
   
    if($keyvalue==0){
      // insert code start
       mysqli_query($con, "INSERT INTO user (user_first, user_last, user_usename, user_password, `user_logintype`) VALUES ('$user_first', '$user_last', '$user_usename', '$user_password', '$user_logintype')"); 
       $action = 1;
       // insert code end
    }else{
      // update code start
        mysqli_query($con, "UPDATE user SET user_first='$user_first', user_last='$user_last', user_usename='$user_usename',user_password='$user_password', user_logintype='$user_logintype' where user_id='$keyvalue'"); 
        $action = 2;
      // update code end
    }
       echo "<script>location='user_list.php?action=$action';</script>";
  }

// Delete code start
  if($_GET['delid']!=""){
    mysqli_query($con,"DELETE  FROM user where user_id='$_GET[delid]'");
    $action = 3;
    echo "<script>location='user_list.php?action=$action';</script>";
  }
// Delete code end

// edit code start
  if($_GET['user_id']!=""){
      $btn_name = 'Update';
      $sql = mysqli_query($con,"SELECT * FROM user where user_id='$keyvalue'");
      $rowedit = mysqli_fetch_array($sql);
    
      $user_first = $rowedit['user_first'];
      $user_last = $rowedit['user_last'];
      // $ven_code = $rowedit['ven_code'];
      $user_usename = $rowedit['user_usename'];
      $user_password = $rowedit['user_password'];
      $user_logintype = $rowedit['user_logintype'];
  }else{
      $user_first = '';
      $user_last = '';
      $user_usename = '';
      $user_password = '';
      $user_logintype = '';
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
      <h1>Create Account</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active"> Create Account</li>
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
                  <input type="text" class="form-control" id="user_first" name="user_first" placeholder="Enter Your First Name" value="<?php echo $user_first; ?>" >
                </div>
                <div class="col-md-6">
                  <label for="inputAddress2" class="form-label">Last Name</label>
                  <input type="text" class="form-control" id="user_last" name="user_last" placeholder="Enter Your Last Name" value="<?php echo $user_last; ?>" >
                </div>
                <!-- <div class="col-md-6">
                  <label for="inputAddress2" class="form-label">Vender Code</label>
                  <input type="number" class="form-control" id="ven_code" name="ven_code" placeholder="">
                </div> -->
                <div class="col-md-6">
                  <label for="inputAddress2" class="form-label">Username</label>
                  <input type="phone" class="form-control" id="user_usename" name="user_usename" placeholder="Enter Your Username" value="<?php echo $user_usename; ?>">
                </div>
              <div class="col-md-6">
                  <label for="inputAddress2" class="form-label">Password</label>
                  <input type="password" class="form-control" id="user_password" name="user_password" value="<?php echo $user_password; ?>" placeholder="Enter Your Password">
                </div>
                <div class="col-md-6">
                                 <label for="status" class="form-label">Login Types</label>
                                 <select name="user_logintype" id="user_logintype" class="form-control" value="<?php echo $user_logintype; ?>" required>
                                    <option value="1" <?php echo isset($vender_status) && $vender_status == 1 ? 'selected' : '' ?>>Administrator</option>
                                    <option value="0" <?php echo isset($vender_status) && $vender_status == 0 ? 'selected' : '' ?>>Staff</option>
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
<?php } ?>