<div id="edt{{ $article->id }}" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content animated bounceIn">
            <div class="modal-header">
                <h4 class="modal-title">Edit Article</h4>
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
            <form action="{{ url('articles/edit-article', $article->id) }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="col-md-12 mb-3">
                        <h4 for="author_field2">Author</h4>
                        <input type="text" class="form-control" name="author" id="author_field2" list="author" value="{{ $article->full_name }}" disabled>
                        <datalist id="author2"></datalist>
                    </div>
                    <div class="col-md-12 mb-3">
                        <h4 for="myTitle">Article's Title</h4>
                        <input type="text" class="form-control" id="myTitle" name="title" value="{{ $article->title }}" required />
                    </div>
                    <div class=" col-md-12 mb-3">
                        <h4 for="myContents">Article Contents</h4>
                        <textarea id="myContents" name="contents" class="form-control myContents">{{ $article->contents }}</textarea>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Edit article</button>
                </div>
            </form>
        </div>
    </div>
</div>