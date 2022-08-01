<x-app-layout>
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Mission And Vision Management</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Managements</li>
                </ol>
                <button data-toggle="modal" data-target="#addModal"
                    class="btn btn-info d-n one d-lg-block m-l-15"><i
                        class="fa fa-plus-circle"></i> Add</button>
            </div>
        </div>
    </div>
    @include('feedback/error-success')
    <div class="col-lg-12 ibox-content">
            <div class="row">
                <div class="col-lg-12">
                        <table class="table table-data table-striped table-bordered table-hover display wrap" style="width: 100%;">
                            <thead>
                                <th width="2%">#</th>
                                <th width="5%">Name</th>
                                <th width="35%">Contents</th>
                                <th width="10%">Action</th>
                            </thead>
                            <tbody>
                                <?php $count = 0; ?>
                                @if(count($missionVision) > 0 )
                                    @foreach($missionVision -> all() as $news)
                                    <?php $count++; ?>
                                    <tr>
                                        <td>{{ $count }}</td>
                                        <td>{{ $news->name }}</td>
                                        <td><span class="wrap" style="width: 100px !important;"> {!! substr(strip_tags($news->contents), 0, 200) !!} {{ strlen(strip_tags($news->contents)) > 200 ? "..." : "" }}</span></td>
                                        <td>
                                            <a data-toggle="modal" data-target="#edt{{ $news->id }}" class="btn btn-primary btn-xs text-white"><i class="fa fa-pencil"></i></a>  
                                            <a data-toggle="modal" data-target="#del{{ $news->id }}" class="btn btn-danger btn-xs text-white"><i class="fa fa-trash"></i></a>
                                        </td>
                                        
                                        @include('management/mission&vision/modals/editMissionVision')
                                        @include('management/mission&vision/modals/deleteMissionVision')
                                    </tr>


                                    
                                    @endforeach
                                @endif
                            </tbody>
                        </table>

                                            
                </div>
            </div>
        </div>
        <!-- Modal for adding mission and vision -->
        @include('management/mission&vision/modals/addMissionVision')

        <script>
            $(document).ready(function() {
                 tinymce.init({
                        selector: ".contents",
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