<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="{{URL::to('public/asset_client/lib/bootstrap/css/bootstrap.min.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{URL::to('public/asset_client/lib/font-awesome/css/font-awesome.min.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{URL::to('public/asset_client/lib/select2/css/select2.min.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{URL::to('public/asset_client/lib/jquery.bxslider/jquery.bxslider.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{URL::to('public/asset_client/lib/owl.carousel/owl.carousel.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{URL::to('public/asset_client/lib/jquery-ui/jquery-ui.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{URL::to('public/asset_client/lib/fancyBox/jquery.fancybox.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{URL::to('public/asset_client/css/animate.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{URL::to('public/asset_client/css/reset.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{URL::to('public/asset_client/css/style.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{URL::to('public/asset_client/css/responsive.css')}}" />
        <title>Kute Shop</title>
    </head>
    <body class="category-page">
        <!-- TOP BANNER -->
        <!--<div id="top-banner" class="top-banner">
            <div class="bg-overlay"></div>
            <div class="container">
                <h1>Special Offer!</h1>
                <h2>Additional 40% OFF For Men & Women Clothings</h2>
                <span>This offer is for online only 7PM to middnight ends in 30th July 2015</span>
                <span class="btn-close"></span>
            </div>
        </div>-->
        <!-- HEADER -->
        <div id="header" class="header">
            <div class="top-header">
                <div class="container">
                    <div class="nav-top-links">
                        <a class="first-item" href="#"><img alt="phone" src="{{URL::to('public/asset_client/images/phone.png')}}" />00-62-658-658</a>
                        <a href="#"><img alt="email" src="{{URL::to('public/asset_client/images/email.png')}}" />Contact us today!</a>
                    </div>
                    <div class="currency ">
                        <div class="dropdown">
                            <a class="current-open" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">USD</a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Dollar</a></li>
                                <li><a href="#">Euro</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="language ">
                        <div class="dropdown">
                            <a class="current-open" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">
                                <img alt="email" src="{{URL::to('public/asset_client/images/fr.jpg')}}" />French

                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#"><img alt="email" src="{{URL::to('public/asset_client/images/en.jpg')}}" />English</a></li>
                                <li><a href="#"><img alt="email" src="{{URL::to('public/asset_client/images/fr.jpg')}}" />French</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="support-link">
                        <a href="#">Services</a>
                        <a href="#">Support</a>
                        <a href="{{URL::to('admin-login')}}">Admin</a>
                    </div>

                    <div id="user-info-top" class="user-info pull-right">
                        <div class="dropdown">
                            <a class="current-open" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#"><span>My Account</span></a>
                            <ul class="dropdown-menu mega_dropdown" role="menu">
                                <?php
                                $customer_id = Session::get('customer_id');

                                if ($customer_id != NULL) {
                                    ?>
                                    <li><a href="{{URL::to('client-logout')}}">Logout</a></li>
                                <?php
                                } else {
                                    ?>
                                    <li><a href="{{URL::to('client-login')}}">Login</a></li>
                                <?php } ?>
                                <li><a href="#">Compare</a></li>
                                <li><a href="#">Wishlists</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--/.top-header -->
            <!-- MAIN HEADER -->
            <div class="container main-header">
                <div class="row">
                    <div class="col-xs-12 col-sm-3 logo">
                        <a href="{{URL::to('/')}}"><img alt="Kute Shop" src="{{URL::to('public/asset_client/images/logo.png')}}"/><marquee><span style="color:red;"><strong>This site is under construction.</strong></span></marquee></a>
                    </div>
                    <div class="col-xs-7 col-sm-7 header-search-box">
                        <form class="form-inline">
                            <div class="form-group form-category">
                                <select class="select-category">
                                    <option value="2">All Categories</option>
                                    <option value="1">Men</option>
                                    <option value="2">Women</option>
                                </select>
                            </div>
                            <div class="form-group input-serach">
                                <input type="text"  placeholder="Keyword here...">
                            </div>
                            <button type="submit" class="pull-right btn-search"></button>
                        </form>
                    </div>
                    <div id="cart-block" class="col-xs-5 col-sm-2 shopping-cart-box">
                        <a class="cart-link" href="{{URL::to('order')}}">
                            <span class="title">Shopping cart</span>
                            <span class="total">2 items - 122.38 €</span>
                            <span class="notify notify-left">2</span>
                        </a>
                        <div class="cart-block">
                            <div class="cart-block-content">
                                <h5 class="cart-title">2 Items in my cart</h5>
                                <div class="cart-block-list">
                                    <ul>
                                        <li class="product-info">
                                            <div class="p-left">
                                                <a href="#" class="remove_link"></a>
                                                <a href="#">
                                                    <img class="img-responsive" src="{{URL::to('public/asset_client/data/product-100x122.jpg')}}" alt="p10">
                                                </a>
                                            </div>
                                            <div class="p-right">
                                                <p class="p-name">Donec Ac Tempus</p>
                                                <p class="p-rice">61,19 €</p>
                                                <p>Qty: 1</p>
                                            </div>
                                        </li>
                                        <li class="product-info">
                                            <div class="p-left">
                                                <a href="#" class="remove_link"></a>
                                                <a href="#">
                                                    <img class="img-responsive" src="{{URL::to('public/asset_client/data/product-s5-100x122.jpg')}}" alt="p10">
                                                </a>
                                            </div>
                                            <div class="p-right">
                                                <p class="p-name">Donec Ac Tempus</p>
                                                <p class="p-rice">61,19 €</p>
                                                <p>Qty: 1</p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="toal-cart">
                                    <span>Total</span>
                                    <span class="toal-price pull-right">122.38 €</span>
                                </div>
                                <div class="cart-buttons">
                                    <a href="{{URL::to('checkout')}}" class="btn-check-out">Checkout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- END MANIN HEADER -->
            <div id="nav-top-menu" class="nav-top-menu">
                <div class="container">
                    <div class="row">
                        @yield('menu_vertical')
                        @yield('menu_main')
                    </div>
                    <!-- userinfo on top-->
                    <div id="form-search-opntop">
                    </div>
                    <!-- userinfo on top-->
                    <div id="user-info-opntop">
                    </div>
                    <!-- CART ICON ON MMENU -->
                    <div id="shopping-cart-box-ontop">
                        <i class="fa fa-shopping-cart"></i>
                        <div class="shopping-cart-box-ontop-content"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end header -->
        @yield('client_content')
        <!-- Footer -->
        <footer id="footer">
            <div class="container">
                <!-- introduce-box -->
                <div id="introduce-box" class="row">
                    <div class="col-md-3">
                        <div id="address-box">
                            <a href="#"><img src="{{URL::to('public/asset_client/data/introduce-logo.png')}}" alt="" /></a>
                            <div id="address-list">
                                <div class="tit-name">Address:</div>
                                <div class="tit-contain">Example Street 68, Mahattan, New York, USA.</div>
                                <div class="tit-name">Phone:</div>
                                <div class="tit-contain">+00 123 456 789</div>
                                <div class="tit-name">Email:</div>
                                <div class="tit-contain">support@business.com</div>
                            </div>
                        </div> 
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="introduce-title">Company</div>
                                <ul id="introduce-company"  class="introduce-list">
                                    <li><a href="#">About Us</a></li>
                                    <li><a href="#">Testimonials</a></li>
                                    <li><a href="#">Affiliate Program</a></li>
                                    <li><a href="#">Terms & Conditions</a></li>
                                    <li><a href="#">Contact Us</a></li>
                                </ul>
                            </div>
                            <div class="col-sm-4">
                                <div class="introduce-title">My Account</div>
                                <ul id = "introduce-Account" class="introduce-list">
                                    <li><a href="#">My Order</a></li>
                                    <li><a href="#">My Wishlist</a></li>
                                    <li><a href="#">My Credit Slip</a></li>
                                    <li><a href="#">My Addresses</a></li>
                                    <li><a href="#">My Personal In</a></li>
                                </ul>
                            </div>
                            <div class="col-sm-4">
                                <div class="introduce-title">Support</div>
                                <ul id = "introduce-support"  class="introduce-list">
                                    <li><a href="#">About Us</a></li>
                                    <li><a href="#">Testimonials</a></li>
                                    <li><a href="#">Affiliate Program</a></li>
                                    <li><a href="#">Terms & Conditions</a></li>
                                    <li><a href="#">Contact Us</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div id="contact-box">
                            <div class="introduce-title">Newsletter</div>
                            <div class="input-group" id="mail-box">
                                <input type="text" placeholder="Your Email Address"/>
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">OK</button>
                                </span>
                            </div><!-- /input-group -->
                            <div class="introduce-title">Let's Socialize</div>
                            <div class="social-link">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-pinterest-p"></i></a>
                                <a href="#"><i class="fa fa-vk"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-google-plus"></i></a>
                            </div>
                        </div>

                    </div>
                </div><!-- /#introduce-box -->

                <!-- #trademark-box -->
                <div id="trademark-box" class="row">
                    <div class="col-sm-12">
                        <ul id="trademark-list">
                            <li id="payment-methods">Accepted Payment Methods</li>
                            <li>
                                <a href="#"><img src="{{URL::to('public/asset_client/data/trademark-ups.jpg')}}"  alt="ups"/></a>
                            </li>
                            <li>
                                <a href="#"><img src="{{URL::to('public/asset_client/data/trademark-qiwi.jpg')}}"  alt="ups"/></a>
                            </li>
                            <li>
                                <a href="#"><img src="{{URL::to('public/asset_client/data/trademark-wu.jpg')}}"  alt="ups"/></a>
                            </li>
                            <li>
                                <a href="#"><img src="{{URL::to('public/asset_client/data/trademark-cn.jpg')}}"  alt="ups"/></a>
                            </li>
                            <li>
                                <a href="#"><img src="{{URL::to('public/asset_client/data/trademark-visa.jpg')}}"  alt="ups"/></a>
                            </li>
                            <li>
                                <a href="#"><img src="{{URL::to('public/asset_client/data/trademark-mc.jpg')}}"  alt="ups"/></a>
                            </li>
                            <li>
                                <a href="#"><img src="{{URL::to('public/asset_client/data/trademark-ems.jpg')}}"  alt="ups"/></a>
                            </li>
                            <li>
                                <a href="#"><img src="{{URL::to('public/asset_client/data/trademark-dhl.jpg')}}"  alt="ups"/></a>
                            </li>
                            <li>
                                <a href="#"><img src="{{URL::to('public/asset_client/data/trademark-fe.jpg')}}"  alt="ups"/></a>
                            </li>
                            <li>
                                <a href="#"><img src="{{URL::to('public/asset_client/data/trademark-wm.jpg')}}"  alt="ups"/></a>
                            </li>
                        </ul> 
                    </div>
                </div> <!-- /#trademark-box -->

                <!-- #trademark-text-box -->
                <div id="trademark-text-box" class="row">
                    <div class="col-sm-12">
                        <ul id="trademark-search-list" class="trademark-list">
                            <li class="trademark-text-tit">HOT SEARCHED KEYWORDS:</li>
                            <li><a href="#" >Xiaomio Mi3</a></li>
                            <li><a href="#" >Digiflipo Pro XT 712 Tablet</a></li>
                            <li><a href="#" >Mi 3 Phones</a></li>
                            <li><a href="#" >Iphoneo 6 Plus</a></li>
                            <li><a href="#" >Women's Messenger Bags</a></li>
                            <li><a href="#" >Wallets</a></li>
                            <li><a href="#" >Women's Clutches</a></li>
                            <li><a href="#" >Backpacks Totes</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-12">
                        <ul id="trademark-tv-list" class="trademark-list">
                            <li class="trademark-text-tit">TVS:</li>
                            <li><a href="#" >Sonyo TV</a></li>
                            <li><a href="#" >Samsing TV</a></li>
                            <li><a href="#" >LGG TV</a></li>
                            <li><a href="#" >Onidai TV</a></li>
                            <li><a href="#" >Toshibao TV</a></li>
                            <li><a href="#" >Philipsi TV</a></li>
                            <li><a href="#" >Micromaxo TV</a></li>
                            <li><a href="#" >LED TV</a></li>
                            <li><a href="#" >LCD TV</a></li>
                            <li><a href="#" >Plasma TV</a></li>
                            <li><a href="#" >3D TV</a></li>
                            <li><a href="#" >Smart TV</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-12">
                        <ul id="trademark-mobile-list" class="trademark-list">
                            <li class="trademark-text-tit">MOBILES:</li>  
                            <li><a href="#" >Moto E</a></li>
                            <li><a href="#" >Samsing Mobile</a></li>
                            <li><a href="#" >Micromaxi Mobile</a></li>
                            <li><a href="#" >Nokian Mobile</a></li>
                            <li><a href="#" >HTCi Mobile</a></li>
                            <li><a href="#" >Sonyo Mobile</a></li>
                            <li><a href="#" >Appleo Mobile</a></li>
                            <li><a href="#" >LGG Mobile</a></li>
                            <li><a href="#" >Karbonni Mobile</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-12">
                        <ul id="trademark-laptop-list" class="trademark-list">
                            <li class="trademark-text-tit">LAPTOPS::</li> 
                            <li><a href="#" >Appleo Laptop</a></li>
                            <li><a href="#" >Acer Laptop</a></li>
                            <li><a href="#" >Samsing Laptop</a></li>
                            <li><a href="#" >Lenov Laptop</a></li>
                            <li><a href="#" >Sonyo Laptop</a></li>
                            <li><a href="#" >Delli Laptop</a></li>
                            <li><a href="#" >Asuso Laptop</a></li>
                            <li><a href="#" >Toshibao Laptop</a></li>
                            <li><a href="#" >LGG Laptop</a></li>
                            <li><a href="#" >HPo Laptop</a></li>
                            <li><a href="#" >Notebook</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-12">
                        <ul id="trademark-watches-list" class="trademark-list">
                            <li class="trademark-text-tit">WATCHES:</li>  
                            <li><a href="#" >FCUKo Watches</a></li>
                            <li><a href="#" >Titan Watches</a></li>
                            <li><a href="#" >Casioo Watches</a></li>
                            <li><a href="#" >Fastrack Watches</a></li>
                            <li><a href="#" >Timexi Watches</a></li>
                            <li><a href="#" >Fossili Watches</a></li>
                            <li><a href="#" >Dieselo Watches</a></li>
                            <li><a href="#" >Toshibao Laptop</a></li>
                            <li><a href="#" >Luxury Watches</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-12">
                        <ul id="trademark-shoes-list" class="trademark-list">
                            <li class="trademark-text-tit">FOOTWEAR:</li>  
                            <li><a href="#" >Shoes</a></li>
                            <li><a href="#" >Casual Shoes</a></li>
                            <li><a href="#" >Sports Shoes</a></li>
                            <li><a href="#" >Adidasi Shoes</a></li>
                            <li><a href="#" >Gas Shoes</a></li>
                            <li><a href="#" >Pumai Shoes</a></li>
                            <li><a href="#" >Reeboki Shoes</a></li>
                            <li><a href="#" >Woodlandi Shoes</a></li>
                            <li><a href="#" >Red tape Shoes</a></li>
                            <li><a href="#" >Nikeo Shoes</a></li>
                        </ul>
                    </div>
                </div><!-- /#trademark-text-box -->
                <div id="footer-menu-box">
                    <div class="col-sm-12">
                        <ul class="footer-menu-list">
                            <li><a href="#" >Company Info - Partnerships</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-12">
                        <ul class="footer-menu-list">
                            <li><a href="#" >Online Shopping</a></li>
                            <li><a href="#" >Promotions</a></li>
                            <li><a href="#" >My Orders</a></li>
                            <li><a href="#" >Help</a></li>
                            <li><a href="#" >Site Map</a></li>
                            <li><a href="#" >Customer Service</a></li>
                            <li><a href="#" >Support</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-12">
                        <ul class="footer-menu-list">
                            <li><a href="#" >Most Populars</a></li>
                            <li><a href="#" >Best Sellers</a></li>
                            <li><a href="#" >New Arrivals</a></li>
                            <li><a href="#" >Special Products</a></li>
                            <li><a href="#" >Manufacturers</a></li>
                            <li><a href="#" >Our Stores</a></li>
                            <li><a href="#" >Shipping</a></li>
                            <li><a href="#" >Payments</a></li>
                            <li><a href="#" >Warantee</a></li>
                            <li><a href="#" >Refunds</a></li>
                            <li><a href="#" >Checkout</a></li>
                            <li><a href="#" >Discount</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-12">
                        <ul class="footer-menu-list">
                            <li><a href="#" >Terms & Conditions</a></li>
                            <li><a href="#" >Policy</a></li>
                            <li><a href="#" >Shipping</a></li>
                            <li><a href="#" >Payments</a></li>
                            <li><a href="#" >Returns</a></li>
                            <li><a href="#" >Refunds</a></li>
                            <li><a href="#" >Warrantee</a></li>
                            <li><a href="#" >FAQ</a></li>
                            <li><a href="#" >Contact</a></li>
                        </ul>
                    </div>
                    <p class="text-center">Copyrights &#169; 2015 KuteShop. All Rights Reserved. Designed by KuteThemes.com</p>
                </div><!-- /#footer-menu-box -->
            </div> 
        </footer>

        <a href="#" class="scroll_top" title="Scroll to Top" style="display: inline;">Scroll</a>
        <!-- Script-->
        <script type="text/javascript" src="{{URL::to('public/asset_client/lib/jquery/jquery-1.11.2.min.js')}}"></script>
        <script type="text/javascript" src="{{URL::to('public/asset_client/lib/bootstrap/js/bootstrap.min.js')}}"></script>
        <script type="text/javascript" src="{{URL::to('public/asset_client/lib/select2/js/select2.min.js')}}"></script>
        <script type="text/javascript" src="{{URL::to('public/asset_client/lib/jquery.bxslider/jquery.bxslider.min.js')}}"></script>
        <script type="text/javascript" src="{{URL::to('public/asset_client/lib/owl.carousel/owl.carousel.min.js')}}"></script>
        <script type="text/javascript" src="{{URL::to('public/asset_client/lib/jquery.countdown/jquery.countdown.min.js')}}"></script>        
        <script type="text/javascript" src="{{URL::to('public/asset_client/lib/jquery.elevatezoom.js')}}"></script>        
        <script type="text/javascript" src="{{URL::to('public/asset_client/lib/jquery-ui/jquery-ui.min.js')}}"></script>        
        <script type="text/javascript" src="{{URL::to('public/asset_client/lib/fancyBox/jquery.fancybox.js')}}"></script>        
        <script type="text/javascript" src="{{URL::to('public/asset_client/js/jquery.actual.min.js')}}"></script>
        <script type="text/javascript" src="{{URL::to('public/asset_client/js/theme-script.js')}}"></script>
    </body>
</html>