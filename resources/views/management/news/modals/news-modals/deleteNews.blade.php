<div class="modal inmodal" id="del{{ $news->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated bounceIn">
            <div class="modal-header">
                <h4 class="modal-title">Delete news</h4>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            </div>
            <form role="form" action="{{ url('delete-news', $news->id) }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="ibox w-100">
                        <!-- <div class="ibox-title">
                            <h5>Delete news <small>forever</small></h5>
                        </div> -->
                        <div class="ibox-content">
                            <div class="form-group">
                                <p>We hope you know what you are doing!</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No,Cancel</button>
                    <button type="submit" class="btn btn-danger">Yes, Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>