<?php
include('inc/config.php');

include($docPath.'inc/header.php');
?>
<!-- Main -->
    <main role="main">
    
        <!-- Breadrumbs -->
        <div class="breadcrumbs">
            <div class="container">
                <ol class="breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li class="active"><?php echo $_SESSION['user_first'].' '.$_SESSION['user_last'].'s';?> Account</li>
                </ol>
            </div>
        </div>
        <!-- End Breadcrumbs -->

        <!-- Shop Process -->
        <section id="process" class="section-light">

            <!-- Shop Process Container -->
            <div class="container">

                <div class="row">

                    <!-- Steps -->
                    <div class="steps">

                        <!-- Step -->
                        <div class="col-md-3 col-sm-6">
                            <div class="step">
                                <div class="icon">
                                    <span class="glyphicon glyphicon-bookmark"></span>
                                </div>
                                <h4>1. The Recap Archive</h4>
                                <p>See all your previous reports</p>
                            </div>
                        </div>
                        <!-- End Step -->

                        <!-- Step -->
                        <div class="col-md-3 col-sm-6">
                            <div class="step">
                                <div class="icon">
                                    <span class="glyphicon glyphicon-credit-card"></span>
                                </div>
                                <h4>2. Billing Information</h4>
                                <p>LEdit your billing information</p>
                            </div>
                        </div>
                        <!-- End Step -->

                        <!-- Step -->
                        <div class="col-md-3 col-sm-6">
                            <div class="step">
                                <div class="icon">
                                    <span class="glyphicon glyphicon-lock"></span>
                                </div>
                                <h4>3. Reset Password</h4>
                                <p>Rest your password here</p>
                                </div>
                        </div>
                        <!-- End Step -->

                        <!-- Step -->
                        <div class="col-md-3 col-sm-6">
                            <div class="step">
                                <div class="icon">
                                    <span class="icon-caution"></span>
                                </div>
                                <h4>4. Cancel Your Account</h4>
                                <p></p>
                            </div>
                        </div>
                        <!-- End Step -->

                    </div>
                    <!-- End Steps -->

                </div>

                <div class="row">

                    <!-- Steps -->
                    <div class="steps">

                        <!-- Step -->
                        <div class="col-md-3 col-sm-6">
                            <div class="step">
                                <div class="icon">
                                    <span class="glyphicon glyphicon-pencil"></span>
                                </div>
                                <h4>1. Create Report</h4>
                                <p>Create a new report</p>
                            </div>
                        </div>
                        <!-- End Step -->


                    </div>
                    <!-- End Steps -->

                </div>

            </div>
            <!-- End Shop Process Container -->

        </section>
        <!-- End Shop Process -->

        <!-- Shop -->
        <section id="shop">

            <!-- Shop Container -->
            <div class="container">

                <!-- Shop Header -->
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <header class="text-center">
                            <h2>New Arrivals</h2>
                            <hr />
                        </header>
                    </div>
                </div>
                <!-- End Shop Header -->

                <div class="row">

                    <!-- Shop Item -->
                    <div class="col-md-3 col-lg-3">
                        <div class="shop-item">

                            <!-- Image -->
                            <div class="shop-image">
                                <div class="shop-hover">
                                    <div class="shop-hover-content">
                                        <div class="shop-btn">
                                            <a href="product.html" class="btn btn btn-white btn-iconned btn-rounded"><i class="fa fa-search"></i>View details</a>
                                            <a href="cart.html" class="btn btn btn-yellow btn-iconned btn-rounded"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                                <a href="product.html"><img src="images/shop/shop1.png" class="img-responsive" alt=""></a>
                            </div>
                            <!-- End Image -->

                            <!-- Caption -->
                            <div class="shop-caption">
                                <div class="shop-price">
                                    $79
                                    <del>
                                        $119
                                    </del>
                                </div>
                                <div class="shop-details">
                                    <div class="shop-title shop-label">Purple Dress</div>
                                    <div class="shop-category shop-value">Women Fashion</div>
                                </div>
                                <div class="shop-details">
                                    <div class="shop-label">Sizes</div>
                                    <div class="shop-value">XS, S, M, L, XL, XXL</div>
                                </div>
                                <div class="shop-details">
                                    <div class="shop-label">Colors</div>
                                    <div class="shop-value">
                                        <ul class="article-colors">
                                            <li><span class="color-green"></span></li>
                                            <li><span class="color-blue"></span></li>
                                            <li><span class="color-red"></span></li>
                                            <li><span class="color-white"></span></li>
                                            <li><span class="color-yellow"></span></li>
                                            <li><span class="color-black"></span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- End Caption -->

                        </div>
                    </div>
                    <!-- End Shop Item -->

                    <!-- Shop Item -->
                    <div class="col-md-3 col-lg-3">
                        <div class="shop-item">

                            <!-- Image -->
                            <div class="shop-image">
                                <div class="shop-hover">
                                    <div class="shop-hover-content">
                                        <div class="shop-btn">
                                            <a href="product.html" class="btn btn btn-white btn-iconned btn-rounded"><i class="fa fa-search"></i>View details</a>
                                            <a href="cart.html" class="btn btn btn-yellow btn-iconned btn-rounded"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                                <a href="product.html"><img src="images/shop/shop2.png" class="img-responsive" alt=""></a>

                            </div>
                            <!-- End Image -->

                            <!-- Caption -->
                            <div class="shop-caption">
                                <div class="shop-price">
                                    $139
                                </div>
                                <div class="shop-details">
                                    <div class="shop-title shop-label">Red Dress</div>
                                    <div class="shop-category shop-value">Women Fashion</div>
                                </div>
                                <div class="shop-details">
                                    <div class="shop-label">Sizes</div>
                                    <div class="shop-value">XS, S, M, L, XL, XXL</div>
                                </div>
                                <div class="shop-details">
                                    <div class="shop-label">Colors</div>
                                    <div class="shop-value">
                                        <ul class="article-colors">
                                            <li><span class="color-green"></span></li>
                                            <li><span class="color-blue"></span></li>
                                            <li><span class="color-red"></span></li>
                                            <li><span class="color-white"></span></li>
                                            <li><span class="color-yellow"></span></li>
                                            <li><span class="color-black"></span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- End Caption -->

                        </div>
                    </div>
                    <!-- End Shop Item -->

                    <!-- Shop Item -->
                    <div class="col-md-3 col-lg-3">
                        <div class="shop-item">

                            <!-- Image -->
                            <div class="shop-image">
                                <div class="shop-hover">
                                    <div class="shop-hover-content">
                                        <div class="shop-btn">
                                            <a href="product.html" class="btn btn btn-white btn-iconned btn-rounded"><i class="fa fa-search"></i>View details</a>
                                            <a href="cart.html" class="btn btn btn-yellow btn-iconned btn-rounded"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                                <a href="product.html"><img src="images/shop/shop3.png" class="img-responsive" alt=""></a>

                                <!-- Ribbon -->
                                <div class="ribbon ribbon-right">
                                    <div class="ribbon-content ribbon-red">-50%</div>
                                </div>
                                <!-- End Ribbon -->

                            </div>
                            <!-- End Image -->

                            <!-- Caption -->
                            <div class="shop-caption">
                                <div class="shop-price">
                                    $39
                                    <del>
                                        $79
                                    </del>
                                </div>
                                <div class="shop-details">
                                    <div class="shop-title shop-label">White Skirt</div>
                                    <div class="shop-category shop-value">Women Fashion</div>
                                </div>
                                <div class="shop-details">
                                    <div class="shop-label">Sizes</div>
                                    <div class="shop-value">XS, S, M, L, XL, XXL</div>
                                </div>
                                <div class="shop-details">
                                    <div class="shop-label">Colors</div>
                                    <div class="shop-value">
                                        <ul class="article-colors">
                                            <li><span class="color-green"></span></li>
                                            <li><span class="color-blue"></span></li>
                                            <li><span class="color-red"></span></li>
                                            <li><span class="color-white"></span></li>
                                            <li><span class="color-yellow"></span></li>
                                            <li><span class="color-black"></span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- End Caption -->

                        </div>
                    </div>
                    <!-- End Shop Item -->

                    <!-- Shop Item -->
                    <div class="col-md-3 col-lg-3">
                        <div class="shop-item">

                            <!-- Image -->
                            <div class="shop-image">
                                <div class="shop-hover">
                                    <div class="shop-hover-content">
                                        <div class="shop-btn">
                                            <a href="product.html" class="btn btn btn-white btn-iconned btn-rounded"><i class="fa fa-search"></i>View details</a>
                                            <a href="cart.html" class="btn btn btn-yellow btn-iconned btn-rounded"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                                <a href="product.html"><img src="images/shop/shop4.png" class="img-responsive" alt=""></a>

                            </div>
                            <!-- End Image -->

                            <!-- Caption -->
                            <div class="shop-caption">
                                <div class="shop-price">
                                    $99
                                </div>
                                <div class="shop-details">
                                    <div class="shop-title shop-label">Pink Dress</div>
                                    <div class="shop-category shop-value">Women Fashion</div>
                                </div>
                                <div class="shop-details">
                                    <div class="shop-label">Sizes</div>
                                    <div class="shop-value">XS, S, M, L, XL, XXL</div>
                                </div>
                                <div class="shop-details">
                                    <div class="shop-label">Colors</div>
                                    <div class="shop-value">
                                        <ul class="article-colors">
                                            <li><span class="color-green"></span></li>
                                            <li><span class="color-blue"></span></li>
                                            <li><span class="color-red"></span></li>
                                            <li><span class="color-white"></span></li>
                                            <li><span class="color-yellow"></span></li>
                                            <li><span class="color-black"></span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- End Caption -->

                        </div>
                    </div>
                    <!-- End Shop Item -->

                    <!-- Shop Item -->
                    <div class="col-md-3 col-lg-3">
                        <div class="shop-item">

                            <!-- Image -->
                            <div class="shop-image">
                                <div class="shop-hover">
                                    <div class="shop-hover-content">
                                        <div class="shop-btn">
                                            <a href="product.html" class="btn btn btn-white btn-iconned btn-rounded"><i class="fa fa-search"></i>View details</a>
                                            <a href="cart.html" class="btn btn btn-yellow btn-iconned btn-rounded"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                                <a href="product.html"><img src="images/shop/shop5.png" class="img-responsive" alt=""></a>

                                <!-- Ribbon -->
                                <div class="ribbon ribbon-right">
                                    <div class="ribbon-content ribbon-blue">-20%</div>
                                </div>
                                <!-- End Ribbon -->

                            </div>
                            <!-- End Image -->

                            <!-- Caption -->
                            <div class="shop-caption">
                                <div class="shop-price">
                                    $79
                                    <del>
                                        $119
                                    </del>
                                </div>
                                <div class="shop-details">
                                    <div class="shop-title shop-label">Purple Dress</div>
                                    <div class="shop-category shop-value">Women Fashion</div>
                                </div>
                                <div class="shop-details">
                                    <div class="shop-label">Sizes</div>
                                    <div class="shop-value">XS, S, M, L, XL, XXL</div>
                                </div>
                                <div class="shop-details">
                                    <div class="shop-label">Colors</div>
                                    <div class="shop-value">
                                        <ul class="article-colors">
                                            <li><span class="color-green"></span></li>
                                            <li><span class="color-blue"></span></li>
                                            <li><span class="color-red"></span></li>
                                            <li><span class="color-white"></span></li>
                                            <li><span class="color-yellow"></span></li>
                                            <li><span class="color-black"></span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- End Caption -->

                        </div>
                    </div>
                    <!-- End Shop Item -->

                    <!-- Shop Item -->
                    <div class="col-md-3 col-lg-3">
                        <div class="shop-item">

                            <!-- Image -->
                            <div class="shop-image">
                                <div class="shop-hover">
                                    <div class="shop-hover-content">
                                        <div class="shop-btn">
                                            <a href="product.html" class="btn btn btn-white btn-iconned btn-rounded"><i class="fa fa-search"></i>View details</a>
                                            <a href="cart.html" class="btn btn btn-yellow btn-iconned btn-rounded"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                                <a href="product.html"><img src="images/shop/shop6.png" class="img-responsive" alt=""></a>
                            </div>
                            <!-- End Image -->

                            <!-- Caption -->
                            <div class="shop-caption">
                                <div class="shop-price">
                                    $79
                                    <del>
                                        $119
                                    </del>
                                </div>
                                <div class="shop-details">
                                    <div class="shop-title shop-label">Purple Dress</div>
                                    <div class="shop-category shop-value">Women Fashion</div>
                                </div>
                                <div class="shop-details">
                                    <div class="shop-label">Sizes</div>
                                    <div class="shop-value">XS, S, M, L, XL, XXL</div>
                                </div>
                                <div class="shop-details">
                                    <div class="shop-label">Colors</div>
                                    <div class="shop-value">
                                        <ul class="article-colors">
                                            <li><span class="color-green"></span></li>
                                            <li><span class="color-blue"></span></li>
                                            <li><span class="color-red"></span></li>
                                            <li><span class="color-white"></span></li>
                                            <li><span class="color-yellow"></span></li>
                                            <li><span class="color-black"></span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- End Caption -->

                        </div>
                    </div>
                    <!-- End Shop Item -->

                    <!-- Shop Item -->
                    <div class="col-md-3 col-lg-3">
                        <div class="shop-item">

                            <!-- Image -->
                            <div class="shop-image">
                                <div class="shop-hover">
                                    <div class="shop-hover-content">
                                        <div class="shop-btn">
                                            <a href="product.html" class="btn btn btn-white btn-iconned btn-rounded"><i class="fa fa-search"></i>View details</a>
                                            <a href="cart.html" class="btn btn btn-yellow btn-iconned btn-rounded"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                                <a href="product.html"><img src="images/shop/shop7.png" class="img-responsive" alt=""></a>
                            </div>
                            <!-- End Image -->

                            <!-- Caption -->
                            <div class="shop-caption">
                                <div class="shop-price">
                                    $79
                                    <del>
                                        $119
                                    </del>
                                </div>
                                <div class="shop-details">
                                    <div class="shop-title shop-label">Purple Dress</div>
                                    <div class="shop-category shop-value">Women Fashion</div>
                                </div>
                                <div class="shop-details">
                                    <div class="shop-label">Sizes</div>
                                    <div class="shop-value">XS, S, M, L, XL, XXL</div>
                                </div>
                                <div class="shop-details">
                                    <div class="shop-label">Colors</div>
                                    <div class="shop-value">
                                        <ul class="article-colors">
                                            <li><span class="color-green"></span></li>
                                            <li><span class="color-blue"></span></li>
                                            <li><span class="color-red"></span></li>
                                            <li><span class="color-white"></span></li>
                                            <li><span class="color-yellow"></span></li>
                                            <li><span class="color-black"></span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- End Caption -->

                        </div>
                    </div>
                    <!-- End Shop Item -->

                    <!-- Shop Item -->
                    <div class="col-md-3 col-lg-3">
                        <div class="shop-item">

                            <!-- Image -->
                            <div class="shop-image">
                                <div class="shop-hover">
                                    <div class="shop-hover-content">
                                        <div class="shop-btn">
                                            <a href="product.html" class="btn btn btn-white btn-iconned btn-rounded"><i class="fa fa-search"></i>View details</a>
                                            <a href="cart.html" class="btn btn btn-yellow btn-iconned btn-rounded"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                                <a href="product.html"><img src="images/shop/shop8.png" class="img-responsive" alt=""></a>
                            </div>
                            <!-- End Image -->

                            <!-- Caption -->
                            <div class="shop-caption">
                                <div class="shop-price">
                                    $79
                                    <del>
                                        $119
                                    </del>
                                </div>
                                <div class="shop-details">
                                    <div class="shop-title shop-label">Purple Dress</div>
                                    <div class="shop-category shop-value">Women Fashion</div>
                                </div>
                                <div class="shop-details">
                                    <div class="shop-label">Sizes</div>
                                    <div class="shop-value">XS, S, M, L, XL, XXL</div>
                                </div>
                                <div class="shop-details">
                                    <div class="shop-label">Colors</div>
                                    <div class="shop-value">
                                        <ul class="article-colors">
                                            <li><span class="color-green"></span></li>
                                            <li><span class="color-blue"></span></li>
                                            <li><span class="color-red"></span></li>
                                            <li><span class="color-white"></span></li>
                                            <li><span class="color-yellow"></span></li>
                                            <li><span class="color-black"></span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- End Caption -->

                        </div>
                    </div>
                    <!-- End Shop Item -->

                </div>

            </div>
            <!-- End Shop Container -->

        </section>
        <!-- End Shop -->


        <!-- Newsletter -->
        <section id="newsletter" class="section-light newsletter text-center">

            <!-- Newsletter Container -->
            <div class="container">

                <div class="row">
                    <div class="col-md-6 col-md-offset-3">

                        <!-- Newsletter Header -->
                        <header>
                            <h3>Stay informed</h3>
                            <h4>Subscribe to our newsletter</h4>
                        </header>
                        <!-- End Newsletter Header -->

                        <!-- Newsletter Form -->
                        <form class="form-inline">
                            <div class="form-group">
                                <input placeholder="Email Address" class="form-control" type="email">
                            </div>
                            <button type="submit" class="btn btn-primary">
                                Subscribe
                            </button>
                        </form>
                        <!-- End Newsletter Form -->

                        <p class="inform">
                            We will never send you spam. <b>We promise!</b>
                        </p>

                    </div>
                </div>

            </div>
            <!-- End Newsletter Container -->

        </section>
        <!-- End Newsletter -->



    </main>
    <!-- End Main -->

<?php include($docPath.'inc/footer.php');?>