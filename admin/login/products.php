<?php 
   session_start();
   require_once('database/connection.php');
   $page_title = 'Product Details';
   //
   error_reporting(0);
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
      <?php
         include"include/headbar.php";
         ?>
      <?php
         include"include/navigation.php";
         ?>
      <main id="main" class="main">
         <div class="pagetitle">
            <h1>Product</h1>
            <nav>
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                  <li class="breadcrumb-item active">Product</li>
               </ol>
            </nav>
         </div>
         <section class="section dashboard">
            <div class="row">
            <div class="col-lg-12">
            <div class="row">
               <div class="card">
                  <div class="card-body">
                     <h5 class="card-title">List of Products</h5>
                     <center>
                        <span style="color:red;">
                           <h5> <?php echo $msg; ?></h5 >
                        </span>
                     </center>
                     <div class="card-tools">
                        <a href="products_add.php" class="btn btn-flat btn-primary" id="create_new"><span class="fas fa-plus"></span>Add Product</a>
                     </div>
                     <div class="card-tools">
                     </div>
                     <section class="section">
                        <div class="row">
                           <div class="col-lg-12">
                              <div class="card">
                                 <div class="card-body">
                                    <table class="table datatable">
                                       <thead>
                                          <tr>
                                             <th scope="col">#</th>
                                             <th scope="col">Categoty</th>
                                             <th scope="col">Product Name</th>
                                             <th scope="col">Selling Price</th>
                                             <th scope="col">product Price</th>
                                             <th scope="col">Product Image</th>
                                             <th scope="col">Product Availability</th>
                                             <th scope="col">Action</th>
                                          </tr>
                                       </thead>
                                       <tbody>
                                          <?php 
                                             $sn =1;
                                             $sqli = "SELECT product_id, product_name, product_price, product_price1, product_cat, product_img, productAvailability, product_desc FROM product_list where 1 ";
                                             $result = mysqli_query($con, $sqli);
                                             
                                             if (mysqli_num_rows($result) > 0) {
                                               while($row = mysqli_fetch_assoc($result)) {
                                             
                                                 $id = $row["product_id"];
                                                 $product_cat = $row["product_cat"];
                                                 $product_name = $row["product_name"];
                                                 $product_price = $row["product_price"];
                                                 $product_price1 = $row["product_price1"];
                                                 $product_img = '../../image/product/'.$row["product_img"];
                                                 $productAvailability = $row["productAvailability"];
                                                 $product_desc = $row["product_desc"];
                                             
                                             ?>
                                          <tr>
                                             <th scope="row"><?php echo $sn++; ?></th>
                                             <td><?php echo ucwords($row['product_cat']); ?></td>
                                             <td><?php echo ucwords($row['product_name']); ?></td>
                                             <td><?php echo ucwords($row['product_price']); ?></td>
                                             <td class="text-danger"><?php echo ucwords($row['product_price1']); ?></td>
                                             <td><img src="<?php echo $product_img; ?>" width="50" height="50" alt="Image" class="border border-gray img-thumbnail product-img"></td>
                                             <td>
                                                <?php if($row['productAvailability'] == '1'): ?>
                                                <span class="badge bg-success">In Stock</span>
                                                <?php else: ?>
                                                <span class="badge bg-danger">Out of Stock</span>
                                                <?php endif; ?>
                                             </td>
                                             <td>
                                                <a class="bi bi-pencil-square btn btn-info" href="products_add.php?product_id=<?php echo $row['product_id']; ?>"></a>
                                                <a class="bi bi-trash btn btn-danger" class="btn btn-info btn-sm" href="products_add.php?delid=<?php echo $row['product_id']; ?>" onclick="return confirm('are you sure want to delete this record')"></a>
                                             </td>
                                          </tr>
                                       </tbody>
                                       <?php } } ?>
                                    </table>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </section>
                  </div>
               </div>
               <div class="col-lg-4">
               </div>
            </div>
         </section>
      </main>
      <?php
         include'include/footer.php';
         ?> 
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
<script>
   $(document).ready(function(){
     $('#create_new').click(function(){
       uni_modal('Add New Product',"products/manage_product.php",'large')
     })
     $('.view_data').click(function(){
       uni_modal('View Product Details',"product.php?id="+$(this).attr('data-id'),'large')
     })
     $('.edit_data').click(function(){
       uni_modal('Update Product',"products/manage_product.php?id="+$(this).attr('data-id'),'large')
     })
     $('.delete_data').click(function(){
       _conf("Are you sure to delete this product permanently?","delete_product",[$(this).attr('data-id')])
     })
     $('table th,table td').addClass('align-middle px-2 py-1')
     $('.table').dataTable();
   })
   function delete_product($id){
     start_loader();
     $.ajax({
       url:_base_url_+"classes/Master.php?f=delete_product",
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