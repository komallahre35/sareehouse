<?php
require_once('data/connection.php');



?>


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

    <!-- home slider start -->
    <section class="home-section home-style-2 pt-0">
        <div class="container-fluid p-0">
            <div class="slick-2 dot-dark">
                <div>
                    <div class="home-slider">
                        <div class="home-wrap row m-0">
                            <div class="col-xxl-3 col-lg-4 p-0 d-lg-block d-none">
                                <div class="home-left-wrapper">
                                    <div>
                                        <h2>Saree House</h2>

                                        <div class="d-flex">
                                            <ul class="rating p-0 me-2">
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
                                            <h6 class="text-light">( 40 Review )</h6>
                                        </div>

                                        <p>The international sarees with excellent durable fabric, not to heavy but
                                            simply PERFECT for Indians.</p>
                                        <h3>Rs: 499/-<span class="theme-color">Rs: 499/-</span></h3>
                                        <ul class="selection-wrap">
                                            
                                            <li>
                                                <div class="dark-select">
                                                    <select class="form-select">
                                                        <option selected>Qty</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                    </select>
                                                    <i class="fas fa-chevron-down"></i>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="add-btn">
                                            <a href="cart.php" class="btn btn-white">Add to cart</a>
                                            <a href="javascript:void:(0)" class="btn btn-solid-default ms-2">
                                                <i class="fas fa-heart"></i>
                                            </a>
                                        </div>
                                        <div class="share-icons">
                                            <span>share with</span>
                                            <ul class="share-icons p-0">
                                                <li>
                                                    <a target="_blank"
                                                        href="https://www.facebook.com/sharer/sharer.php?u=#url">
                                                        <img src="assets/images/social-icon/4.png"
                                                            class="img-fluid blur-up lazyload" alt="social icon">
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="https://www.google.co.in/">
                                                        <img src="assets/images/social-icon/5.png"
                                                            class="img-fluid blur-up lazyload" alt="social icon">
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="http://www.twitter.com/share">
                                                        <img src="assets/images/social-icon/6.png"
                                                            class="img-fluid blur-up lazyload" alt="social icon">
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-9 col-lg-8 p-0 left-content">
                                <img src="assets/images/fashion/slider/1.jpg" class="bg-img blur-up lazyload" alt="">
                                <div class="home-content row">
                                    <div class="col-xxl-4 col-lg-4 col-md-4 col-sm-5 col-6">
                                        <h3>Sale <span class="theme-color">70% OFF</span></h3>
                                        <h1 data-animation-in="fadeInUp">New Trending Fashion
                                        </h1>
                                        <h6 class="mb-4" data-animation-in="fadeInUp" data-delay-in="0.4">BUY ONE GET
                                            ONE <span class="theme-color">FREE</span></h6>
                                        <div class="discover-block" data-animation-in="fadeInUp" data-delay-in="0.7">
                                            <div class="d-flex">
                                                <a href="javascript:void(0)" class="play-icon theme-bg-color">
                                                    <i class="fas fa-play"></i>
                                                </a>
                                                <div class="discover-content">
                                                    <h4 class="theme-color mb-1">Discover</h4>
                                                    <h6>Our Collection</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                
            </div>
        </div>
    </section>
    <!-- home slider end -->

    <!-- banner section start -->
    <section class="ratio2_1 banner-style-2">
        <div class="container">
            <div class="row gy-4">

            </div>
        </div>
    </section>
    <!-- banner section end -->

    <!-- product section start -->
    
    <!-- product section end -->

    <!-- category section start -->

    <!-- category section end -->

    <!-- product section 2 start -->
    
    <section class="ratio_asos">
        
        <div class="container">
            <div class="row-5 m-1">
                <div class="col-sm-12 p-3">
                    <div class="title title-2 text-center">
                        
                        <h5 class="text-color">Our collection</h5>
                    </div>
                     
                    <div class="product-wrapper product-style-2 row g-sm-2 g-3">
                        <?php 
                                             
                                      $sqli = "SELECT * FROM product_list";
                                      $result = mysqli_query($con, $sqli);
                                     
                                      if (mysqli_num_rows($result) > 0) {
                                        while($row = mysqli_fetch_assoc($result)) {
                                          $id = $row["product_id"];
                                          $product_name = $row["product_name"];
                                          $product_price = $row["product_price"];
                                          $product_price1 = $row["product_price1"];
                                          $product_cat = $row["product_cat"];
                                          $product_img = 'image/product/'.$row["product_img"];
                                          $productAvailability = $row["productAvailability"];
                                          $product_desc = $row["product_desc"];
                                       ?>
                        <div class="col-xl-3 col-lg-4 col-6">
                            
                            <div class="product-box">
                                

                                <div class="img-wrapper">
                                    <div class="front">
                                        <a href="">
                                            <img src="<?php echo $product_img; ?>"
                                                class="bg-img blur-up lazyload" alt="">
                                        </a>
                                    </div>
                                    <div class="back">
                                        <a href="product_view.php?product_id=<?php echo htmlentities($row['product_id']);?>">
                                            <img src=""
                                                class="bg-img blur-up lazyload" alt="">
                                        </a>
                                    </div>
                                    <div class="label-block">
                                        <!-- <span class="label label-black">New</span> -->
                                        <span class="label label-theme">50% Off</span>
                                    </div>
                                    <div class="cart-wrap">
                                        <ul>
                                            <li>
                                                <a href="javascript:void(0)" class="addtocart-btn"
                                                    data-bs-toggle="modal" data-bs-target="#addtocart">
                                                    <i data-feather="shopping-bag"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)" data-bs-toggle="modal"
                                                    data-bs-target="#quick-view">
                                                    <i data-feather="eye"></i>
                                                </a>
                                            </li>
                                            
                                            
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-details">
                                    <div class="rating-details">
                                        <span class="font-light grid-content"><?php echo ucwords($row['product_cat']); ?></span>
                                        
                                    </div>
                                    <div class="main-price">
                                        <a href="product_view.php?product_id=<?php echo htmlentities($row['product_id']);?>" class="font-default">
                                            <h5 ><?php echo ucwords($row['product_name']); ?></h5>
                                        </a>
                                        <div class="listing-content">
                                            <span class="font-light">Jacket</span>
                                            <p class="font-light" href="product_view.php?product_id=<?php echo htmlentities($row['product_id']);?>"><?php echo ucwords($row['product_desc']); ?></p>
                                        </div>
                                        <div class=""><h3 href="product_view.php?pid=<?php echo htmlentities($row['product_id']);?>" class="theme-color">₹<?php echo ucwords($row['product_price']); ?></h3>₹<del class=""><?php echo ucwords($row['product_price1']); ?></del></div>
                                        
                                        <button onclick="location.href = 'cart.php';" class="btn listing-content">Add
                                            To Cart</button>
                                    </div>
                                </div>
                                
                            </div>
                            
                        </div> <?php } } ?>  
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
    <!-- product section 2 end -->

    <!-- service section start -->
    <section class="service-section service-style-2 section-b-space">
        <div class="container">
            <div class="row g-4 g-sm-3">
                <div class="col-xl-3 col-sm-6">
                    <div class="service-wrap">
                        <div class="service-icon">
                            <svg>
                                <use xlink:href="assets/svg/icons.svg#customer"></use>
                            </svg>
                        </div>
                        <div class="service-content">
                            <h3 class="mb-2">Customer Servcies</h3>
                            <span class="font-light">customer service is our topmost priority</span>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6">
                    <div class="service-wrap">
                        <div class="service-icon">
                            <svg>
                                <use xlink:href="assets/svg/icons.svg#shop"></use>
                            </svg>
                        </div>
                        <div class="service-content">
                            <h3 class="mb-2">Pickup At Any Store</h3>
                            <span class="font-light">Free shipping on orders over Rs6500/-.</span>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6">
                    <div class="service-wrap">
                        <div class="service-icon">
                            <svg>
                                <use xlink:href="assets/svg/icons.svg#secure-payment"></use>
                            </svg>
                        </div>
                        <div class="service-content">
                            <h3 class="mb-2">Secured Payment</h3>
                            <span class="font-light">We accept all major credit cards & Debit Cards.</span>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6">
                    <div class="service-wrap">
                        <div class="service-icon">
                            <svg>
                                <use xlink:href="assets/svg/icons.svg#return"></use>
                            </svg>
                        </div>
                        <div class="service-content">
                            <h3 class="mb-2">Free Returns</h3>
                            <span class="font-light">5-7 business days free return policy.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- service section end -->

    <!-- footer start -->
    <?php
    include "include/footer.php";
    ?>
    <!-- footer end -->

    <!-- Quick view modal start -->
    <div class="modal fade quick-view-modal" id="quick-view">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-body">
                    <div class="row gy-4">
                        <div class="col-lg-6">
                            <div class="quick-view-image">
                                <div class="quick-view-slider ratio_2">
                                    <div>
                                        <img src="assets/images/fashion/product/front/4.jpg"
                                            class="img-fluid bg-img blur-up lazyload" alt="product">
                                    </div>
                                    <div>
                                        <img src="assets/images/fashion/product/front/5.jpg"
                                            class="img-fluid bg-img blur-up lazyload" alt="product">
                                    </div>
                                    <div>
                                        <img src="assets/images/fashion/product/front/6.jpg"
                                            class="img-fluid bg-img blur-up lazyload" alt="product">
                                    </div>
                                    <div>
                                        <img src="assets/images/fashion/product/front/7.jpg"
                                            class="img-fluid bg-img blur-up lazyload" alt="product">
                                    </div>
                                </div>
                                <div class="quick-nav">
                                    <div>
                                        <img src="assets/images/fashion/product/front/4.jpg"
                                            class="img-fluid blur-up lazyload" alt="product">
                                    </div>
                                    <div>
                                        <img src="assets/images/fashion/product/front/5.jpg"
                                            class="img-fluid blur-up lazyload" alt="product">
                                    </div>
                                    <div>
                                        <img src="assets/images/fashion/product/front/6.jpg"
                                            class="img-fluid blur-up lazyload" alt="product">
                                    </div>
                                    <div>
                                        <img src="assets/images/fashion/product/front/7.jpg"
                                            class="img-fluid blur-up lazyload" alt="product">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="product-right">
                                <h2 class="mb-2">Men's Hoodie t-shirt</h2>
                                <ul class="rating mt-1">
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
                                    <li class="font-light">(In stock)</li>
                                </ul>
                                <div class="price mt-3">
                                    <h3>$20.00</h3>
                                </div>
                                <div class="color-types">
                                    <h4>colors</h4>
                                    <ul class="color-variant mb-0">
                                        <li class="bg-half-light selected"></li>
                                        <li class="bg-light1"></li>
                                        <li class="bg-blue1"></li>
                                        <li class="bg-black1"></li>
                                    </ul>
                                </div>
                                
                                <div class="product-details">
                                    <h4>product details</h4>
                                    <ul>
                                        <li>
                                            <span class="font-light">Style :</span> Hoodie
                                        </li>
                                        <li>
                                            <span class="font-light">Catgory :</span> T-shirt
                                        </li>
                                        <li>
                                            <span class="font-light">Tags:</span> summer, organic
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-btns">
                                    <a href="cart.php" class="btn btn-solid-default btn-sm">Add to cart</a>
                                    <a href="product_edit.php?pid=<?php echo htmlentities($row['product_id']);?>" class="btn btn-solid-default btn-sm">View
                                        details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Quick view modal end -->


    <!-- tap to top Section Start -->
    <div class="tap-to-top">
        <a href="#home">
            <i class="fas fa-chevron-up"></i>
        </a>
    </div>
    <!-- tap to top Section End -->

    <div class="bg-overlay"></div>

   <?php
   include"include/footerjs.php";
   ?>
</body>

</html>
<script>
    function percentage() {
  
    // Method returns the element of num1 id
    var num1 = document.getElementById("num1").value;
      
    // Method returns the elements of num2 id
    var num2 = document.getElementById("num2").value;
    document.getElementById("value2")
        .value = (num1 * 100) / num2 + "%";
}
</script>