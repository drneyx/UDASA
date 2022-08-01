<div class="row" id="addNews">
    <div class="col-lg-12 mb-3">
        <div class="ibox-content">
            <h4 class="card-title mb-4"><strong>Add New News</strong></h4>
            <hr>
            <form method="POST" enctype="multipart/form-data" action="{{ url('add-news') }}" id="form">
                @csrf
                <div class="col-md-12 mb-3">
                    <h4 for="myTitle">News Title</h4>
                    <input type="text" class="form-control" id="myTitle" name="title" value="{{ old('title') }}" required />
                </div>
                <div class=" col-md-12 mb-3">
                    <h4 for="mydescription">News Description</h4>
                    <textarea id="mydescription" name="description" rows="3" class="form-control" required>{{ old('description') }}</textarea>
                </div>
                <div class=" col-md-12 mb-3">
                    <h4 for="myactivityType">News Category</h4>
                    <select id="myactivityType" name="activity_type" rows="3" class="form-control choose" value="{{ old('activity_type') }}" required>
                        <option value="" selected>Select...</option>
                        <option value="social_event">Social Event</option>
                        <option value="social_responsibility">Social Responsibility</option>
                        <option value="academic_event">Academic Event</option>
                        <option value="scholarship">Chachage Scholarship</option>
                    </select>
                </div>
                <div class=" col-md-12 mb-3">
                    <h4 for="myBody">News Body</h4>
                    <textarea id="myBody" name="body" class="form-control myBody">{{ old('body') }}</textarea>
                </div>

                <div class=" col-md-12 mb-2">
                    <h4 for="myImage">News Date</h4>
                    <input type="date" id="date" name="date" class="form-control" required />
                </div>

                <div class=" col-md-12 mb-2">
                    <h4 for="myImage">Upload Image</h4>
                    <input type="file" id="myImage" name="image" class="form-control" required />
                </div>
                <div class="d-flex justify-content-end">
                    <div class="col-md-4 form-row">
                        <div class="col-md-6">
                            <a class="btn btn-secondary w-100 mb-2 toggleAddNews">Cancel</a>
                        </div>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary w-100 mb-2">Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
