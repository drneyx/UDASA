

<?php $__env->startSection('contents'); ?>
    <div id="inner_banner" class="section inner_banner_section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="full">
                        <div class="title-holder">
                            <div class="title-holder-cell text-left">
                                <h1 class="page-title">Academic Events</h1>
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
                <?php if($news->isNotEmpty()): ?>
                    <?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $news): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-4 service_blog margin_bottom_50">
                            <div class="full">
                                <div class="service_img" style="height: 200px;"> 
                                    <img class="img-responsive w-100 h-100" src="<?php echo e(url($news->image)); ?>" alt="<?php echo e($news->title); ?>" style="object-fit: cover;" /> 
                                </div>
                                <div class="service_cont">
                                    <h3 class="service_head"><?php echo e($news->title); ?></h3>
                                    <div class="post_time">
                                        <p><i class="fa fa-clock-o"></i> <?php echo e(($news->created_at)->format('M d, Y')); ?> </p>
                                    </div>
                                    <p><?php echo e(substr($news->description, 0, 142)); ?> <?php echo e(strlen($news->description) > 142 ? '...' : ''); ?></p>
                                    <div class="bt_cont"> <a class="btn sqaure_bt" href="<?php echo e(url('read-news', $news->id)); ?>">See More</a> </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <h2>Oops! Nothing is here yet.</h2>
                <?php endif; ?>    
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/udasa/public_html/resources/views/front-pages/activities/academic_events.blade.php ENDPATH**/ ?>