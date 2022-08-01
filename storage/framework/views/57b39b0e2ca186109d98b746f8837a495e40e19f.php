

<?php $__env->startSection('contents'); ?>
    <!-- inner page banner -->
    <div id="inner_banner" class="section inner_banner_section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="full">
                        <div class="title-holder">
                            <div class="title-holder-cell text-left">
                                <h1 class="page-title">Udasa Newsletter</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end inner page banner -->

    <div class="section padding_layout_1">
        <div class="container">
            <div class="row">
                <?php if($newsLetter->isNotEmpty()): ?>
                    <?php $__currentLoopData = $newsLetter; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $newsLetter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-3 service_blog margin_bottom_50">
                            <div class="full">
                                <div class="service_img" style="height: 200px;">
                                    <a href="<?php echo e(route('read-newsletter', $newsLetter->id)); ?>">
                                        <img class="img-responsive w-100 h-100" src="<?php echo e(url($newsLetter->image)); ?>" alt="<?php echo e($newsLetter->title); ?>" style="object-fit: cover;" /> 
                                    </a>
                                </div>
                                <div class="service_cont">
                                    <h3 class="service_head"><?php echo e($newsLetter->title); ?></h3>
                                    <div class="post_time">
                                        <p><i class="fa fa-clock-o"></i> <?php echo e(($newsLetter->created_at)->format('M d, Y')); ?> </p>
                                    </div>
                                    <p><?php echo e(substr($newsLetter->description, 0, 142)); ?> <?php echo e(strlen($newsLetter->description) > 142 ? '...' : ''); ?> 
                                        <a class="badge badge-primary" href="<?php echo e(url('read-newsletter', $newsLetter->id)); ?>"><?php echo e(strlen($newsLetter->description) > 142 ? 'Read More' : ''); ?></a>
                                    </p>
                                    <div class="bt_cont">
                                        <?php if($newsLetter->file != ''): ?>
                                             <a class="btn text-primary" target="_blank" href="<?php echo e(url($newsLetter->file)); ?>">Read Full Pdf</a> 
                                        <?php else: ?>
                                            No any file
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <h3>No NewsLetter yet</h3>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <?php echo $__env->make('front-pages/homeComponents/views', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/udasa/public_html/resources/views/front-pages/newsLetter.blade.php ENDPATH**/ ?>