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
                                <h1 class="page-title">Article from UDASA member</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end inner page banner -->
    <div class="section padding_layout_1 it_service_policy">
        <div class="container">
            <div class="row">
                <div class="col-md-9" style="background-color: aliceblue;">
                    <div class="row p-3">
                        <div class="pull-left" style="width: 5.5rem; height: 5.5rem;">
                            <img src="{{ url($article->image) }}" alt="{{ $article->full_name }}" class="w-100 h-100" style="border-radius: 50%; object-fit: cover;">
                        </div>
                        <div class="pull-left p-3">
                            <h5>{{ $article->title }}</h5>
                            <h6>{{$article->author}} | <br>
                                <span class="p1"> Published on {{($article->created_at)->format('M d, Y')}}</span>
                            </h6>
                        </div>
                    </div>
                    <div class="p-3">
                        <!-- <h1 style="color: #029EE3;" class="mb-3">{{$article->title}}</h1> -->
                        <div class="contents"> {!!$article->contents !!} </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="side_bar">
                        <div class="side_bar_blog">
                            <div class="side_bar_blog">
                                <h4  class="color">RECENT Articles</h4>
                                <div class="categary">
                                    <ul>
                                        @if($recents->IsNotEmpty())
                                            @foreach($recents as $recent)
                                                <li><a href="{{ url('articles/read-article', $recent->id) }}"><i class="fa fa-angle-right"></i> {{$recent->title}}</a></li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<style>
    h2 {
        font-size: 20px !important;
        font-weight: normal !important;
        text-transform: capitalize !important;
    }
    .contents p {
        font-size: 17px !important;
        text-align:justify;
        color:black !important;
        line-height: 30px !important;
    }
</style>

@endsection
