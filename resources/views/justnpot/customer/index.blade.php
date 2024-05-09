@extends('justnpot.customer-main')
@section('title', 'Home')
@section('content')
{{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}


  <!-- Start Top Nav -->
  {{-- <nav class="navbar navbar-expand-lg bg-dark navbar-light d-none d-lg-block" id="templatemo_nav_top">
    <div class="container text-light">
        <div class="w-100 d-flex justify-content-between">
            <div>
                <i class="fa fa-envelope mx-2"></i>
                <a class="navbar-sm-brand text-light text-decoration-none" href="mailto:info@company.com">info@company.com</a>
                <i class="fa fa-phone mx-2"></i>
                <a class="navbar-sm-brand text-light text-decoration-none" href="tel:010-020-0340">010-020-0340</a>
            </div>
            <div>
                <a class="text-light" href="https://fb.com/templatemo" target="_blank" rel="sponsored"><i class="fab fa-facebook-f fa-sm fa-fw me-2"></i></a>
                <a class="text-light" href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram fa-sm fa-fw me-2"></i></a>
                <a class="text-light" href="https://twitter.com/" target="_blank"><i class="fab fa-twitter fa-sm fa-fw me-2"></i></a>
                <a class="text-light" href="https://www.linkedin.com/" target="_blank"><i class="fab fa-linkedin fa-sm fa-fw"></i></a>
            </div>
        </div>
    </div>
</nav> --}}
<!-- Close Top Nav -->
<style>
        .watermark-wrapper {
  position: relative;
}

/* .watermark1 {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%) rotate(-45deg);
  color: purple;
  opacity: 0.5;
  font-size: 28px !important;
  font-weight: bold;
  text-shadow: 0px 0px 10px rgba(255, 255, 255, 0.7), 0px 0px 10px rgba(255, 255, 255, 0.7), 0px 0px 10px rgba(255, 255, 255, 0.7), 0px 0px 10px rgba(255, 255, 255, 0.7), 0px 0px 10px rgba(255, 255, 255, 0.7), 0px 0px 10px rgba(255, 255, 255, 0.7), 0px 0px 10px rgba(255, 255, 255, 0.7);
  display: inline-block;
  width: 100%;
  text-align: center;
} */
    /* #loading { display: none; } */
    .top-content .carousel-control-prev-icon {
        bottom: -75%;
    width: 20px;
    height: 20px;
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='%23c593d8' width='3' height='3' viewBox='0 0 8 8'%3e%3cpath d='M5.25 0l-4 4 4 4 1.5-1.5L4.25 4l2.5-2.5L5.25 0z'/%3e%3c/svg%3e");
}
.top-content .carousel-control-prev,
.top-content .carousel-control-next{
    position: absolute;
  top: 200px !important;
  height: 50px;
}
.top-content .carousel-control-next-icon {
    bottom: -75%;
    width: 20px;
    height: 20px;
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='%23c593d8' width='3' height='3' viewBox='0 0 8 8'%3e%3cpath d='M2.75 0l-1.5 1.5L3.75 4l-2.5 2.5L2.75 8l4-4-4-4z'/%3e%3c/svg%3e");
}
  </style>

<!-- Header -->
{{-- <nav class="navbar navbar-expand-lg navbar-light shadow">
    <div class="container d-flex justify-content-between align-items-center">

        <a class="navbar-brand text-success logo h1 align-self-center" href="index.html">
            Digital Art
        </a>

        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
            <div class="flex-fill">
                <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.html">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="shop.html">Shop</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.html">Contact</a>
                    </li>
                </ul>
            </div>
            <div class="navbar align-self-center d-flex">
                <div class="d-lg-none flex-sm-fill mt-3 mb-4 col-7 col-sm-auto pr-3">
                    <div class="input-group">
                        <input type="text" class="form-control" id="inputMobileSearch" placeholder="Search ...">
                        <div class="input-group-text">
                            <i class="fa fa-fw fa-search"></i>
                        </div>
                    </div>
                </div>
                <a class="nav-icon d-none d-lg-inline" href="#" data-bs-toggle="modal" data-bs-target="#templatemo_search">
                    <i class="fa fa-fw fa-search text-dark mr-2"></i>
                </a>
                <a class="nav-icon position-relative text-decoration-none" href="#">
                    <i class="fa fa-fw fa-cart-arrow-down text-dark mr-1"></i>
                    <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark">7</span>
                </a>
                <a class="nav-icon position-relative text-decoration-none" href="#">
                    <i class="fa fa-fw fa-user text-dark mr-3"></i>
                    <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark">+99</span>
                </a>
            </div>
        </div>

    </div>
</nav> --}}
<!-- Close Header -->


<!-- Modal -->



<br> <br>
<!-- Start Banner Hero -->
<div id="template-mo-zay-hero-carousel" class="carousel slide" data-bs-ride="carousel">
    {{-- <ol class="carousel-indicators">
        <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="0" class="active"></li>
        <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="1"></li>
        <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="2"></li>
    </ol> --}}

    <div class="carousel-inner">
        <div class="carousel-item active first">

            <div class="container-fluid">
                <div class="row p-5">
                    <div class="col-1">

                    </div>
                    <div class="mx-auto col-md-8 col-lg-5 order-lg-last d-flex justify-content-center" >
                        <img id="carousel_img_height" class="img-fluid second" src="{{ asset('/justnpot/images/menu/main3.jpg')}}" alt="">
                    </div>
                    <div class="col-lg-6 mb-0 d-flex align-items-center">
                        <div class="text-align-left align-self-center" id="context">
                            <h1 class="h1" style="color:black;">ArtisanHub </h1>
                            <h3 class="h2">A Web System for Graphic Artists using sorting and analytics.
                            </h3>
                            <p>
                                Digital art can be purely computer-generated (such as fractals and algorithmic art) or taken from other sources, such as a scanned photograph or an image drawn using vector graphics software using a mouse or graphics tablet. Artworks are considered digital paintings when created similarly to non-digital paintings but using software on a computer platform and digitally outputting the resulting image as painted on canvas.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

      <div class="carousel-item  second">
            <div class="container-fluid">
                <div class="row p-5">
                    <div class="col-1">

                    </div>
                    <div class="mx-auto col-md-8 col-lg-5 order-lg-last d-flex justify-content-center" >
                        <img id="carousel_img_height" class="img-fluid second" src="{{ asset('/justnpot/images/menu/m2.jpeg')}}" alt="">
                    </div>
                    <div class="col-lg-6 mb-0 d-flex align-items-center">
                        <div class="text-align-left align-self-center" id="context">
                            <h1 class="h1" style="color:black;">ArtisanHub </h1>
                            <h3 class="h2">A Web System for Graphic Artists using sorting and analytics.
                            </h3>
                            <p>
                                3D graphics are created via the process of designing imagery from geometric shapes, polygons or NURBS curves[12] to create three-dimensional objects and scenes for use in various media such as film, television, print, rapid prototyping, games/simulations and special visual effects.</div>
                    </div>
                </div>
            </div>
        </div>

       <div class="carousel-item  third">
            <div class="container-fluid">
                <div class="row p-5">
                    <div class="col-1">

                    </div>
                    <div class="mx-auto col-md-8 col-lg-5 order-lg-last d-flex justify-content-center" >
                        <img id="carousel_img_height" class="img-fluid second" src="{{ asset('/justnpot/images/menu/m1.jpeg')}}" alt="">
                    </div>
                    <div class="col-lg-6 mb-0 d-flex align-items-center">
                        <div class="text-align-left align-self-center" id="context">
                            <h1 class="h1" style="color:black;">ArtisanHub </h1>
                            <h3 class="h2">A Web System for Graphic Artists using sorting and analytics.
                            </h3>
                            <p>
                                Digital visual art consists of either 2D visual information displayed on an electronic visual display or information mathematically translated into 3D information, viewed through perspective projection on an electronic visual display. The simplest is 2D computer graphics which reflect how you might draw using a pencil and a piece of paper. In this case, however, the image is on the computer screen and the instrument you draw with might be a tablet stylus or a mouse. </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev text-decoration-none w-auto ps-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="prev">
        <i class="fas fa-chevron-left"></i>
    </a>
    <a class="carousel-control-next text-decoration-none w-auto pe-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="next">
        <i class="fas fa-chevron-right"></i>
    </a>
</div>
<!-- End Banner Hero -->





<!-- Start Featured Product -->
<section class="p-5" style="background-color:rgb(203, 159, 159)">
<div class="top-content">
    <div class="container ">
        <div class="row text-center py-3">
            <div class="col-lg-6 m-auto" >
                <h1 class="h1" id="foos">Products</h1>
            

                <ul class="nav nav-pills mb-3 d-flex justify-content-center" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                      <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Featured</button>
                    </li>
                    {{-- <li class="nav-item" role="presentation">
                      <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Bestseller</button>
                    </li> --}}
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact"  role="tab" aria-controls="pills-contact" aria-selected="false">Latest</button>
                    </li>
                  </ul>

            </div>
        </div>

        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

                <div class="row">

               
@foreach ($data['menu2'] as  $menu2)
                        <div class="col-md-4">
                        @php
                $itemExist = DB::table('transaction_items')
    ->select('*')
    ->join('transactions', 'transactions.id', '=', 'transaction_items.transaction_id')
    ->where('transaction_items.menu_item_id', $menu2->m_id)
    ->where('transaction_items.user_id', optional(auth()->user())->id)
    ->where('transaction_items.status', '!=', 0)
    ->where('transaction_items.status', '!=', 2)
    ->where('transaction_items.status', '!=', 4)
    ->where('transaction_items.status', '!=', 7)
    ->get();

if ($itemExist ->isNotEmpty()) {
    $purchased = true;
 
} else {
    $purchased = false;
 
}

                @endphp
                            <div class="card mb-4 product-wap rounded-0">
                                <div class="card rounded-0">
                                @if($menu2->type=='tangible')'
                        @php
                        $side=DB::table("side_backs")
                        ->select('image as a_image')
                        ->where('side_backs.menu_item_id',$menu2->m_id)
                        ->where('side_backs.side_or_back',0)
                        ->first();
                    
                        $back=DB::table("side_backs")
                        ->select('image as b_image')
                        ->where('side_backs.menu_item_id',$menu2->m_id)
                        ->where('side_backs.side_or_back',1)
                        ->first();
                       
                        @endphp
                                <div id="ez{{$menu2->m_id}}" class="carousel slide" data-ride="carousel">
                           
  <div class="carousel-inner">
    <div class="carousel-item active">
    <img class="card-img rounded-0 img-fluid" style="  width:  100%;
                                  height: 400px;"
                                    src="{{ asset(''.$menu2->image.'') }}">
                                    @if($purchased)
    <div id="watermark" style="display: none;">{{ $menu2->artist }}</div>
@else
    <div id="watermark" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%) rotate(-45deg); color: purple; opacity: .5; font-size: 28px !important; font-weight: bold; text-shadow: 0px 0px 10px rgba(255,255,255,0.7), 0px 0px 10px rgba(255,255,255,0.7), 0px 0px 10px rgba(255,255,255,0.7), 0px 0px 10px rgba(255,255,255,0.7), 0px 0px 10px rgba(255,255,255,0.7), 0px 0px 10px rgba(255,255,255,0.7), 0px 0px 10px rgba(255,255,255,0.7); display: inline-block; width: 100%; text-align: center;">
        {{ $menu2->artist }}
    </div>
