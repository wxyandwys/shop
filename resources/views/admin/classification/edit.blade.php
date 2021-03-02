@extends('admin.moban')
@section('cc')
    @if($errors->any())
        @foreach($errors->all() as $error)
            <p class="alert alert-danger">{{$error}}</p>
        @endforeach
    @endif
    <form action="{{route('ClassificationUpdate')}}" method="post">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <input type="hidden" name="classification_id" value="{{$data->classification_id}}">
        <div class="form-group">
            <label for="">分类：</label>
            <input type="text" name="classification_name" class="form-control" id="" value="{{$data->classification_name}}">
        </div>
        <div class="form-group">
            <label for="">类型：</label>
            <select name="category_id" id="" class="form-control">
                @foreach($categorys as $category)
                    @if($category->category_id==$data->category_id)
                        <option value="{{$category->category_id}}" selected>{{$category->category_name}}</option>
                    @else
                        <option value="{{$category->category_id}}">{{$category->category_name}}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <input type="submit" value="分类" class="btn-warning form-control">
    </form>


@endsection