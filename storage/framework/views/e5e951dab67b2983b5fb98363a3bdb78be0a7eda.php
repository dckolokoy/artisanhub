<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en"><!-- Basic -->
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->

    <meta content="width=device-width, initial-scale=1" name="viewport" />
     <!-- Site Metas -->
    <title>ArtisanHub - <?php echo $__env->yieldContent('title'); ?></title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <!-- Site Icons -->
    
    

    <!-- Bootstrap CSS -->


	<!-- Site CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('justnpot/css/style.css')); ?>">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('justnpot/css/responsive.css')); ?>">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('justnpot/css/custom.css')); ?>">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="<?php echo e(asset('/paint/img/apple-icon.png')); ?>">
    <link rel="shortcut icon" type="image/x-icon" href="asset('/img/favicon.ico')">

    <link rel="stylesheet" href="<?php echo e(asset('/paint/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/paint/css/templatemo.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/paint/css/custom.css' )); ?>">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="<?php echo e(asset('/paint/css/fontawesome.min.css')); ?>">



    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->



</head>

<body style=" background-color:rgb(203, 159, 159)">
    <?php echo e(\EmtiazZahid\Tidio\Tidio::widgetCode('ookyp1vlx6pqnq1hcannjym20nhkgize')); ?>

    <?php echo $__env->make('justnpot.layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>;


        
        <?php echo $__env->yieldContent('content'); ?>

        <?php echo $__env->make('justnpot.layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>;

	

	<a href="#" id="back-to-top" title="Back to top" style="display: none;"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></a>

	<!-- ALL JS FILES -->
	<script src="<?php echo e(asset('justnpot/js/jquery-3.2.1.min.js')); ?>"></script>
	<script src="<?php echo e(asset('justnpot/js/popper.min.js')); ?>"></script>
	<script src="<?php echo e(asset('justnpot/js/bootstrap.min.js')); ?>"></script>
    <!-- ALL PLUGINS -->
	<script src="<?php echo e(asset('justnpot/js/jquery.superslides.min.js')); ?>"></script>
	<script src="<?php echo e(asset('justnpot/js/images-loded.min.js')); ?>"></script>
	<script src="<?php echo e(asset('justnpot/js/isotope.min.js')); ?>"></script>
	<script src="<?php echo e(asset('justnpot/js/baguetteBox.min.js')); ?>"></script>
	<script src="<?php echo e(asset('justnpot/js/form-validator.min.js')); ?>"></script>
    <script src="<?php echo e(asset('justnpot/js/contact-form-script.js')); ?>"></script>
    <script src="<?php echo e(asset('justnpot/js/custom.js')); ?>"></script>

    <?php echo $__env->yieldContent('scripts'); ?>
    <?php echo $__env->yieldContent('styles'); ?>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\artisanhub\resources\views/justnpot/customer-main.blade.php ENDPATH**/ ?>