@endif
                                    <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-left justify-content-left">
                                        <ul class="list-unstyled">
                                            <li>
                                       
                                                @if (Auth::check())
                                                        @php
                                                      
                                                        $itemExist = DB::table('likes')
                                                    ->select('*')
                                                    ->join('users','users.id','=','likes.user_id')
                                                    ->where('likes.menu_item_id',$menu2->m_id)
                                                    ->where('likes.user_id',auth()->user()->id)
                                                    ->get();
                                                    $like_count = DB::table('likes')
                                    ->where('menu_item_id', $menu2
                                    ->m_id)
                                    ->count();

                                $total_likes1 = $like_count ?? 0;
                                                        if($itemExist != '[]'){
                                                            $liked = 1;
                                                        }else{
                                                            $liked = 0;
                                                        }
                                                        @endphp
                                                        @if ($liked == 1)
                                                            <a class="btn  text-white unlikeBtn" data-id="{{ $menu2->m_id }}" style="background-color: red" href="shop-single.html">
                                                                <i class="far fa-heart"><span style="font-size: 15px !important;">{{ $total_likes1 }}</span></i>
                                                            </a>
                                                        @else
                                                            <a class="btn  btn-success text-white likeBtn"  data-id="{{ $menu2->m_id }}" href="shop-single.html">
                                                                <i class="far fa-heart"><span style="font-size: 15px !important;">{{ $total_likes1 }}</span></i>
                                                            </a>
                                                        @endif
                                                @else
                                                @php
                                                $like_count = DB::table('likes')
                                    ->where('menu_item_id', $menu2
                                    ->m_id)
                                    ->count();
                                    $total_likes1 = $like_count ?? 0;
                                    @endphp
                                                        <a href="{{ route('login') }}" class="btn  btn-success text-white "  href="shop-single.html">
                                                            <i class="far fa-heart"><span style="font-size: 15px !important;">{{ $total_likes1 }}</span></i>
                                                        </a>
                                                @endif

                                        </li>
                                            <li><a class="btn btn-success text-white mt-2" href="/single/{{ $menu2->m_id }}"><i class="far fa-eye"></i></a>

                                            <li>

                                                @php
                                                $itemExist = DB::table('transaction_items')
                                               ->select('*')
                                               ->join('transactions','transactions.id','=','transaction_items.transaction_id')
                                               ->where('transaction_items.menu_item_id',$menu2->m_id)
                                               ->where('transaction_items.user_id', optional(auth()->user())->id)
                                               ->where('transaction_items.status', '!=', 0)
                                               ->where('transaction_items.status', '!=', 2)
                                               ->where('transaction_items.status', '!=', 4)
                                               ->where('transaction_items.status', '!=', 7)
                                               ->get();

                                                if($itemExist != '[]'){
                                                    $owned = 1;
                                                }else{
                                                    $owned = 0;
                                                }

                                     
                                                @endphp
                                                
                                                @if (Auth::check())
                                                        @if ($itemExist  != '[]')

                                                        <a  data-id="{{ $menu2->m_id }}" data-user="{{ $owned }}" class="btn btn-success text-white mt-2 editbtn"><i class="fas fa-cart-plus"></i></a><br>
                                            
                                                    @else
                                                        <a  data-id="{{ $menu2->m_id }}" data-user="{{ $owned }}" class="btn btn-success text-white mt-2 editbtn"><i class="fas fa-cart-plus"></i></a><br>
                                                    @endif
                                                      <a  href="{{ route('chat', ['material_id' => $menu2->m_id, 'store_id' => $menu2->s_id]) }}"  class="btn btn-success text-white mt-2 "><i class="far fa-comment-dots"></i></a>

                                                @else
                                                      <a  href="{{ route('login') }}" class="btn btn-success text-white mt-2 "><i class="fas fa-cart-plus"></i></a>
                                                   
                                                @endif
                                        
                                        </ul>
                                    </div>
    </div>
    <?php if (!empty($side)): ?>
    <div class="carousel-item">
    <img class="card-img rounded-0 img-fluid" style="  width:  100%;
                                     height: 400px;"
                                    src="{{ asset(''.$side->a_image.'') }}">
                                    @if($purchased)
    <div id="watermark" style="display: none;">{{ $menu2->artist }}</div>
@else
    <div id="watermark" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%) rotate(-45deg); color: purple; opacity: .5; font-size: 28px !important; font-weight: bold; text-shadow: 0px 0px 10px rgba(255,255,255,0.7), 0px 0px 10px rgba(255,255,255,0.7), 0px 0px 10px rgba(255,255,255,0.7), 0px 0px 10px rgba(255,255,255,0.7), 0px 0px 10px rgba(255,255,255,0.7), 0px 0px 10px rgba(255,255,255,0.7), 0px 0px 10px rgba(255,255,255,0.7); display: inline-block; width: 100%; text-align: center;">
        {{ $menu2->artist }}
    </div>
