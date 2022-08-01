<x-app-layout>
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Staff Categories Management</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Manage Categories</li>
                </ol>
                <button id="add-category" 
                    type="button" class="btn btn-info d-n one d-lg-block m-l-15"><i
                        class="fa fa-plus-circle"></i> Add New Category</button>
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
                                    <th width="30%">Category Name</th>
                                    <th width="15%">Action</th>
                                </thead>
                                <tbody>
                                    <?php $count = 0; ?>
                                    @if($categories->isNotEmpty())
                                        @foreach($categories as $category)
                                            <?php $count++ ?>
                                            <tr>
                                                <td>{{$count}}</td>
                                                <td>{{$category->category_name}}</td>
                                                <td>
                                                    <a data-toggle="modal" title="edit category" data-target="#edt{{ $category->id }}" class="btn btn-primary btn-xs text-white"><i class="fa fa-pencil"></i></a>  
                                                    <a data-toggle="modal" title="delete category" data-target="#del{{ $category->id }}" class="btn btn-danger btn-xs text-white"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>

                                            <!-- edit modal -->
                                            @include('management/staffCategories/modals/editCategory')

                                            <!-- Delete modal -->
                                            @include('management/staffCategories/modals/deleteCategory')
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
    
                                                
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5" id="categoryForm">
            <div class="ibox-content">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add Staff Category</h4>
                        <form class="mt-4" id="staffCategory-form">
                            @csrf
                            <div class="form-group">
                                <label for="categoryName">Category Name</label>
                                <input data-role="tagsinput" type="text" name="category" class="form-control" id="categoryName" placeholder="eg. Lecturer" required>
                                <div class="text-danger" id="categoryError"></div>
                            </div>
                            <button id="btnSubmit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#staffCategory-form input[type="text"]').blur(function(){
                if(!$(this).val()){
                    $(this).addClass("err");
                } else{
                    $(this).removeClass("err");
                }
            });

            $('#categoryForm').hide();
            $('#add-category').click(function() {
                $('#categoryForm').toggle();
            });

            
            $('#btnSubmit').click(function(e) {
                $('#categoryError').text('');
                $('#categoryName').removeClass('err');
                var fail = false;
                var name;
                e.preventDefault();
                if( $('#categoryName').val()) {

                }else {
                    fail = true
                   $('#categoryError').text('This field is required');
                   $('#categoryName').addClass('err');
                }

                if(!fail) {
                    $.ajax({
                        type: 'POST',
                        url: 'add-categories',
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        data: {
                            "categories": $("#categoryName").tagsinput()[0].itemsArray, 
                        },

                        success:function(data) {
                            console.log(data.info)
                            swal("Staff Categories", data.info, "success")
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