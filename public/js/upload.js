$(document).ready(function(){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    //remove the value of title and upload inputs when user click back from title-step section
    $('#back').click(function(){
        $("#uploadModal").modal("show");
        $("#upload").val('');
        $("#title").val('');
        $('#upload-image').removeClass('hidden');
        $('#title-step').addClass('hidden');
    });

    //go back from section-step section to title-step section
    $('#back_to_title').click(function(){
        $("#uploadModal").modal("show");
        $('#upload-image').addClass('hidden');
        $('.print-error-msg').addClass('hidden');
        $('#title-step').removeClass('hidden');
        $('#section-step').addClass('hidden');
    });

    // when the user close the modal clear all the inputs
    $("#uploadModal").on("hidden.bs.modal", function(){
            $("#upload").val('');
            $('#title').val('');
            $('#upload-image').removeClass('hidden');
            $('#title-step').addClass('hidden');
            $('#section-step').addClass('hidden');
            $('.picker2 > li > a > .badge-section-selector').removeClass('selected');
    });


    //validate image after selected
    $("#upload").change(function(){
        $('#upload-image').addClass('hidden');
        $('#title-step').removeClass('hidden');
        var file = this.files[0];
        var form = new FormData();
        form.append('image', file);
        $.ajax({
            method: 'POST',
            url: '/validate_image_post',
            cache: false,
            contentType: false,
            processData: false,
            data : form,
            success:function(data){
                if($.isEmptyObject(data.error)){
                    $('#upload-image').addClass('hidden');
                    $('#title-step').removeClass('hidden');
                    $('.print-error-msg').addClass('hidden');
                    $('#next-to-sections').prop("disabled", false);
                }else{
                    $('#upload-image').addClass('hidden');
                    $('#title-step').removeClass('hidden');
                    $('.print-error-msg').removeClass('hidden');
                    $('#next-to-sections').prop("disabled", true);
                    printErrorMsg(data.error);
                }
            }
        })
    });


    //validate the title of the post
    $('#next-to-sections').click(function(e){
        e.preventDefault();
        var title = $("#title").val();
        $.ajax({
            method: 'POST',
            url: '/validate_title',
            dataType: "json",
            data: {title:title},
            success:function(data){
                if($.isEmptyObject(data.error)){
                    $('#title-step').addClass('hidden');
                    $('#section-step').removeClass('hidden');
                }else{
                    $('.print-error-msg').removeClass('hidden');
                    printErrorMsg(data.error);
                }
            }
        })
    });

    //declare a global variable sectionId in order to use it inside the submit event
        var sectionId;
        //select the section and rewrite the value of sectionId
        $('.picker2 li a').click(function() {
            $('.picker2 > li > a > .badge-section-selector').removeClass('selected');
            $(this).parent().children().children().addClass('selected');
            $('.content').removeClass('selected');
            $('#submit-form').removeClass('disabled');
            sectionId = $(this).attr("data-section-id");
        });

    //submit the upload post form
        $('#submit-form').click(function(e){
            e.preventDefault();
            var title = $("#title").val();
            var image = $("#upload")[0].files[0];
            var form1 = new FormData();
            form1.append('image', image);
            form1.append('title',title);
            form1.append('section',sectionId);
                $.ajax({
                        method: 'POST',
                        url: '/upload/post',
                        cache: false,
                        contentType: false,
                        processData: false,
                        data : form1,
                        success:function(data){
                            if($.isEmptyObject(data.error)){
                                localStorage.setItem("post","notificare");
                                location.reload();
                            }else{
                                $('.print-error-msg').removeClass('hidden');
                                printErrorMsg(data.error);
                            }
                        }
                })
        });


    //show notification after upload o post
    if(localStorage.getItem("post"))
    {
        new Noty({
            type:'success',
            layout:'bottomRight',
            timeout:2000,
            text:'Post uploaded!'
        }).show()
        localStorage.clear();
    }

    //show error messages from validation
    function printErrorMsg (msg) {
        $(".print-error-msg").find("ul").html('');
        $(".print-error-msg").css('display','block');
        $.each( msg, function( key, value ) {
            $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
        });
    };



});