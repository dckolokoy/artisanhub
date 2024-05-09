@extends('layouts.member')

@section('nav')

{{-- @if ($errors->any())

@endif --}}
<nav class="main-header  navbar-expand navbar-white navbar-light " style="padding: 5px !important;z-index: 1">
  <!-- Left navbar links -->
     <div class="row mx-0">
          <div class="col-sm-1">
            <a class="nav-link " data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars" style="color: gray"></i></a>
          </div>

          <div class="col-sm-5">
            <h4 style="font-weight: bold" class="mt-1">Chat</h4>
          </div>

          <div class="col-sm-3">
            <div class="input-group input-group-sm" >



            </div>
          </div>

          <div class="col-sm-3">
            {{-- modal --}}
               <!-- Button trigger modal -->





        </div>
     </div>




    <!-- <li class="nav-item d-none d-sm-inline-block">
      <a href="../../index3.html" class="nav-link">Home</a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="#" class="nav-link">Contact</a>
    </li> -->


  <!-- Right navbar links -->

</nav>
@endsection

@section('content')
<style>
    .pac-container {
    background-color: #FFF;
    z-index: 99999;
    position: fixed;
    display: inline-block;
    float: left;
}
.modal{
    z-index: 99999;
}
.modal-backdrop{
    z-index: 10;
}
.text {
   overflow: hidden;
   text-overflow: ellipsis;
   display: -webkit-box;
   -webkit-line-clamp: 2; /* number of lines to show */
   -webkit-box-orient: vertical;
}
* {
  margin: 0;
  box-sizing: border-box;
  font-family: system-ui
}
.header {
  background: #604bcb;
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 8px 2px;
}

.details {
  flex: 1;
  display: flex;
  gap: 8px;
  align-items: center;
}

.return, .menu {
  color: white;
  font-weight: bold;
  padding: 0px 8px;
}

.details img {border-radius: 50%;height: 48px;border: 2px solid white;box-shadow: 0px 2px 2px 0px #0000002e;}

.contacto {
  color: white;
  font-size: 18px;
}

.contacto .name {
  font-weight: bold;
}

.contacto .status {font-size: 0.75em;}

.root {
  background-color: #02e5f3;
  height: 100vh;
  display: flex;
  flex-direction: column;
}

.content {

  flex: 1;
}

.entry {
  background-color: #c8c8b2;
  display: flex;
  padding: 8px;
  align-items: center;
  height: 58px;
}

#msg {
  transition: all 0.3s;
  flex: 1;
  margin-right: 10px;
  border-radius: 8px;
  border: none;
  resize: none;
  padding: 4px 6px;
  border: 2px solid white;
  color: gray;
  height: min-content;
}

#msg:focus {
  border: 2px solid gray;
  outline: none;
  color: black;
}
.send {
  height: 46px;
  width: 46px;
  border:none;
  border-radius: 10px;
  transition:all 0.3s;
  font-size: 16px;
  cursor:pointer;
}
.send:hover{
  color: #604bcb;
  background-color: white;
}

div.sticky {
  position: -webkit-sticky;
  position: sticky;
  top: 0;
  background-color: yellow;
  padding: 50px;
  font-size: 20px;
}
  </style>

<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>


<div id="sectionId">

</div>






<div class="container ">
<div class="container">
<div class="row">
        <div class="row">
          <div class="col">
            <div class="card card-footer">
              <form id="addForm">
                <div class="form-group">
                  <input type="text" class="form-control" id="message" placeholder="Enter message...">
                </div>


                <input type="hidden" value="{{ $store_id }}" id="store_id">
                <input type="hidden" value="{{ $customer_id }}" id="customer_id">
                <input type="submit"  class="btn btn-primary " value="Send">
              </form>
            </div>
          </div>
        </div>
    </div>
</div>
</div>


<script>
$(document).ready(function(){
$("#addForm").submit(function(e){
e.preventDefault();
var message = $("#message").val();
var material_id = $("#material_id").val();
var store_id = $("#store_id").val();
var customer_id = $("#customer_id").val();


$.ajax({
  headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
  url: '/member/chat',
  method: 'POST',
  data: {message: message,material_id: material_id,store_id: store_id,customer_id: customer_id},
  success: function(data) {
    // handle the response from the server
    console.log(data);
    window.scrollTo(0, document.body.scrollHeight);
  },
  error: function(data) {
    // handle errors
  }
});

$("#message").val("");
});


    $.ajax({
        type: 'GET',
        url: '/routeNames',
        success: function(data) {
            $('#sectionId').html(data);
            window.scrollTo(0, document.body.scrollHeight);
        }
    });

});
</script>

<script>
$(document).ready(function(){
    // ...

    setInterval(function(){
        var message = $("#message").val();
        var material_id = $("#material_id").val();
        var store_id = $("#store_id").val();
        var customer_id = $("#customer_id").val();
        
        $.ajax({
            type: 'GET',
            url: '/routeNames/'+customer_id+'/'+store_id,
            success: function(data) {
                var $section = $('#sectionId');
                var previousHeight = $section[0].scrollHeight;
                
                $section.html(data);
                
                // Scroll to the bottom only if new data has been added
                if ($section[0].scrollHeight > previousHeight) {
                    window.scrollTo(0, document.body.scrollHeight);
                }
            }
        });
    }, 10000);

    // ...
});
</script>

  </body>
  </html>


  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAKOU_JfykYBj4kDS8ryXPSd0kxsygDcGU&libraries=places"></script>


  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>



  <script>
  $(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('body').on('click', '.editbtn', function () {
      var id = $(this).data('id');
      $('#editmodal').modal('show');


         let updateroutes = "/member/product/"+id;
          $("#updateroute").attr("action", updateroutes);


      $.get('/member/product/'+id+'/edit', function (data) {
        console.log(data);
           $('#sel_category_id2').val(data.category_id);
           $('#name2').val(data.name);
           $('#price2').val(data.price);
           $('#description2').val(data.description);
           $('#artist2').val(data.artist);
       });

    });
  });



    </script>


<script>
   $(document).ready( function () {
    $('#myTable').DataTable();


} );
</script>




{{--  --}}
@endsection



















