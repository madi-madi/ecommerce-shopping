
        <!-- Navbar-top -->
        <section class="navbar-top">
            <div class="row-me">
                <div class="logo-top"><a href=""><img src="{{Storage::url(settings()->logo)}}" alt="" width="75" height="75" style="border-radius: 50%;" /></a></div>
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