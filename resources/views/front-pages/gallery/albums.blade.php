@extends('welcome')

@section('contents')
    <div id="inner_banner" class="section inner_banner_section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="full">
                        <div class="title-holder">
                            <div class="title-holder-cell text-left">
                                <h1 class="page-title">Gallery Albums</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section padding_layout_1">
        <div class="container">
            <div class="row">
                @if($albums->isNotEmpty())
                    @foreach($albums as $album)
                        <!-- <a href="{{ url('gallery/images', $album->id) }}" class="btn btn-primary pull-right">View Gallery</a> -->
                        <a href="{{ url('gallery', $album->slug) }}">
                            <div class="col-md-4 service_blog margin_bottom_50">
                                <div class="full crd p-2">
                                    <div class="service_img">
                                        @if($album->galleries->isNotEmpty())
                                            <img class="card-img-top img-responsive crd-image" src="{{ url($album->galleries[0]->image) }}" alt="Card image cap" onerror=this.src="{{url('storage/staffsImages/noimage.jpg')}}">
                                        @else
                                            <img class="card-img-top img-responsive crd-image" src="{{ url('storage/staffsImages/noimage.jpg') }}" alt="No image">
                                        @endif
                                    </div>
                                    <div class="service_cont pl-1 pr-1">
                                        <h3 class="service_head">{{$album->album_name}}</h3>
                                        <div class="post_time">
                                            <p><i class="fa fa-clock-o"></i> {{$album->created_at->format('M d, Y')}} </p>
                                        </div>
                                        <p>{{ substr($album->description, 0, 100)}}</p>
                                        <div class="bt_cont"> <a class="btn sqaure_bt pull-right mb-1" href="{{ url('gallery', $album->slug) }}">View Gallery</a> </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                @else
                    <h2 class="text-muted">No albums yet!</h2>
                @endif
            </div>
        </div>
    </div>
    @include('front-pages/homeComponents/views')

    <style>
        .crd {
            transition: 3s;
            box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }
        .crd:hover {
            transform: scale(1.05);
        }
        .crd-image {
            height: 25vh !important;
            object-fit: cover;
        }
    </style>
@endsection