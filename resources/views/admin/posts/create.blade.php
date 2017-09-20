@extends('layouts.master_admin')

@section('content')
    <div class="panel panel-default " style="margin-top:10px">
        <div class="panel-heading col-md-8 col-lg-offset-2">
            <h3 class="text-center">Create a new post</h3>
        </div>

        <div class="panel-body col-md-8 col-lg-offset-2">
            <form action="{{route('posts.store')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                    <label for="email" class="control-label">Title</label>
                    <input  type="text" class="form-control" name="title" value="{{ old('title') }}" required autofocus>
                    @if ($errors->has('title'))
                        <span class="help-block">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('sections') ? ' has-error' : '' }} ">
                    <label for="sections" class="control-label">Select Section</label>
                    @foreach($sections as $section)
                        <div class="checkbox">
                            <label><input type="checkbox" name="sections[]" value="{{$section->id}}">{{$section->name}}</label>
                        </div>
                    @endforeach
                    @if ($errors->has('sections'))
                        <span class="help-block">
                                <strong>{{ $errors->first('sections') }}</strong>
                            </span>
                    @endif
                </div>


                <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                    <label for="image" class="control-label">Post image</label>
                    <input  type="file" class="form-control" name="image" value="{{ old('image') }}" required autofocus>
                    @if ($errors->has('image'))
                        <span class="help-block">
                                <strong>{{ $errors->first('image') }}</strong>
                            </span>
                    @endif
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success">Store Post</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


@endsection