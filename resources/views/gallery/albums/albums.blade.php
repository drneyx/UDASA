<x-app-layout>
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Gallery</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item">Gallery</li>
                    <li class="breadcrumb-item active">Manage Albums</li>
                </ol>
                <button data-target="#create-album" data-toggle="modal" 
                    type="button" class="btn btn-info d-n one d-lg-block m-l-15 toggleAddArticle">
                    <i class="fa fa-plus-circle"></i> Create Album</button>
            </div>
        </div>
    </div>
    @include('feedback/error-success')

    <div class="row">
        <div class="col-md-12">
            <div class="row">
                @if($albums->isNotEmpty())
                    @foreach($albums as $album)
                        <div class="col-lg-3 col-md-6">
                            <!-- Card -->
                            <div class="card">
                                @if($album->galleries->isNotEmpty())
                                    <img class="card-img-top img-responsive crd-image" src="{{ url($album->galleries[0]->image) }}" alt="Card image cap" onerror=this.src="{{url('storage/staffsImages/noimage.jpg')}}">
                                @else
                                    <img class="card-img-top img-responsive crd-image" src="{{ url('storage/staffsImages/noimage.jpg') }}" alt="No image">
                                @endif
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div class="col-md-8">
                                            <h4 class="card-title" style="text-transform: uppercase;">{{$album->album_name}}</h4>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="row">
                                                <a data-toggle="modal" data-target="#edt{{ $album->id }}" class="btn btn-primary text-white mr-1"><i class="fa fa-pencil"></i></a>  
                                                <a data-toggle="modal" data-target="#del{{ $album->id }}" class="btn btn-danger text-white"><i class="fa fa-trash"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="card-text">{{ substr($album->description, 0, 100)}}</p>
                                    <a href="{{ url('gallery/images', $album->id) }}" class="btn btn-primary pull-right">View Gallery</a>
                                </div>
                            </div>
                                <!-- modal for deleting album -->
                                @include('gallery/albums/modals/delete_album')
                                <!-- modal for editing album -->
                                @include('gallery/albums/modals/edit_album')
                            <!-- Card -->
                        </div>
                    @endforeach
                @else
                    <h2 class="text-muted">No albums yet! Click the create button to create one</h2>
                @endif
            </div>
        </div>
    </div>

    @include('gallery/albums/modals/create_album')

    <style>
        .crd-image {
            height: 30vh;
            object-fit: cover;
        }
    </style>
</x-app-layout>