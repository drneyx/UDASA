@extends('welcome')

@section('contents')
    <div id="inner_banner" class="section inner_banner_section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="full">
                        <div class="title-holder">
                            <div class="title-holder-cell text-left">
                                <h1 class="page-title">Articles By UDASA Members</h1>
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
            <!-- <div class="row"> -->
                <div class="col-md-12">
                    <div class="row">
                        @if($articles->isNotEmpty())
                            @foreach($articles as $article)
                                <div class="col-md-4 mb-2">
                                    <div class="card full">
                                        <div class="service_blog_inner p-3">
                                            <div class="icon text_align_left row">
                                                <img src="{{ url($article->image) }}" alt="#" style="width: 4rem; height: 4rem; border-radius: 50%;" />
                                                <div class="pt-1 pl-3">
                                                    <h5 class="p">{{$article->author}}</h5>
                                                    <h6 class="p">
                                                        <span class="p1"> Published on {{($article->created_at)->format('M d, Y')}}</span>
                                                    </h6>
                                                </div>
                                            </div>
                                            <h4 class="service-heading"><a class="text-primary" href="{{ url('articles/read-article', $article->id) }}">{{$article->title}}</a></h4>
                                            <h5>{{($article->date)}}</h5>
                                            <div class="wrap w-100 p">{!! substr(strip_tags($article->contents), 0, 100)!!} ...</div>
                                            <p><a class="text-primary" href="{{ url('articles/read-article', $article->id) }}">Read More</a></p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <h3>No, Articles yet</h3>
                        @endif
                    </div>
                </div>
            <!-- </div> -->
        </div>
    </div>
@endsection
