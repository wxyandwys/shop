<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/blog1/public/css/bootstrap.css">
    <title>Document</title>
</head>
<body>
    <div class="row">
        <div class="col-3">
            <ul class="list-group">
                <li class="list-group-item">
                    <p><a href="{{route('show')}}">公告</a> </p>
                    <p><a href="{{route('text')}}">公告修改</a></p>
                </li>
                <li class="list-group-item list-group-item-dark">
                    类别管理
                </li>
                <li class="list-group-item">
                    <p><a href="{{route('CategoryAdd')}}">添加类别</a> </p>
                    <p><a href="{{route('CategoryIndex')}}">查看类别</a> </p>
                </li>
                <li class="list-group-item list-group-item-dark">
                    分类管理
                </li>
                <li class="list-group-item">
                    <p><a href="{{route('ClassificationAdd')}}">添加分类</a> </p>
                    <p><a href="{{route('ClassificationIndex')}}">查看分类</a> </p>
                </li>
                <li class="list-group-item list-group-item-dark">
                    商品管理
                </li>
                <li class="list-group-item">
                    <p><a href="{{route('ShopAdd')}}">添加商品</a> </p>
                    <p><a href="{{route('ShopIndex')}}">查看商品</a> </p>
                </li>
                
            </ul>
        </div>
        <div class="col-9">
            @yield('cc')
        </div>
    </div>
</body>
</html>