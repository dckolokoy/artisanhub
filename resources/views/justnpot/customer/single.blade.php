@extends('justnpot.customer-main')
@section('title', 'Home')
@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

  <style>
@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap");
body {
    background-color: #eee;
    font-family: "Poppins", sans-serif
}

.card {
    background-color: #fff;
    padding: 14px;
    border: none
}
#lightSlider li{}

.demo {
    width: 100%
}

ul {
    list-style: none outside none;
    padding-left: 0;
    margin-bottom: 0
}

li {
    display: block;
    float: left;
    margin-right: 6px;
    cursor: pointer
}

img {
    display: block;
    height: auto;
    width: 100%
}

.stars i {
    color: #0D6EFD
}

.stars span {
    font-size: 13px
}

hr {
    color: #d4d4d4
}

.badge {
    padding: 5px !important;
    padding-bottom: 6px !important
}

.badge i {
    font-size: 10px
}

.profile-image {
    width: 35px
}

.comment-ratings i {
    font-size: 13px
}

.username {
    font-size: 12px
}

.comment-profile {
    line-height: 17px
}

.date span {
    font-size: 12px
}

.p-ratings i {
    color: #0D6EFD;
    font-size: 12px
}

.btn-long {
    padding-left: 35px;
    padding-right: 35px
}

.buttons {
    margin-top: 15px
}

.buttons .btn {
    height: 46px
}

.buttons .cart {
    border-color: #ffffff;
    color: white;
    background-color: #0D6EFD !important;
}

.buttons .cart:hover {

    color: #fff
}

.buttons .buy {
    color: #fff;
    background-color: #0D6EFD;
    border-color: #0D6EFD
}

.buttons .buy:focus,
.buy:active {
    color: #fff;
    background-color: #0D6EFD;
    border-color: #0D6EFD;
    box-shadow: none
}

.buttons .buy:hover {
    color: #fff;
    background-color: #0D6EFD;
    border-color: #0D6EFD
}

.buttons .wishlist {
    background-color: #fff;
    border-color: #0D6EFD
}

.buttons .wishlist:hover {
    background-color: #0D6EFD;
    border-color: #0D6EFD;
    color: #fff
}

.buttons .wishlist:hover i {
    color: #fff
}

.buttons .wishlist i {
    color: #0D6EFD
}

.comment-ratings i {
    color: #0D6EFD
}

.followers {
    font-size: 9px;
    color: #d6d4d4
}

.store-image {
    width: 42px
}

.dot {
    height: 10px;
    width: 10px;
    background-color: #bbb;
    border-radius: 50%;
    display: inline-block;
    margin-right: 5px
}

.bullet-text {
    font-size: 12px
}

.my-color {
    margin-top: 10px;
    margin-bottom: 10px
}

label.radio {
    cursor: pointer
}

label.radio input {
    position: absolute;
    top: 0;
    left: 0;
    visibility: hidden;
    pointer-events: none
}

label.radio span {
    border: 2px solid #8f37aa;
    display: inline-block;
    color: #8f37aa;
    border-radius: 50%;
    width: 25px;
    height: 25px;
    text-transform: uppercase;
    transition: 0.5s all
}

label.radio .red {
    background-color: red;
    border-color: red
}

label.radio .blue {
    background-color: blue;
    border-color: blue
}

label.radio .green {
    background-color: green;
    border-color: green
}

label.radio .orange {
    background-color: orange;
    border-color: orange
}

label.radio input:checked+span {
    color: #fff;
    position: relative
}

label.radio input:checked+span::before {
    opacity: 1;
    content: '\2713';
    position: absolute;
    font-size: 13px;
    font-weight: bold;
    left: 4px
}

.card-body {
    padding: 0.3rem 0.3rem 0.2rem
}
.top-content .carousel-control-prev-icon {
    width: 20px;
    height: 20px;
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='%23c593d8' width='3' height='3' viewBox='0 0 8 8'%3e%3cpath d='M5.25 0l-4 4 4 4 1.5-1.5L4.25 4l2.5-2.5L5.25 0z'/%3e%3c/svg%3e");
}
.carousel {
    width: 600px;
  
    min-height: 400px;
  }
