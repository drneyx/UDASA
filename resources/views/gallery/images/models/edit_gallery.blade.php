<div id="edt{{$gallery->id}}" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content animated bounceIn">
            <div class="modal-header">
                <h4 class="modal-title">Edit Gallery</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form action="{{ url('gallery/edit-picture', $gallery->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="pictureTitle">Title</label>
                            <input type="text" class="form-control" name="title" id="pictureTitle" value="{{ $gallery->title }}" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="pictureDescription">Description</label>
                            <textarea type="text" class="form-control" name="description" rows="5" id="pictureDescription" required>{{$gallery->description}}</textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <a class="btn btn-primary text-white edt-img" id="">Click to Edit image</a>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12 img-div" style="display: none;">
                            <label for="picture2">Picture</label>
                            <input type="file" class="form-control" name="image" id="picture2" >
                        </div>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Edit Gallery</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $('.edt-img').click(function() {
        $('.img-div').toggle();
    });
</script>