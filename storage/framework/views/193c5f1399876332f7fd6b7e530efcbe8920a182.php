

<?php $__env->startSection('nav'); ?>


<nav class="main-header  navbar-expand navbar-white navbar-light " style="padding: 5px !important;z-index: 1">
  <!-- Left navbar links -->
     <div class="row mx-0">
          <div class="col-sm-1">
            <a class="nav-link " data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars" style="color: gray"></i></a>
          </div>

          <div class="col-sm-5">
            <h4 style="font-weight: bold" class="mt-1">Categories</h4>
          </div>

          <div class="col-sm-3">
            <div class="input-group input-group-sm" >



            </div>
          </div>

          <div class="col-sm-3">
            
               <!-- Button trigger modal -->
                     <button type="button" class="btn btn-primary  mt-1" data-toggle="modal" data-target="#exampleModalScrollable">
                       Add New Category
                     </button>

                     <!-- Modal -->
                     <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                       <div class="modal-dialog modal-m " role="document">
                         <div class="modal-content">
                           <div class="modal-header">
                             <h5 class="modal-title" id="exampleModalScrollableTitle">Product Information</h5>
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                               <span aria-hidden="true">&times;</span>
                             </button>
                           </div>
                           <div class="modal-body">
                             <form action="/member/category" method="POST" enctype="multipart/form-data">
                               <?php echo csrf_field(); ?>

                               <div class="container">

                               <div class="row">
                                    <div class="col-sm">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" name="name" id="name" placeholder="Name" required>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-sm">
                                    <label for="type">Type</label>
<select class="form-control " name="type" id="type" required>
  <option value="">Select type</option>
  <option value="tangible">Tangible</option>
  <option value="intangible">Intangible</option>
</select>
    </div>

                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <label for="description">Description</label>
                                        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                                    </div>
                                </div>
                                <br>

                        </div>

                               <div class="modal-footer">
                                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                 <button type="submit" class="btn btn-primary">Add Category</button>
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
                      <th>Name</th>
                      <th>Description</th>
                      <th>Action</th>

                    </tr>
                  </thead>
                  <tbody>
                    <?php $__currentLoopData = $menu_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>

                      <td class="align-middle"><?php echo e($menu_category ->id); ?></td>
                      <td class="align-middle"><?php echo e($menu_category ->name); ?></td>
                      <td class="align-middle  text-wrap"><?php echo e($menu_category ->description); ?></td>
                      <td class="align-middle">
                          
                          <button type="button" data-id="<?php echo e($menu_category->id); ?>"  class="btn btn-primary editbtn"> <i class="fas fa-edit"></i> </button>
                          <form action="/admin/category/<?php echo e($menu_category->id); ?>" method="POST" style=" display:inline;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field("DELETE"); ?>
                            <button type="submit" class="btn btn-danger " onclick="return confirm('Are you sure you want to delete this product?')"> <i class="fas fa-trash"></i>  </button>
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
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('PUT'); ?>

                                        <div class="container">

                            <div class="row">
                                 <div class="col-sm">
                                     <label for="name2">Name</label>
                                     <input type="text" class="form-control" name="name2" id="name2" placeholder="Name" required>
                                 </div>

                             </div>


                             <div class="row">
                                 <div class="col-sm-12">
                                     <label for="description2">Description</label>
                                     <textarea class="form-control" id="description2" name="description2" rows="3"></textarea>
                                 </div>
                             </div>
                             <br>

                     </div>

                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                            </form>

                              </div>
                          </div>
                     </div>

                          

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
  $(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('body').on('click', '.editbtn', function () {
      var id = $(this).data('id');
      $('#editmodal').modal('show');


         let updateroutes = "/admin/menu-category/"+id;
          $("#updateroute").attr("action", updateroutes);


      $.get('/admin/menu-category/'+id+'/edit', function (data) {
        console.log(data);
           $('#name2').val(data.name);
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





<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\artisanhub\resources\views/pages\admin\menu_category\index.blade.php ENDPATH**/ ?>