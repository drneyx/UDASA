<div class="section padding_layout_1">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="full">
                    <div class="main_heading text_align_center">
                        <h2 class="color">Top UDASA Leaders</h2>
                        <!-- <p class="large">Top UDASA Leaders</p> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <?php if($leaders->isNotEmpty()): ?>
                <?php $__currentLoopData = $leaders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $leader): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(in_array($leader->position, ['chairperson', 'vice chairperson', 'general secretary', 'deputy secretary', 'treasurer', 'newsletter editor'])): ?>
                        <a href="<?php echo e(url('staffs/staff-details', $leader->id)); ?>">
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 margin_bottom_30_all">
                                <div class="product_list">
                                    <div class="_img"> <img class="img-responsive" src="<?php echo e(url($leader->image)); ?>" alt="" style="object-fit: cover; object-position: 50% 0; height: 100%; width: 100%"> </div>
                                    <div class="product_detail_btm">
                                        <div class="center">
                                            <h4><a href="<?php echo e(url('staffs/staff-details', $leader->id)); ?>"><?php echo e($leader->full_name); ?></a></h4>
                                        </div>
                                        <div class="starratin">
                                            <!-- <div class="center"> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> </div> -->
                                            <div class="center"> <i class="" aria-hidden="true"></i>
                                                <p aria-hidden="true"><span style="text-transform: capitalize;"><?php echo e($leader->category_name); ?></span> at University of Dar es saam</p> <i class="" aria-hidden="true"></i> <i class="" aria-hidden="true"></i> <i class="" aria-hidden="true"></i>
                                            </div>
                                        </div>

                                        <div class="product_price">
                                            <p><span class="new_price"><?php echo e(strtoupper($leader->position)); ?></span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php /**PATH /home/udasa/public_html/resources/views/front-pages/homeComponents/team.blade.php ENDPATH**/ ?>