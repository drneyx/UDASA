<x-app-layout>
    
    <link href="{{ url('dist/css/pages/user-card.css') }}" rel="stylesheet">
    <link href="{{ url('assets/node_modules/Magnific-Popup-master/dist/magnific-popup.css') }}" rel="stylesheet">
    <style>
        .crd-image {
            height: 25vh !important;
            object-fit: cover;
        }
        .card {
            transition: 3s;
        }
        .card:hover {
            transform: scale(1.07);
            transition: 3s;
        }
    </style>

    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Gallery</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item">Gallery</li>
                    <li class="breadcrumb-item"><a href="{{ url('gallery/manage-albums') }}">Manage Albums</a> </li>
                    <li class="breadcrumb-item active">Images</li>
                </ol>
                <button data-target="#add-picture" data-toggle="modal" 
                    type="button" class="btn btn-info d-n one d-lg-block m-l-15 toggleAddArticle">
                    <i class="fa fa-plus-circle"></i> Add Pictures</button>
            </div>
        </div>
    </div>

    @include('feedback/error-success')
    <div class="row el-element-overlay">
        <div class="col-md-12">
            <h4 class="card-title">Gallery page</h4>
            <h6 class="card-subtitle m-b-20 text-muted">you can make gallery like this</h6>
        </div>
        @if($gallery->isNotEmpty())
            @foreach($gallery as $gallery)
                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="el-card-item">
                            <div class="el-card-avatar el-overlay-1"> <img src="{{ url($gallery->image) }}" alt="user" class="crd-image" />
                                <div class="el-overlay">
                                    <ul class="el-info">
                                        <li><a class="btn default btn-outline image-popup-vertical-fit" href="{{ url($gallery->image) }}"><i class="fa fa-eye"></i></a></li>
                                        <li><a class="btn default btn-outline" data-target="#edt{{ $gallery->id }}" data-toggle="modal"><i class="fa fa-edit"></i></a></li>
                                        <li><a class="btn default btn-outline" data-target="#del{{ $gallery->id }}" data-toggle="modal"><i class="fa fa-trash"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="el-card-content">
                                <h3 class="box-title text-left p-1" style="font-weight: bold;">{{$gallery->title}}</h3>
                                <!-- <br/> -->
                                <div class="text-justify p-1">{{ substr($gallery->description, 0, 100) }} {{ strlen($gallery->description) > 100 ? "..." : "" }}</div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <!-- model for deleting gallery -->
                @include('gallery/images/models/delete_gallery')
                <!-- model for editing gallery -->
                @include('gallery/images/models/edit_gallery')
            @endforeach
        @else
            <h2 class="text-muted">No images added yet</h2>
        @endif
    </div>

    @include('gallery/images/models/add_picture')
    <script src="{{ url('assets/node_modules/Magnific-Popup-master/dist/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ url('assets/node_modules/Magnific-Popup-master/dist/jquery.magnific-popup-init.js') }}"></script>
</x-app-layout>