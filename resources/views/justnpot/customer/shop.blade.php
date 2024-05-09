@extends('justnpot.customer-main')
@section('title', 'Home')
@section('content')
  <!-- Start Content -->

  <style>
    .watermark-wrapper {
  position: relative;
}

.watermark {
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
}
    #loading { display: none; }
    .top-content .carousel-control-prev-icon {
        bottom: 75%;
    width: 20px;
    height: 20px;
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='%23c593d8' width='3' height='3' viewBox='0 0 8 8'%3e%3cpath d='M5.25 0l-4 4 4 4 1.5-1.5L4.25 4l2.5-2.5L5.25 0z'/%3e%3c/svg%3e");
}
.carousel-control-prev,
.carousel-control-next{
      top: 200px;
}
.top-content .carousel-control-next-icon {
    bottom: 75%;
    width: 20px;
    height: 20px;
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='%23c593d8' width='3' height='3' viewBox='0 0 8 8'%3e%3cpath d='M2.75 0l-1.5 1.5L3.75 4l-2.5 2.5L2.75 8l4-4-4-4z'/%3e%3c/svg%3e");
}
  </style>
  <div class="container py-5" style="background-color:rgb(230, 252, 255)">
    <div class="row">

        <div class="col-sm-3">
            <div class="d-flex flex-column align-items-stretch flex-shrink-0 bg-white rounded border">

                <div class="p-4">
                <form action="/search" method="GET">
                    <div class="border-bottom pb-2">
                        <div class="row">
                            <div class="col-8">
                                <input  class="form-control" type="text" name="query" value="{{ $query }}">
                  
                            </div>
                            <div class="col-4" >
                                <button style="height:50px;" class=" btn btn-primary" type="submit"><i class="fa fa-search" aria-hidden="true"></i> </button>
                            </div>
                        </div>


                        {{-- <datalist id="datalistOptions">
                            <option value="Trending">
                            <option value="Latest">
                            <option value="Finance & Accounting">
                            <option value="Design & Marketing">
                            <option value="Intro">
                        </datalist> --}}
                    </div>
                    <div class="mb-3 form-check mt-2">
                        <div class="border-bottom">
                            <h5 class='pt-2 pl-0'>Categories</h5>
                            <select class="form-select" aria-label="Default select example" name="sel_category" id="sel_category" >
                                <option class="opt1" value="">Select Category</option>
                                @foreach ($categories as $category )
                                <option {{ ($sel_category == $category->id) ? "selected" : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach


                             </select>
                        </div>
                    </div>

                    <div class="mb-3 form-check">
                        <div class="border-bottom">
                            <h5 class='pl-0'>Artist</h5>
                            <select class="form-select" aria-label="Default select example" name="sel_artist" id="sel_artist" >
                                <option class="opt1" value="">Select Artist</option>
                                @foreach ($artists as $artist)
                                <option {{ ($sel_artist == $artist->artist) ? "selected" : '' }} value="{{ $artist->artist }}">{{ $artist->artist }}</option>
                                @endforeach
                             </select>

                        </div>
                    </div>

               

                    <div class="mb-3 form-check">
                        <div class="border-bottom">
                            <h5 class='pl-0'>Sort By</h5>
                            <div class="mb-2 form-check">
                                <input type="radio" name="optradio" class="form-check-input" value="0" {{ ($sort == 0) ? "checked" : '' }}>
                                <label class="form-check-label" for="exampleCheck1">None</label>
                            </div>
                 
                            <div class="mb-2 form-check">
                                <input type="radio" name="optradio" class="form-check-input" value="1" {{ ($sort == 1) ? "checked" : '' }}>
                                <label class="form-check-label" for="exampleCheck1">Featured</label>
                            </div>
                         
                            <div class="mb-2 form-check">
                                <input type="radio" name="optradio" class="form-check-input" value="2" {{ ($sort == 2) ? "checked" : '' }}>
                                <label class="form-check-label" for="exampleCheck1">A-Z</label>
                            </div>
                            <div class="mb-2 form-check">
                                <input type="radio" name="optradio" class="form-check-input" value="3" {{ ($sort == 3) ? "checked" : '' }}>
                                <label class="form-check-label" for="exampleCheck1">Z-A</label>
                            </div>
                            <div class="mb-2 form-check">
                                <input type="radio" name="optradio" class="form-check-input" value="4" {{ ($sort == 4) ? "checked" : '' }}>
                                <label class="form-check-label" for="exampleCheck1">Latest</label>
                            </div>
                        </div>
                    </div>
                    <!-- <button type="button" onclick="resetForm()">Reset</button>

<script>
function resetForm() {
  document.getElementById("sel_category").selectedIndex = 0;
  document.getElementById("sel_artist").selectedIndex = 0;
  document.querySelectorAll('input[type="radio"]').forEach(radio => radio.checked = false);
}
</script> -->
{{--
                    <div class="mb-3 form-check">
                        <div class="border-bottom">
                            <h5 class='pl-0'>My Purchased</h5>
                            <div class="mb-2 form-check">
                                <input type="radio" name="optradio2" class="form-check-input" value="1" {{ ($owned == 1) ? "checked" : '' }}>
                                <label class="form-check-label" for="exampleCheck1">Owned</label>
                            </div>
                            <div class="mb-2 form-check">
                                <input type="radio" name="optradio2" class="form-check-input" value="2" {{ ($notOwned == 1) ? "checked" : '' }}>
                                <label class="form-check-label" for="exampleCheck1">Not Owned</label>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </form>
        <div class="col-lg-9">
            {{-- <div class="row">
                <div class="col-md-6">
                    <ul class="list-inline shop-top-menu pb-3 pt-1">
                        <li class="list-inline-item">
                            <a class="h3 text-dark text-decoration-none mr-3" href="#">All</a>
                        </li>
                        <li class="list-inline-item">
                            <a class="h3 text-dark text-decoration-none mr-3" href="#">Men's</a>
                        </li>
                        <li class="list-inline-item">
                            <a class="h3 text-dark text-decoration-none" href="#">Women's</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-6 pb-4">
                    <div class="d-flex">
                        <select class="form-control">
                            <option>Featured</option>
                            <option>A to Z</option>
                            <option>Item</option>
                        </select>
                    </div>
                </div>
            </div> --}}

            <div class="row">

               
            @foreach($menu_items as $menu_item)
                
                <div class="col-md-4">
                    <div class="card mb-4 product-wap rounded-0">
                        @if($menu_item->type=='tangible')'
                    @php
                    $side=DB::table("side_backs")
                    ->select('image as a_image')
                    ->where('side_backs.menu_item_id',$menu_item->m_id)
                    ->where('side_backs.side_or_back',0)
                    ->first();
                
                    $back=DB::table("side_backs")
                    ->select('image as b_image')
                    ->where('side_backs.menu_item_id',$menu_item->m_id)
                    ->where('side_backs.side_or_back',1)
                    ->first();
                   
                    @endphp
                    <div class="top-content">
                    <div id="{{$menu_item->m_id}}" class="carousel slide" data-ride="carousel">

<div class="carousel-inner">
<div class="carousel-item active">
  <div class="card rounded-0">
  <div class="card rounded-0">
                            <img class="card-img rounded-0 img-fluid" style="  width:  100%;
                            height: 400px;"
                            src="{{ asset(''.$menu_item->image.'') }}">
                            <div id="watermark" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%) rotate(-45deg); color: purple  ; opacity: .5; font-size: 28px !important; font-weight: bold; text-shadow: 0px 0px 10px rgba(255,255,255,0.7), 0px 0px 10px rgba(255,255,255,0.7), 0px 0px 10px rgba(255,255,255,0.7), 0px 0px 10px rgba(255,255,255,0.7), 0px 0px 10px rgba(255,255,255,0.7), 0px 0px 10px rgba(255,255,255,0.7), 0px 0px 10px rgba(255,255,255,0.7); display: inline-block; width: 100%; text-align: center;">{{ $menu_item->artist }} </div>
  <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-left justify-content-left">
                                <ul class="list-unstyled">
                                    <li>
                                    @if (Auth::check())
                                                @php
                                                    $itemExist = DB::table('likes')
                                                ->select('*')
                                                ->join('users','users.id','=','likes.user_id')
                                                ->where('likes.menu_item_id',$menu_item
                                                ->m_id)
                                                ->where('likes.user_id',auth()->user()->id)
                                                ->get();

                                                    if($itemExist != '[]'){
                                                        $liked = 1;
                                                    }else{
                                                        $liked = 0;
                                                    }
                                                    $total_likes = 0;
                                $like_count = DB::table('likes')
                                ->where('menu_item_id', $menu_item
                                ->m_id)
                                ->count();

                            $total_likes = $like_count ?? 0;
                                                    @endphp
                                                @if ($liked == 1)
                                                    <a class="btn  text-white unlikeBtn" data-id="{{ $menu_item
                                                        ->m_id }}" style="background-color: red; width: 51px;" href="shop-single.html">
                                                        <i class="far fa-heart"><span style="font-size: 15px !important;">{{ $total_likes }}</span></i></a>
                                                     
                                                @else
                                                    <a class="btn  btn-success text-white likeBtn" style=" width: 51px;"  data-id="{{ $menu_item
                                                        ->m_id }}" href="shop-single.html">
                                                        <i class="far fa-heart"><span style="font-size: 15px !important;">{{ $total_likes }}</span></i>
                                                    </a>
                                                @endif
                                        @else
                                                <a href="{{ route('login') }}" class="btn  btn-success text-white "  href="shop-single.html">
                                                    <i class="far fa-heart"></i>
                                                </a>
                                        @endif
                                    </li>
                                    <li><a class="btn btn-success text-white mt-2" href="{{route('single.show', ['id' => $menu_item->m_id])}}"><i class="far fa-eye"></i></a>

                                    <li>
                                        @php
                                        $itemExist = DB::table('transaction_items')
                                       ->select('*')
                                       ->join('transactions','transactions.id','=','transaction_items.transaction_id')
                                       ->where('transaction_items.menu_item_id',$menu_item
                                       ->m_id)
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
                                                    <a  data-id="{{ $menu_item
                                                        ->m_id }}" data-user="{{ $owned }}" class="btn btn-success text-white mt-2 editbtn"><i class="fas fa-cart-plus"></i></a>
                                                    <br>
                                                
                                                @else
                                                    <a  data-id="{{ $menu_item
                                                        ->m_id }}" data-user="{{ $owned }}" class="btn btn-success text-white mt-2 editbtn"><i class="fas fa-cart-plus"></i></a>
                                                    <br>
                                                    @endif

                                              <a  href="{{ route('chat', ['material_id' => $menu_item
                                                ->m_id, 'store_id' => $menu_item
                                                ->store_id]) }}"  class="btn btn-success text-white mt-2 "><i class="far fa-comment-dots"></i></a>

                                        @else
                                              <a  href="{{ route('login') }}" class="btn btn-success text-white mt-2 "><i class="fas fa-cart-plus"></i></a>


                                              @endif

                                        @php
                                     

                                @endphp
                             
                                    </li>
                                </ul>
                            </div>
                        </div>
  </div>
