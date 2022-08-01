<div id="edt{{$album->id}}" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content animated bounceIn">
            <div class="modal-header">
                <h4 class="modal-title">Edit Album</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form action="{{ url('gallery/edit-album', $album->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="AlbumTitle">Album Name</label>
                            <input type="text" class="form-control" name="name" id="AlbumTitle" value="{{ $album->album_name }}" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="AlbumDescription">Short Description</label>
                            <textarea type="text" class="form-control" name="description" rows="5" id="AlbumDescription" required>{{ $album->description }}</textarea>
                        </div>
                    </div>
                    <!-- <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="picture">News Picture</label>
                            <input type="file" class="form-control" name="image" id="picture" required>
                        </div>
                    </div> -->
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Edit Album</button>
                </div>
            </form>
        </div>
    </div>
</div>