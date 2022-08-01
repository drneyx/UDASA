@extends('welcome')

@section('contents')
    <div id="inner_banner" class="section inner_banner_section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="full">
                        <div class="title-holder">
                            <div class="title-holder-cell text-left">
                                <h1 class="page-title">Gallery Photos</h1>
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
                @if($gallery->isNotEmpty())
                    @foreach($gallery as $gallery)
                        <!-- <a href="{{ url('gallery/images', $gallery->id) }}" class="btn btn-primary pull-right">View Gallery</a> -->
                        <!-- <a href="{{ url('gallery', $gallery->slug) }}"> -->
                            <div class="col-md-4 service_blog margin_bottom_50">
                                <div class="full crd p-2">
                                    <div class="service_img">
                                        <img class="card-img-top img-responsive crd-image" src="{{ url($gallery->image) }}" alt="Card image cap" onerror=this.src="{{url('storage/staffsImages/noimage.jpg')}}">
                                    </div>
                                    <div class="service_cont pl-1 pr-1">
                                        <h3 class="service_head">{{$gallery->gallery_name}}</h3>
                                        <div class="post_time">
                                            <p><i class="fa fa-clock-o"></i> {{$gallery->created_at->format('M d, Y')}} </p>
                                        </div>
                                        <p>{{ substr($gallery->description, 0, 100)}}</p>
                                        <!-- <div class="bt_cont"> <a class="btn sqaure_bt pull-right mb-1" href="it_service_detail.html">View Gallery</a> </div> -->
                                    </div>
                                </div>
                            </div>
                        <!-- </a> -->
                    @endforeach
                @else
                    <h2 class="text-muted">No photos yet!</h2>
                @endif
            </div>
        </div>
    </div>
    @include('front-pages/homeComponents/views')

    <style>
        .crd {
            transition: 3s;
            box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.2), 0 6px 2px 0 rgba(0, 0, 0, 0.19);
        }
        .crd:hover {
            transform: scale(1.02);
        }
        .crd-image {
            height: 25vh !important;
            object-fit: cover;
        }
    </style>
@endsection