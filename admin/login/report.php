<?php 
error_log(0);
session_start();



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
      <h1>Report</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Report</li>
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
              <h5 class="card-title">Monthly Order Reports</h5>
              <div class="card-tools">
                <form class="row g-7">
                    <div class="col-md-1">
                      <label for="inputName5" class="form-label"></label>
                      <label for="month" class="control-label">Month</label>
                      <input type="month" name="month" id="month" value="<?= $month ?>" class="form-control" required>
                    </div>
                    <div class="col-md-2">
                      <label for="inputName5" class="form-label"></label>
                      <button class="btn btn-primary btn-flat btn-sm"><i class="fa fa-filter"></i> Filter</button>
                      <button class="btn btn-light border btn-flat btn-sm" type="button" id="print"><i class="fa fa-print"></i> Print</button>
                    </div>
                
               </form>
			
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
                    <th scope="col">Date Create</th>
                    <th scope="col">Ref. Code</th>
                    <th scope="col">Client</th>
                    <th scope="col">Status</th>
                    <th scope="col">Total Amount</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Brandon Jacob</td>
                    <td>Designer</td>
                    <td>aman</td>
                    <td>2016-05-25</td>
                    <td>500</td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Bridie Kessler</td>
                    <td>Developer</td>
                    <td>ajay</td>
                    <td>2014-12-05</td>
                    <td>500</td>
                    
                   
                  </tr>
                  
                  
                  
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>
              
          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        

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

<script>
    $(function(){
        $('#filter').submit(function(e){
            e.preventDefault()
            location.href = "./?page=reports/order_reports&"+$(this).serialize();
        })
        $('#print').click(function(){
            start_loader();
            var head = $('head').clone()
            var p = $('#outprint').clone()
            var el = $('<div>')
            var header =  $($('noscript#print-header').html()).clone()
            head.find('title').text("Orders Montly Report - Print View")
            el.append(head)
            el.append(header)
            el.append(p)
            var nw = window.open("","_blank","width=1000,height=900,top=50,left=75")
                    nw.document.write(el.html())
                    nw.document.close()
                    setTimeout(() => {
                        nw.print()
                        setTimeout(() => {
                            nw.close()
                            end_loader()
                        }, 200);
                    }, 500);
        })
    })
</script>
