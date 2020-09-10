<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>商品</title>
</head>
<body>
    <center>
    <h2>商品添加</h2>
        <form>
            <table>
                <tr>
                    <td>商品名称</td>
                    <td><input type="text" name="shop_name" id="name"></td>
                </tr>
                <tr>
                    <td>商品描述</td>
                    <td><textarea name="shop_desc" id="desc"  cols="30" rows="10"></textarea></td>
                </tr>
                <tr>
                    <td>商品库存</td>
                    <td><input type="num" name="shop_num" id="num"></td>
                </tr>
                <tr>
                    <td>商品价格</td>
                    <td><input type="num" name="shop_price" id="price"></td>
                </tr>
                <tr>
                    <td><input type="button" id="submit" value="添加"></td>
                    <td></td>
                </tr>
            </table>
        </form>
    </center>
</body>
</html>
<script src="/static/jquery.js"></script>
<script>
    $(document).on('click','#submit',function(){
        //获取名称
        var shop_name=$('#name').val();
        //获取描述
        var shop_desc=$('#desc').val();
        //获取名称
        var shop_num=$('#num').val();
        //获取名称
        var shop_price=$('#price').val();
        //将数据传入后台
        $.ajax({
            url:'/shop/add',
            data:{shop_name:shop_name,shop_desc:shop_desc,shop_num:shop_num,shop_price:shop_price},
            type:'post',
            success:function(res){
                alert(res.msg);
                if(res.code==0){
                    
                }
            }
        });
    })
</script>