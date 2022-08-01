<x-app-layout>
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
            <h4 class="text-themecolor">News Management</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Managements</li>
                </ol>
                <button
                    type="button" class="btn btn-info d-n one d-lg-block m-l-15 toggleAddNews"><i
                        class="fa fa-plus-circle"></i> Add News</button>
            </div>
        </div>
    </div>

    @include('feedback/error-success')

    @include('management/news/modals/news-modals/addNews')
        <div class="col-lg-12 ibox-content">
            <div class="row">
                <div class="col-lg-12">
                        <table class="table table-data table-striped table-bordered table-hover display wrap" style="width: 100%;">
                            <thead>
                                <th width="2%">#</th>
                                <th width="5%">Picture</th>
                                <th width="10%">Title</th>
                                <th width="35%">Body Contents</th>
                                <th width="5%">Date</th>
                                <th width="10%">Action</th>
                            </thead>
                            <tbody>
                                <?php $count = 0; ?>
                                @if(count($news) > 0 )
                                    @foreach($news -> all() as $news)
                                    <?php $count++; ?>
                                    <tr>
                                        <td>{{ $count }}</td>
                                        <td class="img">
                                            <img class="thumbnail" src="{{ url($news->image) }}" alt="No Image" onerror=this.src="{{url('storage/newsImages/noimage.jpg')}}">
                                        </td>
                                        <td>{{ $news->title }}</td>
                                        <td><span class="wrap" style="width: 100px !important;"> {!! substr(strip_tags($news->body), 0, 200) !!} {{ strlen(strip_tags($news->body)) > 200 ? "..." : "" }}</span></td>
                                        <td>{{$news->date->format('d/m/Y')}}</td>
                                        <td>
                                            <a data-toggle="modal" data-target="#edt{{ $news->id }}" class="btn btn-primary btn-xs text-white"><i class="fa fa-pencil"></i></a>
                                            <a data-toggle="modal" data-target="#del{{ $news->id }}" class="btn btn-danger btn-xs text-white"><i class="fa fa-trash"></i></a>
                                            <a data-toggle="modal" data-target="#img{{$news->id}}" title="click to change image" class="btn btn-success btn-xs text-white"><i class="fa fa-eye"></i></a>
                                        </td>

                                    </tr>

                                    <!-- Modal for image preview -->
                                    @include('management/news/modals/news-modals/image-preview')

                                    <!-- Modal for deleting news -->
                                    @include('management/news/modals/news-modals/deleteNews')

                                    <!-- Modal for editing news -->
                                    @include('management/news/modals/news-modals/editNews')

                                    @endforeach
                                @endif
                            </tbody>
                        </table>


                </div>
            </div>
        </div>

        <script>
            $(document).ready(function() {
                $('#addNews').hide();
                $('.toggleAddNews').click(function() {
                    $('#addNews').toggle();
                });
                    tinymce.init({
                        selector: ".myBody",
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
    </script>
</x-app-layout>