@endif
                                    <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-left justify-content-left">
                                        <ul class="list-unstyled">
                                            <li>
                                       
                                                @if (Auth::check())
                                                        @php
                                                      
                                                        $itemExist = DB::table('likes')
                                                    ->select('*')
                                                    ->join('users','users.id','=','likes.user_id')
                                                    ->where('likes.menu_item_id',$menu2->m_id)
                                                    ->where('likes.user_id',auth()->user()->id)
                                                    ->get();
                                                    $like_count = DB::table('likes')
                                    ->where('menu_item_id', $menu2
                                    ->m_id)
                                    ->count();

                                $total_likes1 = $like_count ?? 0;
                                                        if($itemExist != '[]'){
                                                            $liked = 1;
                                                        }else{
                                                            $liked = 0;
                                                        }
                                                        @endphp
                                                        @if ($liked == 1)
                                                            <a class="btn text-white unlikeBtn" data-id="{{ $menu2->m_id }}" style="background-color: red" href="shop-single.html">
                                                                <i class="far fa-heart"><span style="font-size: 15px !important;">{{ $total_likes1 }}</span></i>
                                                            </a>
                                                        @else
                                                            <a class="btn btn-success text-white likeBtn"  data-id="{{ $menu2->m_id }}" href="shop-single.html">
                                                                <i class="far fa-heart"><span style="font-size: 15px !important;">{{ $total_likes1 }}</span></i>
                                                            </a>
                                                        @endif
                                                @else
                                                @php
                                                $like_count = DB::table('likes')
                                    ->where('menu_item_id', $menu2
                                    ->m_id)
                                    ->count();
                                    $total_likes1 = $like_count ?? 0;
                                    @endphp
                                                        <a href="{{ route('login') }}" class="btn  btn-success text-white "  href="shop-single.html">
                                                            <i class="far fa-heart"><span style="font-size: 15px !important;">{{ $total_likes1 }}</span></i>
                                                        </a>
                                                @endif

                                        </li>
                                            <li><a class="btn btn-success text-white mt-2" href="/single/{{ $menu2->m_id }}"><i class="far fa-eye"></i></a>

                                            <li>

                                                @php
                                                $itemExist = DB::table('transaction_items')
                                               ->select('*')
                                               ->join('transactions','transactions.id','=','transaction_items.transaction_id')
                                               ->where('transaction_items.menu_item_id',$menu2->m_id)
                                               ->where('transaction_items.user_id', optional(auth()->user())->id)
                                               ->where('transaction_items.status', '!=', 0)
                                               ->where('transaction_items.status', '!=', 2)
                                               ->where('transaction_items.status', '!=', 4)
                                               ->where('transaction_items.status', '!=', 7)
                                               ->get();

                                                if($itemExist != '[]'){
                                                    $owned = 1;
                                                }else{
                                                    $owned = 0;
                                                }

                                     
                                                @endphp
                                                
                                                @if (Auth::check())
                                                        @if ($itemExist  != '[]')
                                                        <a  data-id="{{ $menu2->m_id }}" data-user="{{ $owned }}" class="btn btn-success text-white mt-2 editbtn"><i class="fas fa-cart-plus"></i></a><br>
                                            
                                                     
                                                    @else
                                                        <a  data-id="{{ $menu2->m_id }}" data-user="{{ $owned }}" class="btn btn-success text-white mt-2 editbtn"><i class="fas fa-cart-plus"></i></a><br>
                                                    @endif
                                                      <a  href="{{ route('chat', ['material_id' => $menu2->m_id, 'store_id' => $menu2->s_id]) }}"  class="btn btn-success text-white mt-2 "><i class="far fa-comment-dots"></i></a>

                                                @else
                                                      <a  href="{{ route('login') }}" class="btn btn-success text-white mt-2 "><i class="fas fa-cart-plus"></i></a>
                                                   
                                                @endif
                                        
                                        </ul>
                                    </div>
    </div>
    <?php endif; ?>
    <?php if (!empty($back)): ?>
    <div class="carousel-item">
    <img class="card-img rounded-0 img-fluid" style="  width:  100%;
                                     height: 400px;"
                                    src="{{ asset(''.$back->b_image.'') }}">
                                    @if($purchased)
    <div id="watermark" style="display: none;">{{ $menu2->artist }}</div>
@else
    <div id="watermark" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%) rotate(-45deg); color: purple; opacity: .5; font-size: 28px !important; font-weight: bold; text-shadow: 0px 0px 10px rgba(255,255,255,0.7), 0px 0px 10px rgba(255,255,255,0.7), 0px 0px 10px rgba(255,255,255,0.7), 0px 0px 10px rgba(255,255,255,0.7), 0px 0px 10px rgba(255,255,255,0.7), 0px 0px 10px rgba(255,255,255,0.7), 0px 0px 10px rgba(255,255,255,0.7); display: inline-block; width: 100%; text-align: center;">
        {{ $menu2->artist }}
    </div>
@endif     <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-left justify-content-left">
                                        <ul class="list-unstyled">
                                            <li>
                                       
                                                @if (Auth::check())
                                                        @php
                                                      
                                                        $itemExist = DB::table('likes')
                                                    ->select('*')
                                                    ->join('users','users.id','=','likes.user_id')
                                                    ->where('likes.menu_item_id',$menu2->m_id)
                                                    ->where('likes.user_id',auth()->user()->id)
                                                    ->get();
                                                    $like_count = DB::table('likes')
                                    ->where('menu_item_id', $menu2
                                    ->m_id)
                                    ->count();

                                $total_likes1 = $like_count ?? 0;
                                                        if($itemExist != '[]'){
                                                            $liked = 1;
                                                        }else{
                                                            $liked = 0;
                                                        }
                                                        @endphp
                                                        @if ($liked == 1)
                                                            <a class="btn  text-white unlikeBtn" data-id="{{ $menu2->m_id }}" style="background-color: red" href="shop-single.html">
                                                                <i class="far fa-heart"><span style="font-size: 15px !important;">{{ $total_likes1 }}</span></i>
                                                            </a>
                                                        @else
                                                            <a class="btn  btn-success text-white likeBtn"  data-id="{{ $menu2->m_id }}" href="shop-single.html">
                                                                <i class="far fa-heart"><span style="font-size: 15px !important;">{{ $total_likes1 }}</span></i>
                                                            </a>
                                                        @endif
                                                @else
                                                @php
                                                $like_count = DB::table('likes')
                                    ->where('menu_item_id', $menu2
                                    ->m_id)
                                    ->count();
                                    $total_likes1 = $like_count ?? 0;
                                    @endphp
                                                        <a href="{{ route('login') }}" class="btn  btn-success text-white "  href="shop-single.html">
                                                            <i class="far fa-heart"><span style="font-size: 15px !important;">{{ $total_likes1 }}</span></i>
                                                        </a>
                                                @endif

                                        </li>
                                            <li><a class="btn btn-success text-white mt-2" href="/single/{{ $menu2->m_id }}"><i class="far fa-eye"></i></a>

                                            <li>

                                                @php
                                                $itemExist = DB::table('transaction_items')
                                               ->select('*')
                                               ->join('transactions','transactions.id','=','transaction_items.transaction_id')
                                               ->where('transaction_items.menu_item_id',$menu2->m_id)
                                               ->where('transaction_items.user_id', optional(auth()->user())->id)
                                               ->where('transaction_items.status', '!=', 0)
                                               ->where('transaction_items.status', '!=', 2)
                                               ->where('transaction_items.status', '!=', 4)
                                               ->where('transaction_items.status', '!=', 7)
                                               ->get();

                                                if($itemExist != '[]'){
                                                    $owned = 1;
                                                }else{
                                                    $owned = 0;
                                                }

                                     
                                                @endphp
                                                
                                                @if (Auth::check())
                                                        @if ($itemExist  != '[]')
                                                        <a  data-id="{{ $menu2->m_id }}" data-user="{{ $owned }}" class="btn btn-success text-white mt-2 editbtn"><i class="fas fa-cart-plus"></i></a><br>
                                            
                                                     
                                                    @else
                                                        <a  data-id="{{ $menu2->m_id }}" data-user="{{ $owned }}" class="btn btn-success text-white mt-2 editbtn"><i class="fas fa-cart-plus"></i></a><br>
                                                    @endif
                                                      <a  href="{{ route('chat', ['material_id' => $menu2->m_id, 'store_id' => $menu2->s_id]) }}"  class="btn btn-success text-white mt-2 "><i class="far fa-comment-dots"></i></a>

                                                @else
                                                      <a  href="{{ route('login') }}" class="btn btn-success text-white mt-2 "><i class="fas fa-cart-plus"></i></a>
                                                   
                                                @endif
                                        
                                        </ul>
                                    </div>
    </div>
    <?php endif; ?>
  </div>

  <a class="carousel-control-prev" href="#ez{{$menu2->m_id}}" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#ez{{$menu2->m_id}}" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>  
@elseif($menu2->type!="tangible")
<img class="card-img rounded-0 mt-4 img-fluid" style="  width:  100%;
                                        height: 400px;"
                                    src="{{ asset(''.$menu2->image.'') }}">
                                    @if($purchased)
    <div id="watermark" style="display: none;">{{ $menu2->artist }}</div>
@else
    <div id="watermark" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%) rotate(-45deg); color: purple; opacity: .5; font-size: 28px !important; font-weight: bold; text-shadow: 0px 0px 10px rgba(255,255,255,0.7), 0px 0px 10px rgba(255,255,255,0.7), 0px 0px 10px rgba(255,255,255,0.7), 0px 0px 10px rgba(255,255,255,0.7), 0px 0px 10px rgba(255,255,255,0.7), 0px 0px 10px rgba(255,255,255,0.7), 0px 0px 10px rgba(255,255,255,0.7); display: inline-block; width: 100%; text-align: center;">
        {{ $menu2->artist }}
    </div>
