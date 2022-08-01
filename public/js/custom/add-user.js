$(document).ready(function() {
    $('#addUser input[type="text"]').blur(function(){
        if(!$(this).val()){
            $(this).addClass("err");
        } else{
            $(this).removeClass("err");
        }
    });
    
    $('#modalCloseUser').click(function() {
        $('#fullname').text('');
        $('#email').text('');
        $('#phone').text('');
        $('#pin').text('');
        $('#position').text('');
        $('#positionStatusError').text('');
        $('#bio').text('');
        $('#image').text('');
        $('#leadershipYear').text('');
        $('#addSuccess').text('');
        $('#addError').text('');
        $('.addSuccess').hide();
        $('.addError').hide();

        $('#adduserModel').modal('hide')

        window.location.reload();
    })

    
    $('#user_position').change(function() {
        if($('#user_position').val().length != 0) {
            $.ajax({
                type: "GET",
                url: "/myPosition",
                data: {'id': $('#user_position').val()},
                success:function(data) {
                    console.log(data);
                    if(data.includes('representative')) {
                        $.ajax({
                            type: 'GET',
                            url: 'getColleges',
                            success:function(data){
                                console.log(data);
                                $('#CollegeId').empty();
                                $.each(data, function(index, collegeObj){
                                    $('#CollegeId').append("<option value='"+collegeObj.id+"'>"+collegeObj.name+'</option>')
                                });

                                $(function() {
                                    $(".chzn-select").chosen({no_results_text: "Oops, nothing found!", width: '100%'});
                                });
                            }
                        });
                        $('#college').show();
                    }
                    else {
                        $('#college').hide();
                    }
                },
                error:function(error) {
                    console.log(error)
                }
            })
        }
        else {
            $('#college').hide();
        }
    })

    $('#addUser').submit(function(e) {
        $('#fullname').text('');
        $('#email').text('');
        $('#phone').text('');
        $('#pin').text('');
        $('#position').text('');
        $('#positionStatusError').text('');
        $('#bio').text('');
        $('#image').text('');
        $('#leadershipYear').text('');
        $('#addSuccess').text('');
        $('#addError').text('');
        $('.addSuccess').hide();
        $('.addError').hide();
        e.preventDefault();


        var fail = false;
        var fail_log = '';
        var name;
        
        var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        var email = document.getElementById('emailAddress');
        if (!filter.test(email.value)) {
            fail = true;
            $('#email').text('Email format is invalid');
        }

        var phoneFilter = /^(255)[0-9]{9}$/
        var phone = document.getElementById('phoneNumber');
        if (!phoneFilter.test(phone.value)) {
            fail = true;
            $('#phone').text('Phone format is invalid');
        }

     
        var exten = $("#picture").val().split('.').pop().toLowerCase();
        if (jQuery.inArray(exten, ['jpg', 'jpeg', 'png']) == -1) {
            fail = true;
            $('#addError').text('Image format error');
            $('#image').text('required formats are jpg, jpeg and png');
        }

        // if(!$('#CollegeId').val()) {
        //     fail = true;
        //     $('#collegeError').text('this field is required');
        // }
        $('#addUser').find(':input').each(function(){
            if(! $(this).prop('required')) {

            }else {
                if(! $(this).val()){
                    fail = true;
                    name = $(this).attr('name');
                    fail_log += '<p>' + name + ' is required!</p>';
                    if(name == 'full_name') {
                        $('#fullname').text('Full name is required');
                    }
                    if(name == 'phone') {
                        $('#phone').text('Phone is required');
                    }
                    if(name == 'email') {
                        $('#email').text('Email is required');
                    }
                    if(name == 'position') {
                        $('#position').text('Staff position is required');
                    }
                    if(name == 'leadership_year') {
                        $('#leadershipYear').text('This field is required');
                    }
                    if(name == 'bio') {
                        $('#bio').text('Staff bio is required');
                    }
                }
            }
        });



        // Submit iffail is false

        if(!fail) {
            var formData = new FormData(this);
            
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
            var image = $('#picture').val();
            console.log(image)

            $.ajax({
                type: 'POST',
                url: 'register-user',
                data: formData,
                processData: false,
                contentType: false,

                success:function(data) {
                    $('#addSuccess').text(data.message);
                    $('#addError').text(data.error);
                    // this.reset();
                    if(!$('#addSuccess').text().length == 0) {
                        $('#addUser')[0].reset();
                        $('.addError').hide();
                        $('.addSuccess').show();

                        
                    $('#cls').click(function(){
                        $('.addSuccess').hide();
                        $('#addSuccess').text('');
                    });
                    }
                    if(!$('#addError').text().length == 0 ) {
                        $('.addSuccess').hide();
                        $('.addError').show();

                        
                    $('#closeErr').click(function(){
                        $('.addError').hide();
                        $('#addError').text('');
                    });
                    }

                },

                error:function(addError){
                    console.log(addError);
                    $('#addError').text(addError.statusText + ', contact the administrator for help');
                    $('.addError').show();
                    $('.addSuccess').hide();

                    $('#closeErr').click(function(){
                        $('.addError').hide();
                        $('#addError').text('');
                    });
                }
            })
        }
        
    })
});