<?php $__env->startSection('nav'); ?>


<nav class="main-header  navbar-expand navbar-white navbar-light " style="padding: 5px !important;z-index: 1">
  <!-- Left navbar links -->
     <div class="row mx-0">
          <div class="col-sm-1">
            <a class="nav-link " data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars" style="color: gray"></i></a>
          </div>

          <div class="col-sm-5">
            <h4 style="font-weight: bold" class="mt-1">Membership</h4>
          </div>

          <div class="col-sm-3">
            <div class="input-group input-group-sm" >



            </div>
          </div>

          <div class="col-sm-3">
            
               <!-- Button trigger modal -->
                     <!-- <button type="button" class="btn btn-primary  mt-1" data-toggle="modal" data-target="#exampleModalScrollable">
                       Add New Transaction
                     </button> -->

                     <!-- Modal -->
                     <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                       <div class="modal-dialog modal-lg " role="document">
                         <div class="modal-content">
                           <div class="modal-header">
                             <h5 class="modal-title" id="exampleModalScrollableTitle">Order Information</h5>
                             <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                               <span aria-hidden="true">&times;</span>
                             </button>
                           </div>
                           <div class="modal-body">
                             <form action="/admin/transaction/material" method="POST" enctype="multipart/form-data">
                               <?php echo csrf_field(); ?>

                               <div class="container">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="title">Title</label>
                                        <input type="text" class="form-control" name="title" id="title" placeholder="Title" required>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-sm-6" id="date_from">
                                        <label for="url">URL</label>
                                        <input type="text" class="form-control" name="url" id="url" placeholder="URL" required>
                                    </div>
                                    <div class="col-sm-6" id="date_from">
                                        <label for="price">Price</label>
                                        <input type="number" class="form-control" name="price" id="price" placeholder="Price" required>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label for="description">Description</label>
                                        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-sm">
                                    <label for="remarks">Remarks</label>
                                    <input type="text" class="form-control" name="remarks" id="remarks" placeholder="Remarks" required>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="image">Add Image</label>
                                        <input type="file" class="form-control" name="image" id="image" >
                                    </div>
                                </div>
                                <br>
                             </div>

                        </div>

                               <div class="modal-footer">
                                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                 <button type="submit" class="btn btn-primary">Add Order</button>
                               </div>
                               </form>
                           </div>
                         </div>
                       </div>
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
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
  <?php if(session('success')): ?>
      <div class="alert alert-success">
        <?php echo e(session('success')); ?>

      </div>
  <?php endif; ?>
<div class="row">
          <div class="col-12">

              <div class=" card-body table-responsive p-0" style="z-index: -99999">
                <table class="table table-head-fixed text-nowrap table-striped table-hover" id="myTable" >
                  <thead class="thead-light">
                    <tr>
                     <th>ID</th>
                      <th>Member Name</th>

                      <th>Membership Plan</th>
                      <th>Amount</th>
                      <th>Date Start</th>
                      <th>Date End</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td>   <?php echo e($payment->id); ?></td>
                    <td class="align-middle">
                       <?php echo e($payment->name); ?>

                    </td>
                    <td class="align-middle">
                        <?php if($payment->payment_type == 0): ?>
                            Starter
                        <?php elseif($payment->payment_type == 1): ?>
                            Basic
                        <?php else: ?>
                            Professional
                        <?php endif; ?>

                    </td >

                    <td>
                        <?php echo e($payment->amount); ?>

                    </td>
                    <td class="align-middle">

                        <?php echo e(date('M-d-Y', strtotime( $payment->created_at ))); ?>

                    </td>
                    <td class="align-middle">
                        <?php if( $payment->payment_type == 0 ): ?>
                            <?php echo e(date('M-d-Y', strtotime("+1 months",strtotime($payment->created_at)))); ?>


                        <?php elseif( $payment->payment_type == 1): ?>
                        <?php echo e(date('M-d-Y', strtotime("+3 months",strtotime($payment->created_at)))); ?>

                        <?php else: ?>
                        <?php echo e(date('M-d-Y', strtotime("+12 months",strtotime($payment->created_at)))); ?>

                        <?php endif; ?>
                    </td>
                    <td class="align-middle">
                        <?php if( $payment->payment_type == 0 ): ?>

                            <?php if( date('M-d-Y') != date('M-d-Y', strtotime("+1 months",strtotime($payment->created_at)))): ?>
                                Active
                            <?php else: ?>
                                Ended
                            <?php endif; ?>


                        <?php elseif( $payment->payment_type == 1): ?>

                            <?php if(date('M-d-Y')!= date('M-d-Y', strtotime("+3 months",strtotime($payment->created_at)))): ?>
                              Active
                            <?php else: ?>
                              Ended
                            <?php endif; ?>
                        <?php else: ?>

                            <?php if(date('M-d-Y')!=  date('M-d-Y', strtotime("+12 months",strtotime($payment->created_at))) ): ?>
                                Active
                            <?php else: ?>
                                 Ended
                            <?php endif; ?>
                        <?php endif; ?>
                    </td>
                  </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->


       
               <!-- Button trigger modal -->


                     <!-- Modal -->
                     <div class="modal fade" id="approveModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollable1Title" aria-hidden="true">
                       <div class="modal-dialog" role="document">
                         <div class="modal-content">
                           <div class="modal-header">
                             <h5 class="modal-title" id="exampleModalScrollable1Title">Approve Transaction</h5>
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                               <span aria-hidden="true">&times;</span>
                             </button>
                           </div>
                           <div class="modal-body">
                           <form action="" method="POST" enctype="multipart/form-data" id="approveroute">
                                              <?php echo csrf_field(); ?>
                                              <?php echo method_field('PUT'); ?>

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
            



       
               <!-- Button trigger modal -->


                     <!-- Modal -->
                     <div class="modal fade" id="declinedModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollable1Title" aria-hidden="true">
                       <div class="modal-dialog" role="document">
                         <div class="modal-content">
                           <div class="modal-header">
                             <h5 class="modal-title" id="exampleModalScrollable1Title">Decline Transaction</h5>
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                               <span aria-hidden="true">&times;</span>
                             </button>
                           </div>
                           <div class="modal-body">
                           <form action="" method="POST" enctype="multipart/form-data" id="declineroute">
                                              <?php echo csrf_field(); ?>
                                              <?php echo method_field('PUT'); ?>

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
            

               <!-- Modal -->
               <div class="modal fade" id="presModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollable1Title" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalScrollable1Title">Order List</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                    <form action="" method="POST" enctype="multipart/form-data" id="">
                                       <?php echo csrf_field(); ?>
                                       <?php echo method_field('PUT'); ?>

                                       <div class="container">
                                       

                                       <div class="row">
                                           <div class="col-12">
                                               <div class=" card-body table-responsive p-0" style="z-index: -99999">
                                                 <table id="table_id2" class="table  text-nowrap   " >
                                                   <thead class="thead-light thead2">
                                                     <tr>

                                                       <th>Name</th>
                                                       <th>Quantity</th>
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
                                         
                                     </div>
                                 </form>
                    </div>
                  </div>
                </div>
              </div>
     
            <div class="mt-2">

            </div>
          </div>
        </div>
