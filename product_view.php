<?php
//error_reporting(0);
require_once('data/connection.php');

if(isset($_GET['action']) && $_GET['action']=="add"){
    $id=intval($_GET['id']);
    if(isset($_SESSION['cart'][$id])){
        $_SESSION['cart'][$id]['quantity']++;
    }else{
        $sql_p="SELECT * FROM product_list WHERE product_id={$product_id}";
        $query_p=mysqli_query($con,$sql_p);
        if(mysqli_num_rows($query_p)!=0){
            $row_p=mysqli_fetch_array($query_p);
            $_SESSION['cart'][$row_p['product_id']]=array("quantity" => 1, "price" => $row_p['product_Price']);
                    echo "<script>alert('Product has been added to the cart')</script>";
        echo "<script type='text/javascript'> document.location ='cart.php'; </script>";
        }else{
            $message="Product ID is invalid";
        }
    }
}


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

    <!-- Breadcrumb section start -->
    <section class="breadcrumb-section section-b-space">
        <ul class="circles">
            <li></li>
            <li></li>
        </ul>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3>Product Details</h3>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb section end -->

    <!-- Shop Section start -->
    <section>
        <div class="container">
            <div class="row gx-4 gy-5">
                <div class="col-lg-3 col-md-4 mt-lg-5 mt-0">
                    <div class="category-option">
                        <div class="button-close mb-3">
                            <button class="btn p-0"><i data-feather="arrow-left"></i> Close</button>
                        </div>

                        <div class="accordion category-name" id="accordionExample">
                            <div class="accordion-item category-rating">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseThree">
                                        Category
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse show"
                                    aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                    <?php 
                                         $sn =1;
                                          $sqli = "SELECT * FROM `cat_list` where `status` = 1 order by `cat_name` asc ";
                                          $result = mysqli_query($con, $sqli);
                                         
                                          if (mysqli_num_rows($result) > 0) {
                                            while($row = mysqli_fetch_assoc($result)) {
                                         
                                              
                                              $cat_name = $row["cat_name"]; 
                                             ?>


                                    <div class="accordion-body category-scroll">
                                        <ul class="category-list">
                                            <li>
                                                <div class="form-check ps-0">
                                                    <div class="form-check user-checkbox ps-0">
                                                        <input class="checkbox_animated check-it" type="checkbox"
                                                            value="" id="flexCheckDefault1">
                                                        <a class="form-check-label" href="category.php?cat_id=<?php echo htmlentities($rws['cat_id']);?>" ><?php echo ucwords($row['cat_name']); ?><span
                                                                class="font-light">(25)</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </li>  
                                        </ul>
                                    </div>
                                    <?php } } ?>
                                </div>
                            </div>

                            <div class="accordion-item service-accorion">
                                <div id="collapseFour" class="accordion-collapse collapse show"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <ul class="category-list">
                                            <li>
                                                <div class="service-wrap">
                                                    <div class="service-icon">
                                                        <svg>
                                                            <use xlink:href="assets/svg/icons.svg#customer"></use>
                                                        </svg>
                                                    </div>
                                                    <div class="service-content">
                                                        <h3>Customer Servcies</h3>
                                                        <span class="font-light">Top notch customer service.</span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="service-wrap">
                                                    <div class="service-icon">
                                                        <svg>
                                                            <use xlink:href="assets/svg/icons.svg#shop"></use>
                                                        </svg>
                                                    </div>
                                                    <div class="service-content">
                                                        <h3>Pickup At Any Store</h3>
                                                        <span class="font-light">Free shipping on orders over
                                                            ₹500</span>
                                                    </div>
                                                </div>
                                            </li>

                                            <li>
                                                <div class="service-wrap">
                                                    <div class="service-icon">
                                                        <svg>
                                                            <use xlink:href="assets/svg/icons.svg#secure-payment">
                                                            </use>
                                                        </svg>
                                                    </div>
                                                    <div class="service-content">
                                                        <h3>Secured Payment</h3>
                                                        <span class="font-light">We accept all major credit
                                                            cards.</span>
                                                    </div>
                                                </div>
                                            </li>

                                            <li>
                                                <div class="service-wrap">
                                                    <div class="service-icon">
                                                        <svg>
                                                            <use xlink:href="assets/svg/icons.svg#return"></use>
                                                        </svg>
                                                    </div>
                                                    <div class="service-content">
                                                        <h3>Free Returns</h3>
                                                        <span class="font-light">30-days free return policy.</span>
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

                <div class="col-lg-9 col-12">
                    <!-- filter button -->
                    <div class="filter-button mb-3">
                        <button class="danger-button danger-center btn btn-sm filter-btn"><i
                                data-feather="align-left"></i> Filter</button>
                    </div>
                    <!-- filter button -->
                     <?php
                                    // jo id product all wala se bhej rha hai 
                                    $product_id = $_GET['product_id']; 
                                          $ret = mysqli_query($con,"SELECT * FROM product_list where product_id='$product_id'");
                                          $row = mysqli_fetch_array($ret);
                                      /// jaha use karna hai kar lena 
                                          $product_img = 'image/product/'.$row["product_img"];
                                    ?>
                    
                    <div class="details-items">
                        <div class="row g-4">
                            <div class="col-lg-5 col-md-6">
                                <div class="degree-section">
                                    <div class="details-image ratio_asos">
                                        <div>

                                            <div class="product-image-tag">
                                                <img src="image/product/<?php echo htmlentities($row['product_img']);?>" id="zoom_01"
                                                    data-zoom-image="" data-echo="image/product/<?php echo $product_img; ?>"
                                                    class="img-fluid w-100 image_zoom_cls-0 blur-up lazyload" alt="">

                                                <div class="label-tag">
                                                    <h6><i class="fas fa-star"></i> 4.8 <span
                                                            class="font-light">120</span></h6>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        
                                        
                                    </div>

                                    <div class="details-image-option black-slide mt-4 rounded">
                                        <div>
                                            <img src="image/product/<?php echo $product_id; ?>/<?php echo $product_img; ?>" class="img-fluid blur-up lazyload"
                                                alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-7 col-md-6">
                                <div class="cloth-details-size">
                                    <div class="product-count">
                                        <ul>
                                            <li>
                                                <img src="assets/images/gif/fire.gif" class="img-fluid blur-up lazyload"
                                                    alt="image">
                                                <span class="p-counter">37</span>
                                                <span class="lang">orders in last 24 hours</span>
                                            </li>
                                            <li>
                                                <img src="assets/images/gif/person.gif" class="img-fluid user_img"
                                                    alt="image">
                                                <span class="p-counter">44</span>
                                                <span class="lang">active view this</span>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="details-image-concept">
                                       
                                        <h2><?php echo htmlentities($row['product_name']);?></h2>
                                        
                                    </div>

                                    <div class="label-section">
                                        <span class="badge badge-grey-color">#1 Best seller</span>
                                        <span class="label-text">in <?php echo htmlentities($row['product_cat']);?></span>
                                    </div>
                                    

                                    <h3 class="price-detail"><?php echo htmlentities($row['product_price']);?> <del>₹<?php echo htmlentities($row['product_price1']);?>.00</del><span>55% off</span></h3>



                                    <div class="product-buttons">
                                        <?php if($row['productAvailability']=='1'){?>
                                        
                                        <a href="cart.php??page=product&action=add&product_id=<?php echo $row['product_id']; ?>" product_id="<?php echo $row['product_id']; ?>"
                                            class="btn btn-solid hover-solid btn-animation">
                                            <i class="fa fa-shopping-cart"></i>
                                            <span>Add To Cart</span>
                                        </a>
                                        <?php } else {?>
                                            <div class="btn btn-solid hover-solid btn-animation" style="color:white;">Out of Stock</div>
                                 <?php } ?>
                                    </div>

                                    <ul class="product-count shipping-order">
                                        <li>
                                            <img src="assets/images/gif/truck.png" class="img-fluid blur-up lazyload"
                                                alt="image">
                                            <span class="lang">Free shipping for orders above ₹500 INR</span>
                                        </li>
                                    </ul>

                                    <div class="mt-2 mt-md-3 border-product">
                                        <h6 class="product-title hurry-title d-block">Hurry Up! Left <span>10</span>
                                            <?php if($row['productAvailability'] == '1'): ?>
                                                <span class="">In Stock</span>
                                                <?php else: ?>
                                                <span class="">Out of Stock</span>
                                                <?php endif; ?></h6>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: 78%"></div>
                                        </div>
                                        
                                    </div>

                                    <div class="border-product">
                                        <h6 class="product-title d-block">share it</h6>
                                        <div class="product-icon">
                                            <ul class="product-social">
                                                <li>
                                                    <a href="https://www.facebook.com/">
                                                        <i class="fab fa-facebook-f"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="https://www.google.com/">
                                                        <i class="fab fa-google-plus-g"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="https://twitter.com/">
                                                        <i class="fab fa-twitter"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="https://www.instagram.com/">
                                                        <i class="fab fa-instagram"></i>
                                                    </a>
                                                </li>
                                                <li class="pe-0">
                                                    <a href="https://www.google.com/">
                                                        <i class="fas fa-rss"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="cloth-review">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab"
                                    data-bs-target="#desc" type="button">Description</button>

                                <button class="nav-link" id="nav-speci-tab" data-bs-toggle="tab" data-bs-target="#speci"
                                    type="button">Specifications</button>

                                <button class="nav-link" id="nav-size-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-guide" type="button">Sizing Guide</button>

                                <button class="nav-link" id="nav-question-tab" data-bs-toggle="tab"
                                    data-bs-target="#question" type="button">Q & A</button>

                                <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab"
                                    data-bs-target="#review" type="button">Review</button>
                            </div>
                        </nav>

                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="desc">
                                <div class="shipping-chart">
                                    <div class="part">
                                        <?php echo htmlentities($row['product_desc']);?> 
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="speci">
                                <div class="pro mb-4">
                                    <p class="font-light">The Model is wearing a white blouse from our stylist's
                                        collection, see the image for a mock-up of what the actual blouse would look
                                        like.it has text written on it in a black cursive language which looks great
                                        on a white color.</p>
                                    <div class="table-responsive">
                                        <table class="table table-part">
                                            <tr>
                                                <th>Product Dimensions</th>
                                                <td>15 x 15 x 3 cm; 250 Grams</td>
                                            </tr>
                                            <tr>
                                                <th>Date First Available</th>
                                                <td>5 April 2021</td>
                                            </tr>
                                            <tr>
                                                <th>Manufacturer‏</th>
                                                <td>Aditya Birla Fashion and Retail Limited</td>
                                            </tr>
                                            <tr>
                                                <th>ASIN</th>
                                                <td>B06Y28LCDN</td>
                                            </tr>
                                            <tr>
                                                <th>Item model number</th>
                                                <td>AMKP317G04244</td>
                                            </tr>
                                            <tr>
                                                <th>Department</th>
                                                <td>Men</td>
                                            </tr>
                                            <tr>
                                                <th>Item Weight</th>
                                                <td>250 G</td>
                                            </tr>
                                            <tr>
                                                <th>Item Dimensions LxWxH</th>
                                                <td>15 x 15 x 3 Centimeters</td>
                                            </tr>
                                            <tr>
                                                <th>Net Quantity</th>
                                                <td>1 U</td>
                                            </tr>
                                            <tr>
                                                <th>Included Components‏</th>
                                                <td>1-T-shirt</td>
                                            </tr>
                                            <tr>
                                                <th>Generic Name</th>
                                                <td>T-shirt</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade overflow-auto" id="nav-guide">
                                <div class="table-responsive">
                                    <table class="table table-pane mb-0">
                                        <tbody>
                                            <tr class="bg-color">
                                                <th class="my-2">US Sizes</th>
                                                <td>6</td>
                                                <td>6.5</td>
                                                <td>7</td>
                                                <td>8</td>
                                                <td>8.5</td>
                                                <td>9</td>
                                                <td>9.5</td>
                                                <td>10</td>
                                                <td>10.5</td>
                                                <td>11</td>
                                            </tr>

                                            <tr>
                                                <th>Euro Sizes</th>
                                                <td>39</td>
                                                <td>39</td>
                                                <td>40</td>
                                                <td>40-41</td>
                                                <td>41</td>
                                                <td>41-42</td>
                                                <td>42</td>
                                                <td>42-43</td>
                                                <td>43</td>
                                                <td>43-44</td>
                                            </tr>

                                            <tr class="bg-color">
                                                <th>UK Sizes</th>
                                                <td>5.5</td>
                                                <td>6</td>
                                                <td>6.5</td>
                                                <td>7</td>
                                                <td>7.5</td>
                                                <td>8</td>
                                                <td>8.5</td>
                                                <td>9</td>
                                                <td>10.5</td>
                                                <td>11</td>
                                            </tr>

                                            <tr>
                                                <th>Inches</th>
                                                <td>9.25"</td>
                                                <td>9.5"</td>
                                                <td>9.625"</td>
                                                <td>9.75"</td>
                                                <td>9.9735"</td>
                                                <td>10.125"</td>
                                                <td>10.25"</td>
                                                <td>10.5"</td>
                                                <td>10.765"</td>
                                                <td>10.85</td>
                                            </tr>

                                            <tr class="bg-color">
                                                <th>CM</th>
                                                <td>23.5</td>
                                                <td>24.1</td>
                                                <td>24.4</td>
                                                <td>25.4</td>
                                                <td>25.7</td>
                                                <td>26</td>
                                                <td>26.7</td>
                                                <td>27</td>
                                                <td>27.3</td>
                                                <td>27.5</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="question">
                                <div class="question-answer">
                                    <ul>
                                        <li>
                                            <div class="que">
                                                <i class="fas fa-question"></i>
                                                <div class="que-details">
                                                    <h6>Is it compatible with all WordPress themes?</h6>
                                                    <p class="font-light">If you want to see a demonstration version of
                                                        the premium plugin, you can see that in this page. If you want
                                                        to see a demonstration version of the premium plugin, you can
                                                        see that in this page. If you want to see a demonstration
                                                        version of the premium plugin, you can see that in this page.
                                                    </p>
                                                </div>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="que">
                                                <i class="fas fa-question"></i>
                                                <div class="que-details">
                                                    <h6>How can I try the full-featured plugin? </h6>
                                                    <p class="font-light">Compatibility with all themes is impossible,
                                                        because they are too many, but generally if themes are developed
                                                        according to WordPress and WooCommerce guidelines, YITH plugins
                                                        are compatible with them. Compatibility with all themes is
                                                        impossible, because they are too many, but generally if themes
                                                        are developed according to WordPress and WooCommerce guidelines,
                                                        YITH plugins are compatible with them.</p>
                                                </div>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="que">
                                                <i class="fas fa-question"></i>
                                                <div class="que-details">
                                                    <h6>Is it compatible with all WordPress themes?</h6>
                                                    <p class="font-light">If you want to see a demonstration version of
                                                        the premium plugin, you can see that in this page. If you want
                                                        to see a demonstration version of the premium plugin, you can
                                                        see that in this page. If you want to see a demonstration
                                                        version of the premium plugin, you can see that in this page.
                                                    </p>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="review">
                                <div class="row g-4">
                                    <div class="col-lg-4">
                                        <div class="customer-rating">
                                            <h2>Customer reviews</h2>
                                            <ul class="rating my-2 d-inline-block">
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

                                            <div class="global-rating">
                                                <h5 class="font-light">82 Ratings</h5>
                                            </div>

                                            <ul class="rating-progess">
                                                <li>
                                                    <h5 class="me-3">5 Star</h5>
                                                    <div class="progress">
                                                        <div class="progress-bar" role="progressbar" style="width: 78%"
                                                            aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                                                        </div>
                                                    </div>
                                                    <h5 class="ms-3">78%</h5>
                                                </li>
                                                <li>
                                                    <h5 class="me-3">4 Star</h5>
                                                    <div class="progress">
                                                        <div class="progress-bar" role="progressbar" style="width: 62%"
                                                            aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                                                        </div>
                                                    </div>
                                                    <h5 class="ms-3">62%</h5>
                                                </li>
                                                <li>
                                                    <h5 class="me-3">3 Star</h5>
                                                    <div class="progress">
                                                        <div class="progress-bar" role="progressbar" style="width: 44%"
                                                            aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                                                        </div>
                                                    </div>
                                                    <h5 class="ms-3">44%</h5>
                                                </li>
                                                <li>
                                                    <h5 class="me-3">2 Star</h5>
                                                    <div class="progress">
                                                        <div class="progress-bar" role="progressbar" style="width: 30%"
                                                            aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                                                        </div>
                                                    </div>
                                                    <h5 class="ms-3">30%</h5>
                                                </li>
                                                <li>
                                                    <h5 class="me-3">1 Star</h5>
                                                    <div class="progress">
                                                        <div class="progress-bar" role="progressbar" style="width: 18%"
                                                            aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                                                        </div>
                                                    </div>
                                                    <h5 class="ms-3">18%</h5>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="col-lg-8">
                                        <p class="d-inline-block me-2">Rating</p>
                                        <ul class="rating mb-3 d-inline-block">
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
                                        <div class="review-box">
                                            <form class="row g-4">
                                                <div class="col-12 col-md-6">
                                                    <label class="mb-1" for="name">Name</label>
                                                    <input type="text" class="form-control" id="name"
                                                        placeholder="Enter your name" required>
                                                </div>

                                                <div class="col-12 col-md-6">
                                                    <label class="mb-1" for="id">Email Address</label>
                                                    <input type="email" class="form-control" id="id"
                                                        placeholder="Email Address" required>
                                                </div>

                                                <div class="col-12">
                                                    <label class="mb-1" for="comments">Comments</label>
                                                    <textarea class="form-control" placeholder="Leave a comment here"
                                                        id="comments" style="height: 100px" required></textarea>
                                                </div>

                                                <div class="col-12">
                                                    <button type="submit"
                                                        class="btn default-light-theme default-theme default-theme-2">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                    <div class="col-12 mt-4">
                                        <div class="customer-review-box">
                                            <h4>Customer Reviews</h4>

                                            <div class="customer-section">
                                                <div class="customer-profile">
                                                    <img src="assets/images/inner-page/review-image/1.jpg"
                                                        class="img-fluid blur-up lazyload" alt="">
                                                </div>

                                                <div class="customer-details">
                                                    <h5>Mike K</h5>
                                                    <ul class="rating my-2 d-inline-block">
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
                                                    <p class="font-light">I purchased my Tab S2 at Best Buy but I
                                                        wanted
                                                        to
                                                        share my thoughts on Amazon. I'm not going to go over specs
                                                        and
                                                        such
                                                        since you can read those in a hundred other places. Though I
                                                        will
                                                        say that the "new" version is preloaded with Marshmallow and
                                                        now
                                                        uses a Qualcomm octacore processor in place of the Exynos
                                                        that
                                                        shipped with the first gen.</p>

                                                    <p class="date-custo font-light">- Sep 08, 2021</p>
                                                </div>
                                            </div>

                                            <div class="customer-section">
                                                <div class="customer-profile">
                                                    <img src="assets/images/inner-page/review-image/2.jpg"
                                                        class="img-fluid blur-up lazyload" alt="">
                                                </div>

                                                <div class="customer-details">
                                                    <h5>Norwalker</h5>
                                                    <ul class="rating my-2 d-inline-block">
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
                                                    <p class="font-light">Pros: Nice large(9.7") screen. Bright
                                                        colors.
                                                        Easy
                                                        to setup and get started. Arrived on time. Cons: a bit slow
                                                        on
                                                        response, but expected as tablet is 2 generations old. But
                                                        works
                                                        fine and good value for the money.</p>

                                                    <p class="date-custo font-light">- Sep 08, 2021</p>
                                                </div>
                                            </div>

                                            <div class="customer-section">
                                                <div class="customer-profile">
                                                    <img src="assets/images/inner-page/review-image/3.jpg"
                                                        class="img-fluid blur-up lazyload" alt="">
                                                </div>

                                                <div class="customer-details">
                                                    <h5>B. Perdue</h5>
                                                    <ul class="rating my-2 d-inline-block">
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
                                                    <p class="font-light">Love the processor speed and the
                                                        sensitivity
                                                        of
                                                        the touch screen.</p>

                                                    <p class="date-custo font-light">- Sep 08, 2021</p>
                                                </div>
                                            </div>

                                            <div class="customer-section">
                                                <div class="customer-profile">
                                                    <img src="assets/images/inner-page/review-image/4.jpg"
                                                        class="img-fluid blur-up lazyload" alt="">
                                                </div>

                                                <div class="customer-details">
                                                    <h5>MSL</h5>
                                                    <ul class="rating my-2 d-inline-block">
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
                                                    <p class="font-light">I purchased the Tablet May 2017 and now
                                                        April
                                                        2019
                                                        I have to charge it everyday. I don't watch movies on
                                                        it..just
                                                        play
                                                        a game or two while on lunch. I guess now I need to power it
                                                        down
                                                        for future use.</p>

                                                    <p class="date-custo font-light">- Sep 08, 2021</p>
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
    <!-- Shop Section end -->

    <!-- product section start -->
    <section class="ratio_asos section-b-space overflow-hidden">
        <div class="container">
            
        </div>
    </section>
    <!-- product section end -->

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
                                <div class="quick-view-slider">
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
                                <div class="size-detail">
                                    <h4>size</h4>
                                    <ul class="">
                                        <li class="selected">S</li>
                                        <li>M</li>
                                        <li>L</li>
                                        <li>XL</li>
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
                                    <button type="button" class="btn btn-solid-default btn-sm"
                                        data-bs-dismiss="modal">Add to cart</button>
                                    <button type="button" class="btn btn-solid-default btn-sm"
                                        data-bs-dismiss="modal">View details</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Quick view modal end -->

    <!-- Cart Successful Start -->
    <div class="modal fade cart-modal" id="addtocart" tabindex="-1" role="dialog" aria-label="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content ">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="modal-contain">
                        <div>
                            <div class="modal-messages">
                                <i class="fas fa-check"></i> 3-stripes full-zip hoodie successfully added to
                                you cart.
                            </div>
                            <div class="modal-product">
                                <div class="modal-contain-img">
                                    <img src="assets/images/fashion/instagram/4.jpg" class="img-fluid blur-up lazyload"
                                        alt="">
                                </div>
                                <div class="modal-contain-details">
                                    <h4>Premier Cropped Skinny Jean</h4>
                                    <p class="font-light my-2">Yellow, Qty : 3</p>
                                    <div class="product-total">
                                        <h5>TOTAL : <span>$1,140.00</span></h5>
                                    </div>
                                    <div class="shop-cart-button mt-3">
                                        <a href="shop-left-sidebar.php"
                                            class="btn default-light-theme conti-button default-theme default-theme-2 rounded">CONTINUE
                                            SHOPPING</a>
                                        <a href="cart.php"
                                            class="btn default-light-theme conti-button default-theme default-theme-2 rounded">VIEW
                                            CART</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="ratio_asos mt-4">
                        <div class="container">
                            <div class="row m-0">
                                <div class="col-sm-12 p-0">
                                    <div
                                        class="product-wrapper product-style-2 slide-4 p-0 light-arrow bottom-space spacing-slider">
                                        <div>
                                            <div class="product-box">
                                                <div class="img-wrapper">
                                                    <div class="front">
                                                        <a href="product-left-sidebar.php">
                                                            <img src="assets/images/fashion/product/front/1.jpg"
                                                                class="bg-img blur-up lazyload" alt="">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="product-details text-center">
                                                    <div class="rating-details d-block text-center">
                                                        <span class="font-light grid-content">B&Y Jacket</span>
                                                    </div>
                                                    <div class="main-price mt-0 d-block text-center">
                                                        <h3 class="theme-color">$78.00</h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div>
                                            <div class="product-box">
                                                <div class="img-wrapper">
                                                    <div class="front">
                                                        <a href="product-left-sidebar.php">
                                                            <img src="assets/images/fashion/product/front/2.jpg"
                                                                class="bg-img blur-up lazyload" alt="">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="product-details text-center">
                                                    <div class="rating-details d-block text-center">
                                                        <span class="font-light grid-content">B&Y Jacket</span>
                                                    </div>
                                                    <div class="main-price mt-0 d-block text-center">
                                                        <h3 class="theme-color">$78.00</h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div>
                                            <div class="product-box">
                                                <div class="img-wrapper">
                                                    <div class="front">
                                                        <a href="product-left-sidebar.php">
                                                            <img src="assets/images/fashion/product/front/3.jpg"
                                                                class="bg-img blur-up lazyload" alt="">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="product-details text-center">
                                                    <div class="rating-details d-block text-center">
                                                        <span class="font-light grid-content">B&Y Jacket</span>
                                                    </div>
                                                    <div class="main-price mt-0 d-block text-center">
                                                        <h3 class="theme-color">$78.00</h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div>
                                            <div class="product-box">
                                                <div class="img-wrapper">
                                                    <div class="front">
                                                        <a href="product-left-sidebar.php">
                                                            <img src="assets/images/fashion/product/front/4.jpg"
                                                                class="bg-img blur-up lazyload" alt="">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="product-details text-center">
                                                    <div class="rating-details d-block text-center">
                                                        <span class="font-light grid-content">B&Y Jacket</span>
                                                    </div>
                                                    <div class="main-price mt-0 d-block text-center">
                                                        <h3 class="theme-color">$78.00</h3>
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
        </div>
    </div>
    <!-- Cart Successful End -->

    <!-- Size Modal Start -->
    <div class="modal modal-size fade" id="sizemodal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <img src="assets/images/size-chart.jpg" alt="" class="img-fluid blur-up lazyload">
                </div>
            </div>
        </div>
    </div>
    <!-- Size Modal End -->

    <!-- Add To Cart Notification -->
    <div class="added-notification">
        <img src="assets/images/fashion/banner/2.jpg" class="img-fluid blur-up lazyload" alt="">
        <h3>added to cart</h3>
    </div>
    <!-- Add To Cart Notification -->

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

    <!-- Bootstrap js-->
    <script src="assets/js/bootstrap/bootstrap.bundle.min.js"></script>

    <!-- feather icon js-->
    <script src="assets/js/feather/feather.min.js"></script>

    <!-- lazyload js-->
    <script src="assets/js/lazysizes.min.js"></script>

    <!-- Slick js-->
    <script src="assets/js/slick/slick.js"></script>
    <script src="assets/js/slick/slick-animation.min.js"></script>
    <script src="assets/js/slick/custom_slick.js"></script>

    <!-- Notify js-->
    <script src="assets/js/bootstrap/bootstrap-notify.min.js"></script>

    <!-- timer js -->
    <script src="assets/js/timer.js"></script>

    <!-- sticky cart bottom js-->
    <script src="assets/js/sticky-cart-bottom.js"></script>

    <!-- sticky cart bottom js-->
    <script src="assets/js/check-box-select.js"></script>

    <!-- Zoom Js -->
    <script src="assets/js/jquery.elevatezoom.js"></script>
    <script src="assets/js/zoom-filter.js"></script>

    <!--Plugin JavaScript file-->
    <script src="assets/js/ion.rangeSlider.min.js"></script>

    <!-- Filter Hide and show Js -->
    <script src="assets/js/filter.js"></script>

    <!-- add to cart modal resize -->
    <script src="assets/js/cart_modal_resize.js"></script>

    <!-- Notify js-->
    <script src="assets/js/bootstrap/bootstrap-notify.min.js"></script>

    <!-- script js -->
    <script src="assets/js/theme-setting.js"></script>
    <script src="assets/js/script.js"></script>

</body>

</html>