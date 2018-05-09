@extends('client.client_master')
@section('menu_main')
<div id="main-menu" class="col-sm-9 main-menu">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="#">MENU</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="{{URL::to('/')}}">Home</a></li>
                    <?php
                    $category_info_menu = DB::table('tbl_ecks_category')
                            ->where('publication_status', 1)
                            ->where('deletion_status', 0)
                            ->where('parent_id', 0)
                            ->get();
                    ?>
                    @foreach($category_info_menu as $c_info)
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{$c_info->category_name}}</a>
                        <ul class="dropdown-menu mega_dropdown" role="menu" style="width: 830px;">
                            <?php
                            $sub_category_info_menu = DB::table('tbl_ecks_category')
                                    ->where('parent_id', $c_info->category_id)
                                    ->where('publication_status', 1)
                                    ->where('deletion_status', 0)
                                    ->get();
                            ?>
                            @foreach($sub_category_info_menu as $sc_info)
                            <!--<option value="{{$sc_info->category_id}}"> --- {{$sc_info->category_name}}</option>-->
                            <li class="block-container col-sm-3">
                                <ul class="block">
                                    <li class="img_container">
                                        <a href="#">
                                            <!--<img class="img-responsive" src="{{$c_info->category_image}}" alt="">-->
                                            <img class="img-responsive" src="{{URL::to('public/asset_client/data/men.png')}}" alt="sport">
                                        </a>
                                    </li>
                                    <li class="link_container group_header">
                                        <a href="{{URL::to('category/'.$sc_info->category_id)}}">{{$sc_info->category_name}}</a>
                                    </li>
                                    <li class="link_container"><a href="#">Skirts</a></li>
                                    <li class="link_container"><a href="#">Jackets</a></li>
                                    <li class="link_container"><a href="#">Tops</a></li>
                                    <li class="link_container"><a href="#">Scarves</a></li>
                                    <li class="link_container"><a href="#">Pants</a></li>
                                </ul>
                            </li>
                            @endforeach                   
                        </ul>
                    </li>
                    <!--<li><a href="{{URL::to('category')}}" class="dropdown-toggle" data-toggle="dropdown">Sports</a></li>-->
                    @endforeach
                    <!--                    <li><a href="{{URL::to('category')}}" class="dropdown-toggle" data-toggle="dropdown">Sports</a></li>
                                        <li class="dropdown">
                                            <a href="{{URL::to('category')}}" class="dropdown-toggle" data-toggle="dropdown">Foods</a>
                                            <ul class="mega_dropdown dropdown-menu" style="width: 830px;">
                                                <li class="block-container col-sm-3">
                                                    <ul class="block">
                                                        <li class="link_container group_header">
                                                            <a href="#">Asian</a>
                                                        </li>
                                                        <li class="link_container">
                                                            <a href="#">Vietnamese Pho</a>
                                                        </li>
                                                        <li class="link_container">
                                                            <a href="#">Noodles</a>
                                                        </li>
                                                        <li class="link_container">
                                                            <a href="#">Seafood</a>
                                                        </li>
                                                        <li class="link_container group_header">
                                                            <a href="#">Sausages</a>
                                                        </li>
                                                        <li class="link_container">
                                                            <a href="#">Meat Dishes</a>
                                                        </li>
                                                        <li class="link_container">
                                                            <a href="#">Desserts</a>
                                                        </li>
                                                        <li class="link_container">
                                                            <a href="#">Tops</a>
                                                        </li>
                                                        <li class="link_container">
                                                            <a href="#">Tops</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="block-container col-sm-3">
                                                    <ul class="block">
                                                        <li class="link_container group_header">
                                                            <a href="#">European</a>
                                                        </li>
                                                        <li class="link_container">
                                                            <a href="#">Greek Potatoes</a>
                                                        </li>
                                                        <li class="link_container">
                                                            <a href="#">Famous Spaghetti</a>
                                                        </li>
                                                        <li class="link_container">
                                                            <a href="#">Famous Spaghetti</a>
                                                        </li>
                                                        <li class="link_container group_header">
                                                            <a href="#">Chicken</a>
                                                        </li>
                                                        <li class="link_container">
                                                            <a href="#">Italian Pizza</a>
                                                        </li>
                                                        <li class="link_container">
                                                            <a href="#">French Cakes</a>
                                                        </li>
                                                        <li class="link_container">
                                                            <a href="#">Tops</a>
                                                        </li>
                                                        <li class="link_container">
                                                            <a href="#">Tops</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="block-container col-sm-3">
                                                    <ul class="block">
                                                        <li class="link_container group_header">
                                                            <a href="#">FAST</a>
                                                        </li>
                                                        <li class="link_container">
                                                            <a href="#">Hamberger</a>
                                                        </li>
                                                        <li class="link_container">
                                                            <a href="#">Pizza</a>
                                                        </li>
                                                        <li class="link_container">
                                                            <a href="#">Noodles</a>
                                                        </li>
                                                        <li class="link_container group_header">
                                                            <a href="#">Sandwich</a>
                                                        </li>
                                                        <li class="link_container">
                                                            <a href="#">Salad</a>
                                                        </li>
                                                        <li class="link_container">
                                                            <a href="#">Paste</a>
                                                        </li>
                                                        <li class="link_container">
                                                            <a href="#">Tops</a>
                                                        </li>
                                                        <li class="link_container">
                                                            <a href="#">Tops</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="block-container col-sm-3">
                                                    <ul class="block">
                                                        <li class="img_container">
                                                            <img src="{{URL::to('public/asset_client/data/banner-topmenu.jpg')}}" alt="Banner">
                                                        </li>
                                                    </ul>
                                                </li>
                    
                                            </ul>
                                        </li>
                                        <li class="dropdown">
                                            <a href="{{URL::to('category')}}" class="dropdown-toggle" data-toggle="dropdown">Digital</a>
                                            <ul class="dropdown-menu container-fluid">
                                                <li class="block-container">
                                                    <ul class="block">
                                                        <li class="link_container"><a href="#">Mobile</a></li>
                                                        <li class="link_container"><a href="#">Tablets</a></li>
                                                        <li class="link_container"><a href="#">Laptop</a></li>
                                                        <li class="link_container"><a href="#">Memory Cards</a></li>
                                                        <li class="link_container"><a href="#">Accessories</a></li>
                                                    </ul>
                                                </li>
                                            </ul> 
                                        </li>
                                        <li><a href="{{URL::to('category')}}">Furniture</a></li>
                                        <li><a href="{{URL::to('category')}}">Jewelry</a></li>
                                        <li><a href="{{URL::to('category')}}">Blog</a></li>-->
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>
</div>
@endsection