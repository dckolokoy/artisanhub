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
            <h4 style="font-weight: bold" class="mt-1">Manage Customer</h4>
          </div>

          <div class="col-sm-3">
            <div class="input-group input-group-sm" >



            </div>
          </div>

          <div class="col-sm-3">
            {{-- modal --}}
               <!-- Button trigger modal -->
                     <button type="button" class="btn btn-primary  mt-1" data-toggle="modal" data-target="#exampleModalScrollable">
                       Add New Customer
                     </button>

                     <!-- Modal -->
                     <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                       <div class="modal-dialog modal-lg " role="document">
                         <div class="modal-content">
                           <div class="modal-header">
                             <h5 class="modal-title" id="exampleModalScrollableTitle">Customer Information</h5>
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                               <span aria-hidden="true">&times;</span>
                             </button>
                           </div>
                           <div class="modal-body">
                             <form action="/admin/client" method="POST" enctype="multipart/form-data">
                               @csrf

                               <div class="container">


                                <div class="row">
                                      <div class="col-sm">
                                      <label for="name">Name</label>
                                      <input type="text" class="form-control" name="name" id="name" placeholder="Name" required>
                                      </div>
                                  </div>

                                 <div class="row">
                                      <div class="col-sm">

                                      <label for="email">Email</label>
                                          <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>

                                      </div>
                                  </div>

                                  <div class="row">
                                    <div class="col-sm">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control" name="address" id="address" placeholder="Address" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm">
                                    <label for="mobile">Contact No.</label>
                                    <input type="text" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" name="mobile" minlength="11" maxlength="11" id="mobile" placeholder="Mobile" required>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-sm">
                                    <label for="gender">Gender</label>
                                    <select class="form-select" aria-label="Default select example" name="gender" id="gender" >
                                        <option class="opt1" value="" disabled selected hidden>Select Gender</option>
                                        <option value="0" > Male</option>
                                        <option value="1" > Female</option>

                                     </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm">
                                    <label for="age">Age</label>
                                    <input type="number" class="form-control" name="age" id="age" placeholder="Age" required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm">
                                    <label for="birthdate">Birthdate</label>
                                    <input type="date" class="form-control" name="birthdate" id="birthdate" placeholder="Birthdate" required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm">
                                    <label for="image">Profile Picture</label>
                                    <input id="image" type="file" class="form-control" name="image"  required >

                                    </div>
                                </div>



                                  <div class="row">
                                      <div class="col-sm">
                                      <label for="password">Password</label>
                                      <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                                      </div>
                                  </div>

                                 <div class="row">
                                      <div class="col-sm">
                                          <label for="confirm">Confirm Password</label>
                                          <input id="password-confirm" type="password" class="form-control" name="password_confirmation" class="form-control" placeholder="Password" required>
                                      </div>
                                  </div>
                                  <br>


                             </div>

                        </div>

                               <div class="modal-footer">
                                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                 <button type="submit" class="btn btn-primary">Save changes</button>
                               </div>
                               </form>
                           </div>
                         </div>
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
                     <th>Profile Picture</th>
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
                      <td class="align-middle text-wrap" ><img src="{{ asset('uploads/image_id/'.$user->picture.'') }}" style="height:80px;width:120px;" class="card-img-top" alt="..."></td>
                      <td class="align-middle text-wrap" ><img src="{{ asset('uploads/image_id/'.$user->image.'') }}" style="height:80px;width:120px;" class="card-img-top" alt="..."></td>
                     <td class="align-middle text-wrap">{{$user ->name}}</td>
                      <td class="align-middle text-wrap">{{$user ->email}}</td>
                      <td class="align-middle text-wrap">
                        @if ($user ->role == 0)
                            Customer
                        @else
                            Member
                        @endif
                    </td>
                      <td class="align-middle">
                          {{-- update modal --}}
                          <button type="button" data-id="{{ $user->id }}" class="btn btn-primary editbtn"
                          color: inherit;
                          border: none;
                          padding: 0;
                          font: inherit;
                          cursor: pointer;
                          outline: inherit;
                          margin-top:-5px;
                          "> <i class="fas fa-edit"></i> </button>

                          <div class="modal fade" id="editModal" role="dialog" aria-labelledby="exampleModalLabel"
                          aria-bs-hidden="true">
                          <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel"> Update User Account Information </h5>
                                      <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                          <span aria-bs-hidden="true">&times;</span>
                                      </button>
                                  </div>
                                      <div class="modal-body">
                                        <form action="" method="POST" enctype="multipart/form-data" id="updateroute">
                                        @csrf
                                        @method('PUT')

                                        <div class="container">

                                            <div class="row">
                                                  <div class="col-sm">
                                                  <label for="name">Name</label>
                                                  <input type="text" class="form-control" name="name2" id="name2" placeholder="Name" required>
                                                  </div>
                                              </div>

                                             <div class="row">
                                                  <div class="col-sm">

                                                  <label for="email">Email</label>
                                                      <input type="email" class="form-control" name="email2" id="email2" placeholder="Email" required>

                                                  </div>
                                              </div>

                                              <div class="row">
                                                <div class="col-sm">
                                                <label for="address">Address</label>
                                                <input type="text" class="form-control" name="address2" id="address2" placeholder="Address" required>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm">
                                                <label for="mobile">Contact No.</label>
                                                <input id="mobile" type="text"     oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile') }}" minlength="11"  maxlength="11" required autocomplete="mobile" autofocus>  </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm">
                                                <label for="gender">Gender</label>
                                                <select class="form-select" aria-label="Default select example" name="gender2" id="gender2" >
                                                    <option class="opt1" value="" disabled selected hidden>Select Gender</option>
                                                    <option value="0" > Male</option>
                                                    <option value="1" > Female</option>

                                                 </select>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm">
                                                <label for="age">Age</label>
                                                <input type="number" class="form-control" name="age2" id="age2" placeholder="Age" required>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm">
                                                <label for="birthdate">Birthdate</label>
                                                <input type="date" class="form-control" name="birthdate2" id="birthdate2" placeholder="Birthdate" required>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm">
                                                <label for="image">Profile Image</label>
                                                <input id="image" type="file" class="form-control" name="image2"  id="image2" >

                                                </div>
                                            </div>



                                              <div class="row">
                                                  <div class="col-sm">
                                                  <label for="password">Password</label>
                                                  <input type="password" class="form-control" name="password2" id="password2" placeholder="Password" >
                                                  </div>
                                              </div>

                                             <div class="row">
                                                  <div class="col-sm">
                                                      <label for="confirm">Confirm Password</label>
                                                      <input id="password-confirm" type="password" class="form-control" name="password_confirmation" class="form-control" placeholder="Password" >
                                                  </div>
                                              </div>
                                              <br>


                                         </div>

                                    </div>

                                           <div class="modal-footer">
                                             <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                             <button type="submit" class="btn btn-primary">Save changes</button>
                                           </div>
                                           </form>

                              </div>
                          </div>
                     </div>
                     <button type="button" class="btn btn btn-danger" onclick="confirmDelete('{{ route('customer.destroy', $user->id) }}')" 
                     color: inherit;
                          border: none;
                          padding: 0;
                          font: inherit;
                          cursor: pointer;
                          outline: inherit;
                          margin-top:-5px;
                          "> 
    <i class="fas fa-trash"></i>
</button>
                          {{-- update modal --}}

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
  function confirmDelete(url) {
    if (confirm('Are you sure you want to delete this record?')) {
        window.location.href = url;
    }
}
  $(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('body').on('click', '.editbtn', function () {
      var user_id = $(this).data('id');
      $('#editModal').modal('show');


         let updateroutes = "/admin/client/"+user_id;
          $("#updateroute").attr("action", updateroutes);


      $.get('/admin/client/'+user_id+'/edit', function (data) {
        console.log(data.name);
           $('#name2').val(data.name);
           $('#email2').val(data.email);
           $('#address2').val(data.address);
           $("#mobile2").val(data.mobile);

           $('#age2').val(data.age);
           $('#gender2').val(data.gender);
           $('#birthdate2').val(data.birthdate);

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

