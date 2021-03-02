@extends('admin.moban')
@section('cc')
    @if($errors->any())
        @foreach($errors->all() as $error)
            <p class="alert alert-danger">{{$error}}</p>
        @endforeach
    @endif
    @if(Session::has('msg'))
        <h1>{{Session::get('msg')}}</h1>
    @endif
    <form action="{{route('ShopUpdate')}}" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <input type="hidden" name="shop_id" value="{{$data->shop_id}}">
        <div class="form-group">
            <label for="">商品名称：</label>
            <input type="text" name="shop_name" id="" class="form-control" value="{{$data->shop_name}}">
        </div>
        <div class="form-group">
            <label for="">图片：</label>
            <input type="file" name="image" id="file" accept="image/*" catture="camcorder">
        </div>
        <div id="imageFile" style="width:200px;height:200px;margin:auto;">
            <img src="/image/{{$data->image}}" class="img-fluid" id="v_photo" alt="">
        </div>
        <div class="form-group">
            <label for="">价格：</label>
            <input type="text" name="price" id="" class="form-control" value="{{$data->price}}">
        </div>
        <div class="form-group">
            <label for="">数量：</label>
            <input type="number" name="num" id="" class="form-control" value="{{$data->num}}">
        </div>
        <div class="form-group">
            <label for="">介绍：</label>
            <textarea name="text" id="" class="form-control">{{$data->text}}</textarea>
        </div>
        <div class="form-group">
            <label for="">上架：</label>
            <select name="display" id="" class="form-control">
                @if($data->display==0)
                <option value="0" selected>上架</option>
                <option value="1">下架</option>
                @else
                <option value="0">上架</option>
                <option value="1" selected>下架</option>
                @endif
            </select>
        </div>
        <div class="form-group">
            <label for="">热门：</label>
            <select name="top" id="" class="form-control">
                @if($data->top==0)
                <option value="0" selected>热门</option>
                <option value="1">非热门</option>
                @else
                <option value="0">热门</option>
                <option value="1" selected>非热门</option>
                @endif
            </select>
        </div>
        <div class="form-group">
            <label for="">分类：</label>
            <select name="classification_id" id="" class="form-control">
                @foreach($categorys as $category)
                    <option disabled>{{$category->category_name}}</option>
                    @foreach($category->classification as $classification)
                        @if($data->classification_id==$classification->classification_id)
                        <option value="{{$classification->classification_id}}" selected>----{{$classification->classification_name}}</option>
                        @else
                        <option value="{{$classification->classification_id}}">----{{$classification->classification_name}}</option>
                        @endif
                    @endforeach
                @endforeach
            </select>
        </div>
        <input type="submit" value="修改商品" class="btn-warning form-control">
    </form>
    <script>
        document.getElementById('file').onchange=function(){
            var fileTag=document.getElementById('file')
            var file=fileTag.files[0]
            var fileReader=new FileReader()
            fileReader.onloadend=function(){
                if(fileReader.readyState==fileReader.DONE){
                    document.getElementById('v_photo').setAttribute('src',fileReader.result)
                }
            }
            fileReader.readAsDataURL(file)
        }
    </script>
@endsection