.top-content .carousel-control-next-icon {
    width: 20px;
    height: 20px;
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='%23c593d8' width='3' height='3' viewBox='0 0 8 8'%3e%3cpath d='M2.75 0l-1.5 1.5L3.75 4l-2.5 2.5L2.75 8l4-4-4-4z'/%3e%3c/svg%3e");

  </style>

  <div class="">

    <div class="row">
        <!doctype html>
        <html>
            <head>
                <meta charset='utf-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1'>
                <title>Art</title>
                <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css' rel='stylesheet'>
                <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
                <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js'></script>
                <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/lightslider/1.1.6/css/lightslider.min.css" />
                <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" />
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css" />
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/lightslider/1.1.6/js/lightslider.min.js"></script>
                                       </head>
                <body oncontextmenu='return false' class='snippet-body'>
                <link rel='stylesheet' href='https://sachinchoolur.github.io/lightslider/dist/css/lightslider.css'>


<div class="container-fluid  mt-5 mb-3" style="margin-left:200px; min-height: 800px;">
<div class="row no-gutters">
<div class="col-md-2 ml- pr-2">
<div class="card">
<div class="demo">
<div class="top-content">
@if($menu_items->type=='tangible')
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel" style="width:100%;">
  <div class="carousel-inner">
    <div class="carousel-item active">
    <div id="watermark" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%) rotate(-45deg); color: purple  ; opacity: .5; font-size: 28px !important; font-weight: bold; text-shadow: 0px 0px 10px rgba(255,255,255,0.7), 0px 0px 10px rgba(255,255,255,0.7), 0px 0px 10px rgba(255,255,255,0.7), 0px 0px 10px rgba(255,255,255,0.7), 0px 0px 10px rgba(255,255,255,0.7), 0px 0px 10px rgba(255,255,255,0.7), 0px 0px 10px rgba(255,255,255,0.7); display: inline-block; width: 100%; text-align: center;">{{ $menu_items->m_artist }} </div>
 
    <img class="card-img rounded-0 img-fluid" style="  width:  100%;
                            height: 400px;
                            object-fit: cover;"
                            src="{{ asset(''.$menu_items->m_image.'') }}">
    <div class="carousel-caption">
                    <h3>Front View</h3>
</div>
    </div>
    @if(empty($side->s_image))

@else
    <div class="carousel-item">
    <div id="watermark" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%) rotate(-45deg); color: purple  ; opacity: .5; font-size: 28px !important; font-weight: bold; text-shadow: 0px 0px 10px rgba(255,255,255,0.7), 0px 0px 10px rgba(255,255,255,0.7), 0px 0px 10px rgba(255,255,255,0.7), 0px 0px 10px rgba(255,255,255,0.7), 0px 0px 10px rgba(255,255,255,0.7), 0px 0px 10px rgba(255,255,255,0.7), 0px 0px 10px rgba(255,255,255,0.7); display: inline-block; width: 100%; text-align: center;">{{ $menu_items->m_artist }} </div>
 
    <img class="card-img rounded-0 img-fluid" style=" width:  100%;
                            height: 400px;
                            object-fit: cover;"
                            src="{{ asset(''.$side->s_image.'') }}">
    <div class="carousel-caption">
                    <h3>Side View</h3>
</div>
    </div>
   @endif
   @if(empty($back->b_image))

@else
    <div class="carousel-item">
    <div id="watermark" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%) rotate(-45deg); color: purple  ; opacity: .5; font-size: 28px !important; font-weight: bold; text-shadow: 0px 0px 10px rgba(255,255,255,0.7), 0px 0px 10px rgba(255,255,255,0.7), 0px 0px 10px rgba(255,255,255,0.7), 0px 0px 10px rgba(255,255,255,0.7), 0px 0px 10px rgba(255,255,255,0.7), 0px 0px 10px rgba(255,255,255,0.7), 0px 0px 10px rgba(255,255,255,0.7); display: inline-block; width: 100%; text-align: center;">{{ $menu_items->m_artist }} </div>
 
    <img class="card-img rounded-0 img-fluid" style=" width:  100%;
                            height: 400px;
                            object-fit: cover;"
                            src="{{ asset(''.$back->b_image.'') }}">
    <div class="carousel-caption">
                    <h3>Back View</h3>
</div>
    </div>
    @endif
  </div>

  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev" style="color: orange;">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next" style="color: orange;">
    <span class="carousel-control-next-icon" aria-hidden="true" ></span>
    <span class="sr-only">Next</span>
  </a>
  
</div>
@else
<div id="watermark" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%) rotate(-45deg); color: purple  ; opacity: .5; font-size: 28px !important; font-weight: bold; text-shadow: 0px 0px 10px rgba(255,255,255,0.7), 0px 0px 10px rgba(255,255,255,0.7), 0px 0px 10px rgba(255,255,255,0.7), 0px 0px 10px rgba(255,255,255,0.7), 0px 0px 10px rgba(255,255,255,0.7), 0px 0px 10px rgba(255,255,255,0.7), 0px 0px 10px rgba(255,255,255,0.7); display: inline-block; width: 100%; text-align: center;">{{ $menu_items->m_artist }} </div>
 
