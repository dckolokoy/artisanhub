
<?php $__env->startSection('title', 'Cart'); ?>
<?php $__env->startSection('content'); ?>

    

    <div>
        <div style="height: 50px;"></div>
        <div style="width: 90%; margin: 0 auto;">
            <center>
                <?php if(session('success')): ?>
                <div class="alert alert-success">
                  <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?>
                <img src="<?php echo e(url('justnpot/images/cart.jpg')); ?>" width="10%"> </center>
            <center>
                <p style="font-size: 2.4em; color: red"> VIEW CART PRODUCT HERE </p>
            </center>
            <?php if(count($transaction_items) != 0): ?>
            <p align="center">
                Grand Total: ₱ <?php echo e(number_format($grandtotal)); ?>

                <br>

                
            <p>
                <center>
                    <div style="" class="text-right py-2">
                        

                        <form action="<?php echo e(url('charge')); ?>" method="post">
                            <input style="display:none" type="number" name="amount" value="<?php echo e($grandtotal); ?>"/>
                            <?php echo e(csrf_field()); ?>

                            <input type="submit" name="submit" class="btn btn-success" style="display:inline;" value="Checkout" onclick="if (confirm('Do you want to proceed to payment?')){return true;}else{event.stopPropagation(); event.preventDefault();};">

                        </form>

                    </div>
                </center>



                <br>
                <div>
                    <div class="row">
                        <div class="col-12">
                        <?php if($errors->any()): ?>
                            <?php echo e(implode('', $errors->all(':message'))); ?>

                        <?php endif; ?>
                            <div class="tablesizes card-body table-responsive p-0" style="z-index: -99999">
                              <table id="table_id" class="table table-head-fixed text-nowrap table-striped table-hover">
                                <thead class="thead-light">
                                  <tr>
                                   <th>ID</th>
                                   <th>Image</th>
                                   <th>Name</th>
                                <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Amount</th>
                                    <th>Action</th>

                                  </tr>
                                </thead>
                                <tbody>
                                  <?php $__currentLoopData = $transaction_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <tr>
                                    <td class="align-middle"><?php echo e($transaction_item ->t_id); ?></td>
                                    <td>
                                        <img class="card-img rounded-0 img-fluid" style="  width:  100px;
                                        height: 100px;
                                        object-fit: cover;"
                                        src="<?php echo e(asset(''.$transaction_item->m_image.'')); ?>">
                                    </td>
                                    <td class="align-middle"><?php echo e($transaction_item ->m_name); ?></td>
                                    <td class="align-middle"><?php echo e($transaction_item->t_quantity); ?>  
                                        <?php
                                        $type=DB::table('categories')
                                        ->select('type')
                                        ->where('categories.id',$transaction_item->cat_id)
                                        ->first();
                                        ?>
                                        <?php if($type->type=='tangible'): ?>
                                         <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#updateModal<?php echo e($transaction_item->t_id); ?>">+</button></td>
                                         <?php endif; ?>
                                    <td class="align-middle text-wrap" ><?php echo e(number_format($transaction_item ->m_price)); ?></td>
                                    <td class="align-middle text-wrap" ><?php echo e(number_format($transaction_item ->m_price*$transaction_item->t_quantity)); ?></td>
                                    <td class="align-middle text-wrap" >
                                        <form action="my-cart/<?php echo e($transaction_item ->t_id); ?>" method="POST" enctype="multipart/form-data" style="display: inline;">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit"  class="btn  btn-danger" style="display:inline;" onclick="return confirm('Are you sure?')">DELETE</button>

                                        </form>
                                        <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#updateModal<?php echo e($transaction_item->t_id); ?>">Edit</button> -->
                                    </td>
                          
                                        

                                    </td>

                                  </tr>
                                  <!-- Create the update modal for each row using a unique ID -->
<div class="modal fade" id="updateModal<?php echo e($transaction_item->t_id); ?>" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel<?php echo e($transaction_item->t_id); ?>" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="updateModalLabel<?php echo e($transaction_item->t_id); ?>">Update Item</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Update form -->
        <form action="my-cart/<?php echo e($transaction_item->t_id); ?>" method="POST" enctype="multipart/form-data">
          <?php echo csrf_field(); ?>
          <?php echo method_field('PUT'); ?>
          <!-- Input fields to update the data -->
          <div class="form-group">
            <label for="name">Quantity</label>
            <input type="text" class="form-control" id="quantity" name="quantity" value=" <?php echo e($transaction_item->t_quantity); ?> ">
            <input type="hidden" class="form-control" id="price" name="price" value=" <?php echo e($transaction_item->m_price); ?> ">
          </div>
          
          <!-- Add more input fields as needed -->

          <button type="submit" class="btn btn-primary">Save Changes</button>
        </form>
      </div>
    </div>
  </div>
</div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                              </table>
                              
                            </div>
                          </div>
                        </div>


                <?php else: ?>
                    <p align="center">
                        -- Cart is Empty --
                    </p>
                <?php endif; ?>
        </div>
    </div>
    
    <hr>

    </div>

    <div class="modal fade" id="updateCartOrder" tabindex="-1" role="dialog" aria-labelledby="updateCartOrderLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateCartOrderLabel">Update Order</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <div class="">
                                <div class="col-sm-12 col-md" align="center">
                                    <img src="" width=100 height=100 id="order-Img">
                                </div>
                                <div class="text-center">
                                    
                                    <h1><span id="order-Name"></span></h1>
                                    
                                    
                                    <div class="">
                                        <div class="">Price: <span id="order-Price"></span></div>
                                    </div>
                                    <div class="">
                                        


                                        <div class="">Qty: <input type="number" name="qty" value="1" min=1 max=10 maxlength=10
                                                 id="order-Qty" style="width: 70px;"></input></div>

                                    </div>
                                </div>
                                <br>
                            </div>
                        </div>


                        
                    </form>
                </div>
                <div class="modal-footer">

                    <div>Total: <span id="order-Total"> </div>
                    <button type="button" class="btn-sm btn-secondary" data-dismiss="modal" id="modal-close-btn">Close</button>
                    <button type="button" class="btn-sm btn-disabled" id="modal-update-btn" disabled>Update</button>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function click (e) {
          if (!e)
            e = window.event;
          if ((e.type && e.type == "contextmenu") || (e.button && e.button == 2) || (e.which && e.which == 3)) {
            if (window.opera)
              window.alert("");
            return false;
          }
        }
        if (document.layers)
          document.captureEvents(Event.MOUSEDOWN);
        document.onmousedown = click;
        document.oncontextmenu = click;
        </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('justnpot.customer-main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\artisanhub\resources\views/justnpot\customer\main-cart.blade.php ENDPATH**/ ?>