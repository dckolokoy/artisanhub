<?php $__env->startSection('nav'); ?>


<nav class="main-header  navbar-expand navbar-white navbar-light " style="padding: 5px !important;z-index: 1">
  <!-- Left navbar links -->
     <div class="row mx-0">
          <div class="col-sm-1">
            <a class="nav-link " data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars" style="color: gray"></i></a>
          </div>

          <div class="col-sm-5">
            <h4 style="font-weight: bold" class="mt-1">Membership Plan</h4>
          </div>

          <div class="col-sm-3">
            <div class="input-group input-group-sm" >



            </div>
          </div>


</nav>
<?php $__env->stopSection(); ?>
<style>
@import  url(https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css);
@import  url(https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600);
.snip1404 {
  font-family: 'Source Sans Pro', Arial, sans-serif;
  color: #ffffff;
  text-align: left;
  font-size: 16px;
  width: 100%;
  max-width: 1000px;
  margin: 50px 10px;
}
.snip1404 img {
  position: absolute;
  left: 0;
  top: 0;
  height: 100%;
  z-index: -1;
}
.snip1404 .plan {
  margin: 20px;;
  width: 25%;
  position: relative;
  float: left;
  overflow: hidden;
  border: 3px solid #442232;
  box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
  background-color: #5f3047;
}
.snip1404 .plan:hover i,
.snip1404 .plan.hover i {
  -webkit-transform: scale(1.2);
  transform: scale(1.2);
}
.snip1404 .plan:first-of-type {
  border-radius: 8px 0 0 8px;
}
.snip1404 .plan:last-of-type {
  border-radius: 0 8px 8px 0;
}
.snip1404 * {
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
  -webkit-transition: all 0.25s ease-out;
  transition: all 0.25s ease-out;
}
.snip1404 header {
  background-color: #5f3047;
  color: #ffffff;
}
.snip1404 .plan-title {
  background-color: rgba(0, 0, 0, 0.5);
  position: relative;
  margin: 0;
  padding: 20px 20px 0;
  text-transform: uppercase;
  letter-spacing: 4px;
}
.snip1404 .plan-title:after {
  position: absolute;
  content: '';
  top: 100%;
  left: 0;
  width: 0;
  height: 0;
  border-style: solid;
  border-width: 40px 300px 0 0;
  border-color: rgba(0, 0, 0, 0.5) transparent transparent;
}
.snip1404 .plan-cost {
  padding: 40px 20px 10px;
  text-align: right;
}
.snip1404 .plan-price {
  font-weight: 600;
  font-size: 2em;
}
.snip1404 .plan-type {
  opacity: 0.8;
  font-size: 0.7em;
  text-transform: uppercase;
}
.snip1404 .plan-features {
  padding: 0 0 20px;
  margin: 0;
  list-style: outside none none;
}
.snip1404 .plan-features li {
  padding: 8px 5%;
}
.snip1404 .plan-features i {
  margin-right: 8px;
  color: rgba(0, 0, 0, 0.5);
}
.snip1404 .plan-select {
  border-top: 1px solid rgba(0, 0, 0, 0.2);
  padding: 20px;
  text-align: center;
}
.snip1404 .plan-select a {
  background-color: #442232;
  color: #ffffff;
  text-decoration: none;
  padding: 12px 20px;
  font-size: 0.75em;
  font-weight: 600;
  border-radius: 20px;
  text-transform: uppercase;
  letter-spacing: 4px;
  display: inline-block;
}
.snip1404 .plan-select a:hover {
  background-color: #552a3f;
}
.snip1404 .plan:hover {
  margin-top: -10px;
  border-color: #331926;
  box-shadow: 0 0 25px rgba(0, 0, 0, 0.4);
  z-index: 1;
  border-radius: 8px;cursor:pointer;
}
.snip1404 .plan .plan-select {
  padding: 30px 20px;
}
@media  only screen and (max-width: 767px) {
  .snip1404 .plan {
    width: 50%;
  }
  .snip1404 .plan-title,
  .snip1404 .plan-select a {
    -webkit-transform: translateY(0);
    transform: translateY(0);
  }
  .snip1404 .plan-select,
  .snip1404 .featured .plan-select {
    padding: 20px;
  }
  .snip1404 .featured {
    margin-top: 0;
  }
}
@media  only screen and (max-width: 440px) {
  .snip1404 .plan {
    width: 100%;
  }

}

</style>
<?php $__env->startSection('content'); ?>
<?php if(session('success')): ?>
<div class="alert alert-success">
  <?php echo e(session('success')); ?>

