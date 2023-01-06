<?php
require_once('data/connection.php');

if(isset($_POST['submit'])){
        if(!empty($_SESSION['cart'])){
        foreach($_POST['quantity'] as $key => $val){
            if($val==0){
                unset($_SESSION['cart'][$key]);
            }else{
                $_SESSION['cart'][$key]['quantity']=$val;

            }
        }
            echo "<script>alert('Your Cart hasbeen Updated');</script>";
        }
    }
// Code for Remove a Product from Cart
if(isset($_POST['remove_code']))
    {

if(!empty($_SESSION['cart'])){
        foreach($_POST['remove_code'] as $key){
            
                unset($_SESSION['cart'][$key]);
        }
            echo "<script>alert('Your Cart has been Updated');</script>";
    }
}
// code for insert product in order table


if(isset($_POST['ordersubmit'])) 
{
    
if(strlen($_SESSION['login'])==0)
    {   
header('location:login.php');
}
else{

    $quantity=$_POST['quantity'];
    $pdd=$_SESSION['pid'];
    $value=array_combine($pdd,$quantity);


        foreach($value as $qty=> $val34){



mysqli_query($con,"insert into orders(userId,productId,quantity) values('".$_SESSION['id']."','$qty','$val34')");
header('location:payment-method.php');
}
}
}

// code for billing address updation
    if(isset($_POST['update']))
    {
        $baddress=$_POST['billingaddress'];
        $bstate=$_POST['bilingstate'];
        $bcity=$_POST['billingcity'];
        $bpincode=$_POST['billingpincode'];
        $query=mysqli_query($con,"update users set billingAddress='$baddress',billingState='$bstate',billingCity='$bcity',billingPincode='$bpincode' where id='".$_SESSION['id']."'");
        if($query)
        {
echo "<script>alert('Billing Address has been updated');</script>";
        }
    }


