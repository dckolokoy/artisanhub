@extends('layouts.admin')

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
            <h4 style="font-weight: bold" class="mt-1">Notification</h4>
          </div>

          <div class="col-sm-3">
            <div class="input-group input-group-sm" >



            </div>
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

  </style>
<div class="container-fluid">
  @if (session('success'))
      <div class="alert alert-success">
        {{session('success')}}
      </div>
  @endif
<div class="row">
          <div class="col-12">

              <div class=" card-body table-responsive p-0" style="z-index: -99999">
                <table class="table table-head-fixed text-nowrap table-striped table-hover" id="myTable" >
                  <thead class="thead-light">
                    <tr>
                     <th style="width: 1200px">Description</th>
                      <th>Action</th>

                    </tr>
                  </thead>
                  <tbody>
                    @foreach($notifications as $notification)
                    <tr>
                      <td class="align-middle text-wrap" style="width: 1200px">
                        @if ($notification ->transaction_status == 0)
                            <strong>[Order - Transaction No {{ $notification->transaction_id }}] </strong>Customer {{ $notification->name }} is placing a new order!
                        @elseif ($notification ->transaction_status == 1)
                            <strong>[Order - Transaction No {{ $notification->transaction_id }}] </strong>Customer {{ $notification->name }} has placed new order!
                        @elseif ($notification ->transaction_status == 8)
                            <strong>[Order - Transaction No {{ $notification->transaction_id }}] </strong>Customer {{ $notification->name }} has received their order!
                        @elseif ($notification ->transaction_status == 9)
                            <strong>[Reservation - Transaction No {{ $notification->transaction_id }}] </strong>Customer {{ $notification->name }} is making a reservation!
                        @elseif ($notification ->transaction_status == 10)
                             <strong>[Reservation - Transaction No {{ $notification->transaction_id }}] </strong>Customer {{ $notification->name }} has booked a reservation!
                        @endif
                      </td>
                      <td class="align-middle">
                          {{-- update modal --}}

                          @if($notification ->is_viewed == 0)
                            <form action="/admin/alert/{{$notification ->n_id }}" method="POST" enctype="multipart/form-data" style="display: inline;">
                                @csrf
                                @method('PUT')
                                <button type="submit"  class="btn  btn-primary" style="display:inline;"><i class="fas fa-eye"></i> Mark as Read</button>
                            </form>
                          @else
                              <button type="submit"  class="btn btn-success" style="display:inline;"><i class="fas fa-eye"></i> Read</button>
                          @endif
                      </td>


                      {{-- here --}}
                    </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          </div>
        </div>
</div>
{{--  --}}



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


         let updateroutes = "/admin/menu-item/"+id;
          $("#updateroute").attr("action", updateroutes);


      $.get('/admin/menu-item/'+id+'/edit', function (data) {
        console.log(data);
           $('#sel_category_id2').val(data.category_id);
           $('#name2').val(data.name);
           $('#price2').val(data.price);
           $('#description2').val(data.description);
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

