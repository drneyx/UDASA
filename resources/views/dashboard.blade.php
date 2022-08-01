<x-app-layout>
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Home Dashboard</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <!-- <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li> -->
                    <li class="breadcrumb-item active">Home</li>
                </ol>
                <!-- <button id="add-user" 
                    type="button" class="btn btn-info d-n one d-lg-block m-l-15"><i
                        class="fa fa-plus-circle"></i> Register New</button> -->
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Column -->
        <div class="col-lg-3 col-md-6">
            <a href="{{ url('staffs-management') }}">
                <div class="card crd">
                    <div class="card-body">
                        <div class="d-flex flex-row">
                            <div class="round align-self-center round-success"><i class="fa fa-users"></i></div>
                            <div class="m-l-10 align-self-center">
                                <h3 class="m-b-0 text-black">{{$staffsCount}}</h3>
                                <h5 class="text-muted m-b-0">Total Staffs</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-lg-3 col-md-6">
            <a href="{{ url('news') }}">
                <div class="card crd">
                    <div class="card-body">
                        <div class="d-flex flex-row">
                            <div class="round align-self-center round-info"><i class="fa fa-flag"></i></div>
                            <div class="m-l-10 align-self-center">
                                <h3 class="m-b-0 text-black">{{$newsCount}}</h3>
                                <h5 class="text-muted m-b-0">Total News Published</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-lg-3 col-md-6">
            <a href="{{ url('news-letters') }}">
                <div class="card crd">
                    <div class="card-body">
                        <div class="d-flex flex-row">
                            <div class="round align-self-center round-info"><i class="fa fa-print"></i></div>
                            <div class="m-l-10 align-self-center">
                                <h3 class="m-b-0">{{$newsLetterCount}}</h3>
                                <h5 class="text-muted m-b-0">Total Newsletters Published</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-lg-3 col-md-6">
            <div class="card crd">
                <div class="card-body">
                    <div class="d-flex flex-row">
                        <div class="round align-self-center round-success"><i class="fa fa-user"></i></div>
                        <div class="m-l-10 align-self-center">
                            <h3 class="m-b-0">{{$totalVisitors}}</h3>
                            <h5 class="text-muted m-b-0">Total Visitors</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
        <!-- Column-->
    </div>

    <style>
        .crd {
            transition: 0.3s;
        }
        .crd:hover {
            transform: scale(1.1);
        }
    </style>
</x-app-layout>
