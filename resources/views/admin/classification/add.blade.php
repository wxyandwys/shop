@extends('admin.moban')
@section('cc')
    @if($errors->any())
        @foreach($errors->all() as $error)
            <p class="alert alert-danger">{{$error}}</p>
        @endforeach
    @endif
    <form action="{{route('ClassificationInsert')}}" method="post">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="form-group">
            <label for="">分类：</label>
            <input type="text" name="classification_name" id="" class="form-control" value="{{old('classification_name')}}">
        </div>
        <div class="form-group">
            <label for="">类别：</label>
            <select name="category_id" id="" class="form-control">
                @foreach($data as $category)
                <option value="{{$category->category_id}}">{{$category->category_name}}</option>
                @endforeach
            </select>
        </div>
        <input type="submit" value="添加分类" class="btn-primary form-control">
    </form>

@endsection