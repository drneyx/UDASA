<x-app-layout>
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Staff Positions Management</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Manage Positions</li>
                </ol>
                <button id="add-position" 
                    type="button" class="btn btn-info d-n one d-lg-block m-l-15"><i
                        class="fa fa-plus-circle"></i> Add New Position</button>
            </div>
        </div>
    </div>

    
    @include('feedback/error-success')

    <div class="row">
        <div class="col-lg-7">
            <div class="ibox-content">
                <div class="row">
                    <div class="col-lg-12">
                            <table class="table table-data table-striped table-bordered table-hover display nowrap" style="width: 100%;">
                                <thead>
                                    <th width="5%">#</th>
                                    <th width="30%">Position Name</th>
                                    <th width="15%">Action</th>
                                </thead>
                                <tbody>
                                    <?php $count = 0; ?>
                                    @if($positions->isNotEmpty())
                                        @foreach($positions as $position)
                                            <?php $count++ ?>
                                            <tr>
                                                <td>{{$count}}</td>
                                                <td style="text-transform: capitalize;">{{$position->position}}</td>
                                                <td>
                                                    <a data-toggle="modal" title="edit position" data-target="#edt{{ $position->id }}" class="btn btn-primary btn-xs text-white"><i class="fa fa-pencil"></i></a>  
                                                    <a data-toggle="modal" title="delete position" data-target="#del{{ $position->id }}" class="btn btn-danger btn-xs text-white"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>

                                            <!-- edit modal -->
                                            @include('management/positions/modals/editPosition')

                                            <!-- Delete modal -->
                                            @include('management/positions/modals/deletePosition')
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
    
                                                
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-5" id="positionForm">
            <div class="ibox-content">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add Staff Position</h4>
                        <form class="mt-4" id="staffPosition">
                            @csrf
                            <div class="form-group">
                                <label for="positionName">Position Name</label>
                                <input data-role="tagsinput" type="text" name="position" class="form-control" id="positionName" placeholder="eg. Chairperson" required>
                                <div class="text-danger" id="posError"></div>
                            </div>
                            <button id="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#staffPosition-form input[type="text"]').blur(function(){
                if(!$(this).val()){
                    $(this).addClass("err");
                } else{
                    $(this).removeClass("err");
                }
            });

            $('#positionForm').hide();
            $('#add-position').click(function() {
                $('#positionForm').toggle();
            });

            $('#submit').click(function(e) {
                $('#posError').text('');
                $('#positionName').removeClass('err');
                var fail = false;
                var name;
                e.preventDefault();
                if( $('#positionName').val()) {

                }else {
                    fail = true
                   $('#posError').text('This field is required');
                   $('#positionName').addClass('err');
                }

                if(!fail) {
                    $.ajax({
                        type: 'POST',
                        url: 'add-positions',
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        data: {
                            "positions": $("#positionName").tagsinput()[0].itemsArray, 
                        },

                        success:function(data) {
                            console.log(data.info)
                            swal("Staff Positions", data.info, "success")
                            .then((value) => {
                                window.location.reload();
                            });

                        },

                        error:function(error){
                            console.log(error);
                            swal(error.statusText, "contanct the administrator for help", "error")
                        }
                    })
                }
            });
            
        }) 
    </script>
</x-app-layout>