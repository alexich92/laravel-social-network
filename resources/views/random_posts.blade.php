<div class="col-md-4" style="padding-top: 20px">

    @foreach($random_posts as $random_post)
        <div class="row" style="padding-bottom: 10px">
            <div class="pull-right"><a  href="{{route('post.single',['slug'=>$random_post->slug])}}"  target="_blank"><img class="img-responsive size" style="height: 127px;" width="250px" src="/images/posts/preview/{{$random_post->imagePreview}}"></a></div>
            <div class="" style="margin-left: 36%">
                <a href="{{route('post.single',['slug'=>$random_post->slug])}}"  target="_blank" style="text-decoration: none; color: black"><p style=""><b>{{$random_post->title}}</b></p></a>
            </div>
        </div>
    @endforeach
</div>