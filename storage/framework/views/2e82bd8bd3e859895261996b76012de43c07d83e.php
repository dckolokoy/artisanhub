<?php $__env->startSection('nav'); ?>


<nav class="main-header  navbar-expand navbar-white navbar-light " style="padding: 5px !important;z-index: 1">
  <!-- Left navbar links -->
     <div class="row mx-0">
          <div class="col-sm-1">
            <a class="nav-link " data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars" style="color: gray"></i></a>
          </div>

          <div class="col-sm-5">
            <h4 style="font-weight: bold" class="mt-1">My Account</h4>
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

textarea{
    text-align:right;
}
  </style>




<div class="container-fluid">
  <?php if(session('success')): ?>
      <div class="alert alert-success">
        <?php echo e(session('success')); ?>

      </div>
  <?php endif; ?>


<div class="container-xl px-4 mt-4">
  <!-- Account page navigation-->
  <div class="row">
      <div class="col-xl-6">
          <!-- Profile picture card-->
          <div class="card mb-4 mb-xl-0 h-100">
              
              <div class="card-header">Resident</div>
              <div class="card-body text-center ">
                  <!-- Profile picture image-->
                  <img class=" rounded-circle mt-5 " style=" width: 100%;
                  height: auto;max-width:300px;"  src="<?php echo e(asset('uploads/image_id/' . auth()->user()->picture)); ?>" alt="">
                  <!-- Profile picture help block-->
                  
                  <!-- Profile picture upload button-->
                  
              </div>
          </div>
      </div>
      <div class="col-xl-6">
          <!-- Account details card-->
          <div class="card mb-4 h-100">
              <div class="card-header">Account Details</div>
              <div class="card-body">
                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <form action="account/<?php echo e($user->id); ?>" method="POST" enctype="multipart/form-data" id="updateroute">
     <?php echo csrf_field(); ?> 
                   <?php echo method_field('PUT'); ?>
              
               
                      <!-- Form Group (username)-->

                      <div class="mb-3">
                          <label class="small mb-1" for="">Full Name</label>
                          <input value="<?php echo e($user ->name); ?>" class="form-control" id="name" name="name" type="text" placeholder="Enter your full name" >
                      </div>


                      <div class="mb-3">
                        <label class="small mb-1" for="">Email Address</label>
                        <input value="<?php echo e($user ->email); ?>" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="email" name="email" type="email" placeholder="Enter your email address">
                        <?php if($errors->has('email')): ?>
                        <p style="color:red;">
                            <?php $__currentLoopData = $errors->get('email'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $errormessage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php echo e($errormessage); ?><br>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </p>
                        <?php endif; ?>
                    </div>

                      <!-- Form Row        -->
                      <div class="row gx-3 mb-3">
                        <!-- Form Group (organization name)-->
                        <div class="col-md-6">
                            <label class="small mb-1" for="">Contact No</label>
                            <input value="<?php echo e($user ->mobile); ?>" class="form-control" id="mobile" name="mobile" type="text" pattern="\d*" maxlength="11" minlength="11" placeholder="eg. +639123456789" >
                        </div>

                        <!-- Form Group (location)-->
                        <div class="col-md-6">
                            <label class="small mb-1" for="">Gender</label>
                            <select class="form-select" aria-label="Default select example" name="gender" id="gender" >
                                <option class="opt1" value="" disabled selected hidden>Select Gender</option>
                                <option value="0" <?php echo e($user ->gender == 0 ? 'selected' : ''); ?>> Male</option>
                                <option value="1" <?php echo e($user ->gender == 1 ? 'selected' : ''); ?>> Female</option>

                             </select>
                        </div>
                    </div>
                    <div class="row">
                                    <div class="col-sm">
                                    <label for="image">Profile Picture</label>
                                    <input id="image2" type="file" class="form-control" name="image2" >

                                    </div>
                                </div>

                    <div class="row gx-3 mb-3">
                      <!-- Form Group (organization name)-->
                      <div class="col-md-6">
                          <label class="small mb-1" for="">Age</label>
                          <input class="form-control" value="<?php echo e($user ->age); ?>" id="age" name="age" type="number" placeholder="Age" >
                      </div>
                      <!-- Form Group (location)-->
                      <div class="col-md-6">
                          <label class="small mb-1" for="">Birthdate</label>
                          <input class="form-control" value="<?php echo e($user ->birthdate); ?>" id="birthdate" name="birthdate" type="date">
                      </div>
                  </div>
                        <!-- Form Group (email address)-->
                        <div class="mb-3">
                          <label class="small mb-1" for="">Address</label>
                          <textarea class="form-control" style="text-align:left" name="address" id="address" cols="30" rows="2" ><?php echo e($user ->address); ?></textarea>
                      </div>


                      <div class=" mb-3">
                        <label class="small mb-1" for="">Password</label>

                            <input id="password" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password"  autocomplete="new-password">

                            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                    </div>

                    <div class="mb-3">
                        <label class="small mb-1" for="">Confirm Password</label>

                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">

                    </div>

                      <!-- Form Row-->
                      
                      <!-- Save changes button-->
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      <div class="footer">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
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


         let updateroutes = "/resident/client/"+user_id;
          $("#updateroute").attr("action", updateroutes);


      $.get('/admin/admin/'+user_id+'/edit', function (data) {
        console.log(data.name);
           $('#name').val(data.name);
           $('#email').val(data.email);
           $("#role").val(data.role);
           $('#password').val(data.password);
       });

    });
  });



    </script>

<script>
   $(document).ready( function () {
    $('#table_id').DataTable();
} );
</script>


<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.member', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\artisanhub\resources\views/pages\member\account\index.blade.php ENDPATH**/ ?>