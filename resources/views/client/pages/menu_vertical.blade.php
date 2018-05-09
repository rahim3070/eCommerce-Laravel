@extends('client.client_master')
@section('menu_vertical')
<div class="col-sm-3" id="box-vertical-megamenus">
    <div class="box-vertical-megamenus">
        <h4 class="title">
            <span class="title-menu">Categories</span>
            <span class="btn-open-mobile pull-right"><i class="fa fa-bars"></i></span>
        </h4>
        <div class="vertical-menu-content is-home">
            <ul class="vertical-menu-list">
                <?php
                $category_info_menu = DB::table('tbl_ecks_category')
                        ->where('publication_status', 1)
                        ->where('deletion_status', 0)
                        ->where('parent_id', 0)
                        ->get();
                ?>
                @foreach($category_info_menu as $c_info)
                <li>
                    <a class="parent" href="#"><img class="icon-menu" alt="Funky roots" src="{{URL::to('public/asset_client/data/2.png')}}">{{$c_info->category_name}}</a>
                    <div class="vertical-dropdown-menu">
                        <div class="vertical-groups col-sm-12">
                            <?php
                            $sub_category_info_menu = DB::table('tbl_ecks_category')
                                    ->where('parent_id', $c_info->category_id)
                                    ->where('publication_status', 1)
                                    ->where('deletion_status', 0)
                                    ->get();
                            ?>
                            @foreach($sub_category_info_menu as $sc_info)
                            <div class="mega-group col-sm-4">
                                <h4 class="mega-group-header" href="{{URL::to('category/'.$sc_info->category_id)}}"><span>{{$sc_info->category_name}}</span></h4>
                                <ul class="group-link-default">
                                    <li><a href="#">Tennis</a></li>
                                    <li><a href="#">Coats &amp; Jackets</a></li>
                                    <li><a href="#">Blouses &amp; Shirts</a></li>
                                    <li><a href="#">Tops &amp; Tees</a></li>
                                    <li><a href="#">Hoodies &amp; Sweatshirts</a></li>
                                    <li><a href="#">Intimates</a></li>
                                </ul>
                            </div>@endforeach
                            <div class="mega-custom-html col-sm-12">
                                <a href="#"><img src="{{URL::to('public/asset_client/data/banner-megamenu.jpg')}}" alt="Banner"></a>
                            </div>

                        </div>
                    </div>
                </li>
                @endforeach
                <!--                <li><a href="#"><img class="icon-menu" alt="Funky roots" src="{{URL::to('public/asset_client/data/3.png')}}">Smartphone &amp; Tablets</a></li>
                <li><a href="#"><img class="icon-menu" alt="Funky roots" src="{{URL::to('public/asset_client/data/4.png')}}">Health &amp; Beauty Bags</a></li>
                <li>
                    <a class="parent" href="#">
                        <img class="icon-menu" alt="Funky roots" src="{{URL::to('public/asset_client/data/5.png')}}">Shoes &amp; Accessories</a>
                    <div class="vertical-dropdown-menu">
                        <div class="vertical-groups col-sm-12">
                            <div class="mega-group col-sm-12">
                                <h4 class="mega-group-header"><span>Special products</span></h4>
                                <div class="row mega-products">
                                    <div class="col-sm-3 mega-product">
                                        <div class="product-avatar">
                                            <a href="#"><img src="{{URL::to('public/asset_client/data/p10.jpg')}}" alt="product1"></a>
                                        </div>
                                        <div class="product-name">
                                            <a href="#">Fashion hand bag</a>
                                        </div>
                                        <div class="product-price">
                                            <div class="new-price">$38</div>
                                            <div class="old-price">$45</div>
                                        </div>
                                        <div class="product-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-o"></i>
                                        </div>
                                    </div>
                                    <div class="col-sm-3 mega-product">
                                        <div class="product-avatar">
                                            <a href="#"><img src="{{URL::to('public/asset_client/data/p11.jpg')}}" alt="product1"></a>
                                        </div>
                                        <div class="product-name">
                                            <a href="#">Fashion hand bag</a>
                                        </div>
                                        <div class="product-price">
                                            <div class="new-price">$38</div>
                                            <div class="old-price">$45</div>
                                        </div>
                                        <div class="product-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-o"></i>
                                        </div>
                                    </div>
                                    <div class="col-sm-3 mega-product">
                                        <div class="product-avatar">
                                            <a href="#"><img src="{{URL::to('public/asset_client/data/p12.jpg')}}" alt="product1"></a>
                                        </div>
                                        <div class="product-name">
                                            <a href="#">Fashion hand bag</a>
                                        </div>
                                        <div class="product-price">
                                            <div class="new-price">$38</div>
                                            <div class="old-price">$45</div>
                                        </div>
                                        <div class="product-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-o"></i>
                                        </div>
                                    </div>
                                    <div class="col-sm-3 mega-product">
                                        <div class="product-avatar">
                                            <a href="#"><img src="{{URL::to('public/asset_client/data/p13.jpg')}}" alt="product1"></a>
                                        </div>
                                        <div class="product-name">
                                            <a href="#">Fashion hand bag</a>
                                        </div>
                                        <div class="product-price">
                                            <div class="new-price">$38</div>
                                            <div class="old-price">$45</div>
                                        </div>
                                        <div class="product-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-o"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li><a href="#"><img class="icon-menu" alt="Funky roots" src="{{URL::to('public/asset_client/data/6.png')}}">Toys &amp; Hobbies</a></li>
                <li><a href="#"><img class="icon-menu" alt="Funky roots" src="{{URL::to('public/asset_client/data/7.png')}}">Computers &amp; Networking</a></li>
                <li><a href="#"><img class="icon-menu" alt="Funky roots" src="{{URL::to('public/asset_client/data/8.png')}}">Laptops &amp; Accessories</a></li>
                <li><a href="#"><img class="icon-menu" alt="Funky roots" src="{{URL::to('public/asset_client/data/9.png')}}">Jewelry &amp; Watches</a></li>
                <li><a href="#"><img class="icon-menu" alt="Funky roots" src="{{URL::to('public/asset_client/data/10.png')}}">Flashlights &amp; Lamps</a></li>
                <li>
                    <a href="#">
                        <img class="icon-menu" alt="Funky roots" src="{{URL::to('public/asset_client/data/11.png')}}">
                        Cameras &amp; Photo
                    </a>
                </li>
                <li class="cat-link-orther">
                    <a href="#">
                        <img class="icon-menu" alt="Funky roots" src="{{URL::to('public/asset_client/data/5.png')}}">
                        Television
                    </a>
                </li>
                <li class="cat-link-orther">
                    <a href="#">
                        <img class="icon-menu" alt="Funky roots" src="{{URL::to('public/asset_client/data/7.png')}}">Computers &amp; Networking
                    </a>
                </li>
                <li class="cat-link-orther">
                    <a href="#">
                        <img class="icon-menu" alt="Funky roots" src="{{URL::to('public/asset_client/data/6.png')}}">
                        Toys &amp; Hobbies
                    </a>
                </li>
                <li class="cat-link-orther">
                    <a href="#"><img class="icon-menu" alt="Funky roots" src="{{URL::to('public/asset_client/data/9.png')}}">Jewelry &amp; Watches</a></li>-->
            </ul>
            <div class="all-category"><span class="open-cate">All Categories</span></div>
        </div>
    </div>
</div>
@endsection