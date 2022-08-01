<div id="adduserModel" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content animated bounceIn">
            <div class="modal-header">
                <h4 class="modal-title">Register New User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="container">
                <div class="alert alert-success alert-dismissible fade show addSuccess" role="alert" style="display: none;">
                    <span id="addSuccess"></span>.
                    <button type="button" class="close">
                        <span id="cls" aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>

            <div class="container">
                <div class="alert alert-danger alert-dismissible fade show addError" role="alert" style="display: none;">
                    <strong id="addError"></strong> .
                    <button type="button" class="close">
                        <span id="closeErr" aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            <form method="POST" enctype="multipart/form-data" id="addUser">
                @csrf
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="fullName">Full Name</label>
                            <input type="text" class="form-control" name="full_name" id="fullName" placeholder="Full Name" required>
                            <span class="text-danger" id="fullname"></span>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="phoneNumber">Phone</label>
                            <input type="tel" class="form-control" name="phone" id="phoneNumber" placeholder="255123456789" required>
                            <div class="text-danger" id="phone"></div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="emailAddress">Email</label>
                            <input type="email" class="form-control" name="email" id="emailAddress" placeholder="Email" required>
                            <span class="text-danger" id="email"></span>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="user_position">Position</label>
                            <select name="positionId" id="user_position" class="form-control" required>
                                <option value="" selected>Select Position</option>
                                <option value="member">Member</option>
                            </select>
                            <span class="text-danger" id="position"></span>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="user_category">Staff Category</label>
                            <select name="categoryId" id="user_category" class="form-control" required>
                                <option value="" selected>Select category</option>
                                <option value="member">Member</option>
                            </select>
                            <span class="text-danger" id="category"></span>
                        </div>
                    </div>
                    <div class="form-row" id="college" style="display: none;">
                        <div class="form-group col-md-12">
                            <label for="CollegeId">Representative College</label>
                            <select name="collegeId" id="CollegeId" class="form-control chzn-select">
                                <option value="" selected></option>
                            </select>
                            <span class="text-danger" id="collegeError"></span>
                        </div>
                    </div>    
                    <div class="form-row" id="leaderStatus" style="display: no ne;">
                        <div class="form-group col-md-6">
                            <label for="positionStatus">Leadership Status</label>
                            <select name="statusPosition" id="positionStatus" class="form-control">
                                <option value="" selected>Select Status</option>
                                <option value="current">current</option>
                                <option value="previous">previous</option>
                            </select>
                            <span class="text-danger" id="positionStatusError"></span>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="leadership_year">Leadership Year</label>
                            <input name="leadership_year" id="leadership_year" class="form-control" placeholder="2020-2021" required />
                            <span class="text-danger" id="leadershipYear"></span>
                        </div>
                    </div>    
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="userPin">Staff Bio</label>
                            <textarea class="myContents2" name="bio" id="" cols="30" rows="7"></textarea>
                            <span class="text-danger" id="bio"></span>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="userPin">Staff Image</label>
                            <input class="form-control" name="image" id="picture" type="file" />
                            <span class="text-danger" id="image"></span>
                        </div>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" id="modalCloseUser">Close</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Register Staff</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
        $(document).ready(function() {
            
                tinymce.init({
                    selector: ".myContents2",
                    // height: 300,
                    plugins: [
                        "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                        "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                        "save table contextmenu directionality emoticons template paste textcolor"
                    ],
                    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons",
                    menubar:false,
                });
        });
    </script>