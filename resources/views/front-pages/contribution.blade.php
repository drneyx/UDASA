@extends('welcome')

@section('contents')
    <div id="inner_banner" class="section inner_banner_section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="full">
                        <div class="title-holder">
                            <div class="title-holder-cell text-left">
                                <h1 class="page-title">UDASA Contribution</h1>
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
        <div class="row">

          <div class="col-md-12">
            <div class="full p-3">
              <h3 style="color: #029EE3;">{{$contribution->name != '' ? 'The contributions made by UDASA' : "Nothing is here yet!"}}</h3>
              {!! $contribution->contents ?? '' !!}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<!-- section -->
@endsection
