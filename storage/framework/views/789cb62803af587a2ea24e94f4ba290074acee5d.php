<div id="edt<?php echo e($staff->id); ?>" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content animated bounceIn">
            <div class="modal-header">
                <h4 class="modal-title">Edit Staff</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="container">
                <div class="alert alert-success alert-dismissible fade show editSuccess" role="alert" style="display: none;">
                    <span id="editSuccess"></span>.
                    <button type="button" class="close">
                        <span id="clsEdit" aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>

            <div class="container">
                <div class="alert alert-danger alert-dismissible fade show editError" role="alert" style="display: none;">
                    <strong class="editError"></strong> .
                    <button type="button" class="close">
                        <span class="closeErrEdit" aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            <form action="<?php echo e(url('edit-staff', $staff->id)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="firstName">Full Name</label>
                            <input type="text" class="form-control" name="full_name" id="first_name" value="<?php echo e($staff->full_name); ?>" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="phoneNumber">Phone</label>
                            <input type="tel" class="form-control" name="phone" id="phone_number" value="<?php echo e($staff->phone); ?>" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="emailAddress">Email</label>
                            <input type="email" class="form-control" name="email" id="email_address" value="<?php echo e($staff->email); ?>" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="user_category_edit">Staff Category</label>
                            <select name="categoryId" id="user_category_edit" class="form-control" required>
                                <?php if($categories->isNotEmpty()): ?>
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($category->id); ?>" <?php echo e(($staff->category_name == $category->category_name) ? 'selected' : ''); ?>><?php echo e($category->category_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="user_position_edit">Position</label>
                            <select name="positionId" id="user_position_edit" class="form-control" onchange="getId(event)" required>
                                <?php if($positions->isNotEmpty()): ?>
                                    <?php $__currentLoopData = $positions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $position): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($position->id); ?>" <?php echo e(($staff->position == $position->position) ? 'selected' : ''); ?>><?php echo e($position->position); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-md-12 college" style="display: none;">
                        <label for="user_college_edit">Representative College</label>
                        <select name="collegeId" id="user_college_edit" class="form-control choose">
                            <?php if($colleges->isNotEmpty()): ?>
                                <?php $__currentLoopData = $colleges; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $college): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($staff->college != null): ?>
                                        <option value="<?php echo e($college->id); ?>" <?php echo e(($staff->college->name == $college->name) ? 'selected' : ''); ?>><?php echo e($college->name); ?></option>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6" id="leaderStatusEdit">
                            <label for="positionStatusEdit">Leadership Status</label>
                            <select name="statusPosition" id="positionStatusEdit" class="form-control positionStatus">
                                <option value="current" <?php echo e($staff->position_status == 'current' ? 'selected' : ''); ?>>current</option>
                                <option value="previous" <?php echo e($staff->position_status != 'current' ? 'selected' : ''); ?>>previous</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="leadership_year_edit">Leadership Year</label>
                            <input name="leadership_year" id="leadership_year_edit" class="form-control" value="<?php echo e($staff->leadership_year); ?>" required />
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="myBio">Staff Bio</label>
                            <textarea type="text" class="form-control myContents3" rows="7" cols="30" name="bio" id="myBio"><?php echo e($staff->bio); ?></textarea>
                        </div>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Edit staff</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>

    $(function() {
        $(".choose").chosen({no_results_text: "Oops, nothing found!", width: '100%'});
    });
    $('#edt<?php echo e($staff->id); ?>').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('position')
        
        if(recipient.includes('representative')) {
            $('.college').show();
        }
        else{
            $('.college').hide();
        }

    })

    function getId(event) {
            console.log(event.target.value)
            $.ajax({
                type: "GET",
                url: "/myPosition",
                data: {'id': event.target.value},
                success:function(data) {
                    if(data.includes('representative')) {
                        $('.college').show();
                    }
                    else {
                        $('.college').hide();
                    }
                },
                error:function(error) {
                    console.log(error)
                }
            })
        }
</script>

<script>
        $(document).ready(function() {
            
                tinymce.init({
                    selector: ".myContents3",
                    // height: 300,
                    plugins: [
                        "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                        "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                        "save table contextmenu directionality emoticons template paste textcolor"
                    ],
                    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons",
                    menubar:false,
                });
        });
    </script><?php /**PATH /home/udasa/public_html/resources/views/management/staffs/modals/editStaff.blade.php ENDPATH**/ ?>