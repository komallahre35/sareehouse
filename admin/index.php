<?php
session_start();
include("../data/connection.php");

if(isset($_POST['submit'])) {
   
   $admin_username = $_POST['admin_username'];
   $admin_password = $_POST['admin_password'];
   //$usertype = $_POST['usertype'];
   //echo "SELECT * FROM users WHERE user_email='$user' && password='$pwd'";die;
   $query = "SELECT * FROM `admin` WHERE admin_username='$admin_username' && admin_password='$admin_password'";
   $data = mysqli_query($con,$query);
   $row=mysqli_fetch_array($data);
   $total = mysqli_num_rows($data);
   if($total==1){
     //echo 'hi'; die;
      $_SESSION['loginid'] = $row['id'];       
      $_SESSION['usertype'] = $row['usertype']; 
     echo "<script>location='login/index.php'</script>";
      // header(location:'index.php');
    }
   else
   {
       $print_data = 'Invalid Username and Password ?';
   }
 }

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous" />

<!-- font awesome  -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous" />
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Saree House - Admin </title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- Bootstrap CSS -->


  <!-- =======================================================
  * Template Name: NiceAdmin - v2.2.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
  <script>
    start_loader()
  </script>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.php" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/logo.png" alt="">
                  <span class="d-none d-lg-block">Saree House</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Admin Login</h5>
                    
                  </div>

                  <form class="row g-3 needs-validation" id='login' action='' novalidate action="" method="post">

                    <div class="col-12">
                      
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                        <input type="text" name="admin_username" class="form-control" id="admin_username" placeholder="Enter Your Username" required>
                        <div class="invalid-feedback">Please enter your username.</div>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
                        </div>

                        <input name="admin_password" type="password" value="" class="input form-control" id="admin_password" placeholder="password" required="true" aria-label="password" aria-describedby="basic-addon1" />
                        <div class="input-group-append">
                          <!-- <span class="input-group-text" onclick="password_show_hide();">
                            <i class="fas fa-eye" id="show_eye"></i>
                            <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
                          </span> -->
                        </div>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="form-check">
                        <!-- <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Remember me</label> -->
                      </div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" name="submit" onclick="logmein()" type="submit">Login</button>
                    </div>
                    <!-- <a href="javascript:window.history.back();">Back</a> -->
                    <div id="loginstatus">    </div>
                  </form>

                </div>
              </div>

              <center>
    <div class="copyright">
      Saree House &copy;2022 <strong><span></span></strong>. All Rights Reserved - Designed by <a href="https://briskup.in/"target="_blank">BriskUP Pvt Ltd</a>
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
     <!-- <center> Designed by <a href="https://briskup.in/"target="_blank">Brisk UP</a> </center> -->
    </div> </center>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

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
<script>
  $(document).ready(function(){
    end_loader();
  })
</script>

</html>
<script type="text/javascript">
  function password_show_hide() {
  var x = document.getElementById("password");
  var show_eye = document.getElementById("show_eye");
  var hide_eye = document.getElementById("hide_eye");
  hide_eye.classList.remove("d-none");
  if (x.type === "password") {
    x.type = "text";
    show_eye.style.display = "none";
    hide_eye.style.display = "block";
  } else {
    x.type = "password";
    show_eye.style.display = "block";
    hide_eye.style.display = "none";
  }
}
</script>

<script>
  function logmein() {

  var admin_username = document.getElementById("admin_username").value;
  var admin_password = document.getElementById("admin_password").value;

  $.post("",
    {
      admin_username: admin_username,
      admin_password: admin_password
    },
    function(data, status) {

      if (data == 'Valid') {

        window.open("../admin/login.php?email=" + admin_username + "", "_parent");

      } else {
        alert(data);
        document.getElementById("loginstatus").innerHTML = data;
      }
    });
}
</script>