@endif   <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-left justify-content-left">
                                        <ul class="list-unstyled">
                                            <li>
                                       
                                                @if (Auth::check())
                                                        @php
                                                      
                                                        $itemExist = DB::table('likes')
                                                    ->select('*')
                                                    ->join('users','users.id','=','likes.user_id')
                                                    ->where('likes.menu_item_id',$menu2->m_id)
                                                    ->where('likes.user_id',auth()->user()->id)
                                                    ->get();
                                                    $like_count = DB::table('likes')
                                    ->where('menu_item_id', $menu2
                                    ->m_id)
                                    ->count();

                                $total_likes1 = $like_count ?? 0;
                                                        if($itemExist != '[]'){
                                                            $liked = 1;
                                                        }else{
                                                            $liked = 0;
                                                        }
                                                        @endphp
                                                        @if ($liked == 1)
                                                            <a class="btn  text-white unlikeBtn" data-id="{{ $menu2->m_id }}" style="background-color: red" href="shop-single.html">
                                                                <i class="far fa-heart"><span style="font-size: 15px !important;">{{ $total_likes1 }}</span></i>
                                                            </a>
                                                        @else
                                                            <a class="btn  btn-success text-white likeBtn"  data-id="{{ $menu2->m_id }}" href="shop-single.html">
                                                                <i class="far fa-heart"><span style="font-size: 15px !important;">{{ $total_likes1 }}</span></i>
                                                            </a>
                                                        @endif
                                                @else
                                                @php
                                                $like_count = DB::table('likes')
                                    ->where('menu_item_id', $menu2
                                    ->m_id)
                                    ->count();
                                    $total_likes1 = $like_count ?? 0;
                                    @endphp
                                                        <a href="{{ route('login') }}" class="btn  btn-success text-white "  href="shop-single.html">
                                                            <i class="far fa-heart"><span style="font-size: 15px !important;">{{ $total_likes1 }}</span></i>
                                                        </a>
                                                @endif

                                        </li>
                                            <li><a class="btn btn-success text-white mt-2" href="/single/{{ $menu2->m_id }}"><i class="far fa-eye"></i></a>

                                            <li>

                                                @php
                                                $itemExist = DB::table('transaction_items')
                                               ->select('*')
                                               ->join('transactions','transactions.id','=','transaction_items.transaction_id')
                                               ->where('transaction_items.menu_item_id',$menu2->m_id)
                                               ->where('transaction_items.user_id', optional(auth()->user())->id)
                                               ->where('transaction_items.status', '!=', 0)
                                               ->where('transaction_items.status', '!=', 2)
                                               ->where('transaction_items.status', '!=', 4)
                                               ->where('transaction_items.status', '!=', 7)
                                               ->get();

                                                if($itemExist != '[]'){
                                                    $owned = 1;
                                                }else{
                                                    $owned = 0;
                                                }

                                     
                                                @endphp
                                                
                                                @if (Auth::check())
                                                        @if ($itemExist  != '[]')
                                                        <a  data-id="{{ $menu2->m_id }}" data-user="{{ $owned }}" class="btn btn-success text-white mt-2 editbtn"><i class="fas fa-cart-plus"></i></a><br>
                                            
                                                     
                                                    @else
                                                        <a  data-id="{{ $menu2->m_id }}" data-user="{{ $owned }}" class="btn btn-success text-white mt-2 editbtn"><i class="fas fa-cart-plus"></i></a><br>
                                                    @endif
                                                      <a  href="{{ route('chat', ['material_id' => $menu2->m_id, 'store_id' => $menu2->s_id]) }}"  class="btn btn-success text-white mt-2 "><i class="far fa-comment-dots"></i></a>

                                                @else
                                                      <a  href="{{ route('login') }}" class="btn btn-success text-white mt-2 "><i class="fas fa-cart-plus"></i></a>
                                                   
                                                @endif
                                        
                                        </ul>
                                    </div>
                                    @endif
                                </div>
                             
                                <div class="card-body">
                                    <center>
                                        <span href="shop-single.html" class="h3 text-decoration-none">{{ $menu2->m_name }}</span>
                                        <br>
                                        <span style="font-size:15px !important;">Artist:  <strong>{{ $menu2->artist }}</strong></span>
                                        <br>
                                        <span style="font-size:15px !important;">Category:  <strong>{{ $menu2->c_name }}</strong></span>
                                    </center>
                                    <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">

                                        <li class="pt-2">

                                        </li>
                                    </ul>
                                    <p class="text-center mb-0">₱ {{ number_format($menu2->price) }}</p>
                                    @if (Auth::check())
{{-- here --}}

                              
                                    <ul class="list-unstyled d-flex justify-content-center mb-1">

                                        @if ($itemExist  != '[]')
                                            <div class=" text-white rounded" style="padding-right: 20px;padding-left:20px;">
                                               <br>
                                            </div>
                                       
                                




                                    </ul>
                                    @else
                                    <ul class="list-unstyled d-flex justify-content-center mb-1" style="padding-bottom: 25px;">

                                    </ul>

                                    @endif
{{-- here --}}


                                   @endif


                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            {{-- {{$data['menu2']->links()}} --}}
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">

                <div class="row">

                    @foreach ($data['menu3'] as  $menu3)
                        <div class="col-md-4">
                            <div class="card mb-4 product-wap rounded-0">
                                <div class="card rounded-0">
                                    <img class="card-img rounded-0 img-fluid" style="  width:  100%;
                                    height: 300px;
                                    object-fit: cover;"
                                    src="{{ asset(''.$menu3->image.'') }}">
                                    <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-left justify-content-left">
                                        <ul class="list-unstyled">
                                            <li>
                                                @php
                                                $itemExist = DB::table('likes')
                                               ->select('*')
                                               ->join('users','users.id','=','likes.user_id')
                                               ->where('likes.menu_item_id',$menu3->m_id)
                                               ->where('likes.user_id',auth()->user()->id)
                                               ->get();

                                                if($itemExist != '[]'){
                                                    $liked = 1;
                                                }else{
                                                    $liked = 0;
                                                }
                                                @endphp
                                                @if ($liked == 1)
                                                    <a class="btn  text-white unlikeBtn" data-id="{{ $menu3->m_id }}" style="background-color: red" href="shop-single.html">
                                                        <i class="far fa-heart"></i>
                                                     </a>
                                                @else
                                                    <a class="btn btn-success text-white likeBtn" data-id="{{ $menu3->m_id }}" href="shop-single.html">
                                                        <i class="far fa-heart"></i>
                                                    </a>
                                                @endif


                                            </li>
                                            <li><a class="btn btn-success text-white mt-2" href="/single/{{ $menu3->m_id }}"><i class="far fa-eye"></i></a>

                                            <li>
                                                @php
                                                $itemExist = DB::table('transaction_items')
                                               ->select('*')
                                               ->join('transactions','transactions.id','=','transaction_items.transaction_id')
                                               ->where('transaction_items.menu_item_id',$menu3->m_id)
                                               ->where('transaction_items.user_id', optional(auth()->user())->id)

                                               ->get();

                                                if($itemExist != '[]'){
                                                    $owned = 1;
                                                }else{
                                                    $owned = 0;
                                                }

                                                $sold = DB::table('transaction_items')
                                               ->select('*')
                                               ->join('transactions','transactions.id','=','transaction_items.transaction_id')
                                               ->where('transaction_items.menu_item_id',$menu2->m_id)
                                               ->get();

                                                @endphp

                                                @if (Auth::check())
                                                      <a  data-id="{{ $menu3->m_id }}" class="btn btn-success text-white mt-2 editbtn"><i class="fas fa-cart-plus"></i></a>
                                                      <br>
                                                      <a  href="{{ route('chat', ['material_id' => $menu3->m_id, 'store_id' => $menu3->store_id]) }}"  class="btn btn-success text-white mt-2 "><i class="far fa-comment-dots"></i></a>
                                                      @else
                                                      <a  href="{{ route('login') }}" class="btn btn-success text-white mt-2 "><i class="fas fa-cart-plus"></i></a>
                                                @endif


                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <center>
                                        <span href="shop-single.html" class="h3 text-decoration-none">{{ $menu3->m_name }}</span>
                                        <br>
                                        <span style="font-size:15px !important;">Artist:  <strong>{{ $menu3->artist }}</strong></span>
                                        <br>
                                        <span style="font-size:15px !important;">Category:  <strong>{{ $menu3->c_name }}</strong></span>
                                    </center>
                                    <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">

                                        <li class="pt-2">

                                        </li>
                                    </ul>
                                    <p class="text-center mb-0">₱ {{ number_format($menu3->price) }}</p>
                                    @if (Auth::check())


                                    @if ($sold != '[]')
                                    <ul class="list-unstyled d-flex justify-content-center mb-1">

                                        @if ($itemExist  != '[]')
                                            <div class=" text-white rounded" style="padding-right: 20px;padding-left:20px;background-color:green">
                                                Owned
                                            </div>
                                        @else
                                            <div class=" text-white rounded" style="padding-right: 20px;padding-left:20px;background-color:red">
                                                Sold
                                            </div>
                                        @endif




                                    </ul>
                                @else
                                <ul class="list-unstyled d-flex justify-content-center mb-1" style="padding-bottom: 25px;">

                                </ul>


                                @endif

                                    @endif

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">

                <div class="row">

                    @foreach ($data['menu4'] as  $menu4)
                        <div class="col-md-4">
                        @php
                $itemExist = DB::table('transaction_items')
    ->select('*')
    ->join('transactions', 'transactions.id', '=', 'transaction_items.transaction_id')
    ->where('transaction_items.menu_item_id', $menu4->m_id)
    ->where('transaction_items.user_id', optional(auth()->user())->id)
    ->where('transaction_items.status', '!=', 0)
    ->where('transaction_items.status', '!=', 2)
    ->where('transaction_items.status', '!=', 4)
    ->where('transaction_items.status', '!=', 7)
    ->get();