<img src="{{ asset($menu_items->m_image) }}" /> 
@endif

</div>
</div>
</div>
    
</div>
<div class="col-md-7">
<div class="card">

@if (session('success'))
<div class="alert alert-success">
  {{session('success')}}
</div>
@endif
<div class="about"> <h1>{{ $menu_items->m_name }}</h1></span>
    <h4 class="font-weight-bold">₱ {{ number_format($menu_items->m_price) }}</h4>
</div>
@php
                                            $itemExist = DB::table('transaction_items')
                                           ->select('*')
                                           ->join('transactions','transactions.id','=','transaction_items.transaction_id')
                                           ->where('transaction_items.menu_item_id',$menu_items->m_id)
                                           ->where('transaction_items.user_id', optional(auth()->user())->id)
                                           ->where('transaction_items.status', '!=', 0)
                                           ->where('transaction_items.status', '!=', 2)
                                               ->where('transaction_items.status', '!=', 4)
                                               ->where('transaction_items.status', '!=', 7)
                                           ->get();
                                           $trans = DB::table('transaction_items')
                                           ->select('*')
                                           ->where('transaction_items.menu_item_id',$menu_items->m_id)
                                           ->where('transaction_items.user_id', optional(auth()->user())->id)
                                           ->whereNull('transaction_items.status')
                                           ->get();
                                            if($itemExist != '[]'){
                                                $owned = 1;
                                            }else{
                                                $owned = 0;
                                            }

                                            $sold = DB::table('transaction_items')
                                               ->select('*')
                                               ->join('transactions','transactions.id','=','transaction_items.transaction_id')
                                               ->where('transaction_items.menu_item_id',$menu_items->m_id)
                                      
                                               ->get();

                                            @endphp
<div class="buttons">

    @if (Auth::check())
  
    @if ($itemExist != '[]')
        <button class="btn bg-success text-white btn-long buy">Owned</button>
    @else
    @if ($trans != '[]')
        <button class="btn btn-long buy"  style="background-color: orange;">Added to Cart</button>
    @else
        <a href="/customer/add-solo-cart/{{$menu_items->m_id}}" data-id="{{ $menu_items->m_id }}" class="editbtn">
            <button class="btn btn-primary btn-long buy">Add to Cart</button>
        </a>
    @endif
    @endif

    @else
        <a  href="{{ route('login') }}">
        <button class="btn btn-primary btn-long buy">Add to Cart</button></a>
    @endif




<hr>
<div class="product-description">
       <div class="mt-2"> <span class="font-weight-bold">Description</span>
        <p>{{ $menu_items->m_description }}</p>
    </div>
    <div class="mt-2"> <span class="font-weight-bold">Seller</span> </div>
    <div class="d-flex flex-row align-items-center"> <img src="{{asset('uploads/image_id/'.$menu_items->u_image.'') }}" class="rounded-circle store-image">
        <div class="d-flex flex-column ml-1 comment-profile">
            <div class="comment-ratings"></i> </i> </div> <span class="username">{{ $menu_items->u_name }}</span>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js'></script>
<script src='https://sachinchoolur.github.io/lightslider/dist/js/lightslider.js'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

                <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js'></script>
                <script type='text/javascript' src=''></script>
                <script type='text/javascript' src=''></script>
                <script type='text/Javascript'></script>
                </body>
            </html>
    </div>
  </div>
<script>
    $(document).on('click', '.add-to-cart-btn', function(e) {
    e.preventDefault();
    var menuItemId = $(this).data('id');
    $.ajax({
        type: 'GET',
        url: '/customer/add-solo-cart/' + menuItemId,
        success: function(data) {
            // Change the button text to "Added to Cart"
            $('.add-to-cart-btn[data-id="' + menuItemId + '"]').html('Added to Cart');
        },
        error: function(xhr) {
            // Handle error
        }
    });
   
});
    </script>
    <script type="text/javascript">
  $(document).ready(function(){
    $('.slideshow-container ul').slick({
      dots: false,
      arrows: true,
      prevArrow: '<button type="button" class="slick-prev"></button>',
      nextArrow: '<button type="button" class="slick-next"></button>',
      adaptiveHeight: true,
      infinite: true,
      speed: 500,
      slidesToShow: 1,
      slidesToScroll: 1
    });
  });
</script>

 
    @stop



