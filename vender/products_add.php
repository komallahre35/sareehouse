<?php 
session_start();
// error_reporting(0);
require_once('../data/connection.php');
if(strlen($_SESSION['alogin'])==1)
   {  
      
      }
      else{
      date_default_timezone_set('Asia/Kolkata');// change according timezone
      $currentTime = date( 'd-m-Y h:i:s A', time () );

$statusMsg = '';

if($_GET['product_id']!=''){
    $keyvalue = $_GET['product_id'];
   }else{
    $keyvalue = 0;
   }
   $btn_name = 'Submit';
   if (isset($_POST['submit'])) {
       $product_name = $_POST['product_name'];
       $product_price = $_POST['product_price'];
       $product_price1 = $_POST['product_price1'];
       $product_cat = $_POST['product_cat'];
       $productAvailability = $_POST['productAvailability'];
       $product_desc = $_POST['product_desc'];
       $targetDir = "../image/product/";
       $product_img = basename($_FILES["product_img"]["name"]);
       $targetFilePath = $targetDir . $product_img;
       $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
   
    if($keyvalue==0){ 

        // Allow certain file formats
        $allowTypes = array('jpg','png','jpeg','gif','pdf');
        if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["product_img"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database
          // insert code start
        move_uploaded_file($_FILES["product_img"]["tmp_name"],"../image/product/$keyvalue/".$_FILES["product_img"]["name"]);
       $insert = mysqli_query($con, "INSERT INTO product_list (product_name, product_price, product_price1, product_cat, productAvailability, product_img, `product_desc`) VALUES ('$product_name', '$product_price', '$product_price1', '$product_cat', '$productAvailability', '$product_img', '$product_desc')"); 
       $action = 1;
       // insert code end
            //$insert = $db->query("INSERT into images (file_name, uploaded_on) VALUES ('".$fileName."', NOW())");
            if($insert){
                $statusMsg = "The file ".$product_img. " has been uploaded successfully.";
            }else{
                $statusMsg = "File upload failed, please try again.";
            } 
        }else{
            $statusMsg = "Sorry, there was an error uploading your file.";
        }
    }else{
        $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
    }


// Display status message
echo $statusMsg;
      
      // // insert code start
      //  mysqli_query($con, "INSERT INTO product_list (product_name, product_price, product_cat, product_img, `product_desc`) VALUES ('$product_name', '$product_price', '$product_cat', '$product_img', '$product_desc')"); 
      //  $action = 1;
      //  // insert code end
    }else{
      // update code start
        mysqli_query($con, "UPDATE product_list SET product_name = '$product_name', product_price = '$product_price', product_price1 = '$product_price1', product_cat = '$product_cat', product_img = '$product_img', productAvailability = '$productAvailability',`product_desc` = '$product_desc' where product_id='$keyvalue'"); 
        $action = 2;
      // update code end
    }
       echo "<script>location='products.php?action=$action';</script>";
  }

// Delete code start
  if($_GET['delid']!=""){
    mysqli_query($con,"DELETE  FROM product_list where product_id='$_GET[delid]'");
    $action = 3;
    echo "<script>location='products.php?action=$action';</script>";
  }
// Delete code end

// edit code start
  if($_GET['product_id']!=""){
      $btn_name = 'Update';
      $sql = mysqli_query($con,"SELECT * FROM product_list where product_id='$keyvalue'");
      $rowedit = mysqli_fetch_array($sql);
    
      $product_name = $rowedit['product_name'];
      $product_price = $rowedit['product_price'];
      $product_price1 = $rowedit['product_price1'];
      $product_cat = $rowedit['product_cat'];
      $productAvailability = $rowedit['productAvailability'];
      $product_img = $rowedit['product_img'];
      $product_desc = $rowedit['product_desc'];
  }else{
      $product_name = '';
      $product_price = '';
      $product_price1 = '';
      $product_cat = '';
      $productAvailability = '';
      $product_img = '';
      $product_desc = '';
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
      <h1>Product Add</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Product Add</li>
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
              <div class="card">
            <div class="card-body">
              <!-- Multi Columns Form -->
              <form class="row g-3" action="" method="post" enctype="multipart/form-data">
                <div class="col-md-12">
                  <label for="inputhidden" class="form-label"></label>
                  <input type="hidden" class="form-control" id="id" class="id" value="">
                </div>
                <div class="col-md-6">
                  <label for="inputCategory" class="form-label" >Category</label>
             
              <select type="text" id="product_cat" name="product_cat" class="form-control" required>
                                    <option value="<?php echo $product_cat; ?>"selected><?php echo $product_cat; ?></option>
                                    <?php 
                                    $types = $con->query("SELECT * FROM `cat_list` where `status` = 1 order by `cat_name` asc ");
                                    while($row = $types->fetch_assoc()):
                                    ?>
                                    <option value="<?= $row['cat_name'] ?>"><?= $row['cat_name'] ?></option>
                                    <?php endwhile; ?>
                                </select>
                </div>
                <div class="col-md-6">
                  <label for="inputName" class="form-label">Product Name</label>
                  <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Product Name" value="<?php echo $product_name; ?>">
                </div>
                <div class="col-md-6">
                  <label for="inputPrice" class="form-label">Product Price After Discount(Selling Price)</label>
                  <input type="number" class="form-control" id="product_price" name="product_price" placeholder="Product Price" value="<?php echo $product_price; ?>">
                </div>
                <div class="col-md-6">
                  <label for="inputPrice" class="form-label">Product Price Before Discount</label>
                  <input type="number" class="form-control" id="product_price1" name="product_price1" placeholder="Product Price" value="<?php echo $product_price1; ?>">
                </div>
                
                <div class="col-md-6">
                    <label for="logo" class="form-label">Product Image</label>
                    <input type="file" id="product_img" name="product_img" multiple="" class="form-control" value="../image/product/<?php echo $product_img; ?>">
                    <!-- <img src="../image/product/<?php echo $product_img; ?>" width="100" height="100">   -->
              </div>
              <div class="col-md-6">
                 <label class="form-label" for="basicinput">Product Availability</label>
                  <div class="controls">
                    <select  name="productAvailability"  id="productAvailability" class="form-control" required>
                    <option value="<?php echo $productAvailability; ?>"><?php echo $productAvailability; ?></option>
                    <option class="btn btn-success rounded-pill" value="1">In Stock</option>
                    <option class="btn btn-danger " value="0">Out of Stock</option>
                    </select>
                  </div>
                </div>
              <div class="col-md-6">
                <label for="inputAddress2" class="form-label">Description</label>
                  <textarea class="form-control" name="product_desc" id="product_desc" rows="9" cols="70" value="<?php echo $product_desc; ?>" >
                    <?php echo $product_desc; ?>
              </textarea>
                </div>
                
                <div class="text-center">
                  <button type="submit" name="submit" id="submit" class="btn btn-primary"><?php echo $btn_name; ?></button>   
                </div>
              </form><!-- End Multi Columns Form -->

            </div>
          </div>

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