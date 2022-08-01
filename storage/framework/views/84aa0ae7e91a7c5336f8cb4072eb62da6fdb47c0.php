<di v class="modal inmodal" id="img<?php echo e($article->id); ?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated bounceIn">
            <div class="modal-header d-flex justify-content-between">
                <h4 class="modal-title">News image preview</h4>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <!-- <small>Clicking change image without selecting the image, the default noimage.jpg will be saved instead</small> -->
            </div>
            <div class="modal-body">
                <div class="ibox w-100 parent">
                    <form method="POST" enctype="multipart/form-data" action="<?php echo e(url('articles/changeImage', $article->id)); ?>">
                        <?php echo csrf_field(); ?>
                        <!-- <div class="ibox-title">
                            <h5>news image <small>preview</small></h5>
                        </div> -->
                        <div class="ibox-content thumb" style="height: 40vh;">
                                <img src="<?php echo e(url($article->image)); ?>" alt="No Image" onerror=this.src="<?php echo e(url('staffsImages/noimage.jpg')); ?>" class="h-100 w-100" style="object-fit: cover;">
                        </div>
                        <div class="form-group">
                        <input type="file" name="image" data="<?php echo e($article->id); ?>" onchange="previewImage(event)" class="form-control">
                    </div>
                    <div class="form-group" id="preview<?php echo e($article->id); ?>" style="display: none;">
                        <div class="col-md-4">
                            <img id="<?php echo e($article->id); ?>" class="w-100 thumbnail new_image" style="object-fit: cover; height: 15vh;" />
                        </div>
                    </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No,Cancel</button>
                            <button type="submit" class="btn btn-primary">Change Image</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</di>

    <script>
        var myId = {};

        function previewImage(event){
            var id = event.target.attributes.data.value;
            $('#preview' + id).show();
            document.getElementById(id).style.display='block';
            var reader = new FileReader();
            reader.onload = function(){
                var output = document.getElementById(id);
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        };
    </script>
<?php /**PATH /home/udasa/public_html/resources/views/MembersPublications/modals/image-preview.blade.php ENDPATH**/ ?>