</div>
<?php endif; ?>


    <div class="container-fluid">

        <div class="row">
          <div class="col-md-12">
            <div class="card mb-12">
              <h5 class="card-header bg-primary text-white">Membership Information</h5>
              <div class="card-body">
                <div class="row" >
                    <div class="col-4">
                       <p style="color: black;font-size:17px;"> Active Plan: <span style="font-weight: bold">
                        <?php $__currentLoopData = $memberships; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $membership): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($membership->payment_type == 0): ?>
                                Starter
                            <?php elseif($membership->payment_type == 1): ?>
                                Basic
                            <?php else: ?>
                                Professional
                            <?php endif; ?>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </span></p>
                    </div>
                </div>
                <hr>
                <div class="row"  >
                    <div class="col-4">

                        <p style="color: black;font-size:17px;"> Date Start: <span style="font-weight: bold">
                            <?php $__currentLoopData = $memberships; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $membership): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <?php echo e(date('M-d-Y', strtotime($membership->created_at))); ?>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </span></p>

                    </div>
                </div>
                <hr>
                <div class="row"  >
                     <div class="col-4">
                        <p style="color: black;font-size:17px;"> Date End: <span style="font-weight: bold">

                            <td class="align-middle">
                                <?php $__currentLoopData = $memberships; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $membership): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if( $membership->payment_type == 0 ): ?>
                                    <?php echo e(date('M-d-Y', strtotime("+1 months",strtotime($membership->created_at)))); ?>

                                <?php elseif( $membership->payment_type == 1): ?>
                                    <?php echo e(date('M-d-Y', strtotime("+3 months",strtotime($membership->created_at)))); ?>

                                <?php else: ?>
                                   <?php echo e(date('M-d-Y', strtotime("+12 months",strtotime($membership->created_at)))); ?>

                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </td>
                        </span></p>
                     </div>
                </div>
              </div>
            </div><!--/.card-->
          </div>
        </div><!-- /.row -->

      </div>
      <center>
<div class="snip1404">
    <div class="plan">
      <header>
        <h4 class="plan-title">
          Starter
        </h4>
        <div class="plan-cost"><span class="plan-price">₱ 200</span>
      </header>
      <ul class="plan-features">
        <li><i class="ion-checkmark"> </i>1 Month</li>

      </ul>
      <div class="plan-select"><a href="">

        <?php if($memberships == "[]"): ?>
            <form action="<?php echo e(url('charge')); ?>" method="post">
                <input style="display:none" type="hidden" name="amount" value="200"/>
                <input style="display:none" type="hidden" name="payment_type" value="0"/>
                <input style="display:none" type="hidden" name="route" value="1"/>
                <?php echo e(csrf_field()); ?>

                <input type="submit" style=" all: unset;
                cursor: pointer;" name="submit" class="plan-select" style="display:inline;" value="Select Plan" >

            </form>
        <?php else: ?>



            <?php if($membership->payment_type == 0): ?>

            <input type="" style=" all: unset;
            cursor: pointer;" name="submit" class="plan-select"  value="Subscribed" disabled>

            <?php else: ?>
              <input type="" style=" all: unset;
              cursor: pointer;" name="submit" class="plan-select"  value="" disabled>
            <?php endif; ?>
        <?php endif; ?>

        
                    </a></div>
    </div>
    <div class="plan">
      <header>
        <h4 class="plan-title">

          Basic
        </h4>
        <div class="plan-cost"><span class="plan-price">₱ 500</span>
      </header>
      <ul class="plan-features">
        <li><i class="ion-checkmark"> </i>3 Months</li>

      </ul>
      <div class="plan-select"><a href="">

        <?php if($memberships == "[]"): ?>
        <form action="<?php echo e(url('charge')); ?>" method="post">
            <input style="display:none" type="hidden" name="amount" value="500"/>
            <input style="display:none" type="hidden" name="payment_type" value="1"/>
            <input style="display:none" type="hidden" name="route" value="1"/>
            <?php echo e(csrf_field()); ?>

            <input type="submit" style=" all: unset;
            cursor: pointer;" name="submit" class="plan-select" style="display:inline;" value="Select Plan" >

        </form>
    <?php else: ?>



        <?php if($membership->payment_type == 1): ?>

        <input type="" style=" all: unset;
        cursor: pointer;" name="submit" class="plan-select"  value="Subscribed" disabled>

        <?php else: ?>
        <input type="" style=" all: unset;
        cursor: pointer;" name="submit" class="plan-select"  value="" disabled>
        <?php endif; ?>
    <?php endif; ?>

        

             </a></div>
    </div>
    <div class="plan featured">
      <header>
        <h4 class="plan-title">

          Professional
        </h4>
        <div class="plan-cost"><span class="plan-price">₱ 1,500</span>
      </header>
      <ul class="plan-features">
        <li><i class="ion-checkmark"> </i>12 Months</li>

      </ul>
      <div class="plan-select"><a href="">

        <?php if($memberships == "[]"): ?>
        <form action="<?php echo e(url('charge')); ?>" method="post">
            <input style="display:none" type="hidden" name="amount" value="1500"/>
            <input style="display:none" type="hidden" name="payment_type" value="2"/>
            <input style="display:none" type="hidden" name="route" value="1"/>
            <?php echo e(csrf_field()); ?>

            <input type="submit" style=" all: unset;
            cursor: pointer;" name="submit" class="plan-select" style="display:inline;" value="Select Plan" >

        </form>
    <?php else: ?>



        <?php if($membership->payment_type == 2): ?>

        <input type="" style=" all: unset;
        cursor: pointer;" name="submit" class="plan-select"  value="Subscribed" disabled>
        <?php else: ?>
        <input type="" style=" all: unset;
        cursor: pointer;" name="submit" class="plan-select"  value="" disabled>
        <?php endif; ?>
    <?php endif; ?>
        
            
        

             </a></div>
    </div>


  </div>
</center>


<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.member', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Art march 15 remake v3.51-uPDATED-latest\resources\views/pages\member\membership\index.blade.php ENDPATH**/ ?>