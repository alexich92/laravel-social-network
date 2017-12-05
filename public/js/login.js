$(document).ready(function() {
    $('.login').on('click', function () {
        $('#loginForm').submit(function (e) {
            e.preventDefault();
            var email = $("#email").val();
            var password = $("#password").val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                method: 'POST',
                url: '/user/login',
                dataType: "json",
                data: {email: email, password: password}
            }).done(function (response) {
                $("#email").val('');
                $("#password").val('');
                $('.wth').text(response.error);
            }).fail(function () {
                localStorage.setItem("noty", "notificare");
                location.reload();
            })
        })
    })

    //get it if noty key found
    if(localStorage.getItem("noty"))
    {
        new Noty({
            type:'success',
            layout:'bottomRight',
            timeout:2000,
            text:'Awww yeaa!Welcome back!'
        }).show()
        localStorage.clear();
    }

});

