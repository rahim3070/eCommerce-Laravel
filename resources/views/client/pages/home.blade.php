@extends('client.client_master')
@section('client_content')

<!-- Home slider-->
<div id="home-slider">
    <div class="container">
        <div class="row">
            <?php
            $featured_product = DB::table('tbl_ecks_product')
                    ->join('tbl_ecks_product_image', 'tbl_ecks_product.product_id', '=', 'tbl_ecks_product_image.product_id')
                    ->where('tbl_ecks_product.is_featured', 1)
                    ->where('tbl_ecks_product.publication_status', 1)
                    ->where('tbl_ecks_product.deletion_status', 0)
                    ->where('tbl_ecks_product_image.image_level', 1)
                    ->select('tbl_ecks_product.*', 'tbl_ecks_product_image.image_option')
                    ->get();
            ?>
            <!--            <div class="col-sm-3 slider-left"></div>-->
            <div class="col-sm-12 header-top-right">
                <div class="homeslider">
                    <div class="content-slide">
                        <ul id="contenhomeslider">
                            @foreach($featured_product as $fp_info)
                            <a href="{{URL::to('product-details/'.$fp_info->product_id)}}">
                                <li><img alt="Funky roots" src="{{$fp_info->image_option}}" title="{{$fp_info->product_name}}" style="height: 470px" /></li>
                            </a>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="header-banner banner-opacity">
                    <a href="#"><img alt="Funky roots" src="{{URL::to('public/asset_client/data/ads1.jpg')}}" style="height: 470px" /></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END Home slider-->
<!-- servives -->
<div class="container">
    <div class="service ">
        <div class="col-xs-6 col-sm-3 service-item">
            <div class="icon">
                <img alt="services" src="{{URL::to('public/asset_client/data/s1.png')}}" />
            </div>
            <div class="info">
                <a href="#"><h3>Free Shipping</h3></a>
                <span>On order over $200</span>
            </div>
        </div>
        <div class="col-xs-6 col-sm-3 service-item">
            <div class="icon">
                <img alt="services" src="{{URL::to('public/asset_client/data/s2.png')}}" />
            </div>
            <div class="info">
                <a href="#"><h3>30-day return</h3></a>
                <span>Moneyback guarantee</span>
            </div>
        </div>
        <div class="col-xs-6 col-sm-3 service-item">
            <div class="icon">
                <img alt="services" src="{{URL::to('public/asset_client/data/s3.png')}}" />
            </div>

            <div class="info" >
                <a href="#"><h3>24/7 support</h3></a>
                <span>Online consultations</span>
            </div>
        </div>
        <div class="col-xs-6 col-sm-3 service-item">
            <div class="icon">
                <img alt="services" src="{{URL::to('public/asset_client/data/s4.png')}}" />
            </div>
            <div class="info">
                <a href="#"><h3>SAFE SHOPPING</h3></a>
                <span>Safe Shopping Guarantee</span>
            </div>
        </div>
    </div>
