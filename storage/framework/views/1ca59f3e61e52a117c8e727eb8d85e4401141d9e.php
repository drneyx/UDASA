

<?php $__env->startSection('contents'); ?>
    <!-- inner page banner -->
    <div id="inner_banner" class="section inner_banner_section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="full">
                        <div class="title-holder">
                            <div class="title-holder-cell text-left">
                                <h1 class="page-title">Article from UDASA member</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end inner page banner -->
    <div class="section padding_layout_1 it_service_policy">
        <div class="container">
            <div class="row">
                <div class="col-md-9" style="background-color: aliceblue;">
                    <div class="row p-3">
                        <div class="pull-left" style="width: 5.5rem; height: 5.5rem;">
                            <img src="<?php echo e(url($article->image)); ?>" alt="<?php echo e($article->full_name); ?>" class="w-100 h-100" style="border-radius: 50%; object-fit: cover;">
                        </div>
                        <div class="pull-left p-3">
                            <h5><?php echo e($article->title); ?></h5>
                            <h6><?php echo e($article->author); ?> | <br>
                                <span class="p1"> Published on <?php echo e(($article->created_at)->format('M d, Y')); ?></span>
                            </h6>
                        </div>
                    </div>
                    <div class="p-3">
                        <!-- <h1 style="color: #029EE3;" class="mb-3"><?php echo e($article->title); ?></h1> -->
                        <div class="contents"> <?php echo $article->contents; ?> </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="side_bar">
                        <div class="side_bar_blog">
                            <div class="side_bar_blog">
                                <h4  class="color">RECENT Articles</h4>
                                <div class="categary">
                                    <ul>
                                        <?php if($recents->IsNotEmpty()): ?>
                                            <?php $__currentLoopData = $recents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li><a href="<?php echo e(url('articles/read-article', $recent->id)); ?>"><i class="fa fa-angle-right"></i> <?php echo e($recent->title); ?></a></li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<style>
    h2 {
        font-size: 20px !important;
        font-weight: normal !important;
        text-transform: capitalize !important;
    }
    .contents p {
        font-size: 17px !important;
        text-align:justify;
        color:black !important;
        line-height: 30px !important;
    }
</style>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/udasa/public_html/resources/views/MembersPublications/read_article.blade.php ENDPATH**/ ?>