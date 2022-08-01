<div class="section padding_layout_1">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="full">
                    <div class="main_heading text_align_center">
                        <h2 class="color">udasa Updates and Events</h2>
                        <!-- <p class="large">Latest Updates and Upcoming Events from Udasa!</p> -->
                    </div>
                </div>
            </div>
        </div>
        <!-- section -->
        <div class="row">
            <div class="col-md-4 margin_bottom_50 update">
                @include('front-pages/homeComponents/chair_word')
            </div>
            @if($news->isNotEmpty())
                @foreach($news as $news)
                    <div class="col-md-4 service_blog margin_bottom_50 update">
                        <div class="full">
                            <div class="service_img" style="height: 200px;">
                                <img class="img-responsive w-100 h-100" src="{{ url($news->image) }}" alt="{{$news->title}}" style="object-fit: cover;" />
                            </div>
                            <div class="service_cont">
                                <h3 class="service_head"><small><span class="new text-white pl-1 pr-1">New <i class="fa fa-star"></i></span></small> {{$news->title}}</h3>
                                <div class="post_time">
                                    <p><i class="fa fa-clock-o"></i> {{($news->date)->format('M d, Y')}} </p>
                                </div>
                                <p>{{substr($news->description, 0, 100)}} {{ strlen($news->description) > 100 ? '...' : ''}}</p>
                                <div class="bt_cont"> <a class="btn sqaure_bt" href="{{ url('read-news', $news->id) }}">See More</a> </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <div class="modal fade" id="word" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
            <div class="modal-content animated rotateIn">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Word From UDASA Chair</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="p message">
                        {!! $word->message !!}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                </div>
            </div>
        </div>
    </div>
<style>
.new {
  width: 30px;
  height: 20px;
  border-radius: 5%;
  background-color: red;
  position: relative;
  animation-name: example;
  animation-duration: 2s;
  animation-iteration-count: infinite;
}

@keyframes example {
  0%   {background-color:red; left:0px; top:0px;}
  25%  {background-color:yellow; left:0px; top:0px;}
  50%  {background-color:blue; left:0px; top:0px;}
  75%  {background-color:green; left:0px; top:0px;}
  100% {background-color:red; left:0px; top:0px;}
}
.update {
    transition: 1s;
}
.update:hover {
    transform: scale(1.04);
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
</style>
