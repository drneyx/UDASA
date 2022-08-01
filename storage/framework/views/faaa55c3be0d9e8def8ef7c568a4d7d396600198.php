<div id="add-picture" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content animated bounceIn">
            <div class="modal-header">
                <h4 class="modal-title">add picture</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form action="<?php echo e(url('gallery/add-picture', $albumId)); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="pictureTitle">Title</label>
                            <input type="text" class="form-control" name="title" id="pictureTitle" value="<?php echo e(old('title')); ?>" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="pictureDescription">Description</label>
                            <textarea type="text" class="form-control" name="description" rows="5" id="pictureDescription" value="<?php echo e(old('description')); ?>" required></textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="picture2">Picture</label>
                            <input type="file" class="form-control" name="image" id="picture2" required>
                        </div>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Add picture</button>
                </div>
            </form>
        </div>
    </div>
</div><?php /**PATH /home/udasa/public_html/resources/views/gallery/images/models/add_picture.blade.php ENDPATH**/ ?>