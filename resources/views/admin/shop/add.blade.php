@extends('admin.moban')
@section('cc')
    @if($errors->any())
        @foreach($errors->all() as $error)
            <p class="alert alert-danger">{{$error}}</p>
        @endforeach
    @endif
    @if(Session::has('err'))
    <p class="alert alert-danger">{{Session::get('err')}}</p>
    @endif
    <form action="{{route('ShopInsert')}}" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="csrf_token()">
        <div class="form-group">
            <label for="">商品产品：</label>
            <input type="text" name="shop_name" id="" class="form-control" value="{{old('shop_name')}}">
        </div>
        <div class="form-group">
            <label for="">图片:</label>
            <input type="file" name="image" id="file" accept="image/*" catture="camcorder">
        </div>
        <div id="imageFile" style="width:200px;height:200px;margin:auto;display:none">
            <img src="" class="img-fluid" id="v_photo" alt="">
        </div>
        <div class="form-group">
            <label for="">价格：</label>
            <input type="text" name="price" class="form-control" id="" value="{{old('price')}}">
        </div>
        <div class="form-group">
            <label for="">数量：</label>
            <input type="number" name="num" class="form-control" id="" value="{{old('num')}}">
        </div>
        <div class="form-group">
            <label for="">介绍：</label>
            <textarea name="text" id="" class="form-control">{{old('text')}}</textarea>
        </div>
        <div class="form-group">
            <label for="">上架：</label>
            <select name="display" id="" class="form-control">
                <option value="0">上架</option>
                <option value="1">下架</option>
            </select>
        </div>
        <div class="form-group">
            <label for="">热门：</label>
            <select name="top" id="" class="form-control">
                <option value="0">热门</option>
                <option value="1">非热门</option>
            </select>
        </div>
        <div class="form-group">
            <label for="">分类：</label>
            <select name="classification_id" id="" class="form-control">
                
                @foreach($data as $category)
                    <option disabled>{{$category->category_name}}</option>
                    @foreach($category->classification as $classification)
                    <option value="{{$classification->classification_id}}">----{{$classification->classification_name}}</option>
                    @endforeach
                @endforeach
            </select>
        </div>
        <input type="submit" value="添加商品" class="form-control btn-primary">
    </form>

    <script>
        document.getElementById('file').onchange=function(){
            var fileTag=document.getElementById('file');
            var file=fileTag.files[0]
            var fileReader=new FileReader()
         //   console.log(fileReader)
            fileReader.onloadend=function(){
                if(fileReader.readyState==fileReader.DONE){
                    document.getElementById('v_photo').setAttribute('src',fileReader.result)
                    document.getElementById('imageFile').style.display="block"
         //           console.log(fileReader)
                }
            }
            fileReader.readAsDataURL(file)
        }
    </script>
@endsection