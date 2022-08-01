<x-app-layout>
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Members Publications</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item">Members Publications</li>
                    <li class="breadcrumb-item active">Messsage from Chair</li>
                </ol>
                <button data-toggle="modal" data-target="#add-message" 
                    type="button" class="btn btn-info d-n one d-lg-block m-l-15">
                    <i class="fa fa-plus-circle"></i> Add Message</button>
            </div>
        </div>
    </div>

    @include('feedback/error-success')

    
    <div class="col-lg-12 ibox-content">
        <div class="row">
            <div class="col-lg-12">
                    <table class="table table-data table-striped table-bordered table-hover display wrap" style="width: 100%;">
                        <thead>
                            <th width="2%">#</th>
                            <th width="5%">Picture</th>
                            <th width="10%">Name</th>
                            <th width="35%">Message</th>
                            <th width="10%">Publication Date</th>
                            <th width="10%">Action</th>
                        </thead>
                        <tbody>
                            <?php $count = 0; ?>
                            @if(count($messages) > 0 )
                                @foreach($messages -> all() as $message)
                                <?php $count++; ?>
                                <tr>
                                    <td>{{ $count }}</td>
                                    <td class="img">
                                        <img class="thumbnail" src="{{ url($message->image) }}" alt="No Image" onerror=this.src="{{url('storage/staffsImages/noimage.jpg')}}">
                                    </td>
                                    <td>{{ $message->full_name }}</td>
                                    <td><span class="wrap" style="width: 100px !important;"> {!! substr($message->message, 0, 200) !!} {{ strlen($message->message) > 200 ? "..." : "" }}</span></td>
                                    <td>{{($message->created_at)->format('M d, Y')}}</td>
                                    <td>
                                        <a data-toggle="modal" data-target="#edt{{ $message->id }}" class="btn btn-primary btn-xs text-white"><i class="fa fa-pencil"></i></a>  
                                        <a data-toggle="modal" data-target="#del{{ $message->id }}" class="btn btn-danger btn-xs text-white"><i class="fa fa-trash"></i></a>
                                    </td>
                                    
                                </tr>

                                <!-- Modal for deleting message -->
                                @include('MembersPublications/modals/deleteMessage')

                                <!-- Modal for editing message -->
                                @include('MembersPublications/modals/editMessage')
                                
                                @endforeach
                            @endif
                        </tbody>
                    </table>

                                        
            </div>
        </div>
    </div>


    <div id="add-message" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content animated bounceIn">
                <div class="modal-header">
                    <h4 class="modal-title">Add Message</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <form action="{{ url('add-message') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="col-md-12 mb-3">
                            <h4 for="message">Message</h4>
                            <textarea rows="5" type="text" class="form-control myContents" name="message" id="message" value="{{ old('message') }}"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Add Message</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<script>
    $(document).ready(function() {
            
            tinymce.init({
                selector: ".myContents",
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
</x-app-layout>