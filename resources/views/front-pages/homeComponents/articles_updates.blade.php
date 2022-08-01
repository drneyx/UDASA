<div class="section padding_layout_1 light_silver gross_l ayout">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="full">
                    <div class="main_heading text_align_left">
                        <!-- <h2 class="color">Core newsLetter of UDASA</h2> -->
                        <h2 class="large"><a href="{{ url('udasa-articles') }}" class="text-primary" style="text-transform: uppercase;"> Articles By UDASA Members</a></h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    @if($articles->isNotEmpty())
                        @foreach($articles as $article)
                            <div class="col-md-4">
                                <div class="full">
                                    <div class="service_blog_inner">
                                        <div class="icon text_align_left row">
                                            <img src="{{ url($article->image) }}" alt="#" style="width: 4rem; height: 4rem; border-radius: 50%;" />
                                            <div class="pt-1 pl-3">
                                                <h5 class="p"><a class="text-primary" href="{{ url('articles/read-article', $article->id) }}">{{$article->title}}</a></h5>
                                                <h6 class="p">{{$article->author}} | {{$article->position != 'member' ? $article->position : 'staff'}} <br>
                                                    <span class="p1"> Published on {{($article->created_at)->format('M d, Y')}}</span>
                                                </h6>
                                            </div>
                                        </div>
                                        <!-- <h4 class="service-heading"><a class="text-primary" href="{{ url('articles/read-article', $article->id) }}">{{$article->title}}</a></h4> -->
                                        <!-- <h5>{{($article->date)}}</h5> -->
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
        </div>
    </div>
</div>
