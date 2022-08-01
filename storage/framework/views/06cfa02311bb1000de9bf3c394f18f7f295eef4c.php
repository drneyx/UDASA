

<?php $__env->startSection('contents'); ?>
    <div id="inner_banner" class="section inner_banner_section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="full">
                        <div class="title-holder">
                            <div class="title-holder-cell text-left">
                                <h1 class="page-title">Gallery Albums</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section padding_layout_1">
        <div class="container">
            <div class="row">
                <?php if($albums->isNotEmpty()): ?>
                    <?php $__currentLoopData = $albums; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $album): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <!-- <a href="<?php echo e(url('gallery/images', $album->id)); ?>" class="btn btn-primary pull-right">View Gallery</a> -->
                        <a href="<?php echo e(url('gallery', $album->slug)); ?>">
                            <div class="col-md-4 service_blog margin_bottom_50">
                                <div class="full crd p-2">
                                    <div class="service_img">
                                        <?php if($album->galleries->isNotEmpty()): ?>
                                            <img class="card-img-top img-responsive crd-image" src="<?php echo e(url($album->galleries[0]->image)); ?>" alt="Card image cap" onerror=this.src="<?php echo e(url('storage/staffsImages/noimage.jpg')); ?>">
                                        <?php else: ?>
                                            <img class="card-img-top img-responsive crd-image" src="<?php echo e(url('storage/staffsImages/noimage.jpg')); ?>" alt="No image">
                                        <?php endif; ?>
                                    </div>
                                    <div class="service_cont pl-1 pr-1">
                                        <h3 class="service_head"><?php echo e($album->album_name); ?></h3>
                                        <div class="post_time">
                                            <p><i class="fa fa-clock-o"></i> <?php echo e($album->created_at->format('M d, Y')); ?> </p>
                                        </div>
                                        <p><?php echo e(substr($album->description, 0, 100)); ?></p>
                                        <div class="bt_cont"> <a class="btn sqaure_bt pull-right mb-1" href="<?php echo e(url('gallery', $album->slug)); ?>">View Gallery</a> </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <h2 class="text-muted">No albums yet!</h2>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php echo $__env->make('front-pages/homeComponents/views', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <style>
        .crd {
            transition: 3s;
            box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }
        .crd:hover {
            transform: scale(1.05);
        }
        .crd-image {
            height: 25vh !important;
            object-fit: cover;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/udasa/public_html/resources/views/front-pages/gallery/albums.blade.php ENDPATH**/ ?>