</div>




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
                                  <td class="text-wrap">' + item.quantity + '</td>\
                                  <td>' + item.price + '</td></tr>');
                              // calc_total();
                              // get_store_id = item.c_store_id;
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






      $('.editbtn').on('click', function () {

          $('#editmodal').modal('show');

          $tr = $(this).closest('tr');

          var data = $tr.children("td").map(function () {
              return $(this).text();
          }).get();

          console.log(data);

          let updateroute = "/bank/"+data[0].toString();
          $("#formid").attr("action", updateroute);

          $('#bank_name2').val(data[1]);
          $('#description2').val(data[2]);
          $('#balance2').val(data[3]);
          $('#acc_no2').val(data[4]);
          $('#contact_person2').val(data[5]);
          $('#phone2').val(data[6]);
          $('#url2').val(data[7]);





        //   let valcategory_type2 = data[7].toString();
        //   $('#category_type2 option[value="' + valcategory_type2 +'"]').prop("selected", true);

        //   let valStatus = data[8].toString();
        //   $('#status2 option[value="' + valStatus +'"]').prop("selected", true);

        //   let prof_img_val = "uploads/category/"+data[9].toString();
        //   $('#download_prof_image').prop("href", prof_img_val);





      });


      $(document).on('change', '#sel_type', function (e) {
            e.preventDefault();
            type = $(this).val();
            var element = document.getElementById('category_details');
            element.innerHTML = ""; //empty

            var transfer_from = document.getElementById('transfer_from');
            transfer_from.innerHTML = ""; //empty

            var transfer_to = document.getElementById('transfer_to');
            transfer_to.innerHTML = ""; //empty

            if(type== 2){
                transfer_from.innerHTML = ""; //empty
                transfer_to.innerHTML = ""; //empty
                document.getElementById("account").disabled = false;
                document.getElementById("description").disabled = false;
                element.innerHTML = '<label for="sel_category">Category</label>\
                                <select class="form-select" aria-label="Default select example" name="sel_category" id="sel_category" required>\
                                </select>';


                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url:'get-categories',
                    type:'get',
                    dataType:'json',

                    success:function (response) {
                        console.log(response);
                        // var len = 0;
                        if (response.data != null) {
                            // len = response.data.length;
                            $("#sel_category").empty();
                            $.each(response.data, function (key, item) {
                            $('#sel_category').append('<option class="opt1" value="" disabled selected hidden>Select Category</option>\
                                                       <option value='+item.id+'>'+item.name+'</option>');

                            });

                        }


                    }
                });
            }else if(type== 3) {
                element.innerHTML = "";
                transfer_from.innerHTML = '<label for="sel_transfer_from">Transfer From</label>\
                                <select class="form-select" aria-label="Default select example" name="sel_transfer_from" id="sel_transfer_from" required>\
                                </select>';

                transfer_to.innerHTML = '<label for="sel_transfer_to">Transfer To</label>\
                <select class="form-select" aria-label="Default select example" name="sel_transfer_to" id="sel_transfer_to" required>\
                </select>';

                document.getElementById("account").disabled = true;
                document.getElementById("description").disabled = true;


                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url:'get-bank',
                    type:'get',
                    dataType:'json',

                    success:function (response) {
                        console.log(response);
                        // var len = 0;
                        if (response.data != null) {
                            // len = response.data.length;
                            $("#sel_transfer_from").empty();
                            $("#sel_transfer_to").empty();
                            $.each(response.data, function (key, item) {
                            $('#sel_transfer_from').append('<option class="opt1" value="" disabled selected hidden>Select Transfer From</option>\
                                                       <option value='+item.id+'>'+item.bank_name+'</option>');

                            $('#sel_transfer_to').append('<option class="opt1" value="" disabled selected hidden>Select Transfer To</option>\
                            <option value='+item.id+'>'+item.bank_name+'</option>');

                            });

                        }


                    }
                });


            }else{
               element.innerHTML = "";
               transfer_from.innerHTML = ""; //empty
               transfer_to.innerHTML = ""; //empty
               document.getElementById("account").disabled = false;
                document.getElementById("description").disabled = false;
            }


      });
  });
</script>

<script>
   $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>


<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\artisanhub\resources\views/pages\admin\membership\index.blade.php ENDPATH**/ ?>