<div class="section padding_layout_1 light_silver gross_l ayout">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="full">
                    <div class="main_heading text_align_left">
                        <!-- <h2 class="color">Core newsLetter of UDASA</h2> -->
                        <h2 class="large"><a href="<?php echo e(url('udasa-articles')); ?>" class="text-primary" style="text-transform: uppercase;"> Articles By UDASA Members</a></h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <?php if($articles->isNotEmpty()): ?>
                        <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-4">
                                <div class="full">
                                    <div class="service_blog_inner">
                                        <div class="icon text_align_left row">
                                            <img src="<?php echo e(url($article->image)); ?>" alt="#" style="width: 4rem; height: 4rem; border-radius: 50%;" />
                                            <div class="pt-1 pl-3">
                                                <h5 class="p"><a class="text-primary" href="<?php echo e(url('articles/read-article', $article->id)); ?>"><?php echo e($article->title); ?></a></h5>
                                                <h6 class="p"><?php echo e($article->author); ?> | <?php echo e($article->position != 'member' ? $article->position : 'staff'); ?> <br>
                                                    <span class="p1"> Published on <?php echo e(($article->created_at)->format('M d, Y')); ?></span>
                                                </h6>
                                            </div>
                                        </div>
                                        <!-- <h4 class="service-heading"><a class="text-primary" href="<?php echo e(url('articles/read-article', $article->id)); ?>"><?php echo e($article->title); ?></a></h4> -->
                                        <!-- <h5><?php echo e(($article->date)); ?></h5> -->
                                        <div class="wrap w-100 p"><?php echo substr(strip_tags($article->contents), 0, 100); ?> ...</div>
                                        <p><a class="text-primary" href="<?php echo e(url('articles/read-article', $article->id)); ?>">Read More</a></p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <h3>No, Articles yet</h3>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/udasa/public_html/resources/views/front-pages/homeComponents/articles_updates.blade.php ENDPATH**/ ?>