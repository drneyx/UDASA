

<?php $__env->startSection('contents'); ?>
    <!-- inner page banner -->
    <div id="inner_banner" class="section inner_banner_section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="full">
                        <div class="title-holder">
                            <div class="title-holder-cell text-left">
                               <?php if($news->activity_type != 'scholarship'): ?>
                                    <h1 class="page-title"><?php echo e($news->body ? 'Udasa Update' : 'Udasa Newsletter'); ?></h1>
                                <?php else: ?>
                                    <h1 class="page-title">Chachage Scholarship</h1>
                                <?php endif; ?>
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
                    <div class="p-3">
                        <h2 class="title" style="color: #029EE3;"><?php echo e($news->title); ?></h2>
                        <div class="news-body"> <?php echo $news->body ?? $news->description; ?> </div>
                        <div class="pull-right"> 
                            <?php if($news->file != ''): ?>
                                <a class="text-primary" target="_blank" href="/<?php echo e($news->file); ?>"><?php echo e($news->body ? '' : 'View full PDF file here'); ?> </a>
                            <?php else: ?>
                                <!-- No any file -->
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="side_bar">
                        <!-- <div class="side_bar_blog">
                            <h4 class="color">SEARCH</h4>
                            <div class="side_bar_search">
                                <div class="input-group stylish-input-group">
                                    <input class="form-control" placeholder="Search" type="text">
                                    <span class="input-group-addon">
                                    <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                                    </span> 
                                </div>
                            </div>
                        </div> -->
                        <div class="side_bar_blog">
                            <!-- <h4 class="color">GET A QUOTE</h4>
                            <p>An duo lorem altera gloriatur. No imperdiet adver sarium pro. No sit sumo lorem. Mei ea eius elitr consequ unturimperdiet.</p>
                            <div class="side_bar_blog">
                                <h4  class="color">OUR FOCUS</h4>
                                <div class="categary">
                                    <ul>
                                        <li><a href="it_data_recovery.html"><i class="fa fa-angle-right"></i> Academic Freedom</a></li>
                                        <li><a href="it_computer_repair.html"><i class="fa fa-angle-right"></i> Academic Interest</a></li>
                                        <li><a href="it_mobile_service.html"><i class="fa fa-angle-right"></i> Promote Academic Functions</a></li>
                                        <li><a href="it_network_solution.html"><i class="fa fa-angle-right"></i> Sponsor and Functions</a></li>
                                        <li><a href="it_techn_support.html"><i class="fa fa-angle-right"></i> Academic Debates</a></li>
                                    </ul>
                                </div>
                            </div> -->
                            <div class="side_bar_blog">
                                <h4  class="color">RECENT <?php echo e($news->body ? 'NEWSLETTER' : 'UPDATES'); ?></h4>
                                <div class="categary">
                                    <ul>
                                        <?php if($recents->IsNotEmpty()): ?>
                                            <?php $__currentLoopData = $recents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                
                                                <li><a href="<?php echo e($news->file ? url('read-newsletter', $recent->id) : url('read-news', $recent->id)); ?>"><i class="fa fa-angle-right"></i> <?php echo e($recent->title); ?></a></li>
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
        .title {
            font-size: 30px !important;
            font-weight: normal !important;
            text-transform: none !important;
        }
        .news-body p {
            font-size: 17px !important; 
            text-align:justify; 
            color:black !important; 
            line-height: 30px;
        }
        .news-body {
            font-size: 17px !important; 
            text-align:justify; 
            color:black !important; 
            line-height: 30px;
        }
    </style>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/udasa/public_html/resources/views/front-pages/news/specific-news.blade.php ENDPATH**/ ?>