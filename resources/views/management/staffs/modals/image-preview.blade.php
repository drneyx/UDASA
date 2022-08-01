<di v class="modal inmodal" id="img{{$staff->id}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated bounceIn">
            <div class="modal-header d-flex justify-content-between">
                <h4 class="modal-title">Staff image preview</h4>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <!-- <small>Clicking change image without selecting the image, the default noimage.jpg will be saved instead</small> -->
            </div>
            <form role="form" action="{{ url('changeImage', $staff->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="ibox w-100 parent">
                        <!-- <div class="ibox-title">
                            <h5>staff image <small>preview</small></h5>
                        </div> -->
                        <div class="ibox-content thumb" style="height: 40vh;">
                                <img src="{{  url($staff->image)}}" alt="No Image" onerror=this.src="{{url('default-image/noimage.jpg')}}" class="h-100 w-100" style="object-fit: cover;">
                        </div>
                    </div>
                        <div class="form-group">
                            <input type="file" name="image" placeholder="{{ $staff->image }}" class="form-control">
                        </div>
                </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No,Cancel</button>
                        <button type="submit" class="btn btn-primary">Change Image</button>
                    </div>
            </form>
        </div>
    </div>
</di>