<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
    <head>
        <meta charset="utf-8">
        <link rel="shortcut icon" type="image/png" href=""/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"><!-- Compatibility Meta IE -->
        <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- First Mobile Meta -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <title>Hadya - Main page</title>
        <link rel="stylesheet" href="{{url('frontend')}}/css/bootstrap.css">
        <link rel="stylesheet" href="{{url('frontend')}}/css/font-awesome.min.css">
        <link rel="stylesheet" href="{{url('frontend')}}/css/animate.css">

        <link rel="stylesheet" type="text/css" href="{{url('frontend')}}/css/slick.css"/>
        <!-- Add the new slick-theme.css if you want the default styling -->
        <link rel="stylesheet" type="text/css" href="{{url('frontend')}}/css/slick-theme.css"/>

        <link rel="stylesheet" href="{{url('frontend')}}/css/style.css">
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        
    </head>
    <body>
        <!-- Navbar-top -->
        <section class="navbar-top">
            <div class="row-me">
                <div class="logo-top"><a href=""><img src="{{url('frontend')}}/images/logo.png" alt="" /></a></div>
                <div class="right-top-ul">
                    <ul>
                        @if(Route::has('login'))
                        @auth
                        <li><a href="{{ url('/home') }}"><i class="fa fa-home fa-fw"></i></a></li>
                        @else
                        <li><a href="{{ url('login') }}"><i class="fa fa-user fa-fw"></i></a></li>
                        <li><a href="{{ url('register') }}"><i class="fa fa-user-plus fa-fw"></i></a></li>
                        @endauth
                        @endif
                        <!-- 
                        --><li><a href=""><i class="fa fa-shopping-cart" aria-hidden="true"><span class="num-top">2</span></i></a></li><!--
                        --><li><a href=""><i class="fa fa-search fa-fw"></i></a></li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- Navbar-top -->

        <!-- Main Navbar -->
        <section class="main-navbar">
            <div class="menu-toggle">
                <button type="button" class="btn"><i class="fa fa-bars" aria-hidden="true"></i></button>
            </div>
            <ul class="text-center main-nav">
                <li><a href="">Woman</a></li>
                <li><a href="">Man</a></li>
                <li><a href="">Kids</a></li>
                <li><a href="">Sale</a></li>
                <li><a href="">Blog</a></li>
                <li><a href="">Contact</a></li>
            </ul>
        </section>
        <!-- Main Navbar -->

        <!-- Big Hero slider -->
        <section class="slider-hero">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">

                    <div class="item active">
                        <img src="{{url('frontend')}}/images/slider.jpg" alt="...">
                        <div class="carousel-caption">
                            <h1>
                                Lorem Ipsum is simply dummy
                                text of the printing and typesetting
                                industry
                            </h1>
                            <p>Lorem Ipsum is simply dummy text</p>
                            <a href="" class="btn btn-warning round-me">Click to view</a>
                        </div>
                    </div>

                    <div class="item">
                        <img src="{{url('frontend')}}/images/slider.jpg" alt="...">
                        <div class="carousel-caption">
                            <h1>
                                Lorem Ipsum is simply dummy
                                text of the printing and typesetting
                                industry
                            </h1>
                            <p>Lorem Ipsum is simply dummy text</p>
                            <a href="" class="btn btn-warning round-me">Click to view</a>
                        </div>
                    </div>

                </div>

                <!-- Controls -->
                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>

            </div>
        </section>
        <!-- Big Hero slider -->

        <!-- Three Kinds -->
        <section class="three-kind">
            <div class="container">
                <div class="sec-title centered">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <img src="{{url('frontend')}}/images/logo-gray.png" alt="" />
                            <h2>your site to explore perfect gifts</h2>
                            <p>Lorem Ipsum is simply dummy  Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum is simply of the printing and typesetting industry</p>
                            <a href="">read more</a>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="three-item">
                            <img src="{{url('frontend')}}/images/three-item.jpg" class="img-responsive" alt="three-item" />
                            <div class="three-caption text-center">
                                <h3>
                                    <span>Gift For</span>
                                    <br>
                                    HER
                                </h3>
                                <a href="" class="btn btn-warning round-me">Shop now</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="three-item">
                            <img src="{{url('frontend')}}/images/three-item1.jpg" class="img-responsive" alt="three-item" />
                            <div class="three-caption text-center">
                                <h3>
                                    <span>Gift For</span>
                                    <br>
                                    HIM
                                </h3>
                                <a href="" class="btn btn-warning round-me">Shop now</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="three-item">
                            <img src="{{url('frontend')}}/images/three-item2.jpg" class="img-responsive" alt="three-item" />
                            <div class="three-caption text-center">
                                <h3>
                                    <span>Gift For</span>
                                    <br>
                                    Kids & Babies
                                </h3>
                                <a href="" class="btn btn-warning round-me">Shop now</a>
                            </div>
                        </div>
                    </div>
                </div>

                <section class="why-us">
                    <h1>Why Should Choose us?</h1>

                    <div class="row">
                        <div class="col-md-3 col-sm-6">
                            <div class="why-item text-center">
                                <img src="{{url('frontend')}}/images/car-icon.png" class="" alt="" />
                                <h4>Free Shipping</h4>
                                <p>
                                    We free ship worldwide for
                                    all order above 150$. Save even
                                    more with Free shipping on
                                    many orders.
                                </p>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6">
                            <div class="why-item text-center">
                                <img src="{{url('frontend')}}/images/credit-icon.png" class="" alt="" />
                                <h4>Easy Payment</h4>
                                <p>
                                    You can pay by Visa, Master Card
                                    or Paypal anytime anywere.
                                    Choose the best method that
                                    suitable for you with no more
                                    cost.
                                </p>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6">
                            <div class="why-item text-center">
                                <img src="{{url('frontend')}}/images/clock-icon.png" class="" alt="" />
                                <h4>24h Shipping </h4>
                                <p>
                                    If you’re in US, you will recieve
                                    your order in 24 hours after you
                                    confirm purchasing. Other places,
                                    the takes 5-7 working days.
                                </p>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6">
                            <div class="why-item text-center">
                                <img src="{{url('frontend')}}/images/trust.png" class="" alt="" />
                                <h4>100% Guarantee</h4>
                                <p>
                                    We guarantee 100% about our
                                    quality of products. The detail
                                    of each item is specific defined
                                    on description.
                                </p>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </section>
        <!-- Three Kinds -->

        <!-- featured gitfts -->
        <section class="featured-gifts">
            <div class="container">
                <div class="sec-title2 centered">
                    <img src="{{url('frontend')}}/images/gift.png" />
                    <h2>Featured Gifts</h2>
                </div>

                <div class="row">
                    <div class="col-md-4 col-sm-6">
                        <div class="gifts-item" style="background: url({{url('frontend')}}/images/gifts2.jpg) no-repeat center; background-size: cover">
                            <div class="gifts-caption text-center">
                                <h3>Date night looks for him</h3>
                                <p>
                                    She’ll fall head over heels
                                    dor these styles
                                </p>
                                <a href="" class="btn btn-default round-me text-uppercase">SHOP NOW</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-6">
                        <div class="gifts-item" style="background: url({{url('frontend')}}/images/gifts3.jpg) no-repeat center; background-size: cover">
                            <div class="gifts-caption text-center">
                                <h3>Date night looks for him</h3>
                                <p>
                                    She’ll fall head over heels
                                    dor these styles
                                </p>
                                <a href="" class="btn btn-default round-me text-uppercase">SHOP NOW</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-6">
                        <div class="gifts-item" style="background: url({{url('frontend')}}/images/gifts4.jpg) no-repeat center; background-size: cover">
                            <div class="gifts-caption text-center">
                                <h3>Date night looks for him</h3>
                                <p>
                                    She’ll fall head over heels
                                    dor these styles
                                </p>
                                <a href="" class="btn btn-default round-me text-uppercase">SHOP NOW</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-6">
                        <div class="gifts-item" style="background: url({{url('frontend')}}/images/gifts5.jpg) no-repeat center; background-size: cover">
                            <div class="gifts-caption text-center">
                                <h3>Date night looks for him</h3>
                                <p>
                                    She’ll fall head over heels
                                    dor these styles
                                </p>
                                <a href="" class="btn btn-default round-me text-uppercase">SHOP NOW</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-6">
                        <div class="gifts-item" style="background: url({{url('frontend')}}/images/gifts6.jpg) no-repeat center; background-size: cover">
                            <div class="gifts-caption text-center">
                                <h3>Date night looks for him</h3>
                                <p>
                                    She’ll fall head over heels
                                    dor these styles
                                </p>
                                <a href="" class="btn btn-default round-me text-uppercase">SHOP NOW</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-6">
                        <div class="gifts-item" style="background: url({{url('frontend')}}/images/gifts2.jpg) no-repeat center; background-size: cover">
                            <div class="gifts-caption text-center">
                                <h3>Date night looks for him</h3>
                                <p>
                                    She’ll fall head over heels
                                    dor these styles
                                </p>
                                <a href="" class="btn btn-default round-me text-uppercase">SHOP NOW</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- featured gitfts -->

        <!-- popular products -->
        <section class="popular">
            <div class="container">
                <div class="sec-title2 centered">
                    <h2>Featured Gifts</h2>
                </div>

                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <div class="pop-item">
                            <img src="{{url('frontend')}}/images/popular.jpg" class="img-responsive" alt="" />
                            <div class="sale-label"><p>Sale</p></div>
                            <div class="new-label"><p>New</p></div>
                            <div class="name-pro"><h3>Barney Cools Bucket Hats</h3></div>
                            <div class="pop-caption text-center">
                                <p class="price">$49.99</p>
                                <a href="" class="btn btn-me text-uppercase round-me">SHOP NOW</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <div class="pop-item">
                            <img src="{{url('frontend')}}/images/popular.jpg" class="img-responsive" alt="" />
                            <div class="sale-label"><p>Sale</p></div>
                            <div class="new-label"><p>New</p></div>
                            <div class="name-pro"><h3>Camo Fang Backpack Jungle</h3></div>
                            <div class="pop-caption text-center">
                                <p class="price">$49.99</p>
                                <a href="" class="btn btn-me text-uppercase round-me">SHOP NOW</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <div class="pop-item">
                            <img src="{{url('frontend')}}/images/popular1.jpg" class="img-responsive" alt="" />
                            <div class="sale-label"><p>Sale</p></div>
                            <div class="new-label"><p>New</p></div>
                            <div class="name-pro"><h3>Silver Burgundy Magnus Watch</h3></div>
                            <div class="pop-caption text-center">
                                <p class="price">$49.99</p>
                                <a href="" class="btn btn-me text-uppercase round-me">SHOP NOW</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <div class="pop-item">
                            <img src="{{url('frontend')}}/images/popular.jpg" class="img-responsive" alt="" />
                            <div class="sale-label"><p>Sale</p></div>
                            <div class="new-label"><p>New</p></div>
                            <div class="name-pro"><h3>The Quiet Life Cap</h3></div>
                            <div class="pop-caption text-center">
                                <p class="price">$49.99</p>
                                <a href="" class="btn btn-me text-uppercase round-me">SHOP NOW</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="title1">
                    <h4>New in today</h4>
                </div>
                <div class="product-slider">

                    <div class="product-item">
                        <a href="">
                            <div class="media">
                                <div class="media-left">
                                    <img class="media-object" src="{{url('frontend')}}/images/product.png" alt="...">
                                </div>
                                <div class="media-body">
                                    <p>
                                        <span>Rib-knit Hat</span>
                                        <br>
                                        <span>New Arrival</span>
                                    </p>
                                    <h4 class="media-heading">$9.99</h4>

                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="product-item">
                        <a href="">
                            <div class="media">
                                <div class="media-left">
                                    <img class="media-object" src="{{url('frontend')}}/images/product2.png" alt="...">
                                </div>
                                <div class="media-body">
                                    <p>
                                        <span>Rib-knit Hat</span>
                                        <br>
                                        <span>New Arrival</span>
                                    </p>
                                    <h4 class="media-heading">$9.99</h4>

                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="product-item">
                        <a href="">
                            <div class="media">
                                <div class="media-left">
                                    <img class="media-object" src="{{url('frontend')}}/images/product3.png" alt="...">
                                </div>
                                <div class="media-body">
                                    <p>
                                        <span>Rib-knit Hat</span>
                                        <br>
                                        <span>New Arrival</span>
                                    </p>
                                    <h4 class="media-heading">$9.99</h4>

                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="product-item">
                        <a href="">
                            <div class="media">
                                <div class="media-left">
                                    <img class="media-object" src="{{url('frontend')}}/images/product4.png" alt="...">
                                </div>
                                <div class="media-body">
                                    <p>
                                        <span>Rib-knit Hat</span>
                                        <br>
                                        <span>New Arrival</span>
                                    </p>
                                    <h4 class="media-heading">$9.99</h4>

                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="product-item">
                        <a href="">
                            <div class="media">
                                <div class="media-left">
                                    <img class="media-object" src="{{url('frontend')}}/images/product2.png" alt="...">
                                </div>
                                <div class="media-body">
                                    <p>
                                        <span>Rib-knit Hat</span>
                                        <br>
                                        <span>New Arrival</span>
                                    </p>
                                    <h4 class="media-heading">$9.99</h4>

                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <!-- popular products -->

        <!-- *** NEWSLETTER BEFORE FOOTER *** -->
        <section class="newslleter">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="left-newsletter">
                            <div class="left-news-text">
                                <h2>
                                    Get $20 Off  Your First
                                    Purchase
                                </h2>
                                <p>
                                    Receive special offers and notifications on
                                    our new releases.
                                </p>
                                <form class="newsletter-form" method="" action="">
                                    <div class="form-group">
                                        <input type="email" name="" class="input-lg form-control" placeholder="Enter email address" />
                                        <input type="submit" name="" value="Submit" class="btn btn-warning btn-lg text-uppercase" />
                                    </div>
                                </form>
                            </div>
                            <img src="{{url('frontend')}}/images/girls.png" alt="" />
                        </div>
                    </div>

                    <!-- <div class="col-md-4">
                        <div class="right-newsletter">
                            <h2>
                                Get $20 Off  Your First
                                Purchase
                            </h2>
                        </div>
                    </div> -->
                </div>
            </div>
        </section>
        <!-- *** NEWSLETTER BEFORE FOOTER *** -->


        <!-- ---------------------------- Start Footer --------------------------------- -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="footer-item">
                            <img src="{{url('frontend')}}/images/logo.png" alt="" />
                            <ul>
                                <li><a href=""><i class="fa fa-facebook fa-fw"></i></a></li>
                                <li><a href=""><i class="fa fa-twitter fa-fw"></i></a></li>
                                <li><a href=""><i class="fa fa-instagram fa-fw"></i></a></li>
                                <li><a href=""><i class="fa fa-tumblr fa-fw"></i></a></li>
                                <li><a href=""><i class="fa fa-vk fa-fw"></i></a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="footer-item">
                            <p>
                                Contact us<br>
                                Our Company, Lorem Ipsum is simply dummy text of the printing
                                Call Us Now: 0123-456-789 Email: hadeya@info.com
                            </p>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="footer-item">
                            <ul class="pay-ul">
                                <li><a href=""><img src="{{url('frontend')}}/images/paypal.png" alt="" /></a></li>
                                <li><a href=""><img src="{{url('frontend')}}/images/aexpress.png" alt="" /></a></li>
                                <li><a href=""><img src="{{url('frontend')}}/images/discover.png" alt="" /></a></li>
                                <li><a href=""><img src="{{url('frontend')}}/images/master.png" alt="" /></a></li>
                                <li><a href=""><img src="{{url('frontend')}}/images/visa.png" alt="" /></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- ---------------------------- End Footer ----------------------------------- -->
        <script src="{{url('frontend')}}/js/jquery-1.12.0.min.js"></script>
        <script type="text/javascript" src="{{url('frontend')}}/js/migrate.js"></script>
        <script src="{{url('frontend')}}/js/bootstrap.min.js"></script>

        <script src="{{url('frontend')}}/js/wow.min.js"></script>
        <script>new WOW().init();</script>

        <script type="text/javascript" src="{{url('frontend')}}/js/slick.js"></script>
        <script src="{{url('frontend')}}/js/plugin.js"></script>
    </body>
</html>