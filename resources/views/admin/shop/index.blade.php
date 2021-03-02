@extends('admin.moban')
@section('cc')
    <table class="table text-center">
        <tr>
            <td>id</td>
            <td>商品名称</td>
            <td>图片</td>
            <td>价格</td>
            <td>数量</td>
            <td>介绍</td>
            <td>上架</td>
            <td>热门</td>
            <td>分类</td>
            <td>添加时间</td>
            <td>销售数量</td>
            <td>操作</td>
        </tr>
        @foreach($data as $key=>$classification)
            @foreach($classification->shop as $shop)
                <tr>
                    <td width="30">{{$key+1}}</td>
                    <td width="150">{{$shop->shop_name}}</td>
                    <td width="100">
                        <img src="/image/{{$shop->image}}" alt="" style="width:100%;">
                    </td>
                    <td width="50">{{$shop->price}}</td>
                    <td width="50">{{$shop->num}}</td>
                    <td width="100" style="font-size:10px">{{$shop->text}}</td>
                    <td>
                        @if($shop->display==0)
                        上架
                        @else
                        下架
                        @endif
                    </td>
                    <td>
                        @if($shop->top==0)
                        热门
                        @else
                        非热门
                        @endif
                    </td>
                    <td>{{$classification->classification_name}}</td>
                    <td width="50">{{$shop->time}}</td>
                    <td>{{$shop->sale}}</td>
                    <td>
                        <button class="btn-sm btn-warning"><a href="{{route('ShopEdit',$shop->shop_id)}}">修改</a></button>
                        <button class="btn-sm btn-danger"><a href="{{route('ShopDelete',$shop->shop_id)}}">修改</a></button>
                    </td>
                </tr>
            @endforeach
        @endforeach
    </table>

@endsection