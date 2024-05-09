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

                     <?php if($product_count >= 5): ?>
                            <?php if($payments != '[]'): ?>
                            <?php $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($payment->created_at != Carbon\Carbon::now()): ?>
                                <button type="button" class="btn btn-primary  mt-1" data-toggle="modal" data-target="#exampleModalScrollable" >
                                    Add New Product
                                </button>
                                <?php else: ?>
                                    <a type="button" href="/member/membership" style="color: white" class="btn btn-primary  mt-1"  >
                                        Subscribe to add more products
                                    </a>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>

                            <a type="button" href="/member/membership" style="color: white" class="btn btn-primary  mt-1"  >
                                Subscribe to add more products
                            </a>

                             <?php endif; ?>
                    <?php else: ?>

                            <button type="button" class="btn btn-primary  mt-1" data-toggle="modal" data-target="#exampleModalScrollable" >
                                Add New Product
                            </button>
                     <?php endif; ?>

                     <!-- Modal -->
                     <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                       <div class="modal-dialog modal-lg " role="document">
                         <div class="modal-content">
                           <div class="modal-header">
                             <h5 class="modal-title" id="exampleModalScrollableTitle">Product Information</h5>
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                               <span aria-hidden="true">&times;</span>
                             </button>
                           </div>
                           <div class="modal-body">
                             <form action="/member/product" method="POST" enctype="multipart/form-data">
                               <?php echo csrf_field(); ?>

                               <div class="container">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="category">Category</label>
                                        <select class="form-select js-example-basic-multiple" aria-label="Default select example" name="sel_category_id" id="sel_category_id"  required>
                                        <option class="opt1" value="" disabled selected hidden>Select Item</option>
                                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                              <option name="<?php echo e($category->type); ?>" value="<?php echo e($category->id); ?>"> <?php echo e($category->name); ?> </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" name="name" id="name" placeholder="Name" required>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-sm-6" id="date_from">
                                        <label for="price">Price</label>
                                        <input type="number" class="form-control" name="price" id="price" placeholder="Price" required>
                                    </div>
                                    <div class="col-sm-6" id="date_from">
                                        <label for="image" id="changeNameIMG">Image</label>
                                        <input type="file" class="form-control" name="image" id="image" placeholder="Image" required>
                                    </div>
                                </div>
                                <div class="row" id="extra_images" style="display:none;">
  <div class="col-sm-6">
    <label for="image2">Side View</label>
    <input type="file" class="form-control" name="image2" id="image2" placeholder="Image 2">
  </div>
  <div class="col-sm-6">
    <label for="image3">Back view</label>
    <input type="file" class="form-control" name="image3" id="image3" placeholder="Image 3">
  </div>
</div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="artist">Artist</label>
                                        <input type="text" class="form-control" name="artist" id="artist" value="<?php echo e(auth()->user()->name); ?>"  required readonly>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label for="description">Description</label>
                                        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                                    </div>
                                </div>


                        </div>

                               <div class="modal-footer">
                                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                 <button type="submit" class="btn btn-primary">Add Product</button>
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
          <div class="col-12" >

              <div class=" card-body table-responsive p-0" style="z-index: -99999">
                <table class="table table-head-fixed text-nowrap table-striped table-hover" id="myTable" >
                  <thead class="thead-light">
                    <tr>
                     <th>ID</th>
                      <th>Image</th>
                      <th>Name</th>
                      <th>Description</th>
                      <th>Artist</th>
                      <th>Price</th>
                      <th>Category</th>
                      <th>Action</th>

                    </tr>
                  </thead>
                  <tbody>
                    <?php $__currentLoopData = $menu_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td class="align-middle"><?php echo e($menu_item ->m_id); ?></td>
                      <td class="align-middle"><img src="<?php echo e(asset($menu_item->m_image)); ?>" style="height:80px;width:120px;" class="card-img-top" alt="..."></td>
                      <td class="align-middle"><?php echo e($menu_item ->m_name); ?></td>
                      <td class="align-middle text-wrap"><?php echo e($menu_item ->m_description); ?></td>
                      <td class="align-middle"><?php echo e($menu_item ->m_artist); ?></td>
                      <td class="align-middle"><?php echo e($menu_item ->m_price); ?></td>
                      <td class="align-middle"><?php echo e($menu_item ->c_name); ?></td>
                      <td class="align-middle">
                          
                          <button type="button" data-id="<?php echo e($menu_item->m_id); ?>"  class="btn btn-primary editbtn"> <i class="fas fa-edit"></i> </button>

                          <form action="/member/product/<?php echo e($menu_item->m_id); ?>" method="POST" style=" display:inline;">
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
                                    <div class="col-sm-6">
                                        <label for="category">Category</label>
                                        <select class="form-select js-example-basic-multiple" aria-label="Default select example" name="sel_category_id2" id="sel_category_id2" required>
                                            <option class="opt1" value="" disabled selected hidden>Select Item</option>
                                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                              <option value="<?php echo e($category->id); ?>"> <?php echo e($category->name); ?> </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="name2">Name</label>
                                        <input type="text" class="form-control" name="name2" id="name2" placeholder="Name" required>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-sm-6" id="date_from">
                                        <label for="price2">Price</label>
                                        <input type="number" class="form-control" name="price2" id="price2" placeholder="Price" required>
                                    </div>
                                    <div class="col-sm-6" id="date_from">
                                        <label for="image2">Image</label>
                                        <input type="file" class="form-control" name="image2" id="image2" placeholder="Image">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="artist2">Artist</label>
                                        <input type="text" class="form-control" name="artist2" id="artist2" placeholder="Artist" required readonly>
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
                                 <button type="submit" class="btn btn-primary">Update Menu Item</button>
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

            <div class="mt-2">
              <?php echo e($menu_items->links()); ?>

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
    $('#sel_category_id').change(function() {
    if ($(this).find('option:selected').attr('name') === 'tangible') {
      
      $('#extra_images').show();
       $('#changeNameIMG').text('Front View');
    } else {
      
      $('#extra_images').hide();
      $('#changeNameIMG').text('Image');
 
      
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
    $('#myTable').DataTable();


} );
</script>





<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.member', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\artisanhub\resources\views/pages\member\product\index.blade.php ENDPATH**/ ?>