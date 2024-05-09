<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <?php $__currentLoopData = $appointments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $appointment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($appointment->is_verified == 1): ?>
            Hello <?php echo e($appointment->name); ?>, your account is approved. Please try to login your account. Thank you.

        <?php else: ?>
            Hello <?php echo e($appointment->name); ?>, your account is disapproved due to <?php echo e($appointment->remarks); ?>.
            Thank you.

        <?php endif; ?>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\Art march 15 remake v3.51-uPDATED-latest\resources\views/signup.blade.php ENDPATH**/ ?>