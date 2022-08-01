<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AppLayout::class, []); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
    <style>
        .img {
            width: 10px;
            height: 10px;
            cursor: pointer;
        }

        .img img {
            transition: 0.7s;
            width: 100%;
        }

        .img img:hover {
            transform: scale(1.11);
        }
    </style>
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">NewsLetters Management</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo e(url('/dashboard')); ?>">Home</a></li>
                    <li class="breadcrumb-item active">Managements</li>
                </ol>
                <button data-target="#add-newsLetter" data-toggle="modal"
                    type="button" class="btn btn-info d-n one d-lg-block m-l-15"><i
                        class="fa fa-plus-circle"></i> Add Newsletter</button>
            </div>
        </div>
    </div>

    <?php echo $__env->make('feedback/error-success', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
        <div class="col-lg-12 ibox-content">
            <div class="row">
                <div class="col-lg-12">
                        <table class="table table-data table-striped table-bordered table-hover display wrap" style="width: 100%;">
                            <thead>
                                <th width="2%">#</th>
                                <th width="5%">Picture</th>
                                <th width="10%">Title</th>
                                <th width="35%">Description</th>
                                <th width="10%">PDF file</th>
                                <th width="10%">Date</th>
                                <th width="10%">Action</th>
                            </thead>
                            <tbody>
                                <?php $count = 0; ?>
                                <?php if(count($newsLetters) > 0 ): ?>
                                    <?php $__currentLoopData = $newsLetters -> all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $newsLetters): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php $count++; ?>
                                    <tr>
                                        <td><?php echo e($count); ?></td>
                                        <td class="img">
                                            <img class="thumbnail" src="<?php echo e(url($newsLetters->image)); ?>" alt="No Image" onerror=this.src="<?php echo e(url('storage/staffsImages/noimage.jpg')); ?>">
                                        </td>
                                        <td><?php echo e($newsLetters->title); ?></td>
                                        <td><span class="wrap"> <?php echo e($newsLetters->description); ?></span></td>
                                        <td>
                                            <?php if($newsLetters->file != ''): ?>
                                                <a href="<?php echo e(url($newsLetters->file)); ?>" target="_blank">preview pdf</a>
                                            <?php else: ?>
                                                No any file
                                            <?php endif; ?>
                                        </td>
                                        <td><?php echo e($newsLetters->date); ?></td>
                                        <td>
                                            <a data-toggle="modal" data-target="#edt<?php echo e($newsLetters->id); ?>" class="btn btn-primary btn-xs text-white"><i class="fa fa-pencil"></i></a>  
                                            <a data-toggle="modal" data-target="#del<?php echo e($newsLetters->id); ?>" class="btn btn-danger btn-xs text-white"><i class="fa fa-trash"></i></a>
                                            <a data-toggle="modal" data-target="#img<?php echo e($newsLetters->id); ?>" title="click to change image" class="btn btn-success btn-xs text-white"><i class="fa fa-eye"></i></a>                                    
                                        </td>
                                        
                                    </tr>

                                    <!-- Modal for image preview -->
                                    <?php echo $__env->make('management/news/modals/image-preview', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                    <!-- Modal for deleting newsLetters -->
                                    <?php echo $__env->make('management/news/modals/deleteNewsLetter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                    <!-- Modal for editing newsLetters -->
                                    <?php echo $__env->make('management/news/modals/editNewsLetter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </tbody>
                        </table>

                                            
                </div>
            </div>
        </div>
        <?php echo $__env->make('management/news/modals/addNewsLetter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        
 <?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?><?php /**PATH /home/udasa/public_html/resources/views/management/news/newsLetter.blade.php ENDPATH**/ ?>