</div>
@if (!empty($side))
<div class="carousel-item">
  <div class="card rounded-0">
  <div class="card rounded-0">
                            <img class="card-img rounded-0 img-fluid" style="  width:  100%;
                            height: 400px;"
                            src="{{ asset(''.$side->a_image.'') }}">
                            <div id="watermark" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%) rotate(-45deg); color: purple  ; opacity: .5; font-size: 28px !important; font-weight: bold; text-shadow: 0px 0px 10px rgba(255,255,255,0.7), 0px 0px 10px rgba(255,255,255,0.7), 0px 0px 10px rgba(255,255,255,0.7), 0px 0px 10px rgba(255,255,255,0.7), 0px 0px 10px rgba(255,255,255,0.7), 0px 0px 10px rgba(255,255,255,0.7), 0px 0px 10px rgba(255,255,255,0.7); display: inline-block; width: 100%; text-align: center;">{{ $menu_item->artist }} </div>
  <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-left justify-content-left">
                                <ul class="list-unstyled">
                                    <li>
                                    @if (Auth::check())
                                                @php
                                                    $itemExist = DB::table('likes')
                                                ->select('*')
                                                ->join('users','users.id','=','likes.user_id')
                                                ->where('likes.menu_item_id',$menu_item
                                                ->m_id)
                                                ->where('likes.user_id',auth()->user()->id)
                                                ->get();

                                                    if($itemExist != '[]'){
                                                        $liked = 1;
                                                    }else{
                                                        $liked = 0;
                                                    }
                                                    $total_likes = 0;
                                $like_count = DB::table('likes')
                                ->where('menu_item_id', $menu_item
                                ->m_id)
                                ->count();

                            $total_likes = $like_count ?? 0;
                                                    @endphp
                                                @if ($liked == 1)
                                                    <a class="btn  text-white unlikeBtn" data-id="{{ $menu_item
                                                        ->m_id }}" style="background-color: red; width: 51px;" href="shop-single.html">
                                                        <i class="far fa-heart"><span style="font-size: 15px !important;">{{ $total_likes }}</span></i></a>
                                                     
                                                @else
                                                    <a class="btn  btn-success text-white likeBtn" style=" width: 51px;"  data-id="{{ $menu_item
                                                        ->m_id }}" href="shop-single.html">
                                                        <i class="far fa-heart"><span style="font-size: 15px !important;">{{ $total_likes }}</span></i>
                                                    </a>
                                                @endif
                                        @else
                                                <a href="{{ route('login') }}" class="btn  btn-success text-white "  href="shop-single.html">
                                                    <i class="far fa-heart"></i>
                                                </a>
                                        @endif
                                    </li>
                                    <li><a class="btn btn-success text-white mt-2" href="{{route('single.show', ['id' => $menu_item->m_id])}}"><i class="far fa-eye"></i></a>

                                    <li>
                                        @php
                                        $itemExist = DB::table('transaction_items')
                                       ->select('*')
                                       ->join('transactions','transactions.id','=','transaction_items.transaction_id')
                                       ->where('transaction_items.menu_item_id',$menu_item
                                       ->m_id)
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
                                                    <a  data-id="{{ $menu_item
                                                        ->m_id }}" data-user="{{ $owned }}" class="btn btn-success text-white mt-2 editbtn"><i class="fas fa-cart-plus"></i></a>
                                                    <br>
                                                
                                                @else
                                                    <a  data-id="{{ $menu_item
                                                        ->m_id }}" data-user="{{ $owned }}" class="btn btn-success text-white mt-2 editbtn"><i class="fas fa-cart-plus"></i></a>
                                                    <br>
                                                    @endif

                                              <a  href="{{ route('chat', ['material_id' => $menu_item
                                                ->m_id, 'store_id' => $menu_item
                                                ->store_id]) }}"  class="btn btn-success text-white mt-2 "><i class="far fa-comment-dots"></i></a>

                                        @else
                                              <a  href="{{ route('login') }}" class="btn btn-success text-white mt-2 "><i class="fas fa-cart-plus"></i></a>


                                              @endif

                                        @php
                                     

                                @endphp
                             
                                    </li>
                                </ul>
                            </div>
                        </div>
  </div>
