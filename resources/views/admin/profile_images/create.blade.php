@extends('layouts.master_admin')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.2.0/min/dropzone.min.css">
@endsection

@section('content')

    <h2 class="text-center">Upload Images</h2>


    {!! Form::open(['method'=>'Post','action'=>'ProfileImageController@store','class'=>'dropzone', 'id'=>'addPhotosForm']) !!}
    {!! Form::close() !!}

@endsection

@section('js')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.2.0/min/dropzone.min.js"></script>
    <script>

        Dropzone.options.addPhotosForm ={
            maxFilesize: 3,
            acceptedFiles: '.jpg, .jpeg, .png, .bmp'
        }

    </script>

@stop