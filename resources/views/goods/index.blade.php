<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<center>
    <h2>商品展示</h2>
    <table>
        <tr>
            <td>id</td>
            <td>名称</td>
            <td>简介</td>
            <td>库存</td>
            <td>价格</td>
            <td>操作</td>
        </tr>
        @foreach($data as $k=>$v)
        <tr goods_id="{{$v->goods_id}}">
            <td>{{$v->goods_id}}</td>
            <td>{{$v->goods_name}}</td>
            <td>{{$v->goods_content}}</td>
            <td  ziduan="goods_num">
               <span class="span_num">{{$v->goods_num}}</span>
                <input type="text" class="changeValue" value="{{$v->goods_num}}" style="display:none;">
            </td>
            <td>{{$v->goods_price}}</td>
            <td>
                <a goods_id="{{$v->goods_id}}" class="btn btn-danger">删除</a>
                <a href="{{url('/goods/upd/'.$v->goods_id)}}">修改</a>
            </td>
        </tr>
            @endforeach
    </table>
    <td>{!! $str !!}</td>
</center>
</body>
<script src="/jquery.js"></script>
<script>
    $(".span_num").click(function(){
        var _this=$(this);
        _this.hide();
        //给文本框显示
        _this.next('input').show();
    })
    //给input标签绑定失去焦点事件
    $(".changeValue").blur(function(){
        //获取到你点击的这个对象
        var _this=$(this);
        var _value = _this.val();
        //获取tr里面的id
        var goods_id = _this.parents('tr').attr("goods_id");
        //获取td里面的字段 
        var goods_num = _this.parent().attr("ziduan");
        //ajax传值
        $.ajax({
            type:'post',
            url:'/goods/updatenum',
            data:{_value:_value,goods_id:goods_id,goods_num:goods_num},
            success:function(res){
                if(res=='ok'){
                    _this.parent().text(_value).show()
                    _this.hide();
                }
            }
        })
    })

    //ajax 逻辑删除
    $(".btn-danger").click(function(){
        var goods_id = $(this).attr("goods_id");
        if(confirm("是否确认删除？")){
            $.get('/goods/delete/'+goods_id,function(res){
                if(res=='ok'){
                    alert("删除成功");
                }
            })
        }
    })
    //  //ajax删除
    // $(document).on("click",".btn-danger",function(){
    //     var id=$(this).attr("id");
    //     if(confirm("是否确认删除？")){
    //         $.get("/link/destroy/"+id,function(result){
    //             if(result.code=='00000'){
    //                location.reload();
    //             }
    //         },'json');
    //     }
    // });
</script>
</html>