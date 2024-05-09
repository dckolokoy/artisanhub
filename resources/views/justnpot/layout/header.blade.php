<!-- Start header -->

<header class="top-navbar" >
    <nav class="navbar navbar-expand-lg navbar-light nav-fixed">
        <div class="container">
            <a class="navbar-brand" href="{{ route('index') }}">
                <img src="{{ asset('justnpot/images/menu/main4.png') }}" alt="" style="width:100px;height:100px"/>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food"
                aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div>

            </div>
            <div class="collapse navbar-collapse" id="navbars-rs-food">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('index') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('shop') }}">Shop</a></li>
                    <!-- <li class="nav-item"><a class="nav-link" href="{{ route('career') }}">Careers</a></li> -->
                    <li class="nav-item"><a class="nav-link" href="{{ route('customer-about') }}">About Us</a></li>
                  
                    </li>
                    @if (Auth::check())
    @if(Request::route()->getName() == 'single.show')
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown-b" data-toggle="dropdown">{{ Auth::user()->name }}</a>
            <div class="dropdown-menu" aria-labelledby="dropdown-b">
                <a class="dropdown-item" href="/acc">Account</a>
                <a class="dropdown-item" href="/transactions">Transactions</a>
                <a class="dropdown-item" href="/logout">Logout</a>
            </div>
        </li>   
    @else
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">{{ Auth::user()->name }}</a>
            <div class="dropdown-menu" aria-labelledby="dropdown-a">
                <a class="dropdown-item" style="color:white;" href="/acc">Account</a>
                <a class="dropdown-item"style="color:white;" href="/transactions">Transactions</a>
                <a class="dropdown-item" style="color:white;" href="/logout">Logout</a>
            </div>
        </li>
    @endif
    <li class="nav-item"><a class="nav-link" href="{{ route('my-carts') }}">Cart</a></li>
    <li class="nav-item">
        <div id="side-menu">
            @include('pages.admin.notification.customer-alert')
        </div>
    </li>
@else
    <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
@endif 

<!-- Add this debug code -->



                    <!--<li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">Blog</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown-a">
                            <a class="dropdown-item" href="blog.html">blog</a>
                            <a class="dropdown-item" href="blog-details.html">blog Single</a>
                        </div>
                    </li> -->
                    <!--<li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li> -->
                </ul>
            </div>
        </div>
    </nav>
</header>



     <!-- Modal -->
     <div class="modal fade" id="presModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollable1Title" aria-hidden="true" >
        <div class="modal-dialog " role="document" >
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalScrollable1Title">Store Notification</h5>
              <button type="button" class="close" data-bs-dismiss="modal"  data-dismiss="modal"  aria-label="Close">
                <span aria-hidden="true">&times;</span>
             </button>
             
            </div>
            <div class="modal-body">
            <form action="" method="POST" enctype="multipart/form-data" id="">
                               @csrf
                               @method('PUT')




                               <div class="row">
                                   <div class="col-12">
                                       <div class=" card-body table-responsive p-0" style="z-index: -99999">
                                         <table id="table_id2" class="table  text-nowrap   " >
                                           <thead class="thead-light thead2">

                                           </thead>
                                           <tbody class="OrderTbody2">

                                           </tbody>

                                         </table>
                                       </div>
                                       <!-- /.card-body -->
                                     </div>
                               </div>


                             <div class="modal-footer">
                                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" data-dismiss="modal" >Close</button>
                                 {{-- <button type="button" name="" class="btn btn-danger"> <a id="printpres" style="text-decoration:none;color:white" href="">Print</a> </button> --}}
                             </div>
                         </form>

            </div>
          </div>
        </div>
      </div>
<!-- End header -->
<script>
const navbar = document.querySelector('.nav-fixed');
window.onscroll = () => {
    if (window.scrollY > 5) {
        navbar.classList.add('nav-active');
    } else {
        navbar.classList.remove('nav-active');
    }
};
</script>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    setInterval(function() {
        $.ajax({
            url: "/customer-side-menu",
            success: function(data) {
                $('#side-menu').html(data);
            }
        });
    }, 1000);
</script>


<script>
    $(document).ready(function () {


      let trans_id = 0;
      $('body').on('click', '.printBtn', function () {
    $('#presModal').modal('show');
     trans_id = $(this).data('id');



     let todayroutes = "/admin/appointment/today/"+trans_id;
        $("#todayroute").attr("action", todayroutes);
         fetch();
        });


      function fetch(){

        $.ajax({
              type: "GET",
              url: "/get-notification",
              dataType: "json",
              success: function (response) {

                  if (response.data != null) {
                        console.log(response);
                      $('.OrderTbody2').html("");
                    //   $('#impression2').text("");
                    $.each(response.data, function (key, item) {
    var url = "{{ route('chat', ['material_id' => ':material_id', 'store_id' => ':store_id']) }}";
    url = url.replace(':material_id', item.c_store_id).replace(':store_id', item.c_store_id);

    $('.OrderTbody2').append('<tr>\
    <td style="font-size:22px; text-align:left;">' + item.name + '</td>\
    <td style="text-align:left;">\
        <a href="#" data-url="' + url + '"\
        data-store-id="' + item.c_store_id + '" style="border-radius: 5px;margin-left:50px;padding:3px;font-size:15px;text-align: right;"  class="btn btn-info viewConversationBtn btn-sm">View Conversation \
        <span class="badge badge-secondary">' + (item.is_read == 0 && item.store_reply != 0  ? 'New' : '') + '</span></a>\
    </td>\
</tr>');
});
                      // getStores(customer_id);
                      $('.viewConversationBtn').on('click', function(e) {
    e.preventDefault();
    var StoreId = $(this).data('store-id');
    // alert(StoreId);

    // Send a POST request to the mark-as-read route
    $.post('{{ route('chat.mark-as-read') }}', {
        store_id: StoreId,
        _token: '{{ csrf_token() }}'
    })
    .done(function () {
        // Update the table row with the is_read field set to 1
        $(e.target).closest('tr').find('.isRead').text('1');
    })
    .fail(function () {
        // Handle the error
    });

    var url = $(this).data('url');
    window.location.href = url;
});


                    }
                  }
            });

      }
    //   $(document).on('click', '.addToCart', function (e) {
    //           e.preventDefault();

    //           var data = {

    //           'menu_id2': $('#menu_id2').val(),
    //           'quantity2': $('#quantity2').val(),
    //           'transaction_id':trans_id,

    //           }
    //           $.ajaxSetup({
    //               headers: {
    //                         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //                         }
    //           });

    //           $.ajax({
    //               type: "POST",
    //               url: "/admin/transaction/temp-today/",
    //               data: data,
    //               dataType: "json",
    //               success: function (response) {
    //                      console.log(response);
    //                   if (response.status == 400) {


    //                   } else {
    //                       fetch();


    //                   }
    //               }
    //           });

    //         });


// ADD

// DELETE
$(document).on('click', '.deleteListBtn', function (e) {
          e.preventDefault();


          var list_id = $(this).val();

          console.log(list_id);
          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });

          $.ajax({
              type: "POST",
              url: "/update-notification/" + list_id,
              dataType: "json",
              success: function (response) {
                       console.log(response);
                  if (response.status == 404) {

                  } else {

                      fetch();

                  }
              }
          });




      });
      // DELETE


    });




</script>

<!-- End header -->
 <br> <br>

