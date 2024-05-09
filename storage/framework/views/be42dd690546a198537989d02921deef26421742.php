<div id="sectionId">
    <div class="container ">
        <br>      <br>

        <div class="container">
            <div class="row">
              <div class="col">
                <div class="card card-header">
                  Chat
                </div>
                <div class="card card-header">
                    <button class="btn btn-primary"> <a href="#send" style="color: white">Go to recent conversation</a> </button>
                  </div>
              </div>
            </div>

            <div class="row">
              <div class="col">
                <div class="card card-body" >
                  <ul class="list-group list-group-flush">
                    <?php $__currentLoopData = $chats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($chat->customer_reply != 0): ?>
                        <li class="list-group-item mb-2" style="background-color:skyblue"><div style="text-align: right; float: right;">
                <?php echo e($chat->message); ?>

            
             
            </div>
            <div style="text-align: left; float: left;">
            <img src="<?php echo e(asset('uploads/image_id/' . auth()->user()->picture)); ?>" class="img-circle" style="width:20px; height:20px;"  alt="User Image">
            <br>
                <small><i>Sent <?php echo e(date('m-d H:i:s', strtotime($chat->created_at . ' +8 hours'))); ?></i></small>
            </div></li>
                        <?php else: ?>
                        <li class="list-group-item mb-2" ><div style="text-align: left; float: left;"><?php echo e($chat->message); ?>  
                        </div>
                             <div style="text-align: right; float: right;">
            
                             <img src="<?php echo e(asset('uploads/image_id/' . $chat->sender_name)); ?>" class="img-circle" style="width:20px; height:20px;"  alt="User Image">
                             <br>
                             <small><i>Sent <?php echo e(date('m-d H:i:s', strtotime($chat->created_at . ' +8 hours'))); ?></i></small>       </div>
       
                            </li>   <?php endif; ?>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </ul>
                </div>
              </div>
            </div>
        </div>
    </div>
 </div>

<?php /**PATH C:\xampp\htdocs\artisanhub\resources\views/justnpot/customer/section.blade.php ENDPATH**/ ?>