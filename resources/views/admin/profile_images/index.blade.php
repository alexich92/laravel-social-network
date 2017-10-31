@extends('layouts.master_admin')
@section('content')

    <div class="box-body">
        @if(count($photos)>0)
            <table id="example1" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Profile Image</th>
                    <th>Uploaded</th>
                    <th>Delete</th>

                </tr>
                </thead>
                <tbody>
                @foreach($photos as $photo)
                    <tr>
                        <td>{{$photo->id}}</td>
                        <td><img src="/images/profile_images/{{$photo->image}}"   height="50" width="70"></td>
                        <td>{{$photo->created_at->diffForHumans()}}</td>
                        <td>
                            {!! Form::open(['method'=>'DELETE','route'=>['images.destroy', $photo->id],'class'=>'delete_form']) !!}
                                <button class="btn btn-danger btn-xs">Delete</button>
                            {{ Form::close() }}

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
    </div>
    <!-- /.box-body -->
    @else
        <h2 class="text-center">There are no profile images!</h2>
        @endif
        </div>
        <!-- /.box -->

@endsection