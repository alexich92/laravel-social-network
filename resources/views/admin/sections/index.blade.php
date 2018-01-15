@extends('layouts.master_admin')

@section('content')

    <div class="col-sm-5">
        <div class="well">
                <h1 style="margin-top: -15px">Create a new section</h1>
            <form  class="form-horizontal" action="{{route('sections.store')}}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <div class="col-md-12">
                        <input placeholder="Section name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                    <div class="col-md-12">
                        <input placeholder="Section description" type="text" class="form-control" name="description" value="{{ old('description') }}" required autofocus>
                        @if ($errors->has('description'))
                            <span class="help-block">
                                <strong>{{ $errors->first('description') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                    <div class="col-md-12">
                    <input  type="file"  name="image" value="{{ old('image') }}" required autofocus>
                    @if ($errors->has('image'))
                        <span class="help-block">
                                <strong>{{ $errors->first('image') }}</strong>
                            </span>
                    @endif
                    </div>
                </div>


                <div class="form-group">
                    <button class="btn btn-primary pull-right" style="margin-right: 20px">Create Section</button>
                </div>
            </form>

        </div>
    </div>


    <div class="col-sm-6">


        <table class="table table-hover">
            <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Image</th>
            </tr>
            </thead>
            <tbody>
            @if($sections)
                @foreach($sections as $section)
                    <tr>
                        <td>{{$section->id}}</td>
                        <td>{{$section->name}}</td>
                        <td><img width="50px" src='/images/sections/{{$section->image}}' alt=""></td>
                        <td>
                            <form action="{{route('sections.destroy',['id'=>$section->id])}}" method="post">
                                {{csrf_field()}}
                                {{method_field('DELETE')}}
                                <button class="btn btn-xs btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>

@endsection