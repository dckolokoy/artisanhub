<?php $__env->startSection('nav'); ?>


<nav class="main-header  navbar-expand navbar-white navbar-light " style="padding: 5px !important;z-index: 1">
  <!-- Left navbar links -->
     <div class="row mx-0">
          <div class="col-sm-1">
            <a class="nav-link " data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars" style="color: gray"></i></a>
          </div>

          <div class="col-sm-5">
            <h4 style="font-weight: bold" class="mt-1">Product</h4>
          </div>

          <div class="col-sm-3">
            <div class="input-group input-group-sm" >



            </div>
          </div>

          <div class="col-sm-3">
            
               <!-- Button trigger modal -->


                            <button type="button" class="btn btn-primary  mt-1" data-toggle="modal" data-target="#exampleModalScrollable" >
                                Add New Product
                            </button>


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

  </style>
<div class="container-fluid">
  <?php if(session('success')): ?>
      <div class="alert alert-success">
        <?php echo e(session('success')); ?>

      </div>
  <?php endif; ?>
<div class="row">
          <div class="col-12" >

              <div class=" card-body table-responsive p-0" style="z-index: -99999">
                <table class="table table-head-fixed text-nowrap table-striped table-hover" id="myTable" >
                  <thead class="thead-light">
                    <tr>
                     <th>ID</th>
                      <th>Name</th>
                      <th>Action</th>

                    </tr>
                  </thead>
                  <tbody>
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td class="align-middle"><?php echo e($user ->id); ?></td>

                      <td class="align-middle"><?php echo e($user ->name); ?></td>

                      <td class="align-middle">
                        <a id="member-chat-link" href="<?php echo e(route('member-chat', ['store_id' => auth()->user()->id, 'customer_id' => $user->id])); ?>" class="btn btn-info text-white mt-2" data-id="<?php echo e($user->id); ?>">
                          <div style="position: relative;">
                            <i class="far fa-comment-dots"></i>
                            <div style="position: absolute; top: -10px; right: -10px;">
                              <?php if($user->unread_count > 0): ?>
                                <span class="badge badge-danger">    <i class="fas fa-check"></i></span>
                              <?php endif; ?>
                            </div>
                          </div>
                          Message
                        </a>
                      </td>





                      
                    </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->


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

$(document).ready(function() {
    $('body').on('click', '#member-chat-link', function(event) {
        var customer_id = $(this).data('id');
        $.ajax({
            url: '<?php echo e(route('chat.mark-as-read-member')); ?>',
            type: 'POST',
            data: {
                store_id: '<?php echo e(auth()->user()->id); ?>',
                customer_id: customer_id
            },
            success: function(response) {
                // Update the DOM to show that the message has been read
                // For example, you can change the color of the chat icon or remove the badge
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error('Error updating chat message status:', errorThrown);
            }
        });
    });
});


</script>


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
    $('#myTable').DataTable{
        "order": [[ 0, "desc" ]] // Sort the first column (Date) in descending order
    }();
} );
</script>






<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.member', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Art march 15 remake v3.51-uPDATED-latest\resources\views/pages\member\chat\index.blade.php ENDPATH**/ ?>