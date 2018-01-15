$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    //select the report and assign the id of the report
    var reportId;
    $('.picker li a').click(function() {
        $('.picker > li > a > .badge-report-selector').removeClass('selected');
        $(this).parent().children().children().addClass('selected');
        $('#next').prop("disabled", false);
        reportId = $(this).attr("data-report-id");
    });

    //make an ajax call to get the proper report details
    $('#next').click(function(){
        $('#close').addClass('hidden');
        $('#next').addClass('hidden');
        $('#prev').removeClass('hidden');
        $('#report').removeClass('hidden');
        $('.picker').addClass('hidden');

        $.ajax({
            type:'post',
            url:"/report",
            dataType: "json",
            data:{reportId: reportId}
        }).done(function(data){
            $('.try').removeClass('hidden');
            $('.question').html(data[0].question);
            $('#affirmation').html(data[0].affirmation);
            $('.actions').html(data[0].actions);
            $('.footer').text('If you report someone\'s post, 9GAG doesn\'t tell them who reported it.')
        });

    });

    //go back to the reports section
    $('#prev').click(function(){
        $("#reportsModal").modal("show");
        $('.picker').removeClass('hidden');
        $('.try').addClass('hidden');

    });

    //when modal appears hide/show proper buttons
    $("#reportsModal").on("show.bs.modal", function(){
        $('#close').removeClass('hidden');
        $('#next').removeClass('hidden');
        $('#prev').addClass('hidden');
        $('#report').addClass('hidden');
    });

    // Remove any selected report when modal is close or dismissed
    $("#reportsModal").on("hidden.bs.modal", function(){
        $('.picker > li > a > .badge-report-selector').removeClass('selected');
        $('#next').prop('disabled',true);
        $('.picker').removeClass('hidden');
        $('.try').addClass('hidden');
    });

    // submit the reports modal and show a notification
    $("#report").click(function(){
        var postId = $('#post_id').data().postid;
        $.post({
            type:'post',
            url:"/post/reports",
            data:{reportId: reportId,postId :postId},
            success:function(){
                $('#reportsModal').modal('hide');
                new Noty({
                    type:'success',
                    layout:'bottomRight',
                    timeout:3000,
                    text:'Report sent!'
                }).show();
            }
        });
    });
});
