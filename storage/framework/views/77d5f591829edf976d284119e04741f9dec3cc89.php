<?php if(session('info')): ?> 
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    <?php echo e(session('info')); ?>.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    </div>
<?php endif; ?>
<?php if(session('error')): ?> 
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <?php echo e(session('error')); ?>.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    </div>
<?php endif; ?>
<?php if($errors->any()): ?> 
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <ul>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($error); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    </div>
<?php endif; ?><?php /**PATH /home/udasa/public_html/resources/views/feedback/error-success.blade.php ENDPATH**/ ?>