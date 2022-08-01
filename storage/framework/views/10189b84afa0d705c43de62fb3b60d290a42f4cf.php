<div id="add-newsLetter" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content animated bounceIn">
            <div class="modal-header">
                <h4 class="modal-title">Add News</h4>
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
            <form action="<?php echo e(url('add-newsLetter')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="title">News Title</label>
                            <input type="text" class="form-control" name="title" id="title" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="description">News Description</label>
                            <textarea type="text" class="form-control" name="description" rows="7" id="description" required></textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="picture">News Picture</label>
                            <input type="file" class="form-control" name="image" id="picture" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="pdf">News PDF</label>
                            <input type="file" class="form-control" name="file" id="pdf">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="date">News Date</label>
                            <input type="date" class="form-control" name="date" id="date" required>
                        </div>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Add Newsletter</button>
                </div>
            </form>
        </div>
    </div>
</div><?php /**PATH /home/udasa/public_html/resources/views/management/news/modals/addNewsLetter.blade.php ENDPATH**/ ?>