<?php $__env->startSection('nav'); ?>


<nav class="main-header  navbar-expand navbar-white navbar-light " style="padding: 5px !important;z-index: 1">
  <!-- Left navbar links -->
     <div class="row mx-0">
          <div class="col-sm-1">
            <a class="nav-link " data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars" style="color: gray"></i></a>
          </div>

          <div class="col-sm-5">
            <h4 style="font-weight: bold" class="mt-1">Manage Pending Accounts</h4>
          </div>

          <div class="col-sm-3">
            <div class="input-group input-group-sm" >



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
  </style>
<div class="container-fluid">
  <?php if(session('success')): ?>
      <div class="alert alert-success">
        <?php echo e(session('success')); ?>

      </div>
  <?php endif; ?>
<div class="row">
          <div class="col-12">
          <?php if($errors->any()): ?>
              <?php echo e(implode('', $errors->all(':message'))); ?>

          <?php endif; ?>
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
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td class="align-middle"><?php echo e($user ->id); ?></td>
                        <td class="align-middle"><img src="<?php echo e(asset('uploads/image_id/'.$user->picture.'')); ?>" style="height:80px;width:120px;" class="card-img-top" alt="..."></td>
                       
                        <td class="align-middle"><img src="<?php echo e(asset('uploads/image_id/'.$user->image.'')); ?>" style="height:80px;width:120px;" class="card-img-top" alt="..."></td>
                        
                        <td class="align-middle text-wrap" ><?php echo e($user ->name); ?></td>
                        <td class="align-middle text-wrap"><?php echo e($user ->email); ?></td>
                        <td class="align-middle text-wrap">
                            <?php if($user ->role == 0): ?>
                                Customer
                            <?php else: ?>
                                Member
                            <?php endif; ?>
                        </td>

                    <td class="align-middle"                                                         >
                        <?php if($user ->is_verified == 0): ?>
                        <form action="/admin/user/pending/<?php echo e($user ->id); ?>" method="POST" enctype="multipart/form-data" style="display: inline;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <input type="text" style="display: none;" value="1" name="status" id="status">
                            <input type="text" style="display: none;" value="pending" name="route" id="route">
                            <button type="submit"  class="btn  btn-primary" style="display:inline;"><i class="fa fa-thumbs-up"> </i></button>
                        </form>
                        <button data-id="<?php echo e($user->id); ?>" type="submit" class="btn  btn-danger declinedBtn"> <i class="fa fa-thumbs-down"> </i></button>
                        

                         <?php elseif($user ->is_verified == 1): ?>
                             <button type="submit"  class="btn  btn-success" style="display:inline;"><i class="fa fa-thumbs-up"> </i></button>
                         <?php else: ?>
                             <button type="submit"  class="btn  btn-danger" style="display:inline;"><i class="fa fa-thumbs-down"> </i></button>
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
    <!-- Modal -->
    <div class="modal fade" id="declinedModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollable1Title" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalScrollable1Title">Decline User</h5>
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
                                    <label for="remarks2">Remarks</label>
                                      <textarea class="form-control" id="remarks" name="remarks" rows="3"></textarea>
                                      <input style="display: none;" type="text" class="form-control" value="2" name="status2" id="status2">
                                      <input type="text" style="display: none;" value="2" name="status" id="status">
                                      <input type="text" style="display: none;" value="pending" name="route" id="route">


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

            <div class="mt-2">
              <?php echo e($users->links()); ?>

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


  $('body').on('click', '.declinedBtn', function () {
      $('#declinedModal').modal('show');
       var trans_id = $(this).data('id');

         let declineroutes = "/admin/user/pending/"+trans_id;
          $("#declineroute").attr("action", declineroutes);

    });

    </script>

<script>
   $(document).ready( function () {
    $('#table_id').DataTable();
} );
</script>


<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Art march 15 remake v3.51-uPDATED-latest\resources\views/pages/admin/user/pending.blade.php ENDPATH**/ ?>