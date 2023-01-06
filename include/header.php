<?php
require_once('data/connection.php');



?>



<style>
    .logosareehouse {
    width: 100px;
    height: 100px;
    }
</style>

<header class="header-style-2" id="home">
    <div class="main-header navbar-searchbar">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-lg-12">
                    <div class="main-menu">
                        <div class="menu-left">
                            <div class="brand-logo">
                                <a href="index.php">
                                    <svg class="svg-icon">
                                        <use class="" xlink:href=""></use>
                                    </svg>
                                    <img src="assets/images/sareehouselogo.png" class="logosareehouse" alt="logo">
                                </a>
                            </div>
                            <div class="category-menu">
                                <div class="category-dropdown">
                                    <div class="close-btn d-xl-none">
                                        Category List
                                        <span class="back-category"><i class="fa fa-angle-left"></i>
                                        </span>
                                    </div>
                                    <ul>
                                        <li class="submenu">
                                            <a href="javascript:void(0)">watches</a>
                                            <ul class="category-mega-menu">
                                                <li>
                                                    <div class="row">
                                            
                                                        <div class="col-xl-3">
                                                            
                                                        </div>
                                                        <div class="col-xl-3">
                                                            <div class="category-childmenu">
                                                                <div class="title-category">
                                                                    <h6>Watch Style</h6>
                                                                </div>
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-3">
                                                            <div class="category-banner">
                                                                <img src="assets/images/electronics/banner/4.jpg"
                                                                    class="img-fluid blur-up lazyload" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>

                                        <li>
                                            <a href="shop-left-sidebar.php">footwear</a>
                                        </li>

                                        <li class="submenu">
                                            <a href="javascript:void(0)">clothing</a>
                                            <ul class="category-mega-menu">
                                                <li>
                                                    <div class="row">
                                                        <div class="col-xl-3">
                                                            <div class="category-childmenu">
                                                                <div class="title-category">
                                                                    <h6>Women's fashion</h6>
                                                                </div>
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-3">
                                                            <div class="category-childmenu">
                                                                <div class="title-category">
                                                                    <h6>Men's fashion</h6>
                                                                </div>
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-3">
                                                            <div class="category-childmenu">
                                                                <div class="title-category">
                                                                    <h6>Accesories</h6>
                                                                </div>
                                                               
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-3">
                                                            <div class="category-banner">
                                                                <img src="assets/images/banner/1.jpg"
                                                                    class="img-fluid blur-up lazyload" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <nav>
                            <div class="main-navbar">
                                <div id="mainnav">
                                    <div class="toggle-nav">
                                        <i class="fa fa-bars sidebar-bar"></i>
                                    </div>
                                    
                                    <ul class="nav-menu">

                                        <li class="back-btn d-xl-none">
                                            <div class="close-btn">
                                                Menu
                                                <span class="mobile-back"><i class="fa fa-angle-left"></i>
                                                </span>
                                            </div>
                                        </li>
                                        <li class="">
                                            <a href="index.php" class="nav-link menu-title">home</a>
                                        </li>
                                        <?php 
                                         $sn =1;
                                          $sqli = "SELECT * FROM `cat_list` where `status` = 1 order by `cat_name` asc ";
                                          $result = mysqli_query($con, $sqli);
                                         
                                          if (mysqli_num_rows($result) > 0) {
                                            while($row = mysqli_fetch_assoc($result)) { 
                                        ?>
                                        <li >
                                            <a href="category.php?cat_id=<?php echo $row['cat_id'];?>" > <?php echo $row['cat_name'];?></a>
                                        </li><?php } } ?>
                                        <li>
                                            <a href="about-us.php" class="nav-link menu-title">About Us</a>
                                        </li>
                                        <li class="">
                                            <a href="shop.php" class="nav-link menu-title">shop</a>
                                        </li>
                                        
                                        
                                        <li class="dropdown">
                                            <a href="javascript:void(0)" class="nav-link menu-title">pages</a>
                                            <ul class="nav-submenu menu-content">
                                                <li>
                                                    <a href="404.php">404</a>
                                                </li>
                                                <li>
                                                    <a href="log-in.php">Log In</a>
                                                </li>
                                                <li>
                                                    <a href="sign-up.php">Register</a>
                                                </li>
                                                <li>
                                                    <a href="forgot.php">Forgot Password</a>
                                                </li>
                                                <li>
                                                    <a href="cart.php">cart</a>
                                                </li>
                                                <li>
                                                    <a href="checkout.php">checkout</a>
                                                </li>
                                                
                                                
                                                <li>
                                                    <a href="contact-us.php">contact us</a>
                                                </li>
                                                <li>
                                                    <a href="faq.php">faq</a>
                                                </li>
                                                <li>
                                                    <a href="order-success.php">order success</a>
                                                </li>
                                                
                                                
                                                <li>
                                                    <a href="search.php">search</a>
                                                </li>
                                                <li>
                                                    <a href="user-dashboard.php">user dashboard</a>
                                                </li>
                                                <li>
                                                    <a href="wishlist.php">wishlist</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="">
                                            <a href="contact-us.php" class="nav-link menu-title">Contact Us</a>
                                        </li>
                                        <li class="mobile-poster d-flex d-xl-none">
                                            <img src="assets/images/pwa.png" class="img-fluid" alt="">
                                            <div class="mobile-contain">
                                                <h5>Enjoy app-like experience</h5>
                                                <p class="font-light">With this Screen option you can use Website
                                                    like an App.</p>
                                                <a href="javascript:void(0)" id="installApp"
                                                    class="btn btn-solid-default btn-spacing w-100">ADD TO
                                                    HOMESCREEN</a>
                                            </div>
                                        </li>
                                    </ul>
                                    
                                </div>
                            </div>
                        </nav>
                        <div class="menu-right">
                            <ul>
                                <li>
                                    <div class="search-box">
                                        <i data-feather="search"></i>
                                    </div>
                                </li>
                                <li class="onhover-dropdown">
                                    <div class="cart-media">
                                        <i data-feather="user"></i>
                                    </div>
                                    <div class="onhover-div profile-dropdown">
                                        <ul>
                                            <li>
                                                <a href="log-in.php" class="d-block">Login</a>
                                            </li>
                                            <li>
                                                <a href="sign-up.php" class="d-block">Register</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                
                                <li class="onhover-dropdown cart-dropdown">
                                    
                                    <button type="button" class="btn btn-solid-default btn-spacing">
                                        <i data-feather="shopping-cart" class="pe-2"></i>
                                        <span>$5686.25</span>
                                    </button>
                                    <div class="onhover-div">
                                        <div class="cart-menu">
                                            <div class="cart-title">
                                                <h6>
                                                    <i data-feather="shopping-bag"></i>
                                                    <span class="label label-theme rounded-pill">5</span>
                                                </h6>
                                                <span class="d-md-none d-block">
                                                    <i class="fas fa-arrow-right back-cart"></i>
                                                </span>
                                            </div>
                                            <ul class="custom-scroll">
                                                <li>
                                                    <div class="media">
                                                        <img src="assets/images/fashion/product/front/1.jpg"
                                                            class="img-fluid blur-up lazyload" alt="">
                                                        <div class="media-body">
                                                            <h6>Slim Fit Plastic Coat</h6>
                                                            <div class="qty-with-price">
                                                                <span>$78.00</span>
                                                                <span>
                                                                    <input type="number" class="form-control" value="1">
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <button type="button" class="btn-close d-block d-md-none"
                                                            aria-label="Close">
                                                            <i class="fas fa-times"></i>
                                                        </button>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="media">
                                                        <img src="assets/images/fashion/product/front/7.jpg"
                                                            class="img-fluid blur-up lazyload" alt="">
                                                        <div class="media-body">
                                                            <h6>Womens Stylish Jacket</h6>
                                                            <div class="qty-with-price">
                                                                <span>$24.00</span>
                                                                <span>
                                                                    <input type="number" class="form-control" value="1">
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <button type="button" class="btn-close d-block d-md-none"
                                                            aria-label="Close">
                                                            <i class="fas fa-times"></i>
                                                        </button>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="cart-btn">
                                                <h6 class="cart-total"><span class="font-light">Total:</span> $
                                                    542.00</h6>
                                                <button onclick="location.href = 'cart.php';" type="button"
                                                    class="btn btn-solid-default btn-block">
                                                    Proceed to payment
                                                </button>
                                            </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="search-full">
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i data-feather="search" class="font-light"></i>
                                </span>
                                <input type="text" class="form-control search-type" placeholder="Search here..">
                                <span class="input-group-text close-search">
                                    <i data-feather="x" class="font-light"></i>
                                </span>
                            </div>
                            <div class="search-suggestion">
                                <ul class="custom-scroll">
                                    <li>
                                        <div class="product-cart media">
                                            <img src="assets/images/electronics/product/1.jpg"
                                                class="img-fluid blur-up lazyload" alt="">
                                            <div class="media-body">
                                                <a href="javascript:void(0)">
                                                    <h6 class="mb-1">New Smart Watch 4 ERT2</h6>
                                                </a>
                                                <ul class="rating p-0">
                                                    <li>
                                                        <i class="fas fa-star theme-color"></i>
                                                    </li>
                                                    <li>
                                                        <i class="fas fa-star theme-color"></i>
                                                    </li>
                                                    <li>
                                                        <i class="fas fa-star theme-color"></i>
                                                    </li>
                                                    <li>
                                                        <i class="fas fa-star"></i>
                                                    </li>
                                                    <li>
                                                        <i class="fas fa-star"></i>
                                                    </li>
                                                </ul>
                                                <p class="mb-0 mt-1">$28.00</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="product-cart media">
                                            <img src="assets/images/electronics/product/5.jpg"
                                                class="img-fluid blur-up lazyload" alt="">
                                            <div class="media-body">
                                                <a href="javascript:void(0)">
                                                    <h6 class="mb-1">Powermatic 900 W Juicer</h6>
                                                </a>
                                                <ul class="rating m-0 p-0">
                                                    <li>
                                                        <i class="fas fa-star theme-color"></i>
                                                    </li>
                                                    <li>
                                                        <i class="fas fa-star theme-color"></i>
                                                    </li>
                                                    <li>
                                                        <i class="fas fa-star theme-color"></i>
                                                    </li>
                                                    <li>
                                                        <i class="fas fa-star theme-color"></i>
                                                    </li>
                                                    <li>
                                                        <i class="fas fa-star theme-color"></i>
                                                    </li>
                                                </ul>
                                                <p class="mb-0 mt-1">$35.00</p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>


<!-- mobile menu -->
<div class="mobile-menu d-sm-none">
    <ul>
        <li>
            <a href="index.php">
                <i data-feather="home"></i>
                <span>Home</span>
            </a>
        </li>
        <li>
            <a href="javascript:void(0)" class="toggle-category">
                <i data-feather="align-justify"></i>
                <span>Category</span>
            </a>
        </li>
        <li>
            <a href="cart.php">
                <i data-feather="shopping-bag"></i>
                <span>Cart</span>
            </a>
        </li>
        <li>
            <a href="wishlist.php">
                <i data-feather="heart"></i>
                <span>Wishlist</span>
            </a>
        </li>
        <li>
            <a href="user-dashboard.php">
                <i data-feather="user"></i>
                <span>Account</span>
            </a>
        </li>
    </ul>
</div>