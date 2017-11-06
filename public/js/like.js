
$('.like').on('click', function (event) {
    event.preventDefault();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var postId = event.target.parentNode.dataset['postid'];
    var isLike = event.target.previousElementSibling == null;

    $.ajax({
        method: 'POST',
        url: '/like',
        data: { isLike: isLike, postId: postId }
    }).done(function () {
        event.target.innerText = isLike ? event.target.innerText == 'Like' ? 'You like this post' : 'Like' : event.target.innerText == 'Dislike' ? 'You don\'t like this post' : 'Dislike';
        if (isLike) {
            event.target.nextElementSibling.innerText = 'Dislike';
            if(event.target.innerText =='Like'){
                $(event.target).removeClass('btn btn-primary').addClass('btn btn-default');
                $(event.target.nextElementSibling).removeClass('btn btn-primary').addClass('btn btn-default');
            }else{
                $(event.target).removeClass('btn btn-default').addClass('btn btn-primary');
                $(event.target.nextElementSibling).removeClass('btn btn-primary').addClass('btn btn-default');
            }

        } else {
            event.target.previousElementSibling.innerText = 'Like';
            if(event.target.innerText =='Dislike'){
                $(event.target).removeClass('btn btn-primary').addClass('btn btn-default');
                $(event.target.previousElementSibling).removeClass('btn btn-primary').addClass('btn btn-default');
            }else{
                $(event.target).removeClass('btn btn-default').addClass('btn btn-primary');
                $(event.target.previousElementSibling).removeClass('btn btn-primary').addClass('btn btn-default');
            }

        }

        $.ajax({
            type:'post',
            url:"/getpoints",
            data:{postId: postId},
            success:function(data){
                if(data == 1){
                    $(".points").text(data + ' point')
                }else{
                    $(".points").text(data + ' points')
                }

            }

        });




    });
});
