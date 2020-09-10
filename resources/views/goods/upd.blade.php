<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <meta name="_token" content="{{ csrf_token() }}"/>
</head>
<body>
<form method="post" action="{{url('/goods/update/'.$data->goods_id)}}">
    <table>
        <tr>
            <td>商品名称</td>
            <td><input type="text" name="goods_name" value="{{$data->goods_name}}" id="goods_name"></td>
        </tr>
        <tr>
            <td>商品价格</td>
            <td><input type="text" name="goods_price" value="{{$data->goods_price}}" id="goods_price"></td>
        </tr>
        <tr>
            <td>商品描述</td>
            <td>
                <input type="text" name="goods_content" value="{{$data->goods_content}}" id="goods_content">
            </td>
        </tr>
        <tr>
            <td>商品库存</td>
            <td><input type="text" name="goods_num" value="{{$data->goods_num}}" id="goods_num"></td>
        </tr>
        <tr>
            <td><input type="submit" value="提交"></td>
            <td></td>
        </tr>
    </table>
</form>

</form>
</body>
<script src="/jquery.js"></script>
<script>
    // $('.button').click(function(){
    //      var goods_name = $("#goods_name").val();
    //     var goods_price = $("#goods_price").val();
    //     var goods_content = $("#goods_content").val();
    //     var goods_num = $("#goods_num").val();
    //     var goods_id = {{$data->goods_id}};
       
    //      $.ajaxSetup({
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         }
    //     });
    //       $.ajax({
    //         type:'POST',
    //         url:'/goods/update/'+goods_id,
    //         // dataType:'json',
    //         data:{goods_name:goods_name,goods_price:goods_price,goods_content:goods_content,goods_num:goods_num},
    //         success:function(res){
    //            alert(res)

    //         }
    //     })
    // })
</script>
</html>