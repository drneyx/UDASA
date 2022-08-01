@extends('welcome')

@section('contents')
    <div id="inner_banner" class="section inner_banner_section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="full">
                        <div class="title-holder">
                            <div class="title-holder-cell text-left">
                                <h1 class="page-title">Academic Events</h1>
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
                @if($news->isNotEmpty())
                    @foreach($news as $news)
                        <div class="col-md-4 service_blog margin_bottom_50">
                            <div class="full">
                                <div class="service_img" style="height: 200px;"> 
                                    <img class="img-responsive w-100 h-100" src="{{ url($news->image) }}" alt="{{$news->title}}" style="object-fit: cover;" /> 
                                </div>
                                <div class="service_cont">
                                    <h3 class="service_head">{{$news->title}}</h3>
                                    <div class="post_time">
                                        <p><i class="fa fa-clock-o"></i> {{($news->created_at)->format('M d, Y')}} </p>
                                    </div>
                                    <p>{{ substr($news->description, 0, 142) }} {{ strlen($news->description) > 142 ? '...' : ''}}</p>
                                    <div class="bt_cont"> <a class="btn sqaure_bt" href="{{ url('read-news', $news->id) }}">See More</a> </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <h2>Oops! Nothing is here yet.</h2>
                @endif    
            </div>
        </div>
    </div>
@endsection