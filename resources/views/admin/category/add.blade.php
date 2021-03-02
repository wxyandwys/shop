@extends('admin.moban')
@section('cc')
    @if($errors->any())
        @foreach($errors->all() as $error)
        <p class="alert alert-danger">{{$error}}</p>
        @endforeach
    @endif
    <form action="{{route('CategoryInsert')}}" method="post">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="form-group">
            <label for="">类别：</label>
            <input type="text" name="category_name" class="form-control" id="" value="{{old('category_name')}}">
        </div>
        <input type="submit" value="添加类别" class="btn-primary form-control">
    </form>

@endsection