if ($itemExist ->isNotEmpty()) {
    $purchased = true;
 
} else {
    $purchased = false;
 
}

                @endphp
                            <div class="card mb-4 product-wap rounded-0">
                                <div class="card rounded-0">
                                @if($menu4->type=='tangible')'
                        @php
                        $side=DB::table("side_backs")
                        ->select('image as a_image')
                        ->where('side_backs.menu_item_id',$menu4->m_id)
                        ->where('side_backs.side_or_back',0)
                        ->first();
                    
                        $back=DB::table("side_backs")
                        ->select('image as b_image')
                        ->where('side_backs.menu_item_id',$menu4->m_id)
                        ->where('side_backs.side_or_back',1)
                        ->first();
                       
                        @endphp
                                <div id="ez{{$menu4->m_id}}" class="carousel slide" data-ride="carousel">
                           
  <div class="carousel-inner">
    <div class="carousel-item active">
    <img class="card-img rounded-0 img-fluid" style="  width:  100%;
                                  height: 400px;"
                                    src="{{ asset(''.$menu4->image.'') }}">
                                    @if($purchased)
    <div id="watermark" style="display: none;">{{ $menu4->artist }}</div>
@else
    <div id="watermark" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%) rotate(-45deg); color: purple; opacity: .5; font-size: 28px !important; font-weight: bold; text-shadow: 0px 0px 10px rgba(255,255,255,0.7), 0px 0px 10px rgba(255,255,255,0.7), 0px 0px 10px rgba(255,255,255,0.7), 0px 0px 10px rgba(255,255,255,0.7), 0px 0px 10px rgba(255,255,255,0.7), 0px 0px 10px rgba(255,255,255,0.7), 0px 0px 10px rgba(255,255,255,0.7); display: inline-block; width: 100%; text-align: center;">
        {{ $menu4->artist }}
    </div>
@endif
                                    <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-left justify-content-left">
                                        <ul class="list-unstyled">
                                            <li>
                                       
                                                @if (Auth::check())
                                                        @php
                                                      
                                                        $itemExist = DB::table('likes')
                                                    ->select('*')
                                                    ->join('users','users.id','=','likes.user_id')
                                                    ->where('likes.menu_item_id',$menu4->m_id)
                                                    ->where('likes.user_id',auth()->user()->id)
                                                    ->get();
                                                    $like_count = DB::table('likes')
                                    ->where('menu_item_id', $menu4
                                    ->m_id)
                                    ->count();

                                $total_likes1 = $like_count ?? 0;
                                                        if($itemExist != '[]'){
                                                            $liked = 1;
                                                        }else{
                                                            $liked = 0;
                                                        }
                                                        @endphp
                                                        @if ($liked == 1)
                                                            <a class="btn  text-white unlikeBtn" data-id="{{ $menu4->m_id }}" style="background-color: red" href="shop-single.html">
                                                                <i class="far fa-heart"><span style="font-size: 15px !important;">{{ $total_likes1 }}</span></i>
                                                            </a>
                                                        @else
                                                            <a class="btn  btn-success text-white likeBtn"  data-id="{{ $menu4->m_id }}" href="shop-single.html">
                                                                <i class="far fa-heart"><span style="font-size: 15px !important;">{{ $total_likes1 }}</span></i>
                                                            </a>
                                                        @endif
                                                @else
                                                @php
                                                $like_count = DB::table('likes')
                                    ->where('menu_item_id', $menu4
                                    ->m_id)
                                    ->count();
                                    $total_likes1 = $like_count ?? 0;
                                    @endphp
                                                        <a href="{{ route('login') }}" class="btn  btn-success text-white "  href="shop-single.html">
                                                            <i class="far fa-heart"><span style="font-size: 15px !important;">{{ $total_likes1 }}</span></i>
                                                        </a>
                                                @endif

                                        </li>
                                            <li><a class="btn btn-success text-white mt-2" href="/single/{{ $menu4->m_id }}"><i class="far fa-eye"></i></a>

                                            <li>

                                                @php
                                                $itemExist = DB::table('transaction_items')
                                               ->select('*')
                                               ->join('transactions','transactions.id','=','transaction_items.transaction_id')
                                               ->where('transaction_items.menu_item_id',$menu4->m_id)
                                               ->where('transaction_items.user_id', optional(auth()->user())->id)
                                               ->where('transaction_items.status', '!=', 0)
                                               ->where('transaction_items.status', '!=', 2)
                                               ->where('transaction_items.status', '!=', 4)
                                               ->where('transaction_items.status', '!=', 7)
                                               ->get();

                                                if($itemExist != '[]'){
                                                    $owned = 1;
                                                }else{
                                                    $owned = 0;
                                                }

                                     
                                                @endphp
                                                
                                                @if (Auth::check())
                                                        @if ($itemExist  != '[]')

                                                        <a  data-id="{{ $menu4->m_id }}" data-user="{{ $owned }}" class="btn btn-success text-white mt-2 editbtn"><i class="fas fa-cart-plus"></i></a><br>
                                            
                                                    @else
                                                        <a  data-id="{{ $menu4->m_id }}" data-user="{{ $owned }}" class="btn btn-success text-white mt-2 editbtn"><i class="fas fa-cart-plus"></i></a><br>
                                                    @endif
                                                      <a  href="{{ route('chat', ['material_id' => $menu4->m_id, 'store_id' => $menu4->store_id]) }}"  class="btn btn-success text-white mt-2 "><i class="far fa-comment-dots"></i></a>

                                                @else
                                                      <a  href="{{ route('login') }}" class="btn btn-success text-white mt-2 "><i class="fas fa-cart-plus"></i></a>
                                                   
                                                @endif
                                        
                                        </ul>
                                    </div>
    </div>
    <?php if (!empty($side)): ?>
    <div class="carousel-item">
    <img class="card-img rounded-0 img-fluid" style="  width:  100%;
                                     height: 400px;"
                                    src="{{ asset(''.$side->a_image.'') }}">
                                    @if($purchased)
    <div id="watermark" style="display: none;">{{ $menu4->artist }}</div>
@else
    <div id="watermark" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%) rotate(-45deg); color: purple; opacity: .5; font-size: 28px !important; font-weight: bold; text-shadow: 0px 0px 10px rgba(255,255,255,0.7), 0px 0px 10px rgba(255,255,255,0.7), 0px 0px 10px rgba(255,255,255,0.7), 0px 0px 10px rgba(255,255,255,0.7), 0px 0px 10px rgba(255,255,255,0.7), 0px 0px 10px rgba(255,255,255,0.7), 0px 0px 10px rgba(255,255,255,0.7); display: inline-block; width: 100%; text-align: center;">
        {{ $menu4->artist }}
    </div>
