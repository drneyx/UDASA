<div class="row" id="addArticle">
    <div class="col-lg-12 mb-3">
            <div class="ibox-content">
                <h4 class="card-title mb-4"><strong>Add New Article</strong></h4>
                <hr>
                <form method="POST" enctype="multipart/form-data" action="<?php echo e(url('articles/add-article')); ?>" id="form">
                    <?php echo csrf_field(); ?>
                    <div class="col-md-12 mb-3">
                        <h4 for="author_field">Author</h4>
                        <input type="text" class="form-control" name="author" id="author_field" list="author" value="<?php echo e(old('author')); ?>" required>
                        <datalist id="author"></datalist>
                    </div>
                    <div class="col-md-12 mb-3">
                        <h4 for="myTitle">Article's Title</h4>
                        <input type="text" class="form-control" id="myTitle" name="title" value="<?php echo e(old('title')); ?>" required />
                    </div>
                    <!-- <div class=" col-md-12 mb-3">
                        <h4 for="mydescription">News Description</h4>
                        <textarea id="mydescription" name="description" rows="3" class="form-control" required><?php echo e(old('description')); ?></textarea>
                    </div> -->
                    <div class=" col-md-12 mb-3">
                        <h4 for="myContents">Article Contents</h4>
                        <textarea id="myContents" name="contents" class="form-control myContents"><?php echo e(old('contents')); ?></textarea>
                    </div>
                    <div class="form-row mt-2">
                        <div class="form-group col-md-12">
                            <label for="picture">Image</label>
                            <input class="form-control" name="image"  onchange="preview_image(event)" id="picture" type="file" />
                        </div>
                    </div>
                    <div class="form-group" id="previewimg" style="display: none;">
                        <div class="col-md-3">
                            <img id="output_image" class="w-100 thumbnail" style="object-fit: cover; height: 15vh;" />
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <div class="col-md-4 form-row">
                            <div class="col-md-6">
                                <a class="btn btn-secondary w-100 mb-2 toggleAddNews">Cancel</a>
                            </div>
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary w-100 mb-2">Save</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
    </div>
</div>

    <script>
        function preview_image(event){
            $('#previewimg').show();
            document.getElementById('output_image').style.display='block';
            var reader = new FileReader();
            reader.onload = function(){
                var output = document.getElementById('output_image');
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        };
    </script>
<?php /**PATH /home/udasa/public_html/resources/views/MembersPublications/add_article_form.blade.php ENDPATH**/ ?>