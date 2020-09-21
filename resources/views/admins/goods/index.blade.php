<!DOCTYPE html>
<html>
<head>
    <!-- 页面meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>商品添加</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" name="viewport">

    <link rel="stylesheet" href="/admin/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/admin/plugins/adminLTE/css/AdminLTE.css">
    <link rel="stylesheet" href="/admin/plugins/adminLTE/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="/admin/css/style.css">


    <!-- 富文本编辑器 -->
    <link rel="stylesheet" href="/admin/plugins/kindeditor/themes/default/default.css" />
    <link rel="stylesheet" href="/js/uploadify/uploadify.css">


</head>

<body class="hold-transition skin-red sidebar-mini" >

<!-- 正文区域 -->
<section class="content">

    <div class="box-body">

        <!--tab页-->
        <div class="nav-tabs-custom">

            <!--tab头-->
            <ul class="nav nav-tabs">
                <li class="active">
                    <a href="#home" data-toggle="tab">商品基本信息</a>
                </li>
            </ul>
            <!--tab头/-->

            <!--tab内容-->
            <div class="tab-content">

                <!--表单内容-->

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif


                {{--<form action="/goods/create" method="post">--}}

                <div class="tab-pane active" id="home">
                    <div class="row data-type">
                        <div class="col-md-2 title">商品分类</div>

                        <div class="col-md-10 data">

                            <select class="form-control" name="cate_id">

                                <option value="0">--顶级分类--</option>
                                @foreach($cate as $v)
                                    <option value="{{$v->cate_id}}">
                                        {{str_repeat('|-',$v->level)}}{{$v->cate_name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>


                        <div class="col-md-2 title">商品名称</div>
                        <div class="col-md-10 data">

                            <input type="text" class="form-control" name="goods_name" id="goods_name" placeholder="商品名称" value="">

                        </div>

                        <div class="col-md-2 title">品牌</div>
                        <div class="col-md-10 data">

                            <select class="form-control" name="brand_id" id="">
                                <option value="">--请选择--</option>
                                @foreach($brand as $v)
                                <option value="{{$v->brand_id}}">{{$v->brand_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-2 title">商品标题</div>
                        <div class="col-md-10 data">
                            <input type="text" class="form-control" name="goods_title"  placeholder="商品标题" value="">

                        </div>

                        <div class="col-md-2 title">价格</div>
                        <div class="col-md-10 data">
                            <div class="input-group">
                                <span class="input-group-addon">¥</span>
                                <input type="text" class="form-control" id="goods_price" name="goods_price" placeholder="价格" value="">

                            </div>
                        </div>

                        <div class="col-md-2 title editer">商品介绍</div>
                        <div class="col-md-10 data editer">
                            <textarea name="goods_desc" style="width:800px;height:400px;" ></textarea>
                        </div>


                        <div class="col-md-2 title rowHeight2x">包装列表</div>
                        <div class="col-md-10 data rowHeight2x">

                            <textarea rows="4" name="goods_packing" class="form-control"   placeholder="包装列表"></textarea>
                        </div>

                        <div class="col-md-2 title rowHeight2x">售后服务</div>
                        <div class="col-md-10 data rowHeight2x">
                            <textarea rows="4"  class="form-control" name="goods_sales" placeholder="售后服务"></textarea>
                        </div>

                        <div class="col-md-2 title">商品号</div>
                        <div class="col-md-10 data">
                            <input type="text" class="form-control" name="goods_sn"  placeholder="商品号" value="">
                        </div>
                        <div class="col-md-2 title">商品数量</div>
                        <div class="col-md-10 data">
                            <input type="text" class="form-control" name="goods_store"  placeholder="商品数量" value="">
                        </div>
                        <div class="col-md-2 title rowHeight2x">商品图片</div>
                        <div class="col-md-10 data rowHeight2x">
                           <input type="file" id="uploadify" name="goods_img">
                            <input type="hidden" name="img_path">
                            <span class="showimg"></span>
                        </div>

                        <div class="col-md-2 title rowHeight2x">商品相册</div>
                        <div class="col-md-10 data rowHeight2x total_imgs_path">
                            <input type="file" id="uploadifys" name="goods_imgs">
                            {{--<input type="hidden" name="img_paths">--}}
                            {{--<input type="hidden" name="img_paths">--}}
                            <span class="showimgs"></span>
                        </div>

                        <div class="col-md-2 title rowHeight2x">是否展示</div>
                        <div class="col-md-10 data rowHeight2x">
                            <input type="radio" name="is_show" value="1" checked>是
                            <input type="radio" name="is_show" value="2">否
                        </div>

                        <div class="col-md-2 title rowHeight2x">是否热卖</div>
                        <div class="col-md-10 data rowHeight2x">
                            <input type="radio" name="is_hot" value="1" checked>是
                            <input type="radio" name="is_hot" value="2">否
                        </div>
                    </div>
                </div>
                    {{--<button   id="click_up" >保存</button>--}}
    <div class="btn-toolbar list-toolbar">
        <button  id="button" >保存</button>
    </div>


</body>
{{--</form>--}}
{{--@endsection--}}

<script src="/js/uploadify/jquery.js"></script>
<script src="/js/uploadify/jquery.uploadify.js"></script>
<script>
    $(document).ready(function(){
        $("#uploadify").uploadify({
            uploader: "/goods/uploads",
            swf: "/js/uploadify/uploadify.swf",
            onUploadSuccess:function(res,data,msg){
//                console.log(res);
//                console.log(data);
//                console.log(msg);
                var imgPath  = data;
                var imgstr = "<img src='"+imgPath+"'>";
                $("input[name='img_path']").val(imgPath);
                $(".showimg").append(imgstr);
            }
        });
    });
</script>

{{--图片相册--}}
<script>
    $(document).ready(function(){
        $("#uploadifys").uploadify({
            uploader: "/goods/uploadss",
            swf: "/js/uploadify/uploadify.swf",
            onUploadSuccess:function(res,data,msg){
                var imgPath  = data;
                var imgstr = "<img src='"+imgPath+"'>";
                $(".showimgs").append(imgstr);

                var path_input="<input type='hidden' class='imgs_path' value='"+imgPath+"'>";
                $(".total_imgs_path").append(path_input);


            }
        });
    });
</script>
<script>
    $(document).on("click","#button",function(){
        var cate_id= $("select[name='cate_id']").val();
        var goods_name= $("input[name='goods_name']").val();
        var brand_id= $("select[name='brand_id']").val();
        var goods_title= $("input[name='goods_title']").val();
        var goods_price= $("input[name='goods_price']").val();
        var goods_desc =$("textarea[name='goods_desc']").val();
        var goods_packing= $("textarea[name='goods_packing']").val();
        var goods_sales= $("textarea[name='goods_sales']").val();
        var goods_sn= $("input[name='goods_sn']").val();
        var goods_store= $("input[name='goods_store']").val();
        var goods_img=   $("input[name='img_path']").val();
        var goods_imgs=[];

        $(document).find(".imgs_path").each(function(){
            var img_path = $(this).val();
            goods_imgs.push(img_path);
        });
    //console.log(goods_imgs);

        var is_show= $("input[name='is_show']").val();
        var is_hot= $("input[name='is_hot']").val();

        var data={};
        data.cate_id=cate_id;
        data.goods_name=goods_name;
        data.brand_id=brand_id;
        data.goods_title=goods_title;
        data.goods_price=goods_price;
        data.goods_desc=goods_desc;
        data.goods_packing=goods_packing;
        data.goods_sales=goods_sales;
        data.goods_sn=goods_sn;
        data.goods_store=goods_store;
        data.is_show=is_show;
        data.is_hot=is_hot;
        data.goods_img=goods_img;
        data.goods_imgs=goods_imgs;
//        console.log(data);
        $.ajax({
            url:"/goods/img",
            data:data,
            type:'post',
            success:function(res){
                if(res.code=='0000'){
                   location.href="/admins/goodslist";
                }else{
                    alert("跳转失败");
                }
            }
        })
    })

</script>

</html>