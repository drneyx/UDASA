$(document).ready(function() {
    $('#objectiveForm').hide()
    $('#add-objective').click(function() {
        $('#objectiveForm').toggle()
    })


    $('#objective-form :input[type="text"]').blur(function(){
        if(!$(this).val()){
            $(this).addClass("err");
        } else{
            $(this).removeClass("err");
        }
    });

    $('#objective-form').submit(function(e) {
        $('#titleError').text('');
        $('#objerr').text('');
        $('#objSuccess').text('');
        $('#objError').text('');
        $('.addSuccess').hide();
        $('.addError').hide();
        e.preventDefault();


        var fail = false;
        var fail_log = '';
        var name;
        

        $('#objective-form').find(':input').each(function(){
            if(! $(this).prop('required')) {

            }else {
                if(! $(this).val()){
                    fail = true;
                    name = $(this).attr('name');
                    fail_log += '<p>' + name + ' is required!</p>';
                    if(name == 'title') {
                        $('#titleError').text('Objective title is required');
                    }
                    if(name == 'objective') {
                        $('#objerr').text('Objective is required');
                    }
                }
                console.log(fail_log)
            }
        });



        // Submit iffail is false

        if(!fail) {
            
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            

            $.ajax({
                type: 'POST',
                url: 'add-objective',
                data: $('#objective-form').serialize(),
                // processData: false,
                // contentType: false,

                success:function(data) {
                    $('#addSuccess').text(data.message);
                    $('#addError').text(data.error);
                    if(!$('#addSuccess').text().length == 0) {
                        $('#objective-form')[0].reset();
                        $('.addError').hide();
                        $('.addSuccess').show();

                        
                    $('#clsobj').click(function(){
                        $('.addSuccess').hide();
                        $('#addSuccess').text('');
                        window.location.reload();
                    });
                    }
                    if(!$('#addError').text().length == 0 ) {
                        $('.addSuccess').hide();
                        $('.addError').show();

                        
                    $('#closeErrObj').click(function(){
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

                    $('#closeErrObj').click(function(){
                        $('.addError').hide();
                        $('#addError').text('');
                    });
                }
            })
        }
        
    })
});