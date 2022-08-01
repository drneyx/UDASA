<x-app-layout>
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Objectives Management</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Managements</li>
                </ol>
                <button id="add-objective" 
                    type="button" class="btn btn-info d-n one d-lg-block m-l-15"><i
                        class="fa fa-plus-circle"></i> Add New</button>
            </div>
        </div>
    </div>

    @if (session('info')) 
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{session('info')}}.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
    @endif
    @if (session('error')) 
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{session('error')}}.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
    @endif
    @if ($errors->any()) 
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
    @endif

    <div class="col-md-12">
        <div class="alert alert-success alert-dismissible fade show addSuccess" role="alert" style="display: none;">
            <span id="addSuccess"></span>.
            <button type="button" class="close">
                <span id="clsobj" aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>

    <div class="col-md-12">
        <div class="alert alert-danger alert-dismissible fade show addError" role="alert" style="display: none;">
            <strong id="addError"></strong> .
            <button type="button" class="close">
                <span id="closeErrObj" aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-7">
            <div class="ibox-content">
                <div class="row">
                    <div class="col-lg-12">
                            <table class="table table-data table-striped table-bordered table-hover display nowrap" style="width: 100%;">
                                <thead>
                                    <th width="5%">#</th>
                                    <th width="5%">Title</th>
                                    <th width="50%">Objective</th>
                                    <th width="5%">Action</th>
                                </thead>
                                <tbody>
                                    <?php $count = 0; ?>
                                    @if(count($objectives) > 0 )
                                        @foreach($objectives -> all() as $objective)
                                        <?php $count++; ?>
                                        <tr>
                                            <td>{{ $count }}</td>
                                            <td>{{ $objective->title }}</td>
                                            <td>{{ $objective->objective }}</td>
                                            <td>
                                                <a data-toggle="modal" data-target="#edt{{ $objective->id }}" class="btn btn-primary btn-xs text-white"><i class="fa fa-pencil"></i></a>  
                                                <a data-toggle="modal" data-target="#del{{ $objective->id }}" class="btn btn-danger btn-xs text-white"><i class="fa fa-trash"></i></a>
                                            </td>
                                            
                                        </tr>
                                        <!-- image preview modal -->
                                        <!-- Modal for deleting objective -->
                                        @include('management/objectives/modals/deleteobjective')
                                        
    
                                        <!-- Modal for editing objective -->
                                        @include('management/objectives/modals/editobjective')
                                        
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
    
                                                
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-5" id="objectiveForm">
            <div class="ibox-content">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add Objective</h4>
                        <form class="mt-4" id="objective-form">
                            @csrf
                            <div class="form-group">
                                <!-- <label for="title">Title</label> -->
                                <input type="text" name="title" class="form-control" id="title" placeholder="Enter objective title" required>
                                <div class="text-danger" id="titleError"></div>
                            </div>
                            <div class="form-group">
                                <!-- <label for="objective">Objective</label> -->
                                <textarea type="text" name="objective" class="form-control" rows="3" id="objective" placeholder="objective" required></textarea>
                                <div class="text-danger" id="objerr"></div>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <script src="{{ url('js/custom/add-objective.js') }}"></script>
</x-app-layout>