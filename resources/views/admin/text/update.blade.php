@extends('admin.moban')

@section('cc')

    <!-- 加载编辑器的容器 -->
    <script id="container" name="content" type="text/plain" style="width:1024px;height:500px;">
        {!!$data!!}
    </script>
    <button onclick="getContent()" class="btn btn-primary">修改</button>
    <!-- 配置文件 -->
    <script type="text/javascript" src="ueditor/ueditor.config.js"></script>
    <!-- 编辑器源码文件 -->
    <script type="text/javascript" src="ueditor/ueditor.all.js"></script>
    <!-- 实例化编辑器 -->
    <script src="js/jquery-3.4.1.js"></script>
    <script type="text/javascript">
        var ue = UE.getEditor('container');

        function getContent() {
            var arr = [];
            arr.push("使用editor.getContent()方法可以获得编辑器的内容");
            arr.push("内容为：");
            arr.push(UE.getEditor('container').getContent());
        //    alert(arr.join("\n"));

            $.ajax({
                url:'/textdata',
                method:'post',
                data:{
                    text:UE.getEditor('container').getContent()
                },
                success:function(res){
                    console.log(res)
                }
            })
        }
    </script>

@endsection