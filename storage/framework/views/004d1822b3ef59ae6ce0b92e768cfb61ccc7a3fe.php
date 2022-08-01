

<?php $__env->startSection('contents'); ?>
    <div id="inner_banner" class="section inner_banner_section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="full">
                        <div class="title-holder">
                            <div class="title-holder-cell text-left">
                                <h1 class="page-title">Articles By UDASA Members</h1>
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
            <!-- <div class="row"> -->
                <div class="col-md-12">
                    <div class="row">
                        <?php if($articles->isNotEmpty()): ?>
                            <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-md-4 mb-2">
                                    <div class="card full">
                                        <div class="service_blog_inner p-3">
                                            <div class="icon text_align_left row">
                                                <img src="<?php echo e(url($article->image)); ?>" alt="#" style="width: 4rem; height: 4rem; border-radius: 50%;" />
                                                <div class="pt-1 pl-3">
                                                    <h5 class="p"><?php echo e($article->author); ?></h5>
                                                    <h6 class="p">
                                                        <span class="p1"> Published on <?php echo e(($article->created_at)->format('M d, Y')); ?></span>
                                                    </h6>
                                                </div>
                                            </div>
                                            <h4 class="service-heading"><a class="text-primary" href="<?php echo e(url('articles/read-article', $article->id)); ?>"><?php echo e($article->title); ?></a></h4>
                                            <h5><?php echo e(($article->date)); ?></h5>
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
            <!-- </div> -->
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/udasa/public_html/resources/views/front-pages/all_articles.blade.php ENDPATH**/ ?>