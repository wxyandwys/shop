@extends('admin.moban')

@section('cc')
    @if($errors->any())
        @foreach($errors->all() as $error)
            <p class="alert alert-danger">{{$error}}</p>
        @endforeach
    @endif
    <form action="{{route('CategoryUpdate')}}" method="post">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <input type="hidden" name="category_id" value="{{$data->category_id}}">
        <div class="form-group">
            <label for="">类别：</label>
            <input type="text" name="category_name" class="form-control" value="{{$data->category_name}}" id="">
        </div>
        <input type="submit" value="修改" class="btn-warning form-control">
    </form>

@endsection