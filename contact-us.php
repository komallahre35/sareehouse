<!DOCTYPE html>
<html lang="en">

<head>
<?php
    include "include/head.php";
    ?>
</head>

<body class="theme-color2 light ltr">

    <!-- header start -->
    <?php
    include "include/header.php";
    ?>
    <!-- header end -->

    <!-- mobile fix menu start -->

    <!-- mobile fix menu end -->

    <!-- Breadcrumb section start -->
    <section class="breadcrumb-section section-b-space">
        <ul class="circles">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3>Contact Us</h3>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb section end -->

    <!-- Contact Section Start -->
    <section class="contact-section">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-7">
                    <div class="materialContainer">
                        <div class="material-details">
                            <div class="title title1 title-effect mb-1 title-left">
                                <h2>Contact Us</h2>
                                <!-- <p class="ms-0 w-100">Your email address will not be published. Required fields are
                                    marked *</p> -->
                            </div>
                        </div>
                        <div class="row g-4 mt-md-1 mt-2">
                            <div class="col-md-6">
                                <label for="first" class="form-label">Full Name</label>
                                <input type="text" class="form-control" id="fullname" placeholder="Enter Your Full Name"
                                    required>
                            </div>
                            <!-- <div class="col-md-6">
                                <label for="last" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="last" placeholder="Enter Your Last Name"
                                    required>
                            </div> -->
                            <div class="col-md-6">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email"
                                    placeholder="Enter Your Email Address" required>
                            </div>
                            <div class="col-md-6">
                                <label for="email2" class="form-label">Contact Number</label>
                                <input type="phone" class="form-control" id="number"
                                    placeholder="Enter Your Phone Number" required>
                            </div>

                            <div class="col-12">
                                <label for="comment" class="form-label">Message</label>
                                <textarea class="form-control" id="comment" rows="5" required></textarea>
                            </div>

                            <div class="col-auto">
                                <button class="btn btn-solid-default" type="submit">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="contact-details">
                        <div>
                            <h2>Let's get in touch</h2>
                            <div class="contact-box">
                                <div class="contact-icon">
                                    <i data-feather="map-pin"></i>
                                </div>
                                <div class="contact-title">
                                    <h4>Address :</h4>
                                    <p>Raipur (C.G.)</p>
                                </div>
                            </div>

                            <div class="contact-box">
                                <div class="contact-icon">
                                    <i data-feather="phone"></i>
                                </div>
                                <div class="contact-title">
                                    <h4>Phone :</h4>
                                    <a href="tel:6263154727">+91-62631-54727</a>
                                </div>
                            </div>

                            <div class="contact-box">
                                <div class="contact-icon">
                                    <i data-feather="mail"></i>
                                </div>
                                <div class="contact-title">
                                    <h4>Email :</h4>
                                    <a href="mailto:ambarish.briskup@gmail.com">ambarish.briskup@gmail.com</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->

    <!-- Map Section start -->
    <section class="contact-section">
        <div class="container-fluid">
            <div class="row gy-4">
                <div class="col-12 p-0">
                    <div class="location-map">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7227.225249699896!2d55.17263937326456!3d25.081115462415855!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f43496ad9c645%3A0xbde66e5084295162!2sDubai%20-%20United%20Arab%20Emirates!5e0!3m2!1sen!2sin!4v1632538854272!5m2!1sen!2sin"
                            loading="lazy"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Map Section End -->

    <!-- footer start -->
    <?php
    include "include/footer.php";
    ?>
    <!-- footer end -->

    <!-- theme Setting Start -->
    <?php
    include "include/themesetting.php";
    ?>
    <!-- theme Setting End -->

    <!-- tap to top Section Start -->
    <div class="tap-to-top">
        <a href="#home">
            <i class="fas fa-chevron-up"></i>
        </a>
    </div>
    <!-- tap to top Section End -->

    <div class="bg-overlay"></div>

    <!-- latest jquery-->
    <script src="assets/js/jquery-3.5.1.min.js"></script>

    <!-- Add To Home js -->
    <script src="assets/js/pwa.js"></script>

    <!-- Bootstrap js -->
    <script src="assets/js/bootstrap/bootstrap.bundle.min.js"></script>

    <!-- feather icon js -->
    <script src="assets/js/feather/feather.min.js"></script>

    <!-- lazyload js -->
    <script src="assets/js/lazysizes.min.js"></script>

    <!-- Slick js -->
    <script src="assets/js/slick/slick.js"></script>
    <script src="assets/js/slick/slick-animation.min.js"></script>
    <script src="assets/js/slick/custom_slick.js"></script>

    <!-- Notify js -->
    <script src="assets/js/bootstrap/bootstrap-notify.min.js"></script>

    <!-- script js -->
    <script src="assets/js/theme-setting.js"></script>
    <script src="assets/js/script.js"></script>

</body>

</html>