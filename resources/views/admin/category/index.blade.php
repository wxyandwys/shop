@extends('admin.moban')

@section('cc')
    <table class="table text-center">
        <tr>
            <td>id</td>
            <td>category</td>
            <td>操作</td>
        </tr>
        @foreach($data as $key=>$category)
        <tr>
            <td>{{$key+1}}</td>
            <td>{{$category->category_name}}</td>
            <td>
                <button class="btn btn-warning"><a href="{{route('CategoryEdit',$category->category_id)}}">修改</a></button>
                <button class="btn btn-danger"><a href="{{route('CategoryDelete',$category->category_id)}}">删除</a></button>
            </td>
        </tr>

        @endforeach
    </table>
    
@endsection