@endif
                                    <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-left justify-content-left">
                                        <ul class="list-unstyled">
                                            <li>
                                       
                                                @if (Auth::check())
                                                        @php
                                                      
                                                        $itemExist = DB::table('likes')
                                                    ->select('*')
                                                    ->join('users','users.id','=','likes.user_id')
                                                    ->where('likes.menu_item_id',$menu4->m_id)
                                                    ->where('likes.user_id',auth()->user()->id)
                                                    ->get();
                                                    $like_count = DB::table('likes')
                                    ->where('menu_item_id', $menu4
                                    ->m_id)
                                    ->count();

                                $total_likes1 = $like_count ?? 0;
                                                        if($itemExist != '[]'){
                                                            $liked = 1;
                                                        }else{
                                                            $liked = 0;
                                                        }
                                                        @endphp
                                                        @if ($liked == 1)
                                                            <a class="btn  text-white unlikeBtn" data-id="{{ $menu4->m_id }}" style="background-color: red" href="shop-single.html">
                                                                <i class="far fa-heart"><span style="font-size: 15px !important;">{{ $total_likes1 }}</span></i>
                                                            </a>
                                                        @else
                                                            <a class="btn  btn-success text-white likeBtn"  data-id="{{ $menu4->m_id }}" href="shop-single.html">
                                                                <i class="far fa-heart"><span style="font-size: 15px !important;">{{ $total_likes1 }}</span></i>
                                                            </a>
                                                        @endif
                                                @else
                                                @php
                                                $like_count = DB::table('likes')
                                    ->where('menu_item_id', $menu4
                                    ->m_id)
                                    ->count();
                                    $total_likes1 = $like_count ?? 0;
                                    @endphp
                                                        <a href="{{ route('login') }}" class="btn  btn-success text-white "  href="shop-single.html">
                                                            <i class="far fa-heart"><span style="font-size: 15px !important;">{{ $total_likes1 }}</span></i>
                                                        </a>
                                                @endif

                                        </li>
                                            <li><a class="btn btn-success text-white mt-2" href="/single/{{ $menu4->m_id }}"><i class="far fa-eye"></i></a>

                                            <li>

                                                @php
                                                $itemExist = DB::table('transaction_items')
                                               ->select('*')
                                               ->join('transactions','transactions.id','=','transaction_items.transaction_id')
                                               ->where('transaction_items.menu_item_id',$menu4->m_id)
                                               ->where('transaction_items.user_id', optional(auth()->user())->id)
                                               ->where('transaction_items.status', '!=', 0)
                                               ->where('transaction_items.status', '!=', 2)
                                               ->where('transaction_items.status', '!=', 4)
                                               ->where('transaction_items.status', '!=', 7)
                                               ->get();

                                                if($itemExist != '[]'){
                                                    $owned = 1;
                                                }else{
                                                    $owned = 0;
                                                }

                                     
                                                @endphp
                                                
                                                @if (Auth::check())
                                                        @if ($itemExist  != '[]')
                                                        <a  data-id="{{ $menu4->m_id }}" data-user="{{ $owned }}" class="btn btn-success text-white mt-2 editbtn"><i class="fas fa-cart-plus"></i></a><br>
                                            
                                                     
                                                    @else
                                                        <a  data-id="{{ $menu4->m_id }}" data-user="{{ $owned }}" class="btn btn-success text-white mt-2 editbtn"><i class="fas fa-cart-plus"></i></a><br>
                                                    @endif
                                                      <a  href="{{ route('chat', ['material_id' => $menu4->m_id, 'store_id' => $menu4->store_id]) }}"  class="btn btn-success text-white mt-2 "><i class="far fa-comment-dots"></i></a>

                                                @else
                                                      <a  href="{{ route('login') }}" class="btn btn-success text-white mt-2 "><i class="fas fa-cart-plus"></i></a>
                                                   
                                                @endif
                                        
                                        </ul>
                                    </div>
    </div>
    <?php endif; ?>
    <?php if (!empty($back)): ?>
    <div class="carousel-item">
    <img class="card-img rounded-0 img-fluid" style="  width:  100%;
                                     height: 400px;"
                                    src="{{ asset(''.$back->b_image.'') }}">
                                    @if($purchased)
    <div id="watermark" style="display: none;">{{ $menu4->artist }}</div>
@else
    <div id="watermark" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%) rotate(-45deg); color: purple; opacity: .5; font-size: 28px !important; font-weight: bold; text-shadow: 0px 0px 10px rgba(255,255,255,0.7), 0px 0px 10px rgba(255,255,255,0.7), 0px 0px 10px rgba(255,255,255,0.7), 0px 0px 10px rgba(255,255,255,0.7), 0px 0px 10px rgba(255,255,255,0.7), 0px 0px 10px rgba(255,255,255,0.7), 0px 0px 10px rgba(255,255,255,0.7); display: inline-block; width: 100%; text-align: center;">
        {{ $menu4->artist }}
    </div>
@endif     <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-left justify-content-left">
                                        <ul class="list-unstyled">
                                            <li>
                                       
                                                @if (Auth::check())
                                                        @php
                                                      
                                                        $itemExist = DB::table('likes')
                                                    ->select('*')
                                                    ->join('users','users.id','=','likes.user_id')
                                                    ->where('likes.menu_item_id',$menu4->m_id)
                                                    ->where('likes.user_id',auth()->user()->id)
                                                    ->get();
                                                    $like_count = DB::table('likes')
                                    ->where('menu_item_id', $menu4
                                    ->m_id)
                                    ->count();

                                $total_likes1 = $like_count ?? 0;
                                                        if($itemExist != '[]'){
                                                            $liked = 1;
                                                        }else{
                                                            $liked = 0;
                                                        }
                                                        @endphp
                                                        @if ($liked == 1)
                                                            <a class="btn  text-white unlikeBtn" data-id="{{ $menu4->m_id }}" style="background-color: red" href="shop-single.html">
                                                                <i class="far fa-heart"><span style="font-size: 15px !important;">{{ $total_likes1 }}</span></i>
                                                            </a>
                                                        @else
                                                            <a class="btn  btn-success text-white likeBtn"  data-id="{{ $menu4->m_id }}" href="shop-single.html">
                                                                <i class="far fa-heart"><span style="font-size: 15px !important;">{{ $total_likes1 }}</span></i>
                                                            </a>
                                                        @endif
                                                @else
                                                @php
                                                $like_count = DB::table('likes')
                                    ->where('menu_item_id', $menu4
                                    ->m_id)
                                    ->count();
                                    $total_likes1 = $like_count ?? 0;
                                    @endphp
                                                        <a href="{{ route('login') }}" class="btn  btn-success text-white "  href="shop-single.html">
                                                            <i class="far fa-heart"><span style="font-size: 15px !important;">{{ $total_likes1 }}</span></i>
                                                        </a>
                                                @endif

                                        </li>
                                            <li><a class="btn btn-success text-white mt-2" href="/single/{{ $menu4->m_id }}"><i class="far fa-eye"></i></a>

                                            <li>

                                                @php
                                                $itemExist = DB::table('transaction_items')
                                               ->select('*')
                                               ->join('transactions','transactions.id','=','transaction_items.transaction_id')
                                               ->where('transaction_items.menu_item_id',$menu4->m_id)
                                               ->where('transaction_items.user_id', optional(auth()->user())->id)
                                               ->where('transaction_items.status', '!=', 0)
                                               ->where('transaction_items.status', '!=', 2)
                                               ->where('transaction_items.status', '!=', 4)
                                               ->where('transaction_items.status', '!=', 7)
                                               ->get();

                                                if($itemExist != '[]'){
                                                    $owned = 1;
                                                }else{
                                                    $owned = 0;
                                                }

                                     
                                                @endphp
                                                
                                                @if (Auth::check())
                                                        @if ($itemExist  != '[]')
                                                        <a  data-id="{{ $menu4->m_id }}" data-user="{{ $owned }}" class="btn btn-success text-white mt-2 editbtn"><i class="fas fa-cart-plus"></i></a><br>
                                            
                                                     
                                                    @else
                                                        <a  data-id="{{ $menu4->m_id }}" data-user="{{ $owned }}" class="btn btn-success text-white mt-2 editbtn"><i class="fas fa-cart-plus"></i></a><br>
                                                    @endif
                                                      <a  href="{{ route('chat', ['material_id' => $menu4->m_id, 'store_id' => $menu4->store_id]) }}"  class="btn btn-success text-white mt-2 "><i class="far fa-comment-dots"></i></a>

                                                @else
                                                      <a  href="{{ route('login') }}" class="btn btn-success text-white mt-2 "><i class="fas fa-cart-plus"></i></a>
                                                   
                                                @endif
                                        
                                        </ul>
                                    </div>
    </div>
    <?php endif; ?>
  </div>

  <a class="carousel-control-prev" href="#ez{{$menu4->m_id}}" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#ez{{$menu4->m_id}}" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>  
@elseif($menu4->type!="tangible")
<img class="card-img rounded-0 mt-4 img-fluid" style="  width:  100%;
                                        height: 400px;"
                                    src="{{ asset(''.$menu4->image.'') }}">
                                    @if($purchased)
    <div id="watermark" style="display: none;">{{ $menu4->artist }}</div>
