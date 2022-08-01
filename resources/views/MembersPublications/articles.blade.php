<x-app-layout>
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Members Publications</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item">Members Publications</li>
                    <li class="breadcrumb-item active">Articles</li>
                </ol>
                <button id="add-article"
                    type="button" class="btn btn-info d-n one d-lg-block m-l-15 toggleAddArticle">
                    <i class="fa fa-plus-circle"></i> Add New Article</button>
            </div>
        </div>
    </div>

    @include('feedback/error-success')
    @include('MembersPublications/add_article_form')

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
                            @if(count($articles) > 0 )
                                @foreach($articles -> all() as $article)
                                <?php $count++; ?>
                                <tr>
                                    <td>{{ $count }}</td>
                                    <td class="img">
                                        <img class="thumbnail" src="{{ url($article->image) }}" alt="No Image" onerror=this.src="{{url('storage/staffsImages/noimage.jpg')}}">
                                    </td>
                                    <td>{{ $article->title }}</td>
                                    <td><span class="wrap" style="width: 100px !important;"> {!! substr(strip_tags($article->contents), 0, 200) !!} {{ strlen(strip_tags($article->contents)) > 200 ? "..." : "" }}</span></td>
                                    <td>{{($article->created_at)->format('M d, Y')}}</td>
                                    <td>
                                        <a data-toggle="modal" data-target="#edt{{ $article->id }}" class="btn btn-primary btn-xs text-white"><i class="fa fa-pencil"></i></a>
                                        <a data-toggle="modal" data-target="#del{{ $article->id }}" class="btn btn-danger btn-xs text-white"><i class="fa fa-trash"></i></a>
                                        <a data-toggle="modal" data-target="#img{{$article->id}}" data-itm="{{$article->id}}" title="click to change image" class="btn btn-success btn-xs text-white"><i class="fa fa-eye"></i></a>
                                    </td>

                                </tr>

                                <!-- Modal for image preview -->
                                @include('MembersPublications/modals/image-preview')

                                <!-- Modal for deleting article -->
                                @include('MembersPublications/modals/deleteArticle')

                                <!-- Modal for editing Article -->
                                @include('MembersPublications/modals/editArticle')

                                @endforeach
                            @endif
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
        $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
    </script>


</x-app-layout>
