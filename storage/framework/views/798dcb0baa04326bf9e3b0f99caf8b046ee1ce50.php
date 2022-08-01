<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AppLayout::class, []); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Gallery</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo e(url('/dashboard')); ?>">Home</a></li>
                    <li class="breadcrumb-item">Gallery</li>
                    <li class="breadcrumb-item active">Manage Albums</li>
                </ol>
                <button data-target="#create-album" data-toggle="modal" 
                    type="button" class="btn btn-info d-n one d-lg-block m-l-15 toggleAddArticle">
                    <i class="fa fa-plus-circle"></i> Create Album</button>
            </div>
        </div>
    </div>
    <?php echo $__env->make('feedback/error-success', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <?php if($albums->isNotEmpty()): ?>
                    <?php $__currentLoopData = $albums; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $album): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-3 col-md-6">
                            <!-- Card -->
                            <div class="card">
                                <?php if($album->galleries->isNotEmpty()): ?>
                                    <img class="card-img-top img-responsive crd-image" src="<?php echo e(url($album->galleries[0]->image)); ?>" alt="Card image cap" onerror=this.src="<?php echo e(url('storage/staffsImages/noimage.jpg')); ?>">
                                <?php else: ?>
                                    <img class="card-img-top img-responsive crd-image" src="<?php echo e(url('storage/staffsImages/noimage.jpg')); ?>" alt="No image">
                                <?php endif; ?>
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div class="col-md-8">
                                            <h4 class="card-title" style="text-transform: uppercase;"><?php echo e($album->album_name); ?></h4>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="row">
                                                <a data-toggle="modal" data-target="#edt<?php echo e($album->id); ?>" class="btn btn-primary text-white mr-1"><i class="fa fa-pencil"></i></a>  
                                                <a data-toggle="modal" data-target="#del<?php echo e($album->id); ?>" class="btn btn-danger text-white"><i class="fa fa-trash"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="card-text"><?php echo e(substr($album->description, 0, 100)); ?></p>
                                    <a href="<?php echo e(url('gallery/images', $album->id)); ?>" class="btn btn-primary pull-right">View Gallery</a>
                                </div>
                            </div>
                                <!-- modal for deleting album -->
                                <?php echo $__env->make('gallery/albums/modals/delete_album', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <!-- modal for editing album -->
                                <?php echo $__env->make('gallery/albums/modals/edit_album', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <!-- Card -->
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <h2 class="text-muted">No albums yet! Click the create button to create one</h2>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <?php echo $__env->make('gallery/albums/modals/create_album', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <style>
        .crd-image {
            height: 30vh;
            object-fit: cover;
        }
    </style>
 <?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?><?php /**PATH /home/udasa/public_html/resources/views/gallery/albums/albums.blade.php ENDPATH**/ ?>