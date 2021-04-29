jQuery(document).ready(function($){

  $('#submit_button').click(function() {
            var name = $('#username').val();
            var email = $('#email').val();
            var phone = $('#phone').val();
            var subject = $('#subject').val();
            var message = $('#message').val();
            $hasError = false;

             if ( !name.trim() ) {
                alert ('Please enter your name.');
                $hasError = true;
            }
            if ( !email.trim() ) {
                    alert ('Please enter email.');
                    $hasError = true;
                }
            if ( !phone.trim() ) {
                    phone ('Please enter contact number');
                    $hasError = true;
                }
            if ( !subject.trim()) {
                    alert ('Subject field cannot be empty ');
                    $hasError = true;
                }
                if ( !message.trim()) {
                    alert ('Message field cannot be empty ');
                    $hasError = true;
                }
            if ($hasError == true) {
                alert( "Error on registration");
            }

            else{
                var formdata = $('#contactform').serialize();
                $.ajax({
                   url: site_url+'/wp-admin/admin-ajax.php?action=send_email',
                   type: 'POST',
                   data: formdata,
                   success: function(response){
                    alert('success');
                    console.log(response);
                    $('.success_message').html('<h3 style="color:green;">'+response.message+'</h3>');
                   }
               })
            }
            });
            });
