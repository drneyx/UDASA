<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AppLayout::class, []); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
    
    <link href="<?php echo e(url('dist/css/pages/user-card.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(url('assets/node_modules/Magnific-Popup-master/dist/magnific-popup.css')); ?>" rel="stylesheet">
    <style>
        .crd-image {
            height: 25vh !important;
            object-fit: cover;
        }
        .card {
            transition: 3s;
        }
        .card:hover {
            transform: scale(1.07);
            transition: 3s;
        }
    </style>

    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Gallery</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo e(url('/dashboard')); ?>">Home</a></li>
                    <li class="breadcrumb-item">Gallery</li>
                    <li class="breadcrumb-item"><a href="<?php echo e(url('gallery/manage-albums')); ?>">Manage Albums</a> </li>
                    <li class="breadcrumb-item active">Images</li>
                </ol>
                <button data-target="#add-picture" data-toggle="modal" 
                    type="button" class="btn btn-info d-n one d-lg-block m-l-15 toggleAddArticle">
                    <i class="fa fa-plus-circle"></i> Add Pictures</button>
            </div>
        </div>
    </div>

    <?php echo $__env->make('feedback/error-success', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row el-element-overlay">
        <div class="col-md-12">
            <h4 class="card-title">Gallery page</h4>
            <h6 class="card-subtitle m-b-20 text-muted">you can make gallery like this</h6>
        </div>
        <?php if($gallery->isNotEmpty()): ?>
            <?php $__currentLoopData = $gallery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="el-card-item">
                            <div class="el-card-avatar el-overlay-1"> <img src="<?php echo e(url($gallery->image)); ?>" alt="user" class="crd-image" />
                                <div class="el-overlay">
                                    <ul class="el-info">
                                        <li><a class="btn default btn-outline image-popup-vertical-fit" href="<?php echo e(url($gallery->image)); ?>"><i class="fa fa-eye"></i></a></li>
                                        <li><a class="btn default btn-outline" data-target="#edt<?php echo e($gallery->id); ?>" data-toggle="modal"><i class="fa fa-edit"></i></a></li>
                                        <li><a class="btn default btn-outline" data-target="#del<?php echo e($gallery->id); ?>" data-toggle="modal"><i class="fa fa-trash"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="el-card-content">
                                <h3 class="box-title text-left p-1" style="font-weight: bold;"><?php echo e($gallery->title); ?></h3>
                                <!-- <br/> -->
                                <div class="text-justify p-1"><?php echo e(substr($gallery->description, 0, 100)); ?> <?php echo e(strlen($gallery->description) > 100 ? "..." : ""); ?></div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <!-- model for deleting gallery -->
                <?php echo $__env->make('gallery/images/models/delete_gallery', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <!-- model for editing gallery -->
                <?php echo $__env->make('gallery/images/models/edit_gallery', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            <h2 class="text-muted">No images added yet</h2>
        <?php endif; ?>
    </div>

    <?php echo $__env->make('gallery/images/models/add_picture', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <script src="<?php echo e(url('assets/node_modules/Magnific-Popup-master/dist/jquery.magnific-popup.min.js')); ?>"></script>
    <script src="<?php echo e(url('assets/node_modules/Magnific-Popup-master/dist/jquery.magnific-popup-init.js')); ?>"></script>
 <?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?><?php /**PATH /home/udasa/public_html/resources/views/gallery/images/gallery_images.blade.php ENDPATH**/ ?>