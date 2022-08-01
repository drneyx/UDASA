<div id="edt{{ $news->id }}" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content animated bounceIn">
            <div class="modal-header">
                <h4 class="modal-title">Edit News</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form action="{{ url('edit-news', $news->id) }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="title">News Title</label>
                            <input type="text" class="form-control" name="title" id="title" value="{{ $news->title }}" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="description">News Description</label>
                            <textarea type="text" class="form-control" name="description" rows="3" id="description" required>{{ $news->description }}</textarea>
                        </div>
                    </div>
                    <div class=" col-md-12 mb-3">
                        <h4 for="myactivityType">News Category</h4>
                        <select id="myactivityType" name="activity_type" rows="3" class="form-control choose" value="{{ old('activity_type') }}" required>
                            <option value="social_event" {{ $news->activity_type == 'social_event' ? 'selected' : '' }}>Social Event</option>
                            <option value="social_responsibility" {{ $news->activity_type == 'social_responsibility' ? 'selected' : '' }}>Social Responsibility</option>
                            <option value="academic_event" {{ $news->activity_type == 'academic_event' ? 'selected' : '' }}>Academic Event</option>
                            <option value="scholarship" {{ $news->activity_type == 'scholarship' ? 'selected' : '' }}>Chachage Scholarship</option>
                        </select>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="myBody">News Contents</label>
                            <textarea class="form-control myBody" name="body" id="myBody" required>{{ $news->body }}</textarea>
                        </div>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Edit news</button>
                </div>
            </form>
        </div>
    </div>
</div>