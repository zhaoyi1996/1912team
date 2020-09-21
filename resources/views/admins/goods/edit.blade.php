@extends("layouts.shop")
@section("title",'商品修改')
@section('content')


    <body class="hold-transition skin-red sidebar-mini" >

<!-- 正文区域 -->
<section class="content">

    <div class="box-body">

        <!--tab页-->
        <div class="nav-tabs-custom">

            <!--tab头-->
            <ul class="nav nav-tabs">
                <li class="active">
                    <a href="#home" data-toggle="tab">商品修改</a>
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


                <form action="{{url('/goods/update/'.$res->goods_id)}}" method="post">

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

                                <input type="text" class="form-control" name="goods_name" id="goods_name" placeholder="商品名称" value="{{$res->goods_name}}">
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
                                <input type="text" class="form-control" name="goods_title"  placeholder="商品标题" value="{{$res->goods_title}}">
                                <b style="color:red">{{$errors->first('goods_title')}}</b>
                            </div>

                            <div class="col-md-2 title">价格</div>
                            <div class="col-md-10 data">
                                <div class="input-group">
                                    <span class="input-group-addon">¥</span>
                                    <input type="text" class="form-control" id="goods_price" name="goods_price" placeholder="价格" value="{{$res->goods_price}}">
                                    <b style="color:red">{{$errors->first('goods_price')}}</b>
                                </div>
                            </div>

                            <div class="col-md-2 title editer">商品介绍</div>
                            <div class="col-md-10 data editer">
                                <textarea name="goods_desc" style="width:800px;height:400px;" >{{$res->goods_desc}}</textarea>
                            </div>

                            <div class="col-md-2 title rowHeight2x">包装列表</div>
                            <div class="col-md-10 data rowHeight2x">

                                <textarea rows="4" name="goods_packing" class="form-control"   placeholder="包装列表">{{$res->goods_packing}}</textarea>
                            </div>

                            <div class="col-md-2 title rowHeight2x">售后服务</div>
                            <div class="col-md-10 data rowHeight2x">
                                <textarea rows="4"  class="form-control" name="goods_sales" placeholder="售后服务">{{$res->goods_sales}}</textarea>
                            </div>

                            <div class="col-md-2 title">商品号</div>
                            <div class="col-md-10 data">
                                <input type="text" class="form-control" name="goods_sn"  placeholder="商品号" value="{{$res->goods_sn}}">
                            </div>
                            <div class="col-md-2 title">商品数量</div>
                            <div class="col-md-10 data">
                                <input type="text" class="form-control" name="goods_store"  placeholder="商品数量" value="{{$res->goods_store}}">
                            </div>
                            <div class="col-md-2 title rowHeight2x">商品图片</div>
                            <div class="col-md-10 data rowHeight2x">
                                <img src="{{env('UPLOADS_URL')}}{{$res->goods_img}}" width="60" height="60">
                                {{--<input type="file" id="uploadify" name="goods_img">--}}

                            </div>



                            <div class="col-md-2 title rowHeight2x">是否展示</div>
                            <div class="col-md-10 data rowHeight2x">
                                <input type="radio" checked name="is_show" value="1">是
                                <input type="radio" name="is_show" value="2">否
                            </div>

                            <div class="col-md-2 title rowHeight2x">是否热卖</div>
                            <div class="col-md-10 data rowHeight2x">
                                <input type="radio" name="is_hot" value="1">是
                                <input type="radio" checked name="is_hot" value="2">否
                            </div>
                        </div>
                    </div>
                    {{--<button   id="click_up" >保存</button>--}}
                    <div class="btn-toolbar list-toolbar">
                        <button   id="button" >修改</button>
                    </div>
                </form>

</body>
    @endsection

