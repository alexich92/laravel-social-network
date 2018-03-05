{{--<style>--}}
{{--.space{--}}
    {{--border: 1px solid lightgray;--}}
    {{--height: 276px;--}}
    {{--background:  url("{{asset('storage/upload2.png')}}") 50% no-repeat;--}}

{{--}--}}

{{--.space2{--}}
    {{--border: 1px solid lightgray;--}}
    {{--height: 80px;--}}

{{--}--}}

{{--#upload{--}}
    {{--display:none--}}
{{--}--}}

    {{--#txt{--}}
        {{--margin: 20px 0px 0px 20px;--}}
        {{--width: 427px;--}}
        {{--height: 55px;--}}
        {{--resize: none;--}}
    {{--}--}}

{{--ul.picker2{--}}
    {{--list-style-type:none;--}}
    {{--border:1px solid #ccc;--}}
    {{--overflow-y:scroll;--}}
    {{--max-height: 416px;--}}
    {{--border-radius: 2px;--}}

{{--}--}}
{{--ul.picker2 li{--}}
    {{--margin-left: -30px;--}}
{{--}--}}
{{--/*li a{*/--}}
    {{--/*text-decoration: none;*/--}}
    {{--/*color: #000;*/--}}
    {{--/*height: 28px;*/--}}
{{--/*}*/--}}

{{--ul.picker2 li:hover{--}}
    {{--background-color: lightgrey;--}}
{{--}--}}
{{--ul.picker2 li a, a:hover, a:visited{--}}
    {{--text-decoration: none;--}}
    {{--color: #000;--}}
{{--}--}}

{{--ul.picker2 .icon{--}}
    {{--width: 50px;--}}
    {{--height: 50px;--}}

    {{--border-radius: 2px;--}}
    {{--overflow: hidden;--}}
    {{--position: absolute;--}}
{{--}--}}

{{--.badge-section-selector{--}}
    {{--width: 24px;--}}
    {{--height: 24px;--}}
    {{--border-radius: 12px;--}}
    {{--background-color: #eee;--}}
    {{--top: 50%;--}}
    {{--margin-right: 20px;--}}
    {{--margin-top: 10px;--}}
{{--}--}}
{{--.selected{--}}
    {{--background-size: 100%;--}}
    {{--background-image:  url("{{asset('storage/ok2.png')}}");--}}
{{--}--}}

  {{--#title{--}}
      {{--resize: none;--}}
      {{--height: 79px;--}}
      {{--padding-right: 78px;--}}
      {{--margin-left: -25px;--}}
  {{--}--}}
{{--</style>--}}

<div class="modal" tabindex="-1" id="uploadModal" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <a class="btn-close pull-right" href="javascript:void(0);" data-dismiss="modal"
                   style="text-decoration: none;width: 24px;">✖</a>

                <form id="uploadM" class="form-horizontal" method="POST" action="{{ route('user.register') }}" enctype="multipart/form-data">
                    <section id="upload-image">
                    <div class="header">
                        <h1>Upload</h1>
                        <p>Upload your post</p>
                    </div>

                        <div class="space">
                            <input id="upload" name="image" accept="image/*" type="file" onchange="document.getElementById('uploadedImage').src = window.URL.createObjectURL(this.files[0])"/>
                            <a href="#" id="upload-file">
                                <span style="margin-left: 39%;margin-top: 37%;" class="btn btn-primary center">Choose files...</span>
                            </a>
                        </div>
                    </section>


                    <section id="title-step" class="hidden">
                        <div class="header">
                            <h1>Give your post a title</h1>
                            <p>An accurate, descriptive title can help people discover your post.</p>
                        </div>
                        
                        <div class="print-error-msg" style="display:none">
                            <div class="alert alert-danger">
                                <ul style="list-style-type: none; color: red;margin-left:-15px">></ul>
                            </div>

                        </div>

                        <div class="space2">
                            <div class="col-md-3" style=" height: 103px;">
                                <img id="uploadedImage" style="margin-top: 10px; padding-bottom: 10px" alt="image" width="70" height="70" />
                            </div>
                            <textarea style="" name="title" id="title" cols="50"  placeholder="Describe your post" rows="2"></textarea>
                        </div>


                        <div class="modal-footer">
                            <button type="button" id='back'  class="btn btn-default">Back</button>
                            <button type="button" id="next-to-sections"  class="btn btn-primary" disabled>Next</button>
                        </div>

                        
                        

                    </section>


                    <section id="section-step" class="hidden">
                        <div class="header">
                            <h1>Pick a section</h1>
                            <p>Submitting to the right section to make sure your post gets the right exposure it deserves!</p>
                        </div>

                        <div class="spacer" style="padding: 0 32px">
                            <ul class="picker2">
                                @foreach($sections->take(-5) as $section)
                                    <li class="">
                                        <a href="javascript:void(0);" class="" data-section-id="{{$section->id}}">
                                            <div class="badge-section-selector pull-right"></div>
                                            <div class="content">
                                                <div class="icon">
                                                    <img style="height:40px" width="40px" src='/images/sections/{{$section->image}}' alt="">
                                                </div>
                                                <div class="text" style="margin-left: 60px">
                                                    <h4><strong>{{$section->name}}</strong></h4>
                                                    <p style="margin-top: -7px">{{$section->description}}</p>
                                                </div>
                                            </div>

                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="modal-footer">
                            <button type="button" id='back_to_title'  class="btn btn-default">Back</button>
                            <button type="button" id="submit-form" class="btn btn-primary disabled" >Next</button>
                        </div>


                    </section>





                </form>


            </div>
        </div>
    </div>
</div>