<div id="addModal" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content animated bounceIn">
            <div class="modal-header">
                <h4 class="modal-title">Add New Mission/Vision</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form action="{{ url('add-mission-vision') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="name">Title</label>
                            <select type="text" class="form-control choose" name="name" id="name" required>
                                <option value="mission">Mission</option>
                                <option value="vision">Vision</option>
                                <option value="objectives and functions">Objectives and Functions</option>
                                <option value="contribution">Contribution</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="contents">Contents</label>
                            <textarea type="text" class="form-control contents" name="contents" rows="7" id="contents" ></textarea>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