</div>
@endif
@if (!empty($back))
<div class="carousel-item">
  <div class="card rounded-0">
  <div class="card rounded-0">
                            <img class="card-img rounded-0 img-fluid" style="  width:  100%;
                              height: 400px;"
                            src="{{ asset(''.$back->b_image.'') }}">
                            <div id="watermark" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%) rotate(-45deg); color: purple  ; opacity: .5; font-size: 28px !important; font-weight: bold; text-shadow: 0px 0px 10px rgba(255,255,255,0.7), 0px 0px 10px rgba(255,255,255,0.7), 0px 0px 10px rgba(255,255,255,0.7), 0px 0px 10px rgba(255,255,255,0.7), 0px 0px 10px rgba(255,255,255,0.7), 0px 0px 10px rgba(255,255,255,0.7), 0px 0px 10px rgba(255,255,255,0.7); display: inline-block; width: 100%; text-align: center;">{{ $menu_item->artist }} </div>
  <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-left justify-content-left">
                                <ul class="list-unstyled">
                                    <li>
                                    @if (Auth::check())
                                                @php
                                                    $itemExist = DB::table('likes')
                                                ->select('*')
                                                ->join('users','users.id','=','likes.user_id')
                                                ->where('likes.menu_item_id',$menu_item
                                                ->m_id)
                                                ->where('likes.user_id',auth()->user()->id)
                                                ->get();

                                                    if($itemExist != '[]'){
                                                        $liked = 1;
                                                    }else{
                                                        $liked = 0;
                                                    }
                                                    $total_likes = 0;
                                $like_count = DB::table('likes')
                                ->where('menu_item_id', $menu_item
                                ->m_id)
                                ->count();

                            $total_likes = $like_count ?? 0;
                                                    @endphp
                                                @if ($liked == 1)
                                                    <a class="btn  text-white unlikeBtn" data-id="{{ $menu_item
                                                        ->m_id }}" style="background-color: red; width: 51px;" href="shop-single.html">
                                                        <i class="far fa-heart"><span style="font-size: 15px !important;">{{ $total_likes }}</span></i></a>
                                                     
                                                @else
                                                    <a class="btn  btn-success text-white likeBtn" style=" width: 51px;"  data-id="{{ $menu_item
                                                        ->m_id }}" href="shop-single.html">
                                                        <i class="far fa-heart"><span style="font-size: 15px !important;">{{ $total_likes }}</span></i>
                                                    </a>
                                                @endif
                                        @else
                                                <a href="{{ route('login') }}" class="btn  btn-success text-white "  href="shop-single.html">
                                                    <i class="far fa-heart"></i>
                                                </a>
                                        @endif
                                    </li>
                                    <li><a class="btn btn-success text-white mt-2" href="{{route('single.show', ['id' => $menu_item->m_id])}}"><i class="far fa-eye"></i></a>

                                    <li>
                                        @php
                                        $itemExist = DB::table('transaction_items')
                                       ->select('*')
                                       ->join('transactions','transactions.id','=','transaction_items.transaction_id')
                                       ->where('transaction_items.menu_item_id',$menu_item
                                       ->m_id)
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
                                                    <a  data-id="{{ $menu_item
                                                        ->m_id }}" data-user="{{ $owned }}" class="btn btn-success text-white mt-2 editbtn"><i class="fas fa-cart-plus"></i></a>
                                                    <br>
                                                
                                                @else
                                                    <a  data-id="{{ $menu_item
                                                        ->m_id }}" data-user="{{ $owned }}" class="btn btn-success text-white mt-2 editbtn"><i class="fas fa-cart-plus"></i></a>
                                                    <br>
                                                    @endif

                                              <a  href="{{ route('chat', ['material_id' => $menu_item
                                                ->m_id, 'store_id' => $menu_item
                                                ->store_id]) }}"  class="btn btn-success text-white mt-2 "><i class="far fa-comment-dots"></i></a>

                                        @else
                                              <a  href="{{ route('login') }}" class="btn btn-success text-white mt-2 "><i class="fas fa-cart-plus"></i></a>


                                              @endif

                                        @php
                                     

                                @endphp
                             
                                    </li>
                                </ul>
                            </div>
                        </div>
             
  </div>