// code for Shipping address updation
    if(isset($_POST['shipupdate']))
    {
        $saddress=$_POST['shippingaddress'];
        $sstate=$_POST['shippingstate'];
        $scity=$_POST['shippingcity'];
        $spincode=$_POST['shippingpincode'];
        $query=mysqli_query($con,"update users set shippingAddress='$saddress',shippingState='$sstate',shippingCity='$scity',shippingPincode='$spincode' where id='".$_SESSION['id']."'");
        if($query)
        {
echo "<script>alert('Shipping Address has been updated');</script>";
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

    <!-- mobile fix menu start -->
    
    <!-- mobile fix menu end -->

    <!-- Breadcrumb section start -->
    <section class="breadcrumb-section section-b-space">
        <ul class="circles">
            <li></li>
            <li></li>
        </ul>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3>Shopping Cart</h3>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb section end -->

    <!-- Cart Section Start -->
    <section class="cart-section section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="count-down">
                        <h5>Your cart will be expired in <span class="count-timer theme-color" id="timer"></span>
                            minutes !</h5>
                        <button type="button" onclick="location.href = 'checkout.php';"
                            class="btn btn-solid-default btn-sm fw-bold">Check Out</button>
                    </div>
                </div>

                <div class="col-sm-12 table-responsive mt-4">
                    <table class="table cart-table">
                        <?php
                        if(!empty($_SESSION['cart'])){
                            ?>
                        <thead>
                            <tr class="table-head">
                                <th scope="col">image</th>
                                <th scope="col">product name</th>
                                <th scope="col">price</th>
                                <th scope="col">quantity</th>
                                <th scope="col">action</th>
                                <th scope="col">total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                             $product_id=array();
                                $sql = "SELECT * FROM product_list WHERE id IN(";
                                        foreach($_SESSION['cart'] as $product_id => $value){
                                        $sql .=$id. ",";
                                        }
                                        $sql=substr($sql,0,-1) . ") ORDER BY id ASC";
                                        $query = mysqli_query($con,$sql);
                                        $totalprice=0;
                                        $totalqunty=0;
                                        if(!empty($query)){
                                        while($row = mysqli_fetch_array($query)){
                                            $quantity=$_SESSION['cart'][$row['cart_id']]['quantity'];
                                            $subtotal= $_SESSION['cart'][$row['cart_id']]['quantity']*$row['product_price']+$row['shippingCharge'];
                                            $totalprice += $subtotal;
                                            $_SESSION['qnty']=$totalqunty+=$quantity;

                                            array_push($pdtid,$row['id']);
                            //print_r($_SESSION['pid'])=$pdtid;exit;
                                ?>
                            <tr>
                                <td>
                                    <a href="product-left-sidebar.php">
                                        <img src="image/product/<?php echo $row['product_img'];?>" class=" blur-up lazyload"
                                            alt="">
                                    </a>
                                </td>
                                <td>
                                    <a href="product-left-sidebar.php">Yellow Jacket</a>
                                    <div class="mobile-cart-content row">
                                        <div class="col">
                                            <div class="qty-box">
                                                <div class="input-group">
                                                    <input type="text" name="quantity" class="form-control input-number"
                                                        value="1">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <h2>$63.00</h2>
                                        </div>
                                        <div class="col">
                                            <h2 class="td-color">
                                                <a href="javascript:void(0)">
                                                    <i class="fas fa-times"></i>
                                                </a>
                                            </h2>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h2>$63.00</h2>
                                </td>
                                <td>
                                    <div class="qty-box">
                                        <div class="input-group">
                                            <input type="number" name="quantity" class="form-control input-number"
                                                value="1">
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <a href="javascript:void(0)">
                                        <i class="fas fa-times"></i>
                                    </a>
                                </td>
                                <td>
                                    <h2 class="td-color">$3648.00</h2>
                                </td>
                            </tr>
                            <?php } }  ?>
                        </tbody>
                        
                        <?php } ?>
                    </table>
                </div>

                <div class="col-12 mt-md-5 mt-4">
                    <div class="row">
                        <div class="col-sm-7 col-5 order-1">
                            <div class="left-side-button text-end d-flex d-block justify-content-end">
                                <a href="javascript:void(0)"
                                    class="text-decoration-underline theme-color d-block text-capitalize">clear
                                    all items</a>
                            </div>
                        </div>
                        <div class="col-sm-5 col-7">
                            <div class="left-side-button float-start">
                                <a href="index.php" class="btn btn-solid-default btn fw-bold mb-0 ms-0">
                                    <i class="fas fa-arrow-left"></i> Continue Shopping</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="cart-checkout-section">
                    <div class="row g-4">
                        <div class="col-lg-4 col-sm-6">
                            <div class="promo-section">
                                <form class="row g-3">
                                    <div class="col-7">
                                        <input type="text" class="form-control" id="number" placeholder="Coupon Code">
                                    </div>
                                    <div class="col-5">
                                        <button class="btn btn-solid-default rounded btn">Apply Coupon</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="col-lg-4 col-sm-6 ">
                            <div class="checkout-button">
                                <a href="checkout.php" class="btn btn-solid-default btn fw-bold">
                                    Check Out <i class="fas fa-arrow-right ms-1"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="cart-box">
                                <div class="cart-box-details">
                                    <div class="total-details">
                                        <div class="top-details">
                                            <h3>Cart Totals</h3>
                                            <h6>Total MRP <span>$250.00</span></h6>
                                            <h6>Coupon Discount <span>-$25.00</span></h6>
                                            <h6>Convenience Fee <span><del>$25.00</del></span></h6>
                                        </div>
                                        <div class="bottom-details">
                                            <a href="checkout.php">Process Checkout</a>
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
    <!-- Cart Section End -->
    
    <!-- footer start -->
    <?php
    include "include/footer.php";
    ?>
    <!-- footer end -->

    <!-- theme Setting Start -->
    <<?php
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

    <!-- timer js -->
    <script src="assets/js/count-down-timer.js"></script>

    <!-- Notify js -->
    <script src="assets/js/bootstrap/bootstrap-notify.min.js"></script>

    <!-- script js -->
    <script src="assets/js/theme-setting.js"></script>
    <script src="assets/js/script.js"></script>
</body>

</html>