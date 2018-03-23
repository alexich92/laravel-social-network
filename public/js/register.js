$(document).ready(function(){
    $('.register').on('click' ,function (e) {
        e.preventDefault();
        var _token = $("input[name='_token']").val();
        var name = $("#name").val();
        var email = $(".email").val();
        var password = $("#pass").val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            method: 'POST',
            url: '/signup',
            dataType: "json",
            data: {
                _token:_token,
                name: name,
                email: email,
                password: password,
                g_recaptcha_response: grecaptcha.getResponse()
            },
            success:function(data){
                if($.isEmptyObject(data.error)){
                    localStorage.setItem("not","notificare");
                    location.reload();

                }else{
                    grecaptcha.reset();
                    printErrorMsg(data.error);
                }
            }

        })
    });
    function printErrorMsg (msg) {
        $(".print-error-msg").find("ul").html('');
        $(".print-error-msg").css('display','block');
        $.each( msg, function( key, value ) {
            $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
        });
    };

    //show notification after register
    if(localStorage.getItem("not"))
    {
        new Noty({
            type:'success',
            layout:'bottomRight',
            timeout:2000,
            text:'Welcome to our community!'
        }).show()
        localStorage.clear();
    }

    //reset modal inputs if close or dismissed
    $("#registerModal").on("hidden.bs.modal", function(){
      $("#name").val('');
      $(".email").val('');
      $("#pass").val('');
        $(".print-error-msg").find("ul").html('');
    });

});