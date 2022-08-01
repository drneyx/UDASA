@extends('welcome')

@section('contents')
    <!-- inner page banner -->
    <div id="inner_banner" class="section inner_banner_section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="full">
                        <div class="title-holder">
                            <div class="title-holder-cell text-left">
                                <h1 class="page-title">Udasa Newsletter</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end inner page banner -->

    <div class="section padding_layout_1">
        <div class="container">
            <div class="row">
                @if($newsLetter->isNotEmpty())
                    @foreach($newsLetter as $newsLetter)
                        <div class="col-md-3 service_blog margin_bottom_50">
                            <div class="full">
                                <div class="service_img" style="height: 200px;">
                                    <a href="{{ route('read-newsletter', $newsLetter->id)}}">
                                        <img class="img-responsive w-100 h-100" src="{{ url($newsLetter->image) }}" alt="{{$newsLetter->title}}" style="object-fit: cover;" /> 
                                    </a>
                                </div>
                                <div class="service_cont">
                                    <h3 class="service_head">{{$newsLetter->title}}</h3>
                                    <div class="post_time">
                                        <p><i class="fa fa-clock-o"></i> {{($newsLetter->created_at)->format('M d, Y')}} </p>
                                    </div>
                                    <p>{{ substr($newsLetter->description, 0, 142) }} {{ strlen($newsLetter->description) > 142 ? '...' : ''}} 
                                        <a class="badge badge-primary" href="{{ url('read-newsletter', $newsLetter->id)}}">{{strlen($newsLetter->description) > 142 ? 'Read More' : ''}}</a>
                                    </p>
                                    <div class="bt_cont">
                                        @if($newsLetter->file != '')
                                             <a class="btn text-primary" target="_blank" href="{{ url($newsLetter->file) }}">Read Full Pdf</a> 
                                        @else
                                            No any file
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <h3>No NewsLetter yet</h3>
                @endif
            </div>
        </div>
    </div>

    @include('front-pages/homeComponents/views')
@endsection