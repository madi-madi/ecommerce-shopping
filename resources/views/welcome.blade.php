<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
    <head>
        <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <link rel="shortcut icon" type="image/png" href=""/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"><!-- Compatibility Meta IE -->
        <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- First Mobile Meta -->
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
        <style type="text/css">
            nav.navbar ul li a {
                line-height: 80px;
                padding: 0 25px;
                text-align: center;
                border-left: 1px solid #d3d3d3;
            }
             nav.navbar{
                margin-bottom: 0px;
             }

            .navbar-default {
            background-color: #ffffff;
            border-color: #ffffff;
            }
             nav.navbar ul li a i span.badge{
                background-color: var(--mainColor)
             }
             nav.navbar img.logo{
                border-radius: 50%;
             }
         [v-cloak] > * { display:none; }
            /*[v-cloak]::before { content: "loading..."; }
            */
            [v-cloak]::before { 
            content: " ";
            display: block;
            width: 16px;
            height: 16px;
            background-image: url('data:image/gif;base64,R0lGODlhEAAQAPIAAP///wAAAMLCwkJCQgAAAGJiYoKCgpKSkiH/C05FVFNDQVBFMi4wAwEAAAAh/hpDcmVhdGVkIHdpdGggYWpheGxvYWQuaW5mbwAh+QQJCgAAACwAAAAAEAAQAAADMwi63P4wyklrE2MIOggZnAdOmGYJRbExwroUmcG2LmDEwnHQLVsYOd2mBzkYDAdKa+dIAAAh+QQJCgAAACwAAAAAEAAQAAADNAi63P5OjCEgG4QMu7DmikRxQlFUYDEZIGBMRVsaqHwctXXf7WEYB4Ag1xjihkMZsiUkKhIAIfkECQoAAAAsAAAAABAAEAAAAzYIujIjK8pByJDMlFYvBoVjHA70GU7xSUJhmKtwHPAKzLO9HMaoKwJZ7Rf8AYPDDzKpZBqfvwQAIfkECQoAAAAsAAAAABAAEAAAAzMIumIlK8oyhpHsnFZfhYumCYUhDAQxRIdhHBGqRoKw0R8DYlJd8z0fMDgsGo/IpHI5TAAAIfkECQoAAAAsAAAAABAAEAAAAzIIunInK0rnZBTwGPNMgQwmdsNgXGJUlIWEuR5oWUIpz8pAEAMe6TwfwyYsGo/IpFKSAAAh+QQJCgAAACwAAAAAEAAQAAADMwi6IMKQORfjdOe82p4wGccc4CEuQradylesojEMBgsUc2G7sDX3lQGBMLAJibufbSlKAAAh+QQJCgAAACwAAAAAEAAQAAADMgi63P7wCRHZnFVdmgHu2nFwlWCI3WGc3TSWhUFGxTAUkGCbtgENBMJAEJsxgMLWzpEAACH5BAkKAAAALAAAAAAQABAAAAMyCLrc/jDKSatlQtScKdceCAjDII7HcQ4EMTCpyrCuUBjCYRgHVtqlAiB1YhiCnlsRkAAAOwAAAAAAAAAAAA==');
            }
        </style>
        <script> var user_is = <?php 
        if(Auth::user()){
            echo Auth::user()->id;
        }
         ?></script>
    </head>
    <body >
        <div class="content" id="frontend">
        <!-- Navbar-top -->
        <section class="navbar-top">

            <div class="row-me">
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><img src="{{Storage::url(settings()->logo)}}" class="logo img-responsive" width="60" height="60"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
{{--       <ul class="nav navbar-nav">

      </ul> --}}

      <ul class="nav navbar-nav navbar-right">
        @if(Route::has('login'))
        @auth
        {{-- <li><a href="#">Link</a></li> --}}
        <li><a href="{{ url('/home') }}"><i class="fa fa-home fa-lg"></i></a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li>
            <a class="dropdown-item" href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
            </form>
            </li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </li>
        @else
        <li><a href="{{ url('login') }}"><i class="fa fa-user fa-lg"></i></a></li>
        <li><a href="{{ url('/register') }}"><i class="fa fa-user-plus fa-lg"></i></a></li>
                        @endauth
                        @endif
        <li><a href=""><i class="fa fa-shopping-cart fa-lg" aria-hidden="true"><span class="badge badge-info">2</span></i></a></li>
        <li><a href=""><i class="fa fa-search fa-lg"></i></a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
   {{--              <div class="logo-top"><a href=""><img src="{{url('frontend')}}/images/logo.png" alt="" /></a></div> --}}

            </div>
        </section>
        <!-- Navbar-top -->

        <!-- Main Navbar -->

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
                    <div class="col-md-4" v-for="product in productsPhones.data" v-cloak>
                        <div class="three-item">
                            <img :src="'/storage/'+product.images[0].product_image" class="img-responsive" alt="three-item" />
                            <div class="three-caption text-center">
                                <h3>
                                <span>@{{product.title}}</span>
                                    
                                </h3>
                                <a href="" class="btn btn-warning round-me">Shop now</a>
                            </div>
                        </div>
                    </div>
                    <pagination-component
                    :pagination="productsPhones"
                    @paginate="getProductsPhones()"
                    :offset="4"
                    ></pagination-component>

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
                    <div class="col-md-4 col-sm-6" v-for="(product , index) in products.data" >
                        <div class="gifts-item" 
                        style="max-width: 360px; max-height:470px;background:rgb(172, 172, 172); " 
                        >
                        <img :src="'/storage/'+product.images[0].product_image" alt="" class="img-responsive">

                            <div class="gifts-caption text-center">
                                <h3>@{{product.title}}</h3>
                                <p>
                                    <star-rating 
                            @rating-selected="setCurrentRating($event ,product , index)"
                            v-model="product.rate" 
                            :rating= "true"
                            :show-rating= "false"
                            :star-size="20" 
                            :inline="true" 
                            :fixed-points="1"
                            :increment="0.1"
                            :read-only="product.rates.map((e)=> e.user_id).includes(auth_user)"
                            v-if="auth_user && ! product.rates.map((e)=> e.user_id).includes(auth_user)"
                            ></star-rating>
                            <star-rating 
                            v-model="product.rate" 
                            :rating= "true"
                            :show-rating= "false"
                            :star-size="20" 
                            :inline="true" 
                            :fixed-points="1"
                            :increment="0.1"
                            :read-only="true"
                            v-else
                            ></star-rating>  
                                </p>
                                <a href="" class="btn btn-default round-me text-uppercase">SHOP NOW</a>
                            </div>
                        </div>
                    </div>
                </div>
                <pagination-component
                :pagination="products"
                @paginate="getProducts()"
                :offset="4"
                ></pagination-component>
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
                    <div class="col-md-3 col-sm-6" v-for="(product , index) in productsElect.data" >
                        <div class="pop-item">
                            <img :src="'/storage/'+product.images[0].product_image" class="img-responsive" alt="" />
                        <div class="sale-label"><p>@{{product.category['category_name']}}</p></div>
                        <div class="new-label"><p>$@{{product.price}}</p></div>
                            <div class="pop-caption text-center">
                            <p class="price" >@{{product.title }}</p>
                            <p class="rating">
                                <star-rating 
                            @rating-selected="setCurrentRating($event ,product , index)"
                            v-model="product.rate" 
                            :rating= "true"
                            :show-rating= "false"
                            :star-size="20" 
                            :inline="true" 
                            :fixed-points="1"
                            :increment="0.1"
                            :read-only="!product.rates.map((e)=> e.user_id).includes(auth_user)"
                            v-if="auth_user && ! product.rates.map((e)=> e.user_id).includes(auth_user)"
                            ></star-rating>
                            <star-rating 
                            v-model="product.rate" 
                            :rating= "true"
                            :show-rating= "false"
                            :star-size="20" 
                            :inline="true" 
                            :fixed-points="1"
                            :increment="0.1"
                            :read-only="true"
                            v-else
                            ></star-rating>                            
                                </p>

                            <a href="" class="btn btn-default text-uppercase round-me">SHOP NOW</a>
                            </div>
                        </div>
                    </div>
                    

                </div>
                <pagination-component
                :pagination="productsElect"
                @paginate="getProductsEloctronic()"
                :offset="4"
                ></pagination-component>
        </div>
                {{-- <div v-for="product in products.data">@{{product.id}}</div> --}}

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
                            <img  src="{{Storage::url(settings()->icon)}}" width="238px" height="300" alt="" />
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
                            <img src="{{Storage::url(settings()->logo)}}" width="95" height="95" alt="" />
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
       </div>
        <script src="{{url('frontend')}}/js/jquery-1.12.0.min.js"></script>
        <script type="text/javascript" src="{{url('frontend')}}/js/migrate.js"></script>
        <script src="{{url('frontend')}}/js/bootstrap.min.js"></script>

        <script src="{{url('frontend')}}/js/wow.min.js"></script>
        <script>new WOW().init();</script>

        <script type="text/javascript" src="{{url('frontend')}}/js/slick.js"></script>
        <script src="{{url('frontend')}}/js/plugin.js"></script>
    <script src="{{ asset('js/frontend.js') }}" ></script>

    </body>
</html>