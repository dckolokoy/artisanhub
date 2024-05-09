@extends('justnpot.customer-main')
@section('title', 'Home')
@section('content')

<nav class="main-header  navbar-expand navbar-white navbar-light " style="padding: 5px !important;z-index: 1">
  <!-- Left navbar links -->
     <div class="row mx-0">
          <div class="col-sm-1">
            <a class="nav-link " data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars" style="color: gray"></i></a>
          </div>

          <div class="col-sm-5">
            <h4 style="font-weight: bold" class="mt-1">Order Transactions</h4>
          </div>

          <div class="col-sm-3">
            <div class="input-group input-group-sm" >



            </div>
          </div>


{{-- viewinfo modal --}}

                     <!-- Modal -->
                     <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                        <div class="modal-dialog modal-lg " role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalScrollableTitle">Customer Information</h5>
                              <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                                <center>

                                    <div class="col-md-12">
                                            <div class="row">
                                              <div class="col-sm-3">
                                                <h6 class="mb-0"> Name</h6>
                                              </div>
                                              <div class="col-sm-9 text-secondary"  id="viewName">

                                              </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                              <div class="col-sm-3">
                                                <h6 class="mb-0">Address</h6>
                                              </div>
                                              <div class="col-sm-9 text-secondary"  id="viewAddress">

                                              </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                              <div class="col-sm-3">
                                                <h6 class="mb-0">Email</h6>
                                              </div>
                                              <div class="col-sm-9 text-secondary"  id="viewEmail">

                                              </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                              <div class="col-sm-3">
                                                <h6 class="mb-0">Mobile Phone</h6>
                                              </div>
                                              <div class="col-sm-9 text-secondary"  id="viewMobile">

                                              </div>
                                            </div>
                                            <hr>

                                </center>


                         </div>

                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>

                            </div>
                          </div>
                        </div>
{{-- viewinfo modal --}}



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
img {
    max-width: 100%;
    height: auto;
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

              <div class=" card-body table-responsive p-0 mx-auto" style="z-index: -99999; width: 1500px;">
              
                <table class="table table-head-fixed text-nowrap table-striped table-hover center-div" id="myTable" >
                  <thead class="thead-light">
                    <tr>
                    <th>Date</th>
                   
                      <th>Payment Type</th>
                      <th>Payment Reference</th>
                      <th>Artwork</th>
                      <th>Total Amount</th>
                      <th>Status</th>
                     
                      <th>Actions </th> 

                    </tr>
                  </thead>
                  <tbody>
                    @foreach($transactions as $transaction)
                    <tr>

                      <td class="align-middle">{{$transaction ->c_date }}</td>
                       <td class="align-middle">Paypal</td>
                        <td class="align-middle">{{$transaction ->p_payment_id}}</td>
                      <td class="align-middle"> </button>
                        {{$transaction ->m_name}}
                    </td>

                      <td class="align-middle">{{$transaction ->m_price}}</td>
                      <td class="align-middle">
                        @if($transaction ->t_status == 0)
                            Pending
                        @elseif($transaction ->t_status == 1)
                            Approved by Artist
                        @elseif($transaction ->t_status == 2)
                            Rejected/Wait for the Refund by Admin
                        @elseif($transaction ->t_status == 3)
                        Order Received
                        @elseif($transaction ->t_status == 4)
                        
                        Refunded sent by admin
                        @elseif($transaction ->t_status == 5)
                        Order Received
                        @elseif($transaction ->t_status == 6)
                        Order Received
                        @elseif($transaction ->t_status == 7)
                        Refund received
                        @elseif($transaction ->t_status == 8)
                        Artist sent your Artwork <br>
                        To your e-mail
                        @endif
                      </td>
                    <td class="align-middle">

                          @if($transaction ->t_status == 8)
                            <form action="/updateorder/{{$transaction ->t_id }}" method="POST" enctype="multipart/form-data" style="display: inline;">
                                @csrf
                                @method('PUT')
                                <label>Artwork Received:? </label>
                                <input type="text" style="display: none;" value="3" name="status" id="status">
                                <input type="text" style="display: none;" value="order" name="route" id="route">
                                <input type="text" style="display: none;" value="admin" name="route2" id="route2">
                                <input type="text" style="display: none;" value="0" name="order_type" id="order_type">
                                <input type="text" style="display: none;" value="{{$transaction ->u_mobile}}" name="mobile" id="mobile">
                                <button type="submit"  class="btn  btn-primary" style="display:inline;"><i class="fa fa-thumbs-up"> </i></button>
                            </form>
                           

                             @elseif($transaction ->t_status == 4)
                                <form action="/updateorder/{{$transaction ->t_id }}" method="POST" enctype="multipart/form-data" style="display: inline;">
                                    @csrf
                                    @method('PUT')
                                    <label>Refund Received:? </label>
                                    <input type="text" style="display: none;" value="7" name="status" id="status">
                                    <input type="text" style="display: none;" value="order" name="route" id="route">
                                    <input type="text" style="display: none;" value="admin" name="route2" id="route2">
                                    <input type="text" style="display: none;" value="0" name="order_type" id="order_type">
                                    <input type="text" style="display: none;" value="{{$transaction ->u_mobile}}" name="mobile" id="mobile">
                                    <button type="submit"  class="btn  btn-primary" style="display:inline;"><i class="fa fa-thumbs-up"> </i></button>
                                </form>

                          
                            @endif

                          <div class="modal fade" id="editmodal" role="dialog" aria-labelledby="exampleModalLabel"
                          aria-bs-hidden="true">
                          <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Transaction Information </h5>
                                      <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                          <span aria-bs-hidden="true">&times;</span>
                                      </button>
                                  </div>
                                      <div class="modal-body">
                                        <form action="" method="POST" enctype="multipart/form-data" id="formid">
                                        @csrf
                                        @method('PUT')

                                        <div class="container">
                                            <div class="row">
                                              <div class="col-sm">
                                                <label for="title">Material  Title</label>
                                                <input type="text" class="form-control" name="bank_name2" id="bank_name2" placeholder="Bank Name" required>

                                              </div>
                                              <div class="col-sm">
                                                <label for="description">Description</label>
                                                <input type="text" class="form-control" name="description2" id="description2" placeholder="First Name" required>

                                              </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm">
                                                    <label for="balance">Initial Balance</label>
                                                    <input type="text" class="form-control" name="balance2" id="balance2" placeholder="Initial Balance" required>

                                                </div>
                                                <div class="col-sm">
                                                    <label for="acc_no">Account No.</label>
                                                    <input type="text" class="form-control" name="acc_no2" id="acc_no2" placeholder="Account No." required>

                                                </div>
                                              </div>



                                              <div class="row">
                                                <div class="col-sm">
                                                    <label for="contact_person">Contact Person</label>
                                                    <input type="text" class="form-control" name="contact_person2" id="contact_person2" placeholder="Contact Person" required>

                                                </div>
                                                <div class="col-sm">
                                                    <label for="phone">Phone</label>
                                                    <input type="text" class="form-control" name="phone2" id="phone2" placeholder="phone" required>

                                                </div>
                                              </div>

                                              <div class="row">
                                                <div class="col-sm-6">
                                                    <label for="url">Internet Banking Url</label>
                                                    <input type="text" class="form-control" name="url2" id="url2" placeholder="Internet Banking Url" required>

                                                </div>
                                              </div>

                                              </div>

                                        </div>


                                      <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                          <button type="submit" name="updatedata" class="btn btn-primary">Update Data</button>
                                      </div>
                                  </form>

                              </div>
                          </div>
                     </div>



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


       {{-- approve modal --}}
               <!-- Button trigger modal -->


                     <!-- Modal -->
                     <div class="modal fade" id="approveModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollable1Title" aria-hidden="true">
                       <div class="modal-dialog" role="document">
                         <div class="modal-content">
                           <div class="modal-header">
                             <h5 class="modal-title" id="exampleModalScrollable1Title">Approve Transaction</h5>
                             <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                               <span aria-hidden="true">&times;</span>
                             </button>
                           </div>
                           <div class="modal-body">
                           <form action="" method="POST" enctype="multipart/form-data" id="approveroute">
                                              @csrf
                                              @method('PUT')

                                              <div class="container">
                                              <div class="row">
                                                  <div class="col-sm-12">
                                                      <p><strong> Transaction No. : </strong> <span id="trans_no"></span> </p>
                                                      <label for="date_available" >Receipt</label>

                                                      <img id="rec_img" src="" alt="">
                                                       <input style="display: none;" type="text" class="form-control" value="1" name="status" id="status" placeholder="Status">

                                                    </div>
                                                    <br>
                                                  </div>
                                              </div>


                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" name="" class="btn btn-primary">Approve</button>
                                            </div>
                                        </form>
                           </div>
                         </div>
                       </div>
                     </div>
            {{-- approve modal --}}



       {{-- declined modal --}}
               <!-- Button trigger modal -->


                     <!-- Modal -->
                     <div class="modal fade" id="declinedModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollable1Title" aria-hidden="true">
                       <div class="modal-dialog" role="document">
                         <div class="modal-content">
                           <div class="modal-header">
                             <h5 class="modal-title" id="exampleModalScrollable1Title">Decline Transaction</h5>
                             <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                               <span aria-hidden="true">&times;</span>
                             </button>
                           </div>
                           <div class="modal-body">
                           <form action="" method="POST" enctype="multipart/form-data" id="declineroute">
                                              @csrf
                                              @method('PUT')

                                              <div class="container">
                                              <div class="row">
                                                  <div class="col-sm-12">
                                                      <p><strong> Transaction No. : </strong> <span id="trans_no2"></span> </p>
                                                      <label for="date_available" >Receipt</label>

                                                      <img id="rec_img2" src="" alt="">
                                                       <input style="display: none;" type="text" class="form-control" value="3" name="status" id="status" placeholder="Status">


                                                    </div>
                                                    <br>
                                                  </div>
                                              </div>


                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" name="" class="btn btn-danger">Decline</button>
                                            </div>
                                        </form>
                           </div>
                         </div>
                       </div>
                     </div>
            {{-- declined modal --}}

               <!-- Modal -->
               <div class="modal fade" id="presModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollable1Title" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalScrollable1Title">Order List</h5>
                      <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                    <form action="" method="POST" enctype="multipart/form-data" id="">
                                       @csrf
                                       @method('PUT')

                                       <div class="container">
                                       {{-- <div class="row">
                                            <div class="col-sm-12">
                                                <label for="impression2">Impression:</label>
                                                <p id="impression2" style="color:black;"></p>

                                            </div>
                                       </div> --}}

                                       <div class="row">
                                           <div class="col-12">
                                               <div class=" card-body table-responsive p-0" style="z-index: -99999">
                                                 <table id="table_id2" class="table  text-nowrap   " >
                                                   <thead class="thead-light thead2">
                                                     <tr>

                                                       <th>Name</th>
                                                       <th>Price</th>
                                                     </tr>
                                                   </thead>
                                                   <tbody class="OrderTbody2">

                                                   </tbody>
                                                 </table>
                                               </div>
                                               <!-- /.card-body -->
                                             </div>
                                       </div>


                                     <div class="modal-footer">
                                         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                         {{-- <button type="button" name="" class="btn btn-danger"> <a id="printpres" style="text-decoration:none;color:white" href="">Print</a> </button> --}}
                                     </div>
                                 </form>
                    </div>
                  </div>
                </div>
              </div>
     {{-- Prescription modal --}}


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
    // function myFunction() {
    //   $('#exampleModalScrollable').modal('show');
    // }
    </script>


<script>
  $(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('body').on('click', '.printBtn', function () {
          var trans_id = $(this).data('id');
        //   $("#printpres").attr("href", "/admin/appointment/print-prescription/"+trans_id)
      $('#presModal').modal('show');
            $.ajax({
                  type: "GET",
                  url: "/admin/transaction/get-order-list/"+trans_id,
                  dataType: "json",
                  success: function (response) {

                      if (response.data != null) {
                           console.log(response);
                          $('.OrderTbody2').html("");
                        //   $('#impression2').text("");
                          $.each(response.data, function (key, item) {
                        console.log(response.data);
                           $('#impression2').text(item.impression);
                              $('.OrderTbody2').append('<tr>\
                                  <td>' + item.name + '</td>\
                                  <td>' + item.price + '</td></tr>');
                              // calc_total();
                              // get_store_id = item.c_store_id;
                          });
                          // getStores(customer_id);


                        }
                      }
                });
      });

      $('body').on('click', '#btnInfo', function () {
          var user_id = $(this).data('id');
        //   $("#printpres").attr("href", "/admin/appointment/print-prescription/"+trans_id)
      $('#exampleModalScrollable').modal('show');
            $.ajax({
                  type: "GET",
                  url: "/member/transaction/get-info/"+user_id,
                  dataType: "json",
                  success: function (response) {

                      if (response.data != null) {
                           console.log(response);
                          $('.OrderTbody2').html("");
                        //   $('#impression2').text("");
                          $.each(response.data, function (key, item) {
                        console.log(response.data);
                           $('#viewName').text(item.name);
                           $('#viewEmail').text(item.email);
                           $('#viewAddress').text(item.address);
                           $('#viewMobile').text(item.mobile);
                          });
                          // getStores(customer_id);


                        }
                      }
                });
      });

    $('body').on('click', '.declinedBtn', function () {
      $('#declinedModal').modal('show');
       var trans_id = $(this).data('id');

         let declineroutes = "/admin/transaction/material/"+trans_id;
          $("#declineroute").attr("action", declineroutes);


      $.get('/admin/transaction/material/'+trans_id+'/edit', function (data) {
        console.log(data);
           $('#trans_no2').text(data.transaction_no);
           $("#rec_img2").attr("src",'/uploads/transaction/'+data.receipt);

      });

    });






  });
</script>

<script>
   $(document).ready( function () {
    $('#myTable').DataTable({
        "order": [[ 0, "desc" ]] // Sort the first column (Date) in descending order
    });
} );
</script>

{{--  --}}
    @stop