</div>
<!-- end services -->
<!--popular-tabs-->
<div class="page-top">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-9 page-top-left">
                <div class="popular-tabs">
                    <ul class="nav-tab">
                        <li class="active"><a data-toggle="tab" href="#tab-1">New Products</a></li>
                        <li><a data-toggle="tab" href="#tab-2">ON SALE</a></li>
                        <li><a data-toggle="tab" href="#tab-3">Best Sale</a></li>
                    </ul>
                    <div class="tab-container">
                        <div id="tab-1" class="tab-panel active">
                            <ul class="product-list owl-carousel" data-dots="false" data-loop="true" data-nav = "true" data-margin = "30" data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-responsive='{"0":{"items":1},"600":{"items":3},"1000":{"items":3}}'>
                                <?php
                                $new_product = DB::table('tbl_ecks_product')
                                        ->join('tbl_ecks_product_image', 'tbl_ecks_product.product_id', '=', 'tbl_ecks_product_image.product_id')
                                        //->where('tbl_ecks_product.is_featured', 1)
                                        ->where('tbl_ecks_product.publication_status', 1)
                                        ->where('tbl_ecks_product.deletion_status', 0)
                                        ->where('tbl_ecks_product_image.image_level', 1)
                                        ->select('tbl_ecks_product.*', 'tbl_ecks_product_image.image_option')
                                        ->get();
                                ?>
                                @foreach($new_product as $np_info)
                                <li>
                                    <div class="left-block">
                                        <a href="{{URL::to('product-details/'.$np_info->product_id)}}">
                                            <img class="img-responsive" alt="product" src="{{$np_info->image_option}}" />
                                        </a>
                                        <div class="quick-view">
                                            <a title="Add to my wishlist" class="heart" href="{{URL::to('wishlist')}}"></a>
                                            <a title="Add to compare" class="compare" href="{{URL::to('compare')}}"></a>
                                            <a title="Quick view" class="search" href="#"></a>
                                        </div>
                                        <!--                                        {!! Form::open(['url' => '/add-to-cart','method'=>'post']) !!}
                                                                                <div class="qty">
                                                                                    <input id="option-product-qty" type="hidden" name="qty" value="1">
                                                                                    <input id="option-product-qty" type="hidden" name="product_id" value="{{$np_info->product_id}}">
                                                                                </div>-->
                                        <div class="add-to-cart">                                            
                                            <a title="Add to Cart" href="{{URL::to('add-to-cart/'.$np_info->product_id)}}">Add to Cart</a>
                                            <!--                                            <button type="submit">
                                                                                            <div class="button-group">
                                                                                                <span title="Add to Cart">Add to Cart</span>
                                                                                            </div>
                                                                                        </button>-->
                                        </div>
                                        <!--{!! Form::close() !!}-->
                                        <div class="group-price">
                                            <span class="product-new">NEW</span>
                                            <!--<span class="product-sale">Sale</span>-->
                                        </div>
                                    </div>
                                    <div class="right-block">
                                        <h5 class="product-name"><a href="#">{{$np_info->product_name}}</a></h5>
                                        <div class="content_price">
                                            <span class="price product-price">{{$np_info->new_price}}</span>
                                            <span class="price old-price">{{$np_info->old_price}}</span>
                                        </div>
                                        <div class="product-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-o"></i>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div id="tab-2" class="tab-panel">
                            <ul class="product-list owl-carousel"  data-dots="false" data-loop="true" data-nav = "true" data-margin = "30"  data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-responsive='{"0":{"items":1},"600":{"items":3},"1000":{"items":3}}'>
                                <li>
                                    <div class="left-block">
                                        <a href="#">
                                            <img class="img-responsive" alt="product" src="{{URL::to('public/asset_client/data/p48.jpg')}}" /></a>
                                        <div class="quick-view">
                                            <a title="Add to my wishlist" class="heart" href="{{URL::to('wishlist')}}"></a>
                                            <a title="Add to compare" class="compare" href="{{URL::to('compare')}}"></a>
                                            <a title="Quick view" class="search" href="#"></a>
                                        </div>
                                        <div class="add-to-cart">
                                            <a title="Add to Cart" href="#">Add to Cart</a>
                                        </div>
                                    </div>
                                    <div class="right-block">
                                        <h5 class="product-name"><a href="#">Maecenas consequat mauris</a></h5>
                                        <div class="content_price">
                                            <span class="price product-price">$38,95</span>
                                            <span class="price old-price">$52,00</span>
                                        </div>
                                        <div class="product-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-o"></i>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="left-block">
                                        <a href="#">
                                            <img class="img-responsive" alt="product" src="{{URL::to('public/asset_client/data/p49.jpg')}}" /></a>
                                        <div class="quick-view">
                                            <a title="Add to my wishlist" class="heart" href="{{URL::to('wishlist')}}"></a>
                                            <a title="Add to compare" class="compare" href="{{URL::to('compare')}}"></a>
                                            <a title="Quick view" class="search" href="#"></a>
                                        </div>
                                        <div class="add-to-cart">
                                            <a title="Add to Cart" href="#">Add to Cart</a>
                                        </div>
                                    </div>
                                    <div class="right-block">
                                        <h5 class="product-name"><a href="#">Maecenas consequat mauris</a></h5>
                                        <div class="content_price">
                                            <span class="price product-price">$38,95</span>
                                            <span class="price old-price">$52,00</span>
                                        </div>
                                        <div class="product-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-o"></i>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="left-block">
                                        <a href="#"><img class="img-responsive" alt="product" src="{{URL::to('public/asset_client/data/p50.jpg')}}" /></a>
                                        <div class="quick-view">
                                            <a title="Add to my wishlist" class="heart" href="{{URL::to('wishlist')}}"></a>
                                            <a title="Add to compare" class="compare" href="{{URL::to('compare')}}"></a>
                                            <a title="Quick view" class="search" href="#"></a>
                                        </div>
                                        <div class="add-to-cart">
                                            <a title="Add to Cart" href="#">Add to Cart</a>
                                        </div>
                                    </div>
                                    <div class="right-block">
                                        <h5 class="product-name"><a href="#">Maecenas consequat mauris</a></h5>
                                        <div class="content_price">
                                            <span class="price product-price">$38,95</span>
                                            <span class="price old-price">$52,00</span>
                                        </div>
                                        <div class="product-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-o"></i>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="left-block">
                                        <a href="#"><img class="img-responsive" alt="product" src="{{URL::to('public/asset_client/data/p51.jpg')}}" /></a>
                                        <div class="quick-view">
                                            <a title="Add to my wishlist" class="heart" href="{{URL::to('wishlist')}}"></a>
                                            <a title="Add to compare" class="compare" href="{{URL::to('compare')}}"></a>
                                            <a title="Quick view" class="search" href="#"></a>
                                        </div>
                                        <div class="add-to-cart">
                                            <a title="Add to Cart" href="#">Add to Cart</a>
                                        </div>
                                    </div>
                                    <div class="right-block">
                                        <h5 class="product-name"><a href="#">Maecenas consequat mauris</a></h5>
                                        <div class="content_price">
                                            <span class="price product-price">$38,95</span>
                                            <span class="price old-price">$52,00</span>
                                        </div>
                                        <div class="product-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-o"></i>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div id="tab-3" class="tab-panel">
                            <ul class="product-list owl-carousel" data-dots="false" data-loop="true" data-nav = "true" data-margin = "30" data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-responsive='{"0":{"items":1},"600":{"items":3},"1000":{"items":3}}'>
                                <li>
                                    <div class="left-block">
                                        <a href="#"><img class="img-responsive" alt="product" src="{{URL::to('public/asset_client/data/p60.jpg')}}" /></a>
                                        <div class="quick-view">
                                            <a title="Add to my wishlist" class="heart" href="{{URL::to('wishlist')}}"></a>
                                            <a title="Add to compare" class="compare" href="{{URL::to('compare')}}"></a>
                                            <a title="Quick view" class="search" href="#"></a>
                                        </div>
                                        <div class="add-to-cart">
                                            <a title="Add to Cart" href="#">Add to Cart</a>
                                        </div>
                                    </div>
                                    <div class="right-block">
                                        <h5 class="product-name"><a href="#">Maecenas consequat mauris</a></h5>
                                        <div class="content_price">
                                            <span class="price product-price">$38,95</span>
                                            <span class="price old-price">$52,00</span>
                                        </div>
                                        <div class="product-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-o"></i>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="left-block">
                                        <a href="#"><img class="img-responsive" alt="product" src="{{URL::to('public/asset_client/data/p61.jpg')}}" /></a>
                                        <div class="quick-view">
                                            <a title="Add to my wishlist" class="heart" href="{{URL::to('wishlist')}}"></a>
                                            <a title="Add to compare" class="compare" href="{{URL::to('compare')}}"></a>
                                            <a title="Quick view" class="search" href="#"></a>
                                        </div>
                                        <div class="add-to-cart">
                                            <a title="Add to Cart" href="#">Add to Cart</a>
                                        </div>
                                    </div>
                                    <div class="right-block">
                                        <h5 class="product-name"><a href="#">Maecenas consequat mauris</a></h5>
                                        <div class="content_price">
                                            <span class="price product-price">$38,95</span>
                                            <span class="price old-price">$52,00</span>
                                        </div>
                                        <div class="product-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-o"></i>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="left-block">
                                        <a href="#"><img class="img-responsive" alt="product" src="{{URL::to('public/asset_client/data/p62.jpg')}}" /></a>
                                        <div class="quick-view">
                                            <a title="Add to my wishlist" class="heart" href="{{URL::to('wishlist')}}"></a>
                                            <a title="Add to compare" class="compare" href="{{URL::to('compare')}}"></a>
                                            <a title="Quick view" class="search" href="#"></a>
                                        </div>
                                        <div class="add-to-cart">
                                            <a title="Add to Cart" href="#">Add to Cart</a>
                                        </div>
                                    </div>
                                    <div class="right-block">
                                        <h5 class="product-name"><a href="#">Maecenas consequat mauris</a></h5>
                                        <div class="content_price">
                                            <span class="price product-price">$38,95</span>
                                            <span class="price old-price">$52,00</span>
                                        </div>
                                        <div class="product-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-o"></i>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="left-block">
                                        <a href="#"><img class="img-responsive" alt="product" src="{{URL::to('public/asset_client/data/p63.jpg')}}" /></a>
                                        <div class="quick-view">
                                            <a title="Add to my wishlist" class="heart" href="{{URL::to('wishlist')}}"></a>
                                            <a title="Add to compare" class="compare" href="{{URL::to('compare')}}"></a>
                                            <a title="Quick view" class="search" href="#"></a>
                                        </div>
                                        <div class="add-to-cart">
                                            <a title="Add to Cart" href="#">Add to Cart</a>
                                        </div>
                                    </div>
                                    <div class="right-block">
                                        <h5 class="product-name"><a href="#">Maecenas consequat mauris</a></h5>
                                        <div class="content_price">
                                            <span class="price product-price">$38,95</span>
                                            <span class="price old-price">$52,00</span>
                                        </div>
                                        <div class="product-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-o"></i>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-3 page-top-right">
                <div class="latest-deals">
                    <h2 class="latest-deal-title">latest deals</h2>
                    <div class="latest-deal-content">
                        <ul class="product-list owl-carousel" data-dots="false" data-loop="true" data-nav = "true" data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-responsive='{"0":{"items":1},"600":{"items":3},"1000":{"items":1}}'>
                            <li>
                                <div class="count-down-time" data-countdown="2015/06/27"></div>
                                <div class="left-block">
                                    <a href="#"><img class="img-responsive" alt="product" src="{{URL::to('public/asset_client/data/ld1.jpg')}}" /></a>
                                    <div class="quick-view">
                                        <a title="Add to my wishlist" class="heart" href="{{URL::to('wishlist')}}"></a>
                                        <a title="Add to compare" class="compare" href="{{URL::to('compare')}}"></a>
                                        <a title="Quick view" class="search" href="#"></a>
                                    </div>
                                    <div class="add-to-cart">
                                        <a title="Add to Cart" href="#">Add to Cart</a>
                                    </div>
                                </div>
                                <div class="right-block">
                                    <h5 class="product-name"><a href="#">Maecenas consequat mauris</a></h5>
                                    <div class="content_price">
                                        <span class="price product-price">$38,95</span>
                                        <span class="price old-price">$52,00</span>
                                        <span class="colreduce-percentage">(-10%)</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="count-down-time" data-countdown="2015/06/27 9:20:00"></div>
                                <div class="left-block">
                                    <a href="#"><img class="img-responsive" alt="product" src="{{URL::to('public/asset_client/data/ld2.jpg')}}" /></a>
                                    <div class="quick-view">
                                        <a title="Add to my wishlist" class="heart" href="{{URL::to('wishlist')}}"></a>
                                            <a title="Add to compare" class="compare" href="{{URL::to('compare')}}"></a>
                                            <a title="Quick view" class="search" href="#"></a>
                                    </div>
                                    <div class="add-to-cart">
                                        <a title="Add to Cart" href="#">Add to Cart</a>
                                    </div>
                                </div>
                                <div class="right-block">
                                    <h5 class="product-name"><a href="#">Maecenas consequat mauris</a></h5>
                                    <div class="content_price">
                                        <span class="price product-price">$38,95</span>
                                        <span class="price old-price">$52,00</span>
                                        <span class="colreduce-percentage">(-90%)</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="count-down-time" data-countdown="2015/06/27 9:20:00"></div>
                                <div class="left-block">
                                    <a href="#"><img class="img-responsive" alt="product" src="{{URL::to('public/asset_client/data/ld3.jpg')}}" /></a>
                                    <div class="quick-view">
                                        <a title="Add to my wishlist" class="heart" href="{{URL::to('wishlist')}}"></a>
                                            <a title="Add to compare" class="compare" href="{{URL::to('compare')}}"></a>
                                            <a title="Quick view" class="search" href="#"></a>
                                    </div>
                                    <div class="add-to-cart">
                                        <a title="Add to Cart" href="#">Add to Cart</a>
                                    </div>
                                </div>
                                <div class="right-block">
                                    <h5 class="product-name"><a href="#">Maecenas consequat mauris</a></h5>
                                    <div class="content_price">
                                        <span class="price product-price">$38,95</span>
                                        <span class="price old-price">$52,00</span>
                                        <span class="colreduce-percentage">(-20%)</span>
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
<!-- end popular-tabs-->
<!--featured-category-->
<div class="content-page">
    <?php
    $category_info_menu = DB::table('tbl_ecks_category')
            ->where('publication_status', 1)
            ->where('deletion_status', 0)
            ->where('parent_id', 0)
            ->where('is_featured', 1)
            ->get();
    ?>
    @foreach($category_info_menu as $c_info)
    <div class="container">
        <!-- featured category -->
        <div class="category-featured">
            <nav class="navbar nav-menu nav-menu-red show-brand">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->                    
                    <div class="navbar-brand"><a href="#"><img alt="" src="{{URL::to('public/asset_client/data/sports.png')}}" />{{$c_info->category_name}}</a></div>
                    <span class="toggle-menu"></span>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse">           
                        <ul class="nav navbar-nav">
                            <li class="active"><a data-toggle="tab" href="#tab-4">Best Seller</a></li>
                            <li><a data-toggle="tab" href="#tab-5">Most Viewed</a></li>
                            <?php
                            $sub_category_info_menu = DB::table('tbl_ecks_category')
                                    ->where('parent_id', $c_info->category_id)
                                    ->where('publication_status', 1)
                                    ->where('deletion_status', 0)
                                    ->get();
                            ?>
                            @foreach($sub_category_info_menu as $sc_info)
                            <li><a href="#">{{$sc_info->category_name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->

                </div><!-- /.container-fluid -->
                <!--                <div id="elevator-1" class="floor-elevator">
                                    <a href="#" class="btn-elevator up disabled fa fa-angle-up"></a>
                                    <a href="#" class="btn-elevator down fa fa-angle-down"></a>
                                </div>-->
            </nav>
            <div class="category-banner">
                <div class="col-sm-6 banner">
                    <a href="#"><img alt="ads2" class="img-responsive" src="{{URL::to('public/asset_client/data/ads2.jpg')}}" /></a>
                </div>
                <div class="col-sm-6 banner">
                    <a href="#"><img alt="ads2" class="img-responsive" src="{{URL::to('public/asset_client/data/ads3.jpg')}}" /></a>
                </div>
            </div>
            <div class="product-featured clearfix">
                <div class="banner-featured">
                    <div class="featured-text"><span>featured</span></div>
                    <div class="banner-img">
                        <a href="#"><img alt="Featurered 1" src="{{URL::to('public/asset_client/data/f1.jpg')}}" /></a>
                    </div>
                </div>
                <div class="product-featured-content">
                    <div class="product-featured-list">
                        <div class="tab-container">
                            <!-- tab product -->
                            <div class="tab-panel active" id="tab-4">
                                <ul class="product-list owl-carousel" data-dots="false" data-loop="true" data-nav = "true" data-margin = "0" data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-responsive='{"0":{"items":1},"600":{"items":3},"1000":{"items":4}}'>
                                    <li>
                                        <div class="left-block">
                                            <a href="#">
                                                <img class="img-responsive" alt="product" src="{{URL::to('public/asset_client/data/01_blue-dress.jpg')}}" /></a>
                                            <div class="quick-view">
                                                <a title="Add to my wishlist" class="heart" href="{{URL::to('wishlist')}}"></a>
                                            <a title="Add to compare" class="compare" href="{{URL::to('compare')}}"></a>
                                            <a title="Quick view" class="search" href="#"></a>
                                            </div>
                                            <div class="add-to-cart">
                                                <a title="Add to Cart" href="#">Add to Cart</a>
                                            </div>
                                        </div>
                                        <div class="right-block">
                                            <h5 class="product-name"><a href="#">Blue Dress</a></h5>
                                            <div class="content_price">
                                                <span class="price product-price">$38,95</span>
                                                <span class="price old-price">$52,00</span>
                                            </div>
                                            <div class="product-star">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half-o"></i>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="left-block">
                                            <a href="#">
                                                <img class="img-responsive" alt="product" src="{{URL::to('public/asset_client/data/02_yellow-dress.jpg')}}" /></a>
                                            <div class="quick-view">
                                                <a title="Add to my wishlist" class="heart" href="{{URL::to('wishlist')}}"></a>
                                            <a title="Add to compare" class="compare" href="{{URL::to('compare')}}"></a>
                                            <a title="Quick view" class="search" href="#"></a>
                                            </div>
                                            <div class="add-to-cart">
                                                <a title="Add to Cart" href="#">Add to Cart</a>
                                            </div>
                                        </div>
                                        <div class="right-block">
                                            <h5 class="product-name"><a href="#">Yellow Dress</a></h5>
                                            <div class="content_price">
                                                <span class="price product-price">$38,95</span>
                                                <span class="price old-price">$52,00</span>
                                            </div>
                                            <div class="product-star">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half-o"></i>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="left-block">
                                            <a href="#">
                                                <img class="img-responsive" alt="product" src="{{URL::to('public/asset_client/data/03_cyan-dress.jpg')}}" /></a>
                                            <div class="quick-view">
                                                <a title="Add to my wishlist" class="heart" href="{{URL::to('wishlist')}}"></a>
                                            <a title="Add to compare" class="compare" href="{{URL::to('compare')}}"></a>
                                            <a title="Quick view" class="search" href="#"></a>
                                            </div>
                                            <div class="add-to-cart">
                                                <a title="Add to Cart" href="#">Add to Cart</a>
                                            </div>
                                        </div>
                                        <div class="right-block">
                                            <h5 class="product-name"><a href="#">Cyan Dress</a></h5>
                                            <div class="content_price">
                                                <span class="price product-price">$38,95</span>
                                                <span class="price old-price">$52,00</span>
                                            </div>
                                            <div class="product-star">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half-o"></i>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="left-block">
                                            <a href="#">
                                                <img class="img-responsive" alt="product" src="{{URL::to('public/asset_client/data/04_nice-dress.jpg')}}" /></a>
                                            <div class="quick-view">
                                                <a title="Add to my wishlist" class="heart" href="{{URL::to('wishlist')}}"></a>
                                            <a title="Add to compare" class="compare" href="{{URL::to('compare')}}"></a>
                                            <a title="Quick view" class="search" href="#"></a>
                                            </div>
                                            <div class="add-to-cart">
                                                <a title="Add to Cart" href="#">Add to Cart</a>
                                            </div>
                                        </div>
                                        <div class="right-block">
                                            <h5 class="product-name"><a href="#">Nice Dress</a></h5>
                                            <div class="content_price">
                                                <span class="price product-price">$38,95</span>
                                                <span class="price old-price">$52,00</span>
                                            </div>
                                            <div class="product-star">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half-o"></i>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="left-block">
                                            <a href="#">
                                                <img class="img-responsive" alt="product" src="{{URL::to('public/asset_client/data/05_flowers-dress.jpg')}}" /></a>
                                            <div class="quick-view">
                                                <a title="Add to my wishlist" class="heart" href="{{URL::to('wishlist')}}"></a>
                                            <a title="Add to compare" class="compare" href="{{URL::to('compare')}}"></a>
                                            <a title="Quick view" class="search" href="#"></a>
                                            </div>
                                            <div class="add-to-cart">
                                                <a title="Add to Cart" href="#">Add to Cart</a>
                                            </div>
                                        </div>
                                        <div class="right-block">
                                            <h5 class="product-name"><a href="#">Flowers Dress</a></h5>
                                            <div class="content_price">
                                                <span class="price product-price">$38,95</span>
                                                <span class="price old-price">$52,00</span>
                                            </div>
                                            <div class="product-star">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half-o"></i>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="left-block">
                                            <a href="#">
                                                <img class="img-responsive" alt="product" src="{{URL::to('public/asset_client/data/06_red-dress.jpg')}}" /></a>
                                            <div class="quick-view">
                                                <a title="Add to my wishlist" class="heart" href="{{URL::to('wishlist')}}"></a>
                                            <a title="Add to compare" class="compare" href="{{URL::to('compare')}}"></a>
                                            <a title="Quick view" class="search" href="#"></a>
                                            </div>
                                            <div class="add-to-cart">
                                                <a title="Add to Cart" href="#">Add to Cart</a>
                                            </div>
                                        </div>
                                        <div class="right-block">
                                            <h5 class="product-name"><a href="#">Red Dress</a></h5>
                                            <div class="content_price">
                                                <span class="price product-price">$38,95</span>
                                                <span class="price old-price">$52,00</span>
                                            </div>
                                            <div class="product-star">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half-o"></i>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <!-- tab product -->
                            <div class="tab-panel" id="tab-5">
                                <ul class="product-list owl-carousel" data-dots="false" data-loop="true" data-nav = "true" data-margin = "0" data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-responsive='{"0":{"items":1},"600":{"items":3},"1000":{"items":4}}'>
                                    <li>
                                        <div class="left-block">
                                            <a href="#">
                                                <img class="img-responsive" alt="product" src="{{URL::to('public/asset_client/data/04_nice-dress.jpg')}}" /></a>
                                            <div class="quick-view">
                                                <a title="Add to my wishlist" class="heart" href="{{URL::to('wishlist')}}"></a>
                                            <a title="Add to compare" class="compare" href="{{URL::to('compare')}}"></a>
                                            <a title="Quick view" class="search" href="#"></a>
                                            </div>
                                            <div class="add-to-cart">
                                                <a title="Add to Cart" href="#">Add to Cart</a>
                                            </div>
                                        </div>
                                        <div class="right-block">
                                            <h5 class="product-name"><a href="#">Nice Dress</a></h5>
                                            <div class="content_price">
                                                <span class="price product-price">$38,95</span>
                                                <span class="price old-price">$52,00</span>
                                            </div>
                                            <div class="product-star">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half-o"></i>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="left-block">
                                            <a href="#">
                                                <img class="img-responsive" alt="product" src="{{URL::to('public/asset_client/data/05_flowers-dress.jpg')}}" /></a>
                                            <div class="quick-view">
                                                <a title="Add to my wishlist" class="heart" href="{{URL::to('wishlist')}}"></a>
                                            <a title="Add to compare" class="compare" href="{{URL::to('compare')}}"></a>
                                            <a title="Quick view" class="search" href="#"></a>
                                            </div>
                                            <div class="add-to-cart">
                                                <a title="Add to Cart" href="#">Add to Cart</a>
                                            </div>
                                        </div>
                                        <div class="right-block">
                                            <h5 class="product-name"><a href="#">Flowers Dress</a></h5>
                                            <div class="content_price">
                                                <span class="price product-price">$38,95</span>
                                                <span class="price old-price">$52,00</span>
                                            </div>
                                            <div class="product-star">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half-o"></i>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="left-block">
                                            <a href="#">
                                                <img class="img-responsive" alt="product" src="{{URL::to('public/asset_client/data/06_red-dress.jpg')}}" /></a>
                                            <div class="quick-view">
                                                <a title="Add to my wishlist" class="heart" href="{{URL::to('wishlist')}}"></a>
                                            <a title="Add to compare" class="compare" href="{{URL::to('compare')}}"></a>
                                            <a title="Quick view" class="search" href="#"></a>
                                            </div>
                                            <div class="add-to-cart">
                                                <a title="Add to Cart" href="#">Add to Cart</a>
                                            </div>
                                        </div>
                                        <div class="right-block">
                                            <h5 class="product-name"><a href="#">Red Dress</a></h5>
                                            <div class="content_price">
                                                <span class="price product-price">$38,95</span>
                                                <span class="price old-price">$52,00</span>
                                            </div>
                                            <div class="product-star">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half-o"></i>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="left-block">
                                            <a href="#">
                                                <img class="img-responsive" alt="product" src="{{URL::to('public/asset_client/data/01_blue-dress.jpg')}}" /></a>
                                            <div class="quick-view">
                                                <a title="Add to my wishlist" class="heart" href="{{URL::to('wishlist')}}"></a>
                                            <a title="Add to compare" class="compare" href="{{URL::to('compare')}}"></a>
                                            <a title="Quick view" class="search" href="#"></a>
                                            </div>
                                            <div class="add-to-cart">
                                                <a title="Add to Cart" href="#">Add to Cart</a>
                                            </div>
                                        </div>
                                        <div class="right-block">
                                            <h5 class="product-name"><a href="#">Blue Dress</a></h5>
                                            <div class="content_price">
                                                <span class="price product-price">$38,95</span>
                                                <span class="price old-price">$52,00</span>
                                            </div>
                                            <div class="product-star">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half-o"></i>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="left-block">
                                            <a href="#">
                                                <img class="img-responsive" alt="product" src="{{URL::to('public/asset_client/data/02_yellow-dress.jpg')}}" /></a>
                                            <div class="quick-view">
                                                <a title="Add to my wishlist" class="heart" href="{{URL::to('wishlist')}}"></a>
                                            <a title="Add to compare" class="compare" href="{{URL::to('compare')}}"></a>
                                            <a title="Quick view" class="search" href="#"></a>
                                            </div>
                                            <div class="add-to-cart">
                                                <a title="Add to Cart" href="#">Add to Cart</a>
                                            </div>
                                        </div>
                                        <div class="right-block">
                                            <h5 class="product-name"><a href="#">Yellow Dress</a></h5>
                                            <div class="content_price">
                                                <span class="price product-price">$38,95</span>
                                                <span class="price old-price">$52,00</span>
                                            </div>
                                            <div class="product-star">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half-o"></i>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="left-block">
                                            <a href="#">
                                                <img class="img-responsive" alt="product" src="{{URL::to('public/asset_client/data/03_cyan-dress.jpg')}}" /></a>
                                            <div class="quick-view">
                                                <a title="Add to my wishlist" class="heart" href="{{URL::to('wishlist')}}"></a>
                                            <a title="Add to compare" class="compare" href="{{URL::to('compare')}}"></a>
                                            <a title="Quick view" class="search" href="#"></a>
                                            </div>
                                            <div class="add-to-cart">
                                                <a title="Add to Cart" href="#">Add to Cart</a>
                                            </div>
                                        </div>
                                        <div class="right-block">
                                            <h5 class="product-name"><a href="#">Cyan Dress</a></h5>
                                            <div class="content_price">
                                                <span class="price product-price">$38,95</span>
                                                <span class="price old-price">$52,00</span>
                                            </div>
                                            <div class="product-star">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half-o"></i>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="left-block">
                                            <a href="#">
                                                <img class="img-responsive" alt="product" src="{{URL::to('public/asset_client/data/04_nice-dress.jpg')}}" /></a>
                                            <div class="quick-view">
                                                <a title="Add to my wishlist" class="heart" href="{{URL::to('wishlist')}}"></a>
                                            <a title="Add to compare" class="compare" href="{{URL::to('compare')}}"></a>
                                            <a title="Quick view" class="search" href="#"></a>
                                            </div>
                                            <div class="add-to-cart">
                                                <a title="Add to Cart" href="#">Add to Cart</a>
                                            </div>
                                        </div>
                                        <div class="right-block">
                                            <h5 class="product-name"><a href="#">Nice Dress</a></h5>
                                            <div class="content_price">
                                                <span class="price product-price">$38,95</span>
                                                <span class="price old-price">$52,00</span>
                                            </div>
                                            <div class="product-star">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half-o"></i>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="left-block">
                                            <a href="#">
                                                <img class="img-responsive" alt="product" src="{{URL::to('public/asset_client/data/05_flowers-dress.jpg')}}" /></a>
                                            <div class="quick-view">
                                                <a title="Add to my wishlist" class="heart" href="{{URL::to('wishlist')}}"></a>
                                            <a title="Add to compare" class="compare" href="{{URL::to('compare')}}"></a>
                                            <a title="Quick view" class="search" href="#"></a>
                                            </div>
                                            <div class="add-to-cart">
                                                <a title="Add to Cart" href="#">Add to Cart</a>
                                            </div>
                                        </div>
                                        <div class="right-block">
                                            <h5 class="product-name"><a href="#">Flowers Dress</a></h5>
                                            <div class="content_price">
                                                <span class="price product-price">$38,95</span>
                                                <span class="price old-price">$52,00</span>
                                            </div>
                                            <div class="product-star">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half-o"></i>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="left-block">
                                            <a href="#">
                                                <img class="img-responsive" alt="product" src="{{URL::to('public/asset_client/data/06_red-dress.jpg')}}" /></a>
                                            <div class="quick-view">
                                                <a title="Add to my wishlist" class="heart" href="{{URL::to('wishlist')}}"></a>
                                            <a title="Add to compare" class="compare" href="{{URL::to('compare')}}"></a>
                                            <a title="Quick view" class="search" href="#"></a>
                                            </div>
                                            <div class="add-to-cart">
                                                <a title="Add to Cart" href="#">Add to Cart</a>
                                            </div>
                                        </div>
                                        <div class="right-block">
                                            <h5 class="product-name"><a href="#">Red Dress</a></h5>
                                            <div class="content_price">
                                                <span class="price product-price">$38,95</span>
                                                <span class="price old-price">$52,00</span>
                                            </div>
                                            <div class="product-star">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half-o"></i>
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
        <!-- end featured category -->


        <!-- Baner bottom -->
        <div class="row banner-bottom">
            <div class="col-sm-6">
                <div class="banner-boder-zoom">
                    <a href="#"><img alt="ads" class="img-responsive" src="{{URL::to('public/asset_client/data/ads17.jpg')}}" /></a>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="banner-boder-zoom">
                    <a href="#"><img alt="ads" class="img-responsive" src="{{URL::to('public/asset_client/data/ads18.jpg')}}" /></a>
                </div>
            </div>
        </div>
        <!-- end banner bottom -->
    </div>
    @endforeach
</div>
<!--end featured-category-->
<!--brand showcase-->
<div class="container">
    <div class="brand-showcase">
        <h2 class="brand-showcase-title">
            brand showcase
        </h2>
        <div class="brand-showcase-box">
            <ul class="brand-showcase-logo owl-carousel" data-loop="true" data-nav = "true" data-dots="false" data-margin = "1" data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-responsive='{"0":{"items":2},"600":{"items":5},"1000":{"items":8}}'>
                <li data-tab="showcase-1" class="item active"><img src="{{URL::to('public/asset_client/data/gucci.png')}}" alt="logo" class="item-img" /></li>
                <li data-tab="showcase-2" class="item"><img src="{{URL::to('public/asset_client/data/gucci.png')}}" alt="logo" class="item-img" /></li>
                <li data-tab="showcase-3" class="item"><img src="{{URL::to('public/asset_client/data/gucci.png')}}" alt="logo" class="item-img" /></li>
                <li data-tab="showcase-4" class="item"><img src="{{URL::to('public/asset_client/data/gucci.png')}}" alt="logo" class="item-img" /></li>
                <li data-tab="showcase-5" class="item"><img src="{{URL::to('public/asset_client/data/gucci.png')}}" alt="logo" class="item-img" /></li>
                <li data-tab="showcase-6" class="item"><img src="{{URL::to('public/asset_client/data/gucci.png')}}" alt="logo" class="item-img" /></li>
                <li data-tab="showcase-7" class="item"><img src="{{URL::to('public/asset_client/data/gucci.png')}}" alt="logo" class="item-img" /></li>
                <li data-tab="showcase-8" class="item"><img src="{{URL::to('public/asset_client/data/gucci.png')}}" alt="logo" class="item-img" /></li>
                <li data-tab="showcase-9" class="item"><img src="{{URL::to('public/asset_client/data/gucci.png')}}" alt="logo" class="item-img" /></li>
            </ul>
            <div class="brand-showcase-content">
                <div class="brand-showcase-content-tab active" id="showcase-1">
                    <div class="row">
                        <div class="col-xs-12 col-sm-4 trademark-info">
                            <div class="trademark-logo">
                                <a href="#"><img src="{{URL::to('public/asset_client/data/trademark.jpg')}}" alt="trademark"></a>
                            </div>
                            <div class="trademark-desc">
                                Whatever the occasion, complete your outfit with one of Hermes Fashion’s stylish women’s bags. Discover our spring collection.
                            </div>
                            <a href="#" class="trademark-link">shop this brand</a>
                        </div>
                        <div class="col-xs-12 col-sm-8 trademark-product">
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 product-item">
                                    <div class="image-product hover-zoom">
                                        <a href="#"><img class="img-repon" src="{{URL::to('public/asset_client/data/p24.jpg')}}" alt=""></a>
                                    </div>
                                    <div class="info-product">
                                        <a href="#">
                                            <h5>Maecenas consequat mauris</h5>
                                        </a>
                                        <span class="product-price">$38.87</span>
                                        <div class="product-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <a class="btn-view-more" title="View More" href="#">View More</a>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 product-item">
                                    <div class="image-product hover-zoom">
                                        <a href="#"><img class="img-responsive" src="{{URL::to('public/asset_client/data/p25.jpg')}}" alt=""></a>
                                    </div>
                                    <div class="info-product">
                                        <a href="#">
                                            <h5>Maecenas consequat mauris</h5>
                                        </a>
                                        <span class="product-price">$38.87</span>
                                        <div class="product-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <a class="btn-view-more" title="View More" href="#">View More</a>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 product-item">
                                    <div class="image-product hover-zoom">
                                        <a href="#"><img class="img-responsive" src="{{URL::to('public/asset_client/data/p26.jpg')}}" alt=""></a>
                                    </div>
                                    <div class="info-product">
                                        <a href="#">
                                            <h5>Maecenas consequat mauris</h5>
                                        </a>
                                        <span class="product-price">$38.87</span>
                                        <div class="product-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <a class="btn-view-more" title="View More" href="#">View More</a>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 product-item">
                                    <div class="image-product hover-zoom">
                                        <a href="#"><img class="img-responsive" src="{{URL::to('public/asset_client/data/p27.jpg')}}" alt=""></a>
                                    </div>
                                    <div class="info-product">
                                        <a href="#">
                                            <h5>Maecenas consequat mauris</h5>
                                        </a>
                                        <span class="product-price">$38.87</span>
                                        <div class="product-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <a class="btn-view-more" title="View More" href="#">View More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="brand-showcase-content-tab" id="showcase-2">
                    <div class="row">
                        <div class="col-xs-12 col-sm-4 trademark-info">
                            <div class="trademark-logo">
                                <a href="#"><img src="{{URL::to('public/asset_client/data/trademark.jpg')}}" alt="trademark"></a>
                            </div>
                            <div class="trademark-desc">
                                Whatever the occasion, complete your outfit with one of Hermes Fashion’s stylish women’s bags. Discover our spring collection.
                            </div>
                            <a href="#" class="trademark-link">shop this brand</a>
                        </div>
                        <div class="col-xs-12 col-sm-8 trademark-product">
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 product-item">
                                    <div class="image-product hover-zoom">
                                        <a href="#"><img class="img-repon" src="{{URL::to('public/asset_client/data/p10.jpg')}}" alt=""></a>
                                    </div>
                                    <div class="info-product">
                                        <a href="#">
                                            <h5>Maecenas consequat mauris</h5>
                                        </a>
                                        <span class="product-price">$38.87</span>
                                        <div class="product-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <a class="btn-view-more" title="View More" href="#">View More</a>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 product-item">
                                    <div class="image-product hover-zoom">
                                        <a href="#"><img class="img-responsive" src="{{URL::to('public/asset_client/data/p11.jpg')}}" alt=""></a>
                                    </div>
                                    <div class="info-product">
                                        <a href="#">
                                            <h5>Maecenas consequat mauris</h5>
                                        </a>
                                        <span class="product-price">$38.87</span>
                                        <div class="product-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <a class="btn-view-more" title="View More" href="#">View More</a>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 product-item">
                                    <div class="image-product hover-zoom">
                                        <a href="#"><img class="img-responsive" src="{{URL::to('public/asset_client/data/p12.jpg')}}" alt=""></a>
                                    </div>
                                    <div class="info-product">
                                        <a href="#">
                                            <h5>Maecenas consequat mauris</h5>
                                        </a>
                                        <span class="product-price">$38.87</span>
                                        <div class="product-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <a class="btn-view-more" title="View More" href="#">View More</a>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 product-item">
                                    <div class="image-product hover-zoom">
                                        <a href="#"><img class="img-responsive" src="{{URL::to('public/asset_client/data/p13.jpg')}}" alt=""></a>
                                    </div>
                                    <div class="info-product">
                                        <a href="#">
                                            <h5>Maecenas consequat mauris</h5>
                                        </a>
                                        <span class="product-price">$38.87</span>
                                        <div class="product-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <a class="btn-view-more" title="View More" href="#">View More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="brand-showcase-content-tab" id="showcase-3">
                    <div class="row">
                        <div class="col-xs-12 col-sm-4 trademark-info">
                            <div class="trademark-logo">
                                <a href="#"><img src="{{URL::to('public/asset_client/data/trademark.jpg')}}" alt="trademark"></a>
                            </div>
                            <div class="trademark-desc">
                                Whatever the occasion, complete your outfit with one of Hermes Fashion’s stylish women’s bags. Discover our spring collection.
                            </div>
                            <a href="#" class="trademark-link">shop this brand</a>
                        </div>
                        <div class="col-xs-12 col-sm-8 trademark-product">
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 product-item">
                                    <div class="image-product hover-zoom">
                                        <a href="#"><img class="img-repon" src="{{URL::to('public/asset_client/data/p14.jpg')}}" alt=""></a>
                                    </div>
                                    <div class="info-product">
                                        <a href="#">
                                            <h5>Maecenas consequat mauris</h5>
                                        </a>
                                        <span class="product-price">$38.87</span>
                                        <div class="product-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <a class="btn-view-more" title="View More" href="#">View More</a>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 product-item">
                                    <div class="image-product hover-zoom">
                                        <a href="#"><img class="img-responsive" src="{{URL::to('public/asset_client/data/p15.jpg')}}" alt=""></a>
                                    </div>
                                    <div class="info-product">
                                        <a href="#">
                                            <h5>Maecenas consequat mauris</h5>
                                        </a>
                                        <span class="product-price">$38.87</span>
                                        <div class="product-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <a class="btn-view-more" title="View More" href="#">View More</a>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 product-item">
                                    <div class="image-product hover-zoom">
                                        <a href="#"><img class="img-responsive" src="{{URL::to('public/asset_client/data/p16.jpg')}}" alt=""></a>
                                    </div>
                                    <div class="info-product">
                                        <a href="#">
                                            <h5>Maecenas consequat mauris</h5>
                                        </a>
                                        <span class="product-price">$38.87</span>
                                        <div class="product-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <a class="btn-view-more" title="View More" href="#">View More</a>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 product-item">
                                    <div class="image-product hover-zoom">
                                        <a href="#"><img class="img-responsive" src="{{URL::to('public/asset_client/data/p17.jpg')}}" alt=""></a>
                                    </div>
                                    <div class="info-product">
                                        <a href="#">
                                            <h5>Maecenas consequat mauris</h5>
                                        </a>
                                        <span class="product-price">$38.87</span>
                                        <div class="product-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <a class="btn-view-more" title="View More" href="#">View More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="brand-showcase-content-tab" id="showcase-4">
                    <div class="row">
                        <div class="col-xs-12 col-sm-4 trademark-info">
                            <div class="trademark-logo">
                                <a href="#"><img src="{{URL::to('public/asset_client/data/trademark.jpg')}}" alt="trademark"></a>
                            </div>
                            <div class="trademark-desc">
                                Whatever the occasion, complete your outfit with one of Hermes Fashion’s stylish women’s bags. Discover our spring collection.
                            </div>
                            <a href="#" class="trademark-link">shop this brand</a>
                        </div>
                        <div class="col-xs-12 col-sm-8 trademark-product">
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 product-item">
                                    <div class="image-product hover-zoom">
                                        <a href="#"><img class="img-repon" src="{{URL::to('public/asset_client/data/p18.jpg')}}" alt=""></a>
                                    </div>
                                    <div class="info-product">
                                        <a href="#">
                                            <h5>Maecenas consequat mauris</h5>
                                        </a>
                                        <span class="product-price">$38.87</span>
                                        <div class="product-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <a class="btn-view-more" title="View More" href="#">View More</a>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 product-item">
                                    <div class="image-product hover-zoom">
                                        <a href="#"><img class="img-responsive" src="{{URL::to('public/asset_client/data/p19.jpg')}}" alt=""></a>
                                    </div>
                                    <div class="info-product">
                                        <a href="#">
                                            <h5>Maecenas consequat mauris</h5>
                                        </a>
                                        <span class="product-price">$38.87</span>
                                        <div class="product-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <a class="btn-view-more" title="View More" href="#">View More</a>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 product-item">
                                    <div class="image-product hover-zoom">
                                        <a href="#"><img class="img-responsive" src="{{URL::to('public/asset_client/data/p20.jpg')}}" alt=""></a>
                                    </div>
                                    <div class="info-product">
                                        <a href="#">
                                            <h5>Maecenas consequat mauris</h5>
                                        </a>
                                        <span class="product-price">$38.87</span>
                                        <div class="product-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <a class="btn-view-more" title="View More" href="#">View More</a>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 product-item">
                                    <div class="image-product hover-zoom">
                                        <a href="#"><img class="img-responsive" src="{{URL::to('public/asset_client/data/p21.jpg')}}" alt=""></a>
                                    </div>
                                    <div class="info-product">
                                        <a href="#">
                                            <h5>Maecenas consequat mauris</h5>
                                        </a>
                                        <span class="product-price">$38.87</span>
                                        <div class="product-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <a class="btn-view-more" title="View More" href="#">View More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="brand-showcase-content-tab" id="showcase-5">
                    <div class="row">
                        <div class="col-xs-12 col-sm-4 trademark-info">
                            <div class="trademark-logo">
                                <a href="#"><img src="{{URL::to('public/asset_client/data/trademark.jpg')}}" alt="trademark"></a>
                            </div>
                            <div class="trademark-desc">
                                Whatever the occasion, complete your outfit with one of Hermes Fashion’s stylish women’s bags. Discover our spring collection.
                            </div>
                            <a href="#" class="trademark-link">shop this brand</a>
                        </div>
                        <div class="col-xs-12 col-sm-8 trademark-product">
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 product-item">
                                    <div class="image-product hover-zoom">
                                        <a href="#"><img class="img-repon" src="{{URL::to('public/asset_client/data/p22.jpg')}}" alt=""></a>
                                    </div>
                                    <div class="info-product">
                                        <a href="#">
                                            <h5>Maecenas consequat mauris</h5>
                                        </a>
                                        <span class="product-price">$38.87</span>
                                        <div class="product-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <a class="btn-view-more" title="View More" href="#">View More</a>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 product-item">
                                    <div class="image-product hover-zoom">
                                        <a href="#"><img class="img-responsive" src="{{URL::to('public/asset_client/data/p23.jpg')}}" alt=""></a>
                                    </div>
                                    <div class="info-product">
                                        <a href="#">
                                            <h5>Maecenas consequat mauris</h5>
                                        </a>
                                        <span class="product-price">$38.87</span>
                                        <div class="product-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <a class="btn-view-more" title="View More" href="#">View More</a>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 product-item">
                                    <div class="image-product hover-zoom">
                                        <a href="#"><img class="img-responsive" src="{{URL::to('public/asset_client/data/p24.jpg')}}" alt=""></a>
                                    </div>
                                    <div class="info-product">
                                        <a href="#">
                                            <h5>Maecenas consequat mauris</h5>
                                        </a>
                                        <span class="product-price">$38.87</span>
                                        <div class="product-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <a class="btn-view-more" title="View More" href="#">View More</a>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 product-item">
                                    <div class="image-product hover-zoom">
                                        <a href="#"><img class="img-responsive" src="{{URL::to('public/asset_client/data/p25.jpg')}}" alt=""></a>
                                    </div>
                                    <div class="info-product">
                                        <a href="#">
                                            <h5>Maecenas consequat mauris</h5>
                                        </a>
                                        <span class="product-price">$38.87</span>
                                        <div class="product-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <a class="btn-view-more" title="View More" href="#">View More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="brand-showcase-content-tab" id="showcase-6">
                    <div class="row">
                        <div class="col-xs-12 col-sm-4 trademark-info">
                            <div class="trademark-logo">
                                <a href="#"><img src="{{URL::to('public/asset_client/data/trademark.jpg')}}" alt="trademark"></a>
                            </div>
                            <div class="trademark-desc">
                                Whatever the occasion, complete your outfit with one of Hermes Fashion’s stylish women’s bags. Discover our spring collection.
                            </div>
                            <a href="#" class="trademark-link">shop this brand</a>
                        </div>
                        <div class="col-xs-12 col-sm-8 trademark-product">
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 product-item">
                                    <div class="image-product hover-zoom">
                                        <a href="#"><img class="img-repon" src="{{URL::to('public/asset_client/data/p26.jpg')}}" alt=""></a>
                                    </div>
                                    <div class="info-product">
                                        <a href="#">
                                            <h5>Maecenas consequat mauris</h5>
                                        </a>
                                        <span class="product-price">$38.87</span>
                                        <div class="product-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <a class="btn-view-more" title="View More" href="#">View More</a>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 product-item">
                                    <div class="image-product hover-zoom">
                                        <a href="#"><img class="img-responsive" src="{{URL::to('public/asset_client/data/p27.jpg')}}" alt=""></a>
                                    </div>
                                    <div class="info-product">
                                        <a href="#">
                                            <h5>Maecenas consequat mauris</h5>
                                        </a>
                                        <span class="product-price">$38.87</span>
                                        <div class="product-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <a class="btn-view-more" title="View More" href="#">View More</a>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 product-item">
                                    <div class="image-product hover-zoom">
                                        <a href="#"><img class="img-responsive" src="{{URL::to('public/asset_client/data/p28.jpg')}}" alt=""></a>
                                    </div>
                                    <div class="info-product">
                                        <a href="#">
                                            <h5>Maecenas consequat mauris</h5>
                                        </a>
                                        <span class="product-price">$38.87</span>
                                        <div class="product-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <a class="btn-view-more" title="View More" href="#">View More</a>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 product-item">
                                    <div class="image-product hover-zoom">
                                        <a href="#"><img class="img-responsive" src="{{URL::to('public/asset_client/data/p29.jpg')}}" alt=""></a>
                                    </div>
                                    <div class="info-product">
                                        <a href="#">
                                            <h5>Maecenas consequat mauris</h5>
                                        </a>
                                        <span class="product-price">$38.87</span>
                                        <div class="product-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <a class="btn-view-more" title="View More" href="#">View More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="brand-showcase-content-tab" id="showcase-7">
                    <div class="row">
                        <div class="col-xs-12 col-sm-4 trademark-info">
                            <div class="trademark-logo">
                                <a href="#"><img src="{{URL::to('public/asset_client/data/trademark.jpg')}}" alt="trademark"></a>
                            </div>
                            <div class="trademark-desc">
                                Whatever the occasion, complete your outfit with one of Hermes Fashion’s stylish women’s bags. Discover our spring collection.
                            </div>
                            <a href="#" class="trademark-link">shop this brand</a>
                        </div>
                        <div class="col-xs-12 col-sm-8 trademark-product">
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 product-item">
                                    <div class="image-product hover-zoom">
                                        <a href="#"><img class="img-repon" src="{{URL::to('public/asset_client/data/p30.jpg')}}" alt=""></a>
                                    </div>
                                    <div class="info-product">
                                        <a href="#">
                                            <h5>Maecenas consequat mauris</h5>
                                        </a>
                                        <span class="product-price">$38.87</span>
                                        <div class="product-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <a class="btn-view-more" title="View More" href="#">View More</a>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 product-item">
                                    <div class="image-product hover-zoom">
                                        <a href="#"><img class="img-responsive" src="{{URL::to('public/asset_client/data/p31.jpg')}}" alt=""></a>
                                    </div>
                                    <div class="info-product">
                                        <a href="#">
                                            <h5>Maecenas consequat mauris</h5>
                                        </a>
                                        <span class="product-price">$38.87</span>
                                        <div class="product-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <a class="btn-view-more" title="View More" href="#">View More</a>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 product-item">
                                    <div class="image-product hover-zoom">
                                        <a href="#"><img class="img-responsive" src="{{URL::to('public/asset_client/data/p32.jpg')}}" alt=""></a>
                                    </div>
                                    <div class="info-product">
                                        <a href="#">
                                            <h5>Maecenas consequat mauris</h5>
                                        </a>
                                        <span class="product-price">$38.87</span>
                                        <div class="product-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <a class="btn-view-more" title="View More" href="#">View More</a>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 product-item">
                                    <div class="image-product hover-zoom">
                                        <a href="#"><img class="img-responsive" src="{{URL::to('public/asset_client/data/p15.jpg')}}" alt=""></a>
                                    </div>
                                    <div class="info-product">
                                        <a href="#">
                                            <h5>Maecenas consequat mauris</h5>
                                        </a>
                                        <span class="product-price">$38.87</span>
                                        <div class="product-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <a class="btn-view-more" title="View More" href="#">View More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="brand-showcase-content-tab" id="showcase-8">
                    <div class="row">
                        <div class="col-xs-12 col-sm-4 trademark-info">
                            <div class="trademark-logo">
                                <a href="#"><img src="{{URL::to('public/asset_client/data/trademark.jpg')}}" alt="trademark"></a>
                            </div>
                            <div class="trademark-desc">
                                Whatever the occasion, complete your outfit with one of Hermes Fashion’s stylish women’s bags. Discover our spring collection.
                            </div>
                            <a href="#" class="trademark-link">shop this brand</a>
                        </div>
                        <div class="col-xs-12 col-sm-8 trademark-product">
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 product-item">
                                    <div class="image-product hover-zoom">
                                        <a href="#"><img class="img-repon" src="{{URL::to('public/asset_client/data/p25.jpg')}}" alt=""></a>
                                    </div>
                                    <div class="info-product">
                                        <a href="#">
                                            <h5>Maecenas consequat mauris</h5>
                                        </a>
                                        <span class="product-price">$38.87</span>
                                        <div class="product-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <a class="btn-view-more" title="View More" href="#">View More</a>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 product-item">
                                    <div class="image-product hover-zoom">
                                        <a href="#"><img class="img-responsive" src="{{URL::to('public/asset_client/data/p21.jpg')}}" alt=""></a>
                                    </div>
                                    <div class="info-product">
                                        <a href="#">
                                            <h5>Maecenas consequat mauris</h5>
                                        </a>
                                        <span class="product-price">$38.87</span>
                                        <div class="product-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <a class="btn-view-more" title="View More" href="#">View More</a>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 product-item">
                                    <div class="image-product hover-zoom">
                                        <a href="#"><img class="img-responsive" src="{{URL::to('public/asset_client/data/p10.jpg')}}" alt=""></a>
                                    </div>
                                    <div class="info-product">
                                        <a href="#">
                                            <h5>Maecenas consequat mauris</h5>
                                        </a>
                                        <span class="product-price">$38.87</span>
                                        <div class="product-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <a class="btn-view-more" title="View More" href="#">View More</a>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 product-item">
                                    <div class="image-product hover-zoom">
                                        <a href="#"><img class="img-responsive" src="{{URL::to('public/asset_client/')}}data/p23.jpg" alt=""></a>
                                    </div>
                                    <div class="info-product">
                                        <a href="#">
                                            <h5>Maecenas consequat mauris</h5>
                                        </a>
                                        <span class="product-price">$38.87</span>
                                        <div class="product-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <a class="btn-view-more" title="View More" href="#">View More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="brand-showcase-content-tab" id="showcase-9">
                    <div class="row">
                        <div class="col-xs-12 col-sm-4 trademark-info">
                            <div class="trademark-logo">
                                <a href="#"><img src="{{URL::to('public/asset_client/data/trademark.jpg')}}" alt="trademark"></a>
                            </div>
                            <div class="trademark-desc">
                                Whatever the occasion, complete your outfit with one of Hermes Fashion’s stylish women’s bags. Discover our spring collection.
                            </div>
                            <a href="#" class="trademark-link">shop this brand</a>
                        </div>
                        <div class="col-xs-12 col-sm-8 trademark-product">
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 product-item">
                                    <div class="image-product hover-zoom">
                                        <a href="#"><img class="img-repon" src="{{URL::to('public/asset_client/data/p24.jpg')}}" alt=""></a>
                                    </div>
                                    <div class="info-product">
                                        <a href="#">
                                            <h5>Maecenas consequat mauris</h5>
                                        </a>
                                        <span class="product-price">$38.87</span>
                                        <div class="product-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <a class="btn-view-more" title="View More" href="#">View More</a>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 product-item">
                                    <div class="image-product">
                                        <a href="#"><img class="img-responsive" src="{{URL::to('public/asset_client/data/p14.jpg')}}" alt=""></a>
                                    </div>
                                    <div class="image-product hover-zoom">
                                        <a href="#">
                                            <h5>Maecenas consequat mauris</h5>
                                        </a>
                                        <span class="product-price">$38.87</span>
                                        <div class="product-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <a class="btn-view-more" title="View More" href="#">View More</a>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 product-item">
                                    <div class="image-product hover-zoom">
                                        <a href="#"><img class="img-responsive" src="{{URL::to('public/asset_client/data/p30.jpg')}}" alt=""></a>
                                    </div>
                                    <div class="info-product">
                                        <a href="#">
                                            <h5>Maecenas consequat mauris</h5>
                                        </a>
                                        <span class="product-price">$38.87</span>
                                        <div class="product-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <a class="btn-view-more" title="View More" href="#">View More</a>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 product-item">
                                    <div class="image-product hover-zoom">
                                        <a href="#"><img class="img-responsive" src="{{URL::to('public/asset_client/data/p29.jpg')}}" alt=""></a>
                                    </div>
                                    <div class="info-product">
                                        <a href="#">
                                            <h5>Maecenas consequat mauris</h5>
                                        </a>
                                        <span class="product-price">$38.87</span>
                                        <div class="product-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <a class="btn-view-more" title="View More" href="#">View More</a>
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
<!--end brand showcase-->
<!--hot categories-->
<div id="content-wrap">
    <div class="container">
        <div id="hot-categories" class="row">
            <div class="col-sm-12 group-title-box">
                <h2 class="group-title ">
                    <span>Hot Categories</span>
                </h2>
            </div>
            <?php
            $category_info_menu = DB::table('tbl_ecks_category')
                    ->where('publication_status', 1)
                    ->where('deletion_status', 0)
                    ->where('parent_id', 0)
                    ->get();
            ?>
            @foreach($category_info_menu as $c_info)
            <div class="col-sm-6  col-lg-3 cate-box">
                <div class="cate-tit" >
                    <div class="div-1" style="width: 46%;">
                        <div class="cate-name-wrap">
                            <p class="cate-name">{{$c_info->category_name}}</p>
                        </div>
                        <a href="" class="cate-link link-active" data-ac="flipInX" ><span>shop now</span></a>
                    </div>
                    <div class="div-2" >
                        <a href="#">
                            <img src="{{URL::to('public/asset_client/data/cate-product1.png')}}" alt="" class="hot-cate-img" />
                        </a>
                    </div>

                </div>
                <div class="cate-content">
                    <ul>
                        <?php
                        $sub_category_info_menu = DB::table('tbl_ecks_category')
                                ->where('parent_id', $c_info->category_id)
                                ->where('publication_status', 1)
                                ->where('deletion_status', 0)
                                ->get();
                        ?>
                        @foreach($sub_category_info_menu as $sc_info)
                        <li><a href="#">{{$sc_info->category_name}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div> <!-- /.cate-box -->
            @endforeach
        </div> <!-- /#hot-categories -->

    </div> <!-- /.container -->
</div>
<!--end hot categories-->
@endsection