</div>
@endif
</div>
<a class="carousel-control-prev" href="#{{$menu_item->m_id}}" role="button" data-slide="prev">
<span class="carousel-control-prev-icon" aria-hidden="true"></span>
<span class="sr-only">Previous</span>
</a>
<a class="carousel-control-next" href="#{{$menu_item->m_id}}" role="button" data-slide="next">
<span class="carousel-control-next-icon" aria-hidden="true"></span>
<span class="sr-only">Next</span>
</a>
</div>
                                              </div>
@else
   
<div class="card rounded-0">
    
                                <img class="card-img mt-4 rounded-0 img-fluid" style="  width:  100%;
                                 height: 400px;"
                                src="{{ asset(''.$menu_item->image.'') }}">
                                <div id="watermark" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%) rotate(-45deg); color: purple  ; opacity: .5; font-size: 28px !important; font-weight: bold; text-shadow: 0px 0px 10px rgba(255,255,255,0.7), 0px 0px 10px rgba(255,255,255,0.7), 0px 0px 10px rgba(255,255,255,0.7), 0px 0px 10px rgba(255,255,255,0.7), 0px 0px 10px rgba(255,255,255,0.7), 0px 0px 10px rgba(255,255,255,0.7), 0px 0px 10px rgba(255,255,255,0.7); display: inline-block; width: 100%; text-align: center;">{{ $menu_item->artist }} </div>
      <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-left justify-content-left">
                                    <ul class="list-unstyled">
                                        <li>
                                        @if (Auth::check())
                                                    @php
                                                        $itemExist = DB::table('likes')
                                                    ->select('*')
                                                    ->join('users','users.id','=','likes.user_id')
                                                    ->where('likes.menu_item_id',$menu_item
                                                    ->m_id)
                                                    ->where('likes.user_id',auth()->user()->id)
                                                    ->get();

                                                        if($itemExist != '[]'){
                                                            $liked = 1;
                                                        }else{
                                                            $liked = 0;
                                                        }
                                                        $total_likes = 0;
                                    $like_count = DB::table('likes')
                                    ->where('menu_item_id', $menu_item
                                    ->m_id)
                                    ->count();

                                $total_likes = $like_count ?? 0;
                                                        @endphp
                                                    @if ($liked == 1)
                                                        <a class="btn  text-white unlikeBtn" data-id="{{ $menu_item
                                                            ->m_id }}" style="background-color: red; width: 51px;" href="shop-single.html">
                                                            <i class="far fa-heart"><span style="font-size: 15px !important;">{{ $total_likes }}</span></i></a>
                                                         
                                                    @else
                                                        <a class="btn  btn-success text-white likeBtn" style=" width: 51px;"  data-id="{{ $menu_item
                                                            ->m_id }}" href="shop-single.html">
                                                            <i class="far fa-heart"><span style="font-size: 15px !important;">{{ $total_likes }}</span></i>
                                                        </a>
                                                    @endif
                                            @else
                                                    <a href="{{ route('login') }}" class="btn  btn-success text-white "  href="shop-single.html">
                                                        <i class="far fa-heart"></i>
                                                    </a>
                                            @endif
                                        </li>
                                        <li><a class="btn btn-success text-white mt-2" href="{{route('single.show', ['id' => $menu_item->m_id])}}"><i class="far fa-eye"></i></a>

                                        <li>
                                            @php
                                            $itemExist = DB::table('transaction_items')
                                           ->select('*')
                                           ->join('transactions','transactions.id','=','transaction_items.transaction_id')
                                           ->where('transaction_items.menu_item_id',$menu_item
                                           ->m_id)
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
                                                        <a  data-id="{{ $menu_item
                                                            ->m_id }}" data-user="{{ $owned }}" class="btn btn-success text-white mt-2 editbtn"><i class="fas fa-cart-plus"></i></a>
                                                        <br>
                                                    
                                                    @else
                                                        <a  data-id="{{ $menu_item
                                                            ->m_id }}" data-user="{{ $owned }}" class="btn btn-success text-white mt-2 editbtn"><i class="fas fa-cart-plus"></i></a>
                                                        <br>
                                                        @endif

                                                  <a  href="{{ route('chat', ['material_id' => $menu_item
                                                    ->m_id, 'store_id' => $menu_item
                                                    ->store_id]) }}"  class="btn btn-success text-white mt-2 "><i class="far fa-comment-dots"></i></a>

                                            @else
                                                  <a  href="{{ route('login') }}" class="btn btn-success text-white mt-2 "><i class="fas fa-cart-plus"></i></a>


                                                  @endif

                                            @php
                                         

                                    @endphp
                                 
                                        </li>
                                    </ul>
                                </div>
                            </div>
