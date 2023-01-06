<?php 
   //error_log(0);
   session_start();
   require_once('database/connection.php');
   $page_title = 'Dashboard';
   
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
            <h1>Dashboard</h1>
            <nav>
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                  <li class="breadcrumb-item active">Dashboard</li>
               </ol>
            </nav>
         </div>
         <!-- End Page Title -->
         <section class="section dashboard">
            <div class="row">
               <!-- Left side columns -->
               <div class="col-lg-12">
                  <div class="row">
                     <!-- Sales Card -->
                     <div class="col-xxl-4 col-md-6">
                        <div class="card info-card sales-card">
                           <div class="card-body">
                              <h5 class="card-title">Total Categories <span></span></h5>
                              <div class="d-flex align-items-center">
                                 <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-cart-fill"></i>
                                 </div>
                                 <div class="ps-3">
                                    <?php 
                                       $total = $con->query("SELECT count(cat_id) as cat_id FROM cat_list where `status` = 1 ")->fetch_assoc()['cat_id'];
                                       ?>
                                    <h6><?php echo "$total"; ?></h6>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- End Sales Card -->
                     <!-- Revenue Card -->
                     <div class="col-xxl-4 col-md-6">
                        <div class="card info-card revenue-card">
                           <div class="card-body">
                              <h5 class="card-title">Total Shop Type</h5>
                              <div class="d-flex align-items-center">
                                 <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-shop"></i>
                                 </div>
                                 <div class="ps-3">
                                    <h6>$36</h6>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- End Revenue Card -->
                     <!-- Customers Card -->
                     <div class="col-xxl-4 col-xl-12">
                        <div class="card info-card customers-card">
                           <div class="card-body">
                              <h5 class="card-title">Total Products</h5>
                              <div class="d-flex align-items-center">
                                 <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-people"></i>
                                 </div>
                                 <div class="ps-3">
                                    <?php 
                                       $total = $con->query("SELECT count(product_id) as product_id FROM product_list where 1 ")->fetch_assoc()['product_id'];
                                       
                                       ?>
                                    <h6><?php echo "$total"; ?></h6>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- End Customers Card -->
                     <!-- Customers Card -->
                     <div class="col-xxl-4 col-xl-12">
                        <div class="card info-card customers-card">
                           <div class="card-body">
                              <h5 class="card-title">Total Vendors</h5>
                              <div class="d-flex align-items-center">
                                 <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-people"></i>
                                 </div>
                                 <div class="ps-3">
                                    <?php 
                                       $total = $con->query("SELECT count(vender_id) as vender_id FROM vender_list where 1 ")->fetch_assoc()['vender_id'];
                                       ?>
                                    <h6><?php echo "$total"; ?></h6>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- End Customers Card -->
                     <!-- Customers Card -->
                     <div class="col-xxl-4 col-xl-12">
                        <div class="card info-card customers-card">
                           <div class="card-body">
                              <h5 class="card-title">Total Clients</h5>
                              <div class="d-flex align-items-center">
                                 <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-person-fill"></i>
                                 </div>
                                 <div class="ps-3">
                                    <h6>12</h6>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- End Customers Card -->
                     <!-- Customers Card -->
                     <div class="col-xxl-4 col-xl-12">
                        <div class="card info-card customers-card">
                           <div class="card-body">
                              <h5 class="card-title">Total Pending Orders</h5>
                              <div class="d-flex align-items-center">
                                 <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-cart-x-fill"></i>
                                 </div>
                                 <div class="ps-3">
                                    <h6>12</h6>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- End Customers Card -->
                   
                  <!-- News & Updates Traffic -->
                  <!-- End News & Updates -->
               </div>
               <!-- End Right side columns -->
            </div>
         </section>
      </main>
      <!-- End #main -->
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