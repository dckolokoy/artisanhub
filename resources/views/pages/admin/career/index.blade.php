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
            <h4 style="font-weight: bold" class="mt-1">Career</h4>
          </div>

          <div class="col-sm-3">
            <div class="input-group input-group-sm" >



            </div>
          </div>

          <div class="col-sm-3">
            {{-- modal --}}
               <!-- Button trigger modal -->
                     <button type="button" class="btn btn-primary  mt-1" data-toggle="modal" data-target="#exampleModalScrollable">
                       Add New Career
                     </button>

                     <!-- Modal -->
                     <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                       <div class="modal-dialog " role="document">
                         <div class="modal-content">
                           <div class="modal-header">
                             <h5 class="modal-title" id="exampleModalScrollableTitle">Career Information</h5>
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                               <span aria-hidden="true">&times;</span>
                             </button>
                           </div>
                           <div class="modal-body">
                             <form action="/admin/career" method="POST" enctype="multipart/form-data">
                               @csrf

                               <div class="container">

                                <div class="row">
                                    <div class="col-sm-12">
                                        <label for="type">Position Type</label>
                                        <select class="form-select" aria-label="Default select example" name="type" id="type" required>
                                            <option class="opt1" value="" disabled selected hidden>Select Position Type</option>
                                            <option value="0">Full Time</option>
                                            <option value="1">Part Time</option>
                                         </select>
                                    </div>

                                </div>



                                <div class="row">
                                    <div class="col-sm-12">
                                        <label for="position">Position</label>
                                        <input type="text" class="form-control" name="position" id="position" placeholder="Position" required>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label for="description">Description</label>
                                        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                                    </div>

                                </div>


                                <div class="row">
                                    <div class="col-sm-12">
                                        <label for="income">Income</label>
                                        <input type="number" class="form-control" name="income" id="arincometist" placeholder="Income" required>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <label for="address">Address</label>
                                        <textarea class="form-control" id="address" name="address" rows="3"></textarea>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-sm-12" id="date_from">
                                        <label for="image">Image</label>
                                        <input type="file" class="form-control" name="image" id="image" placeholder="Image" required>
                                    </div>

                                 </div>

                                 <div class="row">
                                    <div class="col-sm-12">
                                        <label for="status">Status</label>
                                        <select class="form-select" aria-label="Default select example" name="status" id="status" required>
                                            <option class="opt1" value="" disabled selected hidden>Select Status</option>
                                            <option value="0">Inactive</option>
                                            <option value="1">Active</option>
                                         </select>
                                    </div>

                                </div>
                                <br>
                        </div>

                               <div class="modal-footer">
                                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                 <button type="submit" class="btn btn-primary">Add Career</button>
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
.text {
   overflow: hidden;
   text-overflow: ellipsis;
   display: -webkit-box;
   -webkit-line-clamp: 2; /* number of lines to show */
   -webkit-box-orient: vertical;
}
.text {
 /**Major Properties**/
overflow:hidden;
line-height: 1.6rem;
max-height: 8rem;
-webkit-box-orient: vertical;
display: block;
display: -webkit-box;
overflow: hidden !important;
text-overflow: ellipsis;
-webkit-line-clamp: 5;

}
  </style>
<div class="container-fluid">
  @if (session('success'))
      <div class="alert alert-success">
        {{session('success')}}
      </div>
  @endif
<div class="row">
          <div class="col-12" >

              <div class=" card-body table-responsive p-0" style="z-index: -99999">
                <table class="table table-head-fixed text-nowrap table-striped table-hover" id="myTable" >
                  <thead class="thead-light">
                    <tr>
                     <th>ID</th>

                     <th>Image</th>
                      <th>Type</th>
                      <th>Position</th>
                      <th>Description</th>
                      <th>Income</th>
                      <th>Address</th>
                      <th>Status</th>
                      <th>Action</th>

                    </tr>
                  </thead>
                  <tbody>
                    @foreach($careers as $career)
                    <tr>
                        <td class="align-middle">{{$career ->id}}</td>
                        <td class="align-middle"><img src="{{ asset($career->image) }}" style="height:80px;width:120px;" class="card-img-top" alt="..."></td>

                      <td class="align-middle">
                        @if ($career ->type == 0)
                            Full-Time
                        @else
                            Part-Time
                        @endif
                      </td>

                      <td class="align-middle">{{$career ->position}}</td>
                      <td class="align-middle text-wrap ">{{$career ->description}}</td>
                      <td class="align-middle">{{$career ->income}}</td>
                      <td class="align-middle">{{$career ->address}}</td>
                      <td class="align-middle">
                        @if ($career ->status == 0)
                            Inactive
                        @else
                            Active
                        @endif
                      </td>
                      <td class="align-middle">
                          {{-- update modal --}}
                          <button type="button" data-id="{{ $career->id }}"  class="btn btn-primary editbtn"> <i class="fas fa-edit"></i> </button>

                          <form action="/admin/career/{{ $career->id }}" method="POST" style=" display:inline;">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-danger " onclick="return confirm('Are you sure you want to delete this career?')"> <i class="fas fa-trash"></i>  </button>
                            </form>


                          <div class="modal fade" id="editmodal" role="dialog" aria-labelledby="exampleModalLabel"
                          aria-bs-hidden="true">
                          <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel"> Update Menu Item Information </h5>
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
                                                <div class="col-sm-12">
                                                    <label for="type">Position Type</label>
                                                    <select class="form-select" aria-label="Default select example" name="type2" id="type2" required>
                                                        <option class="opt1" value="" disabled selected hidden>Select Position Type</option>
                                                        <option value="0">Full Time</option>
                                                        <option value="1">Part Time</option>
                                                     </select>
                                                </div>

                                            </div>



                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <label for="position">Position</label>
                                                    <input type="text" class="form-control" name="position2" id="position2" placeholder="Position" required>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <label for="description">Description</label>
                                                    <textarea class="form-control" id="description2" name="description2" rows="3"></textarea>
                                                </div>

                                            </div>


                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <label for="income">Income</label>
                                                    <input type="number" class="form-control" name="income2" id="income2" placeholder="Income" required>
                                                </div>

                                            </div>

                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <label for="address">Address</label>
                                                    <textarea class="form-control" id="address2" name="address2" rows="3"></textarea>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12" id="date_from">
                                                    <label for="image">Image</label>
                                                    <input type="file" class="form-control" name="image2" id="image2" placeholder="Image" >
                                                </div>

                                             </div>

                                             <div class="row">
                                                <div class="col-sm-12">
                                                    <label for="status">Status</label>
                                                    <select class="form-select" aria-label="Default select example" name="status2" id="status2" required>
                                                        <option class="opt1" value="" disabled selected hidden>Select Status</option>
                                                        <option value="0">Inactive</option>
                                                        <option value="1">Active</option>
                                                     </select>
                                                </div>

                                            </div>
                                            <br>
                                    </div>

                                           <div class="modal-footer">
                                             <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                             <button type="submit" class="btn btn-primary">Update Career</button>
                                           </div>
                                           </form>

                              </div>
                          </div>
                     </div>

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
  $(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('body').on('click', '.editbtn', function () {
      var id = $(this).data('id');
      $('#editmodal').modal('show');


         let updateroutes = "/admin/career/"+id;
          $("#updateroute").attr("action", updateroutes);


      $.get('/admin/career/'+id+'/edit', function (data) {
        console.log(data);

           $('#type2').val(data.type);
           $('#position2').val(data.position);
           $('#description2').val(data.description);
           $('#income2').val(data.income);
           $('#address2').val(data.address);
           $('#status2').val(data.status);
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