@endif
                        <div class="card-body">
                            <center>
                                <span href="shop-single.html" class="h3 text-decoration-none">{{ $menu_item->m_name }}</span>
                                <br>
                                <span style="font-size:15px !important;">Artist:  <strong>{{ $menu_item->artist }}</strong></span>
                                <br>
                                <span style="font-size:15px !important;">Category:  <strong>{{ $menu_item->c_name }}</strong></span>
                            </center>
                            <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">

                                <li class="pt-2">

                                </li>
                            </ul>
                            <p class="text-center mb-0">₱ {{ number_format($menu_item->price) }}</p>
                            @if (Auth::check())


                            <ul class="list-unstyled d-flex justify-content-center mb-1" style="padding-bottom: 25px;">

</ul>
                            @else
                            <ul class="list-unstyled d-flex justify-content-center mb-1" style="padding-bottom: 25px;">

                            </ul>

                       
{{-- here --}}


                            @endif

                        </div>
                    </div>
                </div>
            @endforeach
            </div>


            {{ $menu_items->appends(request()->query())->links() }}

        </div>

    </div>
</div>



  <!-- Modal -->
  <div class="modal fade" tabindex="-1" id="addTocartModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Art Information</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close1"></button>
      </div>
      <div class="modal-body">
        <div id="loading">
          Loading...
        </div>
        <form action="" method="POST" enctype="multipart/form-data">
          @csrf
          <ul id="update_msgList"></ul>
          <div id="success_message"></div>
          <div class="card mb-3" style="">
            <div class="row no-gutters">
              <div class="col-md-4 geeks">
                <div class="watermark-wrapper">
                  <div class="watermark"> 
                    <strong><span id="artist3"></span></strong>
                  </div>
                  <img src="" id="imagess" class="card-img" alt="..." style="width: 100%; height: 300px;">
                </div>
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <div class="card-header">
                    Title: <strong><span id="name2"></span></strong>
                  </div>
                  <input style="display: none" type="text" name="menu_item_id" id="menu_item_id">
                  {{-- <input style="display: none" type="text" name="" id="redirect_route" value="/"> --}}
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item">Artist: <strong><span id="artist2"></span></strong></li>
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
        <button type="button" class="btn btn-secondary" id="close2">Close</button>
        <button type="submit" class="btn btn-primary addToCart" onclick="if (confirm('Add this item to cart?')){return true;}else{event.stopPropagation(); event.preventDefault();};">Add to Cart</button>
      </div>
      </form>
    </div>
  </div>
