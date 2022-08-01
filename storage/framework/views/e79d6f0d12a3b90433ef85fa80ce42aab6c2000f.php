    <div class="col-md-12">
        <div class="full w-100" style="height: 45vh;">
            <div class="card-header" style="background:#17a0ff; height: 50px;">
                <h3 class="text-white">Word From UDASA Chair</h3>
            </div>
            <div class="card-body">
                <?php if($word != null): ?>
                    <img src="<?php echo e(url($word->image)); ?>" alt="<?php echo e($word->full_name); ?>" class="pull-left mr-2" style="width:150px; height: 150px; border-radius: 100%; object-fit:cover;">
                <div class="text-justify p">
                    <i class="fa fa-quote-left"></i> <?php echo substr($word->message, 0, 300); ?> <?php echo e(strlen($word->message) > 300 ? '...' : ''); ?> <i class="fa fa-quote-right"></i>
                     <a class="badge badge-primary" href="#" data-toggle="modal" data-target="#word"> <?php echo e(strlen($word->message) > 300 ? 'Read More' : ''); ?></a>
                </div>
                <div class="pull-right p-3 p">
                    By <strong><?php echo e($word->full_name); ?></strong>
                </div>
                <?php else: ?>
                    <h2 class="p">No, message yet</h2>
                <?php endif; ?>
            </div>
        </div>

    </div>


    <style>
        .message {
            line-height: 30px;
            text-align: justify;
        }

    </style>

<?php /**PATH /home/udasa/public_html/resources/views/front-pages/homeComponents/chair_word.blade.php ENDPATH**/ ?>