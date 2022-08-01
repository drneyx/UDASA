

<?php $__env->startSection('contents'); ?>
    <div id="inner_banner" class="section inner_banner_section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="full">
                        <div class="title-holder">
                            <div class="title-holder-cell text-left">
                                <h1 class="page-title">Previous Leaders</h1>
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
                <?php if($leaders->isNotEmpty()): ?>
                    <?php $__currentLoopData = $leaders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $leader): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e(url('staffs/staff-details', $leader->id)); ?>">
                            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 margin_bottom_30_all">
                                <div class="product_list">
                                    <div class="_img"> <img class="img-responsive" src="<?php echo e(url($leader->image)); ?>" alt="" style="object-fit: cover; object-position: 50% 0; height: 100%; width: 100%"> </div>
                                    <div class="product_detail_btm">
                                        <div class="center">
                                            <h4><a href="it_shop_detail.html"><?php echo e($leader->full_name); ?></a></h4>
                                        </div>
                                        <div class="starratin">
                                            <!-- <div class="center"> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> </div> -->
                                            <div class="center"> <i class="" aria-hidden="true"></i>
                                                <p aria-hidden="true"> <span style="text-transform: capitalize;"><?php echo e($leader->category_name); ?></span> at University of Dar es saam</p> <i class="" aria-hidden="true"></i> <i class="" aria-hidden="true"></i> <i class="" aria-hidden="true"></i> </div>
                                        </div>

                                        <div class="product_price">
                                            <p><span class="new_price"><?php echo e(strtoupper($leader->position)); ?> <?php echo e($leader->college != null ? '('. strtoupper($leader->college->name) .')' : ''); ?> <?php echo e($leader->leadership_year != null ? '('. strtoupper($leader->leadership_year) .')' : ''); ?></span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="full">
                            <div class="main_heading text_align_center">
                                <h2 class="text-muted">Oops! No data yet</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/udasa/public_html/resources/views/front-pages/leadership/previous_leadership.blade.php ENDPATH**/ ?>