</div>
{{-- cart modal --}}
<!-- End Content -->

<!-- Start Brands -->
{{-- <section class="bg-light py-5">
    <div class="container my-4">
        <div class="row text-center py-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">Our Brands</h1>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    Lorem ipsum dolor sit amet.
                </p>
            </div>
            <div class="col-lg-9 m-auto tempaltemo-carousel">
                <div class="row d-flex flex-row">
                    <!--Controls-->
                    <div class="col-1 align-self-center">
                        <a class="h1" href="#multi-item-example" role="button" data-bs-slide="prev">
                            <i class="text-light fas fa-chevron-left"></i>
                        </a>
                    </div>
                    <!--End Controls-->

                    <!--Carousel Wrapper-->
                    <div class="col">
                        <div class="carousel slide carousel-multi-item pt-2 pt-md-0" id="multi-item-example" data-bs-ride="carousel">
                            <!--Slides-->
                            <div class="carousel-inner product-links-wap" role="listbox">

                                <!--First slide-->
                                <div class="carousel-item active">
                                    <div class="row">
                                        <div class="col-3 p-md-5">
                                            <a href="#"><img class="img-fluid brand-img" src="{{ asset('/paint/img/brand_01.png') }}" alt="Brand Logo"></a>
                                        </div>
                                        <div class="col-3 p-md-5">
                                            <a href="#"><img class="img-fluid brand-img" src="{{ asset('/paint/img/brand_02.png') }}" alt="Brand Logo"></a>
                                        </div>
                                        <div class="col-3 p-md-5">
                                            <a href="#"><img class="img-fluid brand-img" src="{{ asset('/paint/img/brand_03.png') }}" alt="Brand Logo"></a>
                                        </div>
                                        <div class="col-3 p-md-5">
                                            <a href="#"><img class="img-fluid brand-img" src="{{ asset('/paint/img/brand_04.png') }}" alt="Brand Logo"></a>
                                        </div>
                                    </div>
                                </div>
                                <!--End First slide-->

                                <!--Second slide-->
                                <div class="carousel-item">
                                    <div class="row">
                                        <div class="col-3 p-md-5">
                                            <a href="#"><img class="img-fluid brand-img" src="{{ asset('/paint/img/brand_01.png') }}" alt="Brand Logo"></a>
                                        </div>
                                        <div class="col-3 p-md-5">
                                            <a href="#"><img class="img-fluid brand-img" src="{{ asset('/paint/img/brand_02.png') }}" alt="Brand Logo"></a>
                                        </div>
                                        <div class="col-3 p-md-5">
                                            <a href="#"><img class="img-fluid brand-img" src="{{ asset('/paint/img/brand_03.png') }}" alt="Brand Logo"></a>
                                        </div>
                                        <div class="col-3 p-md-5">
                                            <a href="#"><img class="img-fluid brand-img" src="{{ asset('/paint/img/brand_04.png') }}" alt="Brand Logo"></a>
                                        </div>
                                    </div>
                                </div>
                                <!--End Second slide-->

                                <!--Third slide-->
                                <div class="carousel-item">
                                    <div class="row">
                                        <div class="col-3 p-md-5">
                                            <a href="#"><img class="img-fluid brand-img" src="assets/img/brand_01.png" alt="Brand Logo"></a>
                                        </div>
                                        <div class="col-3 p-md-5">
                                            <a href="#"><img class="img-fluid brand-img" src="assets/img/brand_02.png" alt="Brand Logo"></a>
                                        </div>
                                        <div class="col-3 p-md-5">
                                            <a href="#"><img class="img-fluid brand-img" src="assets/img/brand_03.png" alt="Brand Logo"></a>
                                        </div>
                                        <div class="col-3 p-md-5">
                                            <a href="#"><img class="img-fluid brand-img" src="assets/img/brand_04.png" alt="Brand Logo"></a>
                                        </div>
                                    </div>
                                </div>
                                <!--End Third slide-->

                            </div>
                            <!--End Slides-->
                        </div>
                    </div>
                    <!--End Carousel Wrapper-->

                    <!--Controls-->
                    <div class="col-1 align-self-center">
                        <a class="h1" href="#multi-item-example" role="button" data-bs-slide="next">
                            <i class="text-light fas fa-chevron-right"></i>
                        </a>
                    </div>
                    <!--End Controls-->
                </div>
            </div>
        </div>
    </div>
</section> --}}
<!--End Brands-->
<script src="{{ asset('/paint/js/jquery-1.11.0.min.js') }}"></script>
<script src="{{ asset('/paint/js/jquery-migrate-1.2.1.min.js')}}"></script>
<script src="{{ asset('/paint/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('/paint/js/templatemo.js') }}"></script>
<script src="{{ asset('/paint/js/custom.js') }}"></script>



