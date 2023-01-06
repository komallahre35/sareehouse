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

   if($_GET['action']==1){
     $msg = "Data Has been Inserted Successfully";
     }
     if($_GET['action']==2){
     $msg = "Data Has been Updated Successfully";
     }
     if($_GET['action']==3){
     $msg = "Data Has been Deleted Successfully";
     }
   
    require_once('../data/connection.php');
    //require_once('../NiceAdmin/cat_add.php');
   
   
   //  if (isset($_REQUEST['delid'])) {
   //   $delid = $_REQUEST['delid'];
   //   $sqli = "DELETE FROM  `cat_list` where id = $delid ";
   //   $result1 = mysqli_query($con, $sqli);
   
   // }
   
   
   
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
            <h1>Category</h1>
            <nav>
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                  <li class="breadcrumb-item active">Category</li>
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
                     <h5 class="card-title">Category List </h5> 
                    <center> <span style="color:red;"> <h5> <?php echo "$msg"; ?></h5 ></span></center>
                     <div class="card-tools">
                        <a href="cat_add.php" class="btn btn-flat btn-primary" id="create_new"><span class="fas fa-plus"></span>Add Category</a>
                     </div>
                     <br>
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
                                             <th scope="col">S.No.</th>
                                             <th scope="col">Category</th>
                                             <th scope="col">Status</th>
                                             
                                          </tr>
                                       </thead>
                                       <tbody>
                                          <?php 
                                             $sn =1;
                                              $sqli = "SELECT cat_id, cat_name, status FROM cat_list where 1 ";
                                              $result = mysqli_query($con, $sqli);
                                             
                                              if (mysqli_num_rows($result) > 0) {
                                                while($row = mysqli_fetch_assoc($result)) {
                                             
                                                  $id = $row["cat_id"];
                                                  $cat_name = $row["cat_name"];
                                                  $status = $row["status"];
                                             
                                             ?>
                                          <tr class="palavras_row">
                                             <th scope="row"><?php echo $sn++; ?></th>
                                             <td><?php echo ucwords($row['cat_name']); ?></td>
                                             <td class="">
                                                <?php if($row['status'] == 1): ?>
                                                <span class="badge bg-primary"> Active </span>
                                                <?php else: ?>
                                                <span class="badge bg-danger">Pending</span>
                                                <?php endif; ?>
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
      <?php include('include/footer.php');
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
<script type="text/javascript">
   (function($) {
       $(document).on('click', '.palavras_row a.palavras_delete', function() {
           var _id = $(this).attr('data-id');
           var _row = $(this).parent().parent();
           $.ajax({
               url: 'delete.php',
               data: {
                   idpalavras: _id
               },
               type: 'POST',
               dataType: 'json',
               success: function(__resp) {
                   if (__resp.success) {
                       _row.remove(); // Deletes the row from the table
                   }
               }
           });
       });
   })(jQuery);
</script>
<script>
   $(document).ready(function(){
     $('#create_new').click(function(){
       uni_modal('Add New Shop Type',"shop_types/manage_shop_type.php")
     })
     $('.edit_data').click(function(){
       uni_modal('Update Shop Type',"shop_types/manage_shop_type.php?id="+$(this).attr('data-id'))
     })
     $('.delete_data').click(function(){
       _conf("Are you sure to delete this Shop Type permanently?","delete_shop_type",[$(this).attr('data-id')])
     })
     $('table .th,table .td').addClass('align-middle px-2 py-1')
     $('.table').dataTable();
   })
   function delete_shop_type($id){
     start_loader();
     $.ajax({
       url:_base_url_+"classes/Master.php?f=delete_shop_type",
       method:"POST",
       data:{id: $id},
       dataType:"json",
       error:err=>{
         console.log(err)
         alert_toast("An error occured.",'error');
         end_loader();
       },
       success:function(resp){
         if(typeof resp== 'object' && resp.status == 'success'){
           location.reload();
         }else{
           alert_toast("An error occured.",'error');
           end_loader();
         }
       }
     })
   }
</script>
<?php } ?>