@else
    <div id="watermark" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%) rotate(-45deg); color: purple; opacity: .5; font-size: 28px !important; font-weight: bold; text-shadow: 0px 0px 10px rgba(255,255,255,0.7), 0px 0px 10px rgba(255,255,255,0.7), 0px 0px 10px rgba(255,255,255,0.7), 0px 0px 10px rgba(255,255,255,0.7), 0px 0px 10px rgba(255,255,255,0.7), 0px 0px 10px rgba(255,255,255,0.7), 0px 0px 10px rgba(255,255,255,0.7); display: inline-block; width: 100%; text-align: center;">
        {{ $menu4->artist }}
    </div>
@endif   <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-left justify-content-left">
                                        <ul class="list-unstyled">
                                            <li>
                                       
                                                @if (Auth::check())
                                                        @php
                                                      
                                                        $itemExist = DB::table('likes')
                                                    ->select('*')
                                                    ->join('users','users.id','=','likes.user_id')
                                                    ->where('likes.menu_item_id',$menu4->m_id)
                                                    ->where('likes.user_id',auth()->user()->id)
                                                    ->get();
                                                    $like_count = DB::table('likes')
                                    ->where('menu_item_id', $menu4
                                    ->m_id)
                                    ->count();

                                $total_likes1 = $like_count ?? 0;
                                                        if($itemExist != '[]'){
                                                            $liked = 1;
                                                        }else{
                                                            $liked = 0;
                                                        }
                                                        @endphp
                                                        @if ($liked == 1)
                                                            <a class="btn  text-white unlikeBtn" data-id="{{ $menu4->m_id }}" style="background-color: red" href="shop-single.html">
                                                                <i class="far fa-heart"><span style="font-size: 15px !important;">{{ $total_likes1 }}</span></i>
                                                            </a>
                                                        @else
                                                            <a class="btn  btn-success text-white likeBtn"  data-id="{{ $menu4->m_id }}" href="shop-single.html">
                                                                <i class="far fa-heart"><span style="font-size: 15px !important;">{{ $total_likes1 }}</span></i>
                                                            </a>
                                                        @endif
                                                @else
                                                @php
                                                $like_count = DB::table('likes')
                                    ->where('menu_item_id', $menu4
                                    ->m_id)
                                    ->count();
                                    $total_likes1 = $like_count ?? 0;
                                    @endphp
                                                        <a href="{{ route('login') }}" class="btn  btn-success text-white "  href="shop-single.html">
                                                            <i class="far fa-heart"><span style="font-size: 15px !important;">{{ $total_likes1 }}</span></i>
                                                        </a>
                                                @endif

                                        </li>
                                            <li><a class="btn btn-success text-white mt-2" href="/single/{{ $menu4->m_id }}"><i class="far fa-eye"></i></a>

                                            <li>

                                                @php
                                                $itemExist = DB::table('transaction_items')
                                               ->select('*')
                                               ->join('transactions','transactions.id','=','transaction_items.transaction_id')
                                               ->where('transaction_items.menu_item_id',$menu4->m_id)
                                               ->where('transaction_items.user_id', optional(auth()->user())->id)
                                               ->where('transaction_items.status', '!=', 0)
                                               ->where('transaction_items.status', '!=', 2)
                                               ->where('transaction_items.status', '!=', 4)
                                               ->where('transaction_items.status', '!=', 7)
                                               ->get();

                                                if($itemExist != '[]'){
                                                    $owned = 1;
                                                }else{
                                                    $owned = 0;
                                                }

                                     
                                                @endphp
                                                
                                                @if (Auth::check())
                                                        @if ($itemExist  != '[]')
                                                        <a  data-id="{{ $menu4->m_id }}" data-user="{{ $owned }}" class="btn btn-success text-white mt-2 editbtn"><i class="fas fa-cart-plus"></i></a><br>
                                            
                                                     
                                                    @else
                                                        <a  data-id="{{ $menu4->m_id }}" data-user="{{ $owned }}" class="btn btn-success text-white mt-2 editbtn"><i class="fas fa-cart-plus"></i></a><br>
                                                    @endif
                                                      <a  href="{{ route('chat', ['material_id' => $menu4->m_id, 'store_id' => $menu4->store_id]) }}"  class="btn btn-success text-white mt-2 "><i class="far fa-comment-dots"></i></a>

                                                @else
                                                      <a  href="{{ route('login') }}" class="btn btn-success text-white mt-2 "><i class="fas fa-cart-plus"></i></a>
                                                   
                                                @endif
                                        
                                        </ul>
                                    </div>
                                    @endif
                                </div>
                             
                                <div class="card-body">
                                    <center>
                                        <span href="shop-single.html" class="h3 text-decoration-none">{{ $menu4->m_name }}</span>
                                        <br>
                                        <span style="font-size:15px !important;">Artist:  <strong>{{ $menu4->artist }}</strong></span>
                                        <br>
                                        <span style="font-size:15px !important;">Category:  <strong>{{ $menu4->c_name }}</strong></span>
                                    </center>
                                    <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">

                                        <li class="pt-2">

                                        </li>
                                    </ul>
                                    <p class="text-center mb-0">₱ {{ number_format($menu4->price) }}</p>
                                    @if (Auth::check())
{{-- here --}}

                              
                                    <ul class="list-unstyled d-flex justify-content-center mb-1">

                                        @if ($itemExist  != '[]')
                                            <div class=" text-white rounded" style="padding-right: 20px;padding-left:20px;">
                                               <br>
                                            </div>
                                       
                                




                                    </ul>
                                    @else
                                    <ul class="list-unstyled d-flex justify-content-center mb-1" style="padding-bottom: 25px;">

                                    </ul>

                                    @endif
{{-- here --}}


                                   @endif


                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>


        </div>
    </div>
                                            </div>
</section>
<!-- End Featured Product -->

<!-- Start Categories of The Month -->
<div class="p-5" style="background-color:rgb(203, 159, 159)">
<section class="container " >
    <div class="row text-center pt-3">
        <div class="col-lg-6 m-auto">
            <h1 class="h11">Artists</h1>
        
        </div>
    </div>
    <div class="row" style="">

        <?php
       $users2 = DB::table('users')
       ->select('users.id', 'users.picture', 'users.name', DB::raw('COUNT(likes.menu_item_id) as total_likes'))
       ->join('menu_items', 'menu_items.user_id', '=', 'users.id')
       ->join('likes', 'likes.menu_item_id', '=', 'menu_items.id')
       ->where('users.role', 2)
       ->groupBy('users.id', 'users.name')
       ->orderByDesc('total_likes')
       ->take(3)
       ->get();

        foreach ($users2 as $user2) {
            ?>
                <div class="col-12 col-md-4 p-5 mt-3">
                  <img src="{{asset('uploads/image_id/'.$user2->picture.'') }}" class="rounded-circle img-fluid border"
                  style="  width: 100%;height: 300px; ">


                    <h5 class="text-center mt-3 mb-3">{{ $user2->name }}</h5>
                    <center>
                        <p class="text-center">
                            <form action="/search-seller/{{ $user2->id }}" method="GET">
                            <button style="height:50px;" class=" btn btn-primary" type="submit">Go to Shop</button>
                        </form>
                    </p>
                    </center>

                </div>
            <?php
        }
        ?>

    </div>
</section>
<!-- End Categories of The Month -->
</div>
{{-- cart modal --}}

                     <!-- Modal -->
                     <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                       <div class="modal-dialog  " role="document">
                         <div class="modal-content">
                           <div class="modal-header">
                             <h5 class="modal-title" id="exampleModalScrollableTitle">Category Information</h5>
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                               <span aria-hidden="true">&times;</span>
                             </button>
                           </div>
                           <div class="modal-body">
                             <form action="/admin/menu-category" method="POST" enctype="multipart/form-data">
                               @csrf

                               <div class="container">

                               <div class="row">
                                    <div class="col-sm">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" name="name" id="name" placeholder="Name" required>
                                    </div>

                                </div>


                                <div class="row">
                                    <div class="col-sm-12">
                                        <label for="description">Description</label>
                                        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                                    </div>
                                </div>
                                <br>

                        </div>

                               <div class="modal-footer">
                                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                 <button type="submit" class="btn btn-primary">Add Category</button>
                               </div>
                               </form>
                           </div>
                         </div>
                       </div>
                     </div>
            {{-- modal --}}