<script>
    $(document).ready(function () {

        $(document).ajaxStart(function() {
  $("#loading").show();
}).ajaxStop(function() {
  $("#loading").hide();
});

        var id = 0;


      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });


      $('body').on('click', '.editbtn', function () {

                $(document).ajaxStart(function () {
                $("#loading").show();
                }).ajaxStop(function () {
                    $("#loading").hide();

                });


                id = $(this).data('id');
                var user = $(this).data('user');
                $('#addTocartModal').modal('show');




                let updateroutes = "/admin/menu-category/"+id;
                    $("#updateroute").attr("action", updateroutes);
                    CheckItem();

                function CheckItem(){

                //     if(user > 0) {
                //     console.log(user);
                // $('.addToCart').prop('disabled', true);
                // $('.addToCart').text('Owned')

                // $('.addToCart').css('background-color','green');
                // }else{
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
                // }

                // check if item is existing to cart

                }




        // check if item is existing to cart
                $.get('/customer/my-cart/'+id+'/edit', function (data) {


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
                        console.log(data[0]);
                });

    });
      $(document).on('click', '.addToCart', function (e) {
        // return confirm('Are you sure?');
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


                                // $('.likeBtn').removeClass('btn-success');
                                // $('.unlikeBtn').removeClass('btn-success');
                                // $(".likeBtn").css("background-color", "red");
                                // $(".unlikeBtn").css("background-color", "red");


                                // $('.likeBtn').addClass('unlikeBtn');
                                // $('.unlikeBtn').removeClass('likeBtn');
                                window.location.reload();
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
      <script type="text/javascript">
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
        </script>
    @stop



