<div id="edt{{ $message->id }}" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content animated bounceIn">
            <div class="modal-header">
                <h4 class="modal-title">Edit Message</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form action="{{ url('edit-message', $message->id) }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="col-md-12 mb-3">
                        <h4 for="message">Message</h4>
                        <textarea rows="5" type="text" class="form-control myContents" name="message" id="message">{{$message->message}}</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Edit Message</button>
                </div>
            </form>
        </div>
    </div>
</div>