<?php 
session_start();
//error_reporting(0);
require_once('../data/connection.php');
if(strlen($_SESSION['alogin'])==1)
   {  
      
      }
      else{
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
      <h1>User</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">User</li>
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
              <h5 class="card-title">User List</h5>
              <center> <span style="color:red;"> <h5> <?php echo $msg; ?></h5 ></span></center>
              <div class="card-tools">
                <a href="user_add.php" class="btn btn-flat btn-primary" id="create_new"><span class="fas fa-plus"></span>  Create New Admin</a>
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
                    <th scope="col">Name</th>
                    <th scope="col">Username</th>
                    <th scope="col">Password</th>
                    <th scope="col">Types</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                      $sn =1;
                      $sqli = "SELECT user_id, user_first, user_last, user_usename, user_password, user_logintype FROM user where 1 ";
                      $result = mysqli_query($con, $sqli);

                      if (mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) {

                          $id = $row["user_id"];
                          $user_first = $row["user_first"];
                          $user_last = $row["user_last"];
                          
                          $user_usename = $row["user_usename"];
                          $user_password = $row["user_password"];
                          $user_logintype = $row["user_logintype"];

                  ?>
                  <tr>
                    <th scope="row"><?php echo $sn++; ?></th>
                    <td><?php echo ucwords($row['user_first']); ?> <?php echo ucwords($row['user_last']); ?></td>
                    <td><?php echo ucwords($row['user_usename']); ?></td>
                    <td><?php echo ucwords($row['user_password']); ?></td>
                    <td class="">
                                                <?php if($row['user_logintype'] == 1): ?>
                                                <span class=""> Administrator </span>
                                                <?php else: ?>
                                                <span class="">Staff</span>
                                                <?php endif; ?>
                                             </td>
                    <td>
                         <a class="btn btn-info btn-sm" href="user_add.php?user_id=<?php echo $row['user_id']; ?>">Edit</a>
                         <a class="btn btn-danger btn-sm " href="user_add.php?delid=<?php echo $row['user_id']; ?>" onclick="return confirm('are you sure want to delete this record')">Delete</a>
                           <!-- <a class="btn btn-outline-danger btn-sm " href="javascript:void(0);" class="palavras_delete" data-id="<?php echo $row['user_id'] ?>">Delete</a> -->
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
<?php } ?>