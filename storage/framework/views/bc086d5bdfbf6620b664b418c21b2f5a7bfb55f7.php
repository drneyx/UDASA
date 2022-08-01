<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AppLayout::class, []); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Members Publications</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo e(url('/dashboard')); ?>">Home</a></li>
                    <li class="breadcrumb-item">Members Publications</li>
                    <li class="breadcrumb-item active">Articles</li>
                </ol>
                <button id="add-article"
                    type="button" class="btn btn-info d-n one d-lg-block m-l-15 toggleAddArticle">
                    <i class="fa fa-plus-circle"></i> Add New Article</button>
            </div>
        </div>
    </div>

    <?php echo $__env->make('feedback/error-success', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('MembersPublications/add_article_form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="col-lg-12 ibox-content">
        <div class="row">
            <div class="col-lg-12">
                    <table class="table table-data table-striped table-bordered table-hover display wrap" style="width: 100%;">
                        <thead>
                            <th width="2%">#</th>
                            <th width="5%">Picture</th>
                            <th width="10%">Title</th>
                            <th width="35%">Body Contents</th>
                            <th width="10%">Publication Date</th>
                            <th width="10%">Action</th>
                        </thead>
                        <tbody>
                            <?php $count = 0; ?>
                            <?php if(count($articles) > 0 ): ?>
                                <?php $__currentLoopData = $articles -> all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php $count++; ?>
                                <tr>
                                    <td><?php echo e($count); ?></td>
                                    <td class="img">
                                        <img class="thumbnail" src="<?php echo e(url($article->image)); ?>" alt="No Image" onerror=this.src="<?php echo e(url('storage/staffsImages/noimage.jpg')); ?>">
                                    </td>
                                    <td><?php echo e($article->title); ?></td>
                                    <td><span class="wrap" style="width: 100px !important;"> <?php echo substr(strip_tags($article->contents), 0, 200); ?> <?php echo e(strlen(strip_tags($article->contents)) > 200 ? "..." : ""); ?></span></td>
                                    <td><?php echo e(($article->created_at)->format('M d, Y')); ?></td>
                                    <td>
                                        <a data-toggle="modal" data-target="#edt<?php echo e($article->id); ?>" class="btn btn-primary btn-xs text-white"><i class="fa fa-pencil"></i></a>
                                        <a data-toggle="modal" data-target="#del<?php echo e($article->id); ?>" class="btn btn-danger btn-xs text-white"><i class="fa fa-trash"></i></a>
                                        <a data-toggle="modal" data-target="#img<?php echo e($article->id); ?>" data-itm="<?php echo e($article->id); ?>" title="click to change image" class="btn btn-success btn-xs text-white"><i class="fa fa-eye"></i></a>
                                    </td>

                                </tr>

                                <!-- Modal for image preview -->
                                <?php echo $__env->make('MembersPublications/modals/image-preview', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                <!-- Modal for deleting article -->
                                <?php echo $__env->make('MembersPublications/modals/deleteArticle', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                <!-- Modal for editing Article -->
                                <?php echo $__env->make('MembersPublications/modals/editArticle', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </tbody>
                    </table>


            </div>
        </div>
    </div>

    <script>
            $(document).ready(function() {
                $('#addArticle').hide();
                $('.toggleAddArticle').click(function() {
                    $('#addArticle').toggle();
                });
                    tinymce.init({
                        selector: ".myContents",
                        // height: 300,
                        setup: function (editor) {
                        editor.on('init change', function () {
                            editor.save();
                        });
                        },
                        plugins: [
                            "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                            "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                            "save table contextmenu directionality emoticons template paste textcolor",
                            'image code'
                        ],
                        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | image code | print preview media fullpage | forecolor backcolor emoticons",
                        image_title: true,
                        automatic_uploads: true,
                        images_upload_url: '/upload',
                        file_picker_types: 'image',
                        file_picker_callback: function(cb, value, meta) {
                    var input = document.createElement('input');
                    input.setAttribute('type', 'file');
                    input.setAttribute('accept', 'image/*');
                    input.onchange = function() {
                        var file = this.files[0];

                        var reader = new FileReader();
                        reader.readAsDataURL(file);
                        reader.onload = function () {
                            var id = 'blobid' + (new Date()).getTime();
                            var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                            var base64 = reader.result.split(',')[1];
                            var blobInfo = blobCache.create(id, file, base64);
                            blobCache.add(blobInfo);
                            cb(blobInfo.blobUri(), { title: file.name });
                        };
                    };
                    input.click();
                },
                        menubar:false,
                    });
            });
    </script>
    <script type="text/javascript">
        $('#author_field').on('keyup',function(){
            $value=$(this).val();
            console.log($value)
            $.ajax({
                type : 'GET',
                url : '/articles/filter-staff',
                data: {'value': $value},
                success:function(data){
                    console.log(data)
                    $('#author').html(data);
                }
            });
        })
    </script>
    <script type="text/javascript">
        $.ajaxSetup({ headers: { 'csrftoken' : '<?php echo e(csrf_token()); ?>' } });
    </script>


 <?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php /**PATH /home/udasa/public_html/resources/views/MembersPublications/articles.blade.php ENDPATH**/ ?>