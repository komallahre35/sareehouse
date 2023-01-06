<?php 
session_start();
    error_reporting(0);
    require_once('database/connection.php');
    if(strlen($_SESSION['alogin'])==1)
   {  
      
      }
      else{
      date_default_timezone_set('Asia/Kolkata');// change according timezone
      $currentTime = date( 'd-m-Y h:i:s A', time () );
   
   if($_GET['cat_id']!=''){
    $keyvalue = $_GET['cat_id'];
   }else{
    $keyvalue = 0;
   }
   $btn_name = 'Submit';
   if (isset($_POST['submit'])) {
       $cat_name = $_POST['cat_name'];
       $status = $_POST['status'];
   
    if($keyvalue==0){
      // insert code start
       mysqli_query($con, "INSERT INTO cat_list (cat_name, `status`) VALUES ('$cat_name', '$status')"); 
       $action = 1;
       // insert code end
    }else{
      // update code start
        mysqli_query($con, "UPDATE cat_list SET cat_name='$cat_name',`status`='$status' where cat_id='$keyvalue'"); 
        $action = 2;
      // update code end
    }
       echo "<script>location='cat_type.php?action=$action';</script>";
  }

// Delete code start
  if($_GET['delid']!=""){
    mysqli_query($con,"DELETE  FROM cat_list where cat_id='$_GET[delid]'");
    $action = 3;
    echo "<script>location='cat_type.php?action=$action';</script>";
  }
// Delete code end

// edit code start
  if($_GET['cat_id']!=""){
      $btn_name = 'Update';
      $sql = mysqli_query($con,"SELECT * FROM cat_list where cat_id='$keyvalue'");
      $rowedit = mysqli_fetch_array($sql);
    
      $cat_name = $rowedit['cat_name'];
      $status = $rowedit['status'];
  }else{
      $cat_name = '';
      $status = '';
  }
// edit code end
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <?php 
         include('include/header.php');
         ?>
   </head>
   <body>
      <!-- ======= Header ======= -->
      <?php
         include("include/headbar.php");
         
         ?>
      <!-- End Header -->
      <!-- ======= Sidebar ======= -->
      <?php
         include("include/navigation.php");
         
         ?>
      <!-- End Sidebar-->
      <main id="main" class="main">
         <div class="pagetitle">
            <h1>Category Add</h1>
            <nav>
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                  <li class="breadcrumb-item active">Category Add</li>
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
               <div class="card">
                  <div class="card-body">
                     <!-- table start -->
                     <div class="card">
                        <div class="card-body">
                           <!-- Multi Columns Form -->
                           <form class="row g-3" method="post">
                                 <input type="hidden" class="form-control" name="cat_id" id="cat_id" value="<?php echo $keyvalue; ?>">
                              <div class="col-md-12">
                                 <label for="cat_name" class="form-label">Category Name</label>
                                 <input type="text" class="form-control" name="cat_name" id="cat_name" value="<?php echo $cat_name; ?>" >
                                 <input type="hidden" class="form-control" name="status" id="status" value="0" <?php echo isset($status) && $status == 0 ? 'selected' : '' ?>>
                              </div>
                              <!-- <div class="col-md-6">
                                 <label for="status" class="form-label">Status</label>
                                 <select name="status" id="status" class="form-control" value="<?php echo $status; ?>" required>
                                    <option value="1" <?php echo isset($status) && $status == 1 ? 'selected' : '' ?>>Active</option>
                                    <option value="0" <?php echo isset($status) && $status == 0 ? 'selected' : '' ?>>Inactive</option>
                                 </select>
                              </div> -->
                              <div class="text-center">
                                 <button type="submit" name="submit" id="submit" class="btn btn-primary"><?php echo $btn_name; ?></button>
                              </div>
                           </form>
                           <!-- End Multi Columns Form -->
                        </div>
                     </div>
                  </div>
               </div>
               <!-- End Left side columns -->
               <!-- Right side columns -->
               <div class="col-lg-4">
               </div>
               <!-- End Right side columns -->
            </div>
         </section>
      </main>
      <!-- End #main -->
      <!-- ======= Footer ======= -->
      <?php
         include('include/footer.php');
         
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