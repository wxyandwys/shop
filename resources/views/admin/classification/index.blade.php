@extends('admin.moban')
@section('cc')
<table class="table text-center">
    <tr>
        <td>id</td>
        <td>classification_name</td>
        <td>category_name</td>
        <td>操作</td>
    </tr>
    @foreach($data as $key=>$category)
        @foreach($category->classification as $classification)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$classification->classification_name}}</td>
                <td>{{$category->category_name}}</td>
                <td>
                    <button class="btn btn-warning"><a href="{{route('ClassificationEdit',$classification->classification_id)}}">修改</a></button>
                    <button class="btn btn-danger"><a href="{{route('ClassificationDelete',$classification->classification_id)}}">删除</a></button>
                </td>
            </tr>

        @endforeach
    @endforeach
</table>

@endsection