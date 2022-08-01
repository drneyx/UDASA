<div id="edt{{ $objective->id }}" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content animated bounceIn">
            <div class="modal-header">
                <h4 class="modal-title">Edit Objective</h4>
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
            <form action="{{ url('edit-objective', $objective->id) }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" id="title" value="{{$objective->title}}" required>
                    </div>
                    <div class="form-group">
                        <label for="objective">Objective</label>
                        <textarea type="text" name="objective" class="form-control" rows="3" id="objective" required>{{$objective->objective}}</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Edit objective</button>
                </div>
            </form>
        </div>
    </div>
</div>