<style>
.row gy-4{
    align-items: ;
}
.digi {
    color: #232323;
}

.wrapper .icon {
    position: relative;
    background-color: #ffffff;
    border-radius: 50%;
    margin: 10px;
    width: 50px;
    height: 50px;
    line-height: 50px;
    font-size: 22px;
    display: inline-block;
    /* align-items: center; */
    box-shadow: 0 10px 10px rgba(0, 0, 0, 0.1);
    cursor: pointer;
    transition: all 0.2s cubic-bezier(0.68, -0.55, 0.265, 1.55);
    color: #333;
    text-decoration: none;
}

.wrapper .tooltip {
    position: absolute;
    top: 0;
    line-height: 1.5;
    font-size: 14px;
    background-color: #ffffff;
    color: #ffffff;
    padding: 5px 8px;
    border-radius: 5px;
    box-shadow: 0 10px 10px rgba(0, 0, 0, 0.1);
    opacity: 0;
    pointer-events: none;
    transition: all 0.3s cubic-bezier(0.68, -0.55, 0.265, 1.55);
}

.wrapper .tooltip::before {
    position: absolute;
    content: "";
    height: 8px;
    width: 8px;
    background-color: #ffffff;
    bottom: -3px;
    left: 50%;
    transform: translate(-50%) rotate(45deg);
    transition: all 0.3s cubic-bezier(0.68, -0.55, 0.265, 1.55);
}

.wrapper .icon:hover .tooltip {
    top: -45px;
    opacity: 1;
    visibility: visible;
    pointer-events: auto;
}

.wrapper .icon:hover span,
.wrapper .icon:hover .tooltip {
    text-shadow: 0px -1px 0px rgba(0, 0, 0, 0.1);
}

.wrapper .facebook:hover,
.wrapper .facebook:hover .tooltip,
.wrapper .facebook:hover .tooltip::before {
    background-color: #3b5999;
    color: #ffffff;
}

.wrapper .twitter:hover,
.wrapper .twitter:hover .tooltip,
.wrapper .twitter:hover .tooltip::before {
    background-color: #46c1f6;
    color: #ffffff;
}

.wrapper .instagram:hover,
.wrapper .instagram:hover .tooltip,
.wrapper .instagram:hover .tooltip::before {
    background-color: #e1306c;
    color: #ffffff;
}


</style>


<footer class="footer-sm-space">
    <div class="main-footer">
        <div class="container">
            <div class="row gy-4">
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="footer-contact">
                        <div class="brand-logo">
                            <a href="index.php" class="footer-logo">
                                <svg class="svg-icon">
                                    <use class="fill-color" xlink:href="assets/images/sareehouselogo.png"></use>
                                </svg>
                                <img src="assets/images/sareehouselogo.png" class="logosareehouse" alt="logo">
                            </a>
                        </div>
                        <ul class="contact-lists">
                            <li>
                                <span>
                                <b>Phone:</b>
                                    <a href="tel:+916263154727" class="font-light" style = "text-transform: lowercase" >+91-62631-54727</a>
                                </span>
                            </li>
                            <li>
                                <span>
                                    <b>Address:</b>
                                    <a href="#" class="font-light" style = "text-transform: lowercase">Lorem ipsum dolor sit amet consectetur, adipisicing
                                        elit.!</a>
                                </span>
                            </li>
                            <li>
                                <span>
                                    <b>Email:</b>
                                    <a href="mailto:ambarish.briskup@gmail.com"
                                        class="font-light" style = "text-transform: lowercase">ambarish.briskup@gmail.com</a>
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="footer-links">
                        <div class="footer-title">
                            <h3>About us</h3>
                        </div>
                        <div class="footer-content">
                            <ul>
                                <li>
                                    <a href="index.php" class="font-dark">Home</a>
                                </li>
                                <li>
                                    <a href="shop-left-sidebar.php" class="font-dark">Shop</a>
                                </li>
                                <li>
                                    <a href="about-us.php" class="font-dark">About Us</a>
                                </li>
                                <li>
                                    <a href="blog-details.php" class="font-dark">Blog</a>
                                </li>
                                <li>
                                    <a href="contact-us.php" class="font-dark">Contact</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div> -->
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                    <div class="footer-links">
                        <div class="footer-title">
                            <h3>New Categories</h3>
                        </div>
                        <div class="footer-content">
                            <ul>
                                <li>
                                    <a href="shop-left-sidebar.php" class="font-dark">Latest Shoes</a>
                                </li>
                                <li>
                                    <a href="shop-left-sidebar.php" class="font-dark">Branded Jeans</a>
                                </li>
                                <li>
                                    <a href="shop-left-sidebar.php" class="font-dark">New Jackets</a>
                                </li>
                                <li>
                                    <a href="shop-left-sidebar.php" class="font-dark">Colorfull Hoodies</a>
                                </li>
                                <li>
                                    <a href="shop-left-sidebar.php" class="font-dark">Shiner Goggles</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                    <div class="footer-links">
                        <div class="footer-title">
                            <h3>Get Help</h3>
                        </div>
                        <div class="footer-content">
                            <ul>
                                <li>
                                    <a href="user-dashboard.php" class="font-dark">Your Orders</a>
                                </li>
                                <li>
                                    <a href="user-dashboard.php" class="font-dark">Your Account</a>
                                </li>
                                <li>
                                    <a href="order-tracking.php" class="font-dark">Track Orders</a>
                                </li>
                                <li>
                                    <a href="wishlist.php" class="font-dark">Your Wishlist</a>
                                </li>
                                <li>
                                    <a href="faq.php" class="font-dark">Shopping FAQs</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-sm-6 d-none d-sm-block">
                    <div class="footer-newsletter">
                        <h3>Let’s stay in touch</h3>
                        <div class="wrapper">
                            <a href="facebook.com" class="icon facebook">
                                <!-- <div class="tooltip">Facebook</div> -->
                                <span><i class="fab fa-facebook-f"></i></span>
                            </a>
                            <a href="twitter.com" class="icon twitter">
                                <!-- <div class="tooltip">Twitter</div> -->
                                <span><i class="fab fa-twitter"></i></span>
                            </a>
                            <a href="instagram.com" class="icon instagram">
                                <!-- <div class="tooltip">Instagram</div> -->
                                <span><i class="fab fa-instagram"></i></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="sub-footer">
        <div class="container">
            <div class="row gy-3">
                <div class="col-md-6">
                    <ul>
                        <li class="font-dark">We accept:</li>
                        <li>
                            <a href="javascript:void(0)">
                                <img src="assets/images/payment-icon/1.jpg" class="img-fluid blur-up lazyload"
                                    alt="payment icon"></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <img src="assets/images/payment-icon/2.jpg" class="img-fluid blur-up lazyload"
                                    alt="payment icon"></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <img src="assets/images/payment-icon/3.jpg" class="img-fluid blur-up lazyload"
                                    alt="payment icon"></a>
                        </li>
                        
                    </ul>
                </div>
                <div class="col-md-6">
                    <div class="copyright">
      Saree House &copy;2022 <strong><span></span></strong>. All Rights Reserved - Designed by <a href="https://briskup.in/"target="_blank">BriskUP Pvt Ltd</a>
    </div>
                </div>
            </div>
        </div>
    </div>
</footer>