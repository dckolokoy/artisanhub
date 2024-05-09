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
            <h4 style="font-weight: bold" class="mt-1">Declined Accounts</h4>
          </div>

          <div class="col-sm-3">
            <div class="input-group input-group-sm" >



            </div>
          </div>

            {{-- modal --}}
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
  </style>
<div class="container-fluid">
  @if (session('success'))
      <div class="alert alert-success">
        {{session('success')}}
      </div>
  @endif
<div class="row">
          <div class="col-12">
          @if($errors->any())
              {{ implode('', $errors->all(':message')) }}
          @endif
          <div class=" card-body table-responsive p-0" style="z-index: -99999">
                <table id="table_id" class="table table-head-fixed text-nowrap table-striped table-hover">
                  <thead class="thead-light">
                    <tr>
                     <th>ID</th>
                     <th>Profile Picture </th>
                      <th>ID Image</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>User Type</th>


                      <th>Action</th>

                    </tr>
                  </thead>
                  <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td class="align-middle">{{$user ->id }}</td>
                        <td class="align-middle"><img src="{{ asset('uploads/image_id/'.$user->picture.'') }}" style="height:80px;width:120px;" class="card-img-top" alt="..."></td>
                       
                        <td class="align-middle"><img src="{{ asset('uploads/image_id/'.$user->image.'') }}" style="height:80px;width:120px;" class="card-img-top" alt="..."></td>
                        <td class="align-middle text-wrap" >{{$user ->name}}</td>
                      <td class="align-middle text-wrap">{{$user ->email}}</td>
                      <td class="align-middle text-wrap">
                        @if ($user ->role == 0)
                            Customer
                        @else
                            Member
                        @endif
                    </td>
                    <td class="align-middle text-wrap">{{$user ->remarks}}</td>
                    <td class="align-middle"                                                         >
                        @if($user ->is_verified == 0)
                        <form action="/admin/user/pending/{{$user ->id }}" method="POST" enctype="multipart/form-data" style="display: inline;">
                            @csrf
                            @method('PUT')
                            <input type="text" style="display: none;" value="1" name="status" id="status">
                            <input type="text" style="display: none;" value="pending" name="route" id="route">
                            <button type="submit"  class="btn  btn-primary" style="display:inline;"><i class="fa fa-thumbs-up"> </i></button>
                        </form>
                        <form action="/admin/user/pending/{{$user ->id }}" method="POST" enctype="multipart/form-data" style="display: inline;">
                            @csrf
                            @method('PUT')
                            <input type="text" style="display: none;" value="2" name="status" id="status">
                            <input type="text" style="display: none;" value="pending" name="route" id="route">
                            <button type="submit"  class="btn  btn-danger" style="display:inline;"><i class="fa fa-thumbs-down"> </i></button>
                        </form>

                         @elseif($user ->is_verified == 1)
                             <button type="submit"  class="btn  btn-success" style="display:inline;"><i class="fa fa-thumbs-up"> </i></button>
                         @else
                             <button type="submit"  class="btn  btn-danger" style="display:inline;"><i class="fa fa-thumbs-down"> </i></button>
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

            <div class="mt-2">
              {{$users->links()}}
            </div>
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
      var user_id = $(this).data('id');
      $('#editModal').modal('show');


         let updateroutes = "/admin/admin/"+user_id;
          $("#updateroute").attr("action", updateroutes);


      $.get('/admin/admin/'+user_id+'/edit', function (data) {
        console.log(data.name);
           $('#name2').val(data.name);
           $('#email2').val(data.email);
           $("#role2").val(data.role);
           $('#password2').val(data.password);
       });

    });
  });



    </script>

<script>
   $(document).ready( function () {
    $('#table_id').DataTable();
} );
</script>

{{--  --}}
@endsection