<!-- Button trigger modal -->


  <!-- Modal -->
  <div class="modal fade" tabindex="-1" id="addTocartModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Art Information</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close1"></button>
        </div>
        <div class="modal-body">
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                <ul id="update_msgList"></ul>

                <div id="success_message"></div>
              <div class="card mb-3" style="">

                <div class="row no-gutters">
                  <div class="col-md-4 geeks">
                  <div class="watermark-wrapper">
                  <div class="watermark1"> 
                    <strong><span id="artist2"></span></strong>
                  </div>
                  <img src="" id="imagess" class="card-img" alt="..." style="width: 100%; height: 300px;">
                </div>
                  </div>

                  <div class="col-md-8">

                    <div class="card-body">

                        <div class="card-header">
                            Title: <strong><span id="name2"></span></strong>
                          </div>
                          <input style="display: none" type="text"  name="menu_item_id" id="menu_item_id">
                          {{-- <input style="display: none" type="text"  name="" id="redirect_route" value="/"> --}}
                          <ul class="list-group list-group-flush">
                            <li class="list-group-item">Artist: <strong><span id="artist3"></span></strong></li>
                            <li class="list-group-item">Category: <strong><span id="category2"></span></strong></li>
                            <li class="list-group-item">Price: <strong><span id="price2"></span></strong></li>
                            <li class="list-group-item">Description: <strong><span id="description2"></span></strong></li>
                          </ul>
                    </div>
                  </div>


                </div>
              </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary"  id="close2">Close</button>
            <button type="submit" class="btn btn-primary addToCart" onclick="if (confirm('Add this item to cart?')){return true;}else{event.stopPropagation(); event.preventDefault();};">Add to Cart</button>
          </div>
          </form>
      </div>
    </div>
  </div>
{{-- cart modal --}}
<!-- Start Script -->
<script src="{{ asset('/paint/js/jquery-1.11.0.min.js') }}"></script>
<script src="{{ asset('/paint/js/jquery-migrate-1.2.1.min.js')}}"></script>
<script src="{{ asset('/paint/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('/paint/js/templatemo.js') }}"></script>
<script src="{{ asset('/paint/js/custom.js') }}"></script>
<!-- End Script -->
{{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 --}}

<script>
    $(document).ready(function () {
        var id = 0;
        CheckLiked()

      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

      $('body').on('click', '.editbtn', function () {
        id = $(this).data('id');
        var user = $(this).data('user');
        $('#addTocartModal').modal('show');




           let updateroutes = "/admin/menu-category/"+id;
            $("#updateroute").attr("action", updateroutes);
            CheckItem();
            $.get('/customer/check-item1/'+id, function (data) {

if(data.length > 0){
    

    $('.watermark1').hide();
    
  
}else{

    $('.watermark1').show();
   
}

});

        function CheckItem(){

            if(user > 0) {
                $.get('/customer/check-item/'+id, function (data) {

if(data.length > 0){
    $('.addToCart').prop('disabled', true);
$('.addToCart').text('Already added to Cart')
    $('.addToCart').css('background-color','orange');
}else{
    $('.addToCart').prop('disabled', false);
    $('.addToCart').removeAttr('style');
    $('.addToCart').text('Add to Cart')
}

});
        }else{
            $.get('/customer/check-item/'+id, function (data) {

            if(data.length > 0){
                $('.addToCart').prop('disabled', true);
            $('.addToCart').text('Already added to Cart')
                $('.addToCart').css('background-color','orange');
            }else{
                $('.addToCart').prop('disabled', false);
                $('.addToCart').removeAttr('style');
                $('.addToCart').text('Add to Cart')
            }

            });
        }
        $.get('/customer/check-item1/'+id, function (data) {

if(data.length > 0){
    

    $('.watermark1').hide();
}else{

    $('.watermark1').show();
}

});
        // check if item is existing to cart



        }





// check if item is existing to cart

        $.get('/customer/my-cart/'+id+'/edit', function (data) {
            console.log(data);

        // "global" vars, built using blade
        var flagsUrl = '{{ URL::asset('') }}';

        // img_url = " asset('justnpot/images/menu/admin-2menu-item-image1664806261.png')";

             $("#imagess").attr("src",flagsUrl + data[0].image)
            $('#name2').text(data[0].m_name);
            $('#artist2').text(data[0].artist);
            $('#artist3').text(data[0].artist);
            $('#category2').text(data[0].c_name);
            $('#price2').text(data[0].price);
            $('#description2').text(data[0].m_description);
            $('#menu_item_id').val(data[0].m_id);

         });

        });



      $(document).on('click', '.addToCart', function (e) {
        console.log($('#menu_item_id').val());
                e.preventDefault();
                var data = {
                "_token": "{{ csrf_token() }}",
                'menu_item_id': $('#menu_item_id').val(),

                }


                $.ajaxSetup({
                    headers: {
                              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                              }
                });

                    $.ajax({
                        type: "POST",
                        url: "/customer/my-cart/",
                        data: data,
                        dataType: "json",
                        success: function (response) {

                            if (response.status == 400) {


                            } else {
                                // CheckItem();
                                $('#success_message').show();
                                $('#update_msgList').html("");
                                $('#update_msgList').removeClass('alert alert-danger');
                                $('#success_message').addClass('alert alert-success');
                                $('#success_message').text("Added to Cart Succesfully");

                                setTimeout(function() {
                                    $('#success_message').fadeOut('fast');
                                }, 3000); // <-- time in milliseconds


                                $.get('/customer/check-item/'+id, function (data) {

                                if(data.length > 0){
                                    $('.addToCart').prop('disabled', true);
                                $('.addToCart').text('Already added to Cart')
                                    $('.addToCart').css('background-color','orange');
                                }else{
                                    $('.addToCart').prop('disabled', false);
                                    $('.addToCart').removeAttr('style');
                                    $('.addToCart').text('Add to Cart')
                                }

                                });


                            }
                        }
                    });
              });


              $(document).on('click', '#close1', function (e) {

                $('#success_message').html("");
                $('#success_message').removeClass('alert alert-danger');

            });

            $(document).on('click', '#close2', function (e) {

                $('#addTocartModal').modal('hide')
                $('#success_message').hide();
            });


            function CheckLiked(){
                    var loggedIn = {{ auth()->check() ? 'true' : 'false' }};
                    console.log(loggedIn);

                        $.get('/customer/check-like/'+1, function (data) {
                            console.log(data);
                        if(data.length > 0){
                            $('.addToCart').prop('disabled', true);
                        $('.addToCart').text('Already added to Cart')
                            $('.addToCart').css('background-color','orange');
                        }else{
                            $('.addToCart').prop('disabled', false);
                            $('.addToCart').removeAttr('style');
                            $('.addToCart').text('Add to Cart')
                        }

                        });


                // check if item is existing to cart

                }


                $(document).on('click', '.likeBtn', function (e) {
            menu_id = $(this).data('id');
                e.preventDefault();
                var data = {
                "_token": "{{ csrf_token() }}",
                'menu_id': menu_id,

                }
                $.ajaxSetup({
                    headers: {
                              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                              }
                });
                    $.ajax({
                        type: "POST",
                        url: "/customer/my-like/",
                        data: data,
                        dataType: "json",
                        success: function (response) {
                            console.log(response);
                            if (response.status == 400) {

                            } else {

                                window.location.reload();
                                // $('.likeBtn').removeClass('btn-success');
                                // $('.unlikeBtn').removeClass('btn-success');
                                // $(".likeBtn").css("background-color", "red");
                                // $(".unlikeBtn").css("background-color", "red");


                                // $('.likeBtn').addClass('unlikeBtn');
                                // $('.unlikeBtn').removeClass('likeBtn');

                            }

                        }
                    });
              });

              $(document).on('click', '.unlikeBtn', function (e) {
            menu_id = $(this).data('id');
                e.preventDefault();
                var data = {
                "_token": "{{ csrf_token() }}",
                'menu_id': menu_id,

                }
                console.log(menu_id);
                $.ajaxSetup({
                    headers: {
                              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                              }
                });
                    $.ajax({
                        type: "POST",
                        url: "/customer/my-unlike/",
                        data: data,
                        dataType: "json",
                        success: function (response) {
                            console.log(response);
                            if (response.status == 400) {

                            } else {

                                // $('.likeBtn').removeAttr('style');
                                // $('.unlikeBtn').removeAttr('style');

                                // $('.likeBtn').addClass('btn-success');
                                // $('.unlikeBtn').addClass('btn-success');

                                // $('.unlikeBtn').addClass('likeBtn');
                                // $('.likeBtn').removeClass('unlikeBtn');
                                window.location.reload();
                            }
                        }
                    });
              });
    });



      </script>
{{-- <script type="text/javascript">
    function click (e) {
      if (!e)
        e = window.event;
      if ((e.type && e.type == "contextmenu") || (e.button && e.button == 2) || (e.which && e.which == 3)) {
        if (window.opera)
          window.alert("");
        return false;
      }
    }
    if (document.layers)
      document.captureEvents(Event.MOUSEDOWN);
    document.onmousedown = click;
    document.oncontextmenu = click;
    </script> --}}
    @stop

