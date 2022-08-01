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
        }

        .img img:hover {
            transform: scale(1.11);
        }
    </style>
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Staffs Management</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo e(url('/dashboard')); ?>">Home</a></li>
                    <li class="breadcrumb-item active">Managements</li>
                </ol>
                <button id="add-user" 
                    type="button" class="btn btn-info d-n one d-lg-block m-l-15"><i
                        class="fa fa-plus-circle"></i> Register New</button>
            </div>
        </div>
    </div>

    <?php echo $__env->make('feedback/error-success', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="col-lg-12 ibox-content">
            <div class="row">
                <div class="col-lg-12">
                        <table class="table table-data table-striped table-bordered table-hover display wrap" style="width: 100%;">
                            <thead>
                                <th width="5%">#</th>
                                <th width="5%">Picture</th>
                                <th width="10%">Full Name</th>
                                <th width="10%">Email</th>
                                <th width="10%">Phone</th>
                                <th width="10%">Position</th>
                                <th width="15%">Bio</th>
                                <th width="15%">Action</th>
                            </thead>
                            <tbody>
                                <?php $count = 0; ?>
                                <?php if(count($staffs) > 0 ): ?>
                                    <?php $__currentLoopData = $staffs -> all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $staff): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php $count++; ?>
                                    <tr>
                                        <td><?php echo e($count); ?></td>
                                        <td class="img">
                                            <img src="<?php echo e(url($staff->image)); ?>" alt="No Image" onerror=this.src="<?php echo e(url('storage/staffsImages/noimage.jpg')); ?>">
                                        </td>
                                        <td><?php echo e($staff->full_name); ?></td>
                                        <td><?php echo e($staff->email); ?></td>
                                        <td><?php echo e($staff->phone); ?></td>
                                        <td><?php echo e($staff->position); ?></td>
                                        <td><?php echo substr($staff->bio , 0, 100); ?> <?php echo e(strlen(strip_tags($staff->bio)) > 100 ? '...' : ''); ?></td>
                                        <td>
                                            <a data-toggle="modal" data-target="#edt<?php echo e($staff->id); ?>" data-position="<?php echo e($staff->position); ?>" class="btn btn-primary btn-xs text-white"><i class="fa fa-pencil"></i></a>  
                                            <a data-toggle="modal" data-target="#del<?php echo e($staff->id); ?>" class="btn btn-danger btn-xs text-white"><i class="fa fa-trash"></i></a>
                                            <a data-toggle="modal" data-target="#img<?php echo e($staff->id); ?>" title="click to change image" class="btn btn-success btn-xs text-white"><i class="fa fa-eye"></i></a>                                    
                                        </td>
                                        
                                    </tr>
                                    <!-- image preview modal -->
                                    <?php echo $__env->make('management/staffs/modals/image-preview', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <!-- Modal for deleting staff -->
                                    <?php echo $__env->make('management/staffs/modals/deleteStaff', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    

                                    <!-- Modal for editing staff -->
                                    <?php echo $__env->make('management/staffs/modals/editStaff', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </tbody>
                        </table>

                                            
                </div>
            </div>
        </div>

        <!-- Modal for adding new users -->
        <?php echo $__env->make('management/staffs/modals/addStaffs', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



        <!-- script for user modal -->
        <script>
            $('#add-user').click(function() {
                console.log('clicked');
                $('#adduserModel').modal('show');
            })
        </script>
        <script>
            $(document).ready(function() {
                $.ajax({
                    type: 'GET',
                    url: 'staff-positions',
                    success:function(data){
                        console.log(data);
                        $('#user_position').empty();
                        $('#user_position').append("<option value='' + 'selected' +>"+'Select Position'+'</option>')
                        $.each(data, function(index, positionObj){
                            $('#user_position').append("<option value='"+positionObj.id+"'>"+positionObj.position+'</option>')
                        })
                    }
                });
                $.ajax({
                    type: 'GET',
                    url: 'get-staff-categories',
                    success:function(data){
                        console.log(data);
                        $('#user_category').empty();
                        $.each(data, function(index, categoryObj){
                            $('#user_category').append("<option value='"+categoryObj.id+"'>"+categoryObj.category_name+'</option>')
                        })
                    }
                });
            });
        </script>
        <script src="<?php echo e(url('js/custom/add-user.js')); ?>"></script>
 <?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?><?php /**PATH /home/udasa/public_html/resources/views/management/staffs/staffs.blade.php ENDPATH**/ ?>