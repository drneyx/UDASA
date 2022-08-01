@extends('welcome')

@section('contents')
    <div id="inner_banner" class="section inner_banner_section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="full">
                        <div class="title-holder">
                            <div class="title-holder-cell text-left">
                                <h1 class="page-title">A Biography of {{$staff->full_name}}</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section padding_layout_1 it_service_policy">
        <div class="container">
            <div class="row">
                <div class="col-md-9" style="background-color: aliceblue;">
                    <div class="row p-3">
                        <div class="pull-left" style="width: 15rem; height: 15rem;">
                            <img src="{{ url($staff->image) }}" alt="{{ $staff->full_name }}" class="w-100 h-100" style="border-radius: 50%; object-fit: cover;">
                        </div>
                        <div class="pull-left p-3">
                            <h1>
                            <span style="font-size: 28px; color:black; font-weight: bold;">{{ $staff->full_name }}</span>
                                <br>
                                <small style="font-size: 20px; text-transform: capitalize;">
                                    {{$staff->category_name}} | {{$staff->position != 'member' ? $staff->position : 'staff'}}
                                </small> 
                                <br>
                                <small> Email: <a class="text-primary" href="mailto:{{ $staff->email}}">{{ $staff->email}}</a></small>
                                <br>
                                <small> Phone: <a class="text-primary" href="tel:{{ $staff->phone}}">{{ $staff->phone}}</a></small>
                                <br>
                                <small> {{ $staff->leadership_year != null ? 'Year: ' . $staff->leadership_year : ''}}</small>
                            </h1>
                            <h4></h4>
                        </div>
                    </div> 
                    <br>
                    <div class="p-3">
                        <!-- <h3 style="color: #029EE3;">{{$staff->title}}</h3> -->
                        <div style="font-size: 17px; text-align:justify; color:black; line-height: 30px;"> {!! $staff->bio !!} </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection