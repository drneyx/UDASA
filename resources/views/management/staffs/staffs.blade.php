<x-app-layout>
    <style>
        .img {
            width: 10px;
            height: 10px;
            cursor: pointer;
        }

        .img img {
            transition: 0.7s;
        }

        .img img:hover {
            transform: scale(1.11);
        }
    </style>
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Staffs Management</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Managements</li>
                </ol>
                <button id="add-user" 
                    type="button" class="btn btn-info d-n one d-lg-block m-l-15"><i
                        class="fa fa-plus-circle"></i> Register New</button>
            </div>
        </div>
    </div>

    @include('feedback/error-success')

        <div class="col-lg-12 ibox-content">
            <div class="row">
                <div class="col-lg-12">
                        <table class="table table-data table-striped table-bordered table-hover display wrap" style="width: 100%;">
                            <thead>
                                <th width="5%">#</th>
                                <th width="5%">Picture</th>
                                <th width="10%">Full Name</th>
                                <th width="10%">Email</th>
                                <th width="10%">Phone</th>
                                <th width="10%">Position</th>
                                <th width="15%">Bio</th>
                                <th width="15%">Action</th>
                            </thead>
                            <tbody>
                                <?php $count = 0; ?>
                                @if(count($staffs) > 0 )
                                    @foreach($staffs -> all() as $staff)
                                    <?php $count++; ?>
                                    <tr>
                                        <td>{{ $count }}</td>
                                        <td class="img">
                                            <img src="{{ url($staff->image) }}" alt="No Image" onerror=this.src="{{url('storage/staffsImages/noimage.jpg')}}">
                                        </td>
                                        <td>{{ $staff->full_name }}</td>
                                        <td>{{ $staff->email }}</td>
                                        <td>{{ $staff->phone }}</td>
                                        <td>{{ $staff->position }}</td>
                                        <td>{!! substr($staff->bio , 0, 100) !!} {{ strlen(strip_tags($staff->bio)) > 100 ? '...' : '' }}</td>
                                        <td>
                                            <a data-toggle="modal" data-target="#edt{{ $staff->id }}" data-position="{{ $staff->position}}" class="btn btn-primary btn-xs text-white"><i class="fa fa-pencil"></i></a>  
                                            <a data-toggle="modal" data-target="#del{{ $staff->id }}" class="btn btn-danger btn-xs text-white"><i class="fa fa-trash"></i></a>
                                            <a data-toggle="modal" data-target="#img{{$staff->id}}" title="click to change image" class="btn btn-success btn-xs text-white"><i class="fa fa-eye"></i></a>                                    
                                        </td>
                                        
                                    </tr>
                                    <!-- image preview modal -->
                                    @include('management/staffs/modals/image-preview')
                                    <!-- Modal for deleting staff -->
                                    @include('management/staffs/modals/deleteStaff')
                                    

                                    <!-- Modal for editing staff -->
                                    @include('management/staffs/modals/editStaff')
                                    
                                    @endforeach
                                @endif
                            </tbody>
                        </table>

                                            
                </div>
            </div>
        </div>

        <!-- Modal for adding new users -->
        @include('management/staffs/modals/addStaffs')



        <!-- script for user modal -->
        <script>
            $('#add-user').click(function() {
                console.log('clicked');
                $('#adduserModel').modal('show');
            })
        </script>
        <script>
            $(document).ready(function() {
                $.ajax({
                    type: 'GET',
                    url: 'staff-positions',
                    success:function(data){
                        console.log(data);
                        $('#user_position').empty();
                        $('#user_position').append("<option value='' + 'selected' +>"+'Select Position'+'</option>')
                        $.each(data, function(index, positionObj){
                            $('#user_position').append("<option value='"+positionObj.id+"'>"+positionObj.position+'</option>')
                        })
                    }
                });
                $.ajax({
                    type: 'GET',
                    url: 'get-staff-categories',
                    success:function(data){
                        console.log(data);
                        $('#user_category').empty();
                        $.each(data, function(index, categoryObj){
                            $('#user_category').append("<option value='"+categoryObj.id+"'>"+categoryObj.category_name+'</option>')
                        })
                    }
                });
            });
        </script>
        <script src="{{ url('js/custom/add-user.js') }}"></script>
</x-app-layout>