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
            <h4 class="text-themecolor">NewsLetters Management</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Managements</li>
                </ol>
                <button data-target="#add-newsLetter" data-toggle="modal"
                    type="button" class="btn btn-info d-n one d-lg-block m-l-15"><i
                        class="fa fa-plus-circle"></i> Add Newsletter</button>
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
                                <th width="5%">Picture</th>
                                <th width="10%">Title</th>
                                <th width="35%">Description</th>
                                <th width="10%">PDF file</th>
                                <th width="10%">Date</th>
                                <th width="10%">Action</th>
                            </thead>
                            <tbody>
                                <?php $count = 0; ?>
                                @if(count($newsLetters) > 0 )
                                    @foreach($newsLetters -> all() as $newsLetters)
                                    <?php $count++; ?>
                                    <tr>
                                        <td>{{ $count }}</td>
                                        <td class="img">
                                            <img class="thumbnail" src="{{ url($newsLetters->image) }}" alt="No Image" onerror=this.src="{{url('storage/staffsImages/noimage.jpg')}}">
                                        </td>
                                        <td>{{ $newsLetters->title }}</td>
                                        <td><span class="wrap"> {{ $newsLetters->description }}</span></td>
                                        <td>
                                            @if($newsLetters->file != '')
                                                <a href="{{ url($newsLetters->file) }}" target="_blank">preview pdf</a>
                                            @else
                                                No any file
                                            @endif
                                        </td>
                                        <td>{{$newsLetters->date}}</td>
                                        <td>
                                            <a data-toggle="modal" data-target="#edt{{ $newsLetters->id }}" class="btn btn-primary btn-xs text-white"><i class="fa fa-pencil"></i></a>  
                                            <a data-toggle="modal" data-target="#del{{ $newsLetters->id }}" class="btn btn-danger btn-xs text-white"><i class="fa fa-trash"></i></a>
                                            <a data-toggle="modal" data-target="#img{{$newsLetters->id}}" title="click to change image" class="btn btn-success btn-xs text-white"><i class="fa fa-eye"></i></a>                                    
                                        </td>
                                        
                                    </tr>

                                    <!-- Modal for image preview -->
                                    @include('management/news/modals/image-preview')

                                    <!-- Modal for deleting newsLetters -->
                                    @include('management/news/modals/deleteNewsLetter')

                                    <!-- Modal for editing newsLetters -->
                                    @include('management/news/modals/editNewsLetter')
                                    
                                    @endforeach
                                @endif
                            </tbody>
                        </table>

                                            
                </div>
            </div>
        </div>
        @include('management/news/modals/addNewsLetter')
        
</x-app-layout>