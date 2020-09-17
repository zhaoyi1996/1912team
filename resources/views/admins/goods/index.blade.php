@extends("layouts.shop")
@section("title",'新增商品')
@section('content')
    <link rel="stylesheet" href="/js/uploadify/uploadify.css">

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
                <form action="/goods/create" method="post" enctype="multipart/form-data">
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
                            <b style="color:red">{{$errors->first('goods_name')}}</b>
                        </div>

                        <div class="col-md-2 title">品牌</div>
                        <div class="col-md-10 data">

                            <select class="form-control" name="brand_id" id="">
                                <option value="0">--请选择--</option>
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
                        </div>

                        <div class="col-md-2 title rowHeight2x">商品相册</div>
                        <div class="col-md-10 data rowHeight2x">
                            <input type="file"  name="goods_imgs[]" multiple="multiple">
                        </div>

                        <div class="col-md-2 title rowHeight2x">是否展示</div>
                        <div class="col-md-10 data rowHeight2x">
                            <input type="radio" name="is_show" value="1">是
                            <input type="radio" name="is_show" value="2">否
                        </div>

                        <div class="col-md-2 title rowHeight2x">是否热卖</div>
                        <div class="col-md-10 data rowHeight2x">
                            <input type="radio" name="is_hot" value="1">是
                            <input type="radio" name="is_hot" value="2">否
                        </div>
                    </div>
                </div>
                    {{--<button   id="click_up" >保存</button>--}}
    <div class="btn-toolbar list-toolbar">
        <button   id="button" >保存</button>
    </div>


</body>
</form>
@endsection
<script src="/js/uploadify/jquery.js"></script>
{{--<script src="/js/uploadify/jquery.uploadify.js"></script>--}}
<script>
    $(document).ready(function(){
        $("#uploadify").uploadify({
            uploader: "/uploads",
            swf: "/js/uploadify/uploadify.swf",
            onUploadSuccess:function(res,data,msg){
                console.log(res);
                console.log(data);
                console.log(msg);
                var imgPath  = data;
                var imgstr = "<img src='"+imgPath+"'>";
                $("input[name='img_path']").val(imgPath);
                $(".showimg").append(imgstr);
            }
        });
    });


//        $(document).on('#click_up','click',function(){
//            alert(111);
//            return false;
//            var goods_name=$("#goods_name").val();
//
//            var goods_name=$("#goods_price").val();
//            $.ajax({
//                url:'/admins/goods/',
//                type:'post',
//                dataType:'json',
//                data:{goods_name:goods_name,goods_price:goods_price},
//                success: function (res) {
//                    if(res.code==0){
//                        alert(res.msg);
//                        window.location.href="http://www.1912.com/admins/goodslist/index";
//                    }
//                    if(res.code==1){
//                        alert(res.msg);
//                    }
//                }
//            })
//        })



</script>