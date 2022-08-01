<div id="del{{ $category->id }}" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content animated bounceIn">
            <div class="modal-header">
                <h4 class="modal-title">Delete Staff Category</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="container">
                <div class="alert alert-success alert-dismissible fade show editSuccess" role="alert" style="display: none;">
                    <span id="editSuccess"></span>.
                    <button type="button" class="close">
                        <span id="clsEdit" aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>

            <div class="container">
                <div class="alert alert-danger alert-dismissible fade show editError" role="alert" style="display: none;">
                    <strong class="editError"></strong> .
                    <button type="button" class="close">
                        <span class="closeErrEdit" aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            <form action="{{ url('delete-category', $category->id) }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <p>Are you sure to delete <span class="text-danger">{{$category->category_name}}</span> category?</p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">No, Cancel</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Yes, Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
