@extends("layouts.shop")
@section("title",'商品列表')
@section('content')

    <body class="hold-transition skin-red sidebar-mini" >
<!-- .box-body -->

<div class="box-header with-border">
    <h3 class="box-title">商品管理</h3>
</div>

<div class="box-body">

    <!-- 数据表格 -->
    <div class="table-box">

        <!--工具栏-->
        <div class="pull-left">
            <div class="form-group form-inline">
                <div class="btn-group">
                    <button type="button" class="btn btn-default" title="新建" ><i  class="fa fa-file-o"></i> <a href="{{url('/admins/goods')}}">新建</a></button>
                    <button type="button" class="btn btn-default" title="刷新" onclick="window.location.reload();"><i class="fa fa-refresh"></i> 刷新</button>
                </div>
            </div>
        </div>
        <div class="box-tools pull-right">
            <div class="has-feedback">
                <form>
                    商品名称<input type="text" name="goods_name" placeholder="请输入商品关键字">
                    <button>搜索</button>
                </form>
            </div>
        </div>
        <!--工具栏/-->

        <!--数据列表-->
        <table id="dataList" class="table table-bordered table-striped table-hover dataTable">
            <thead>
            <tr>
                <th class="sorting_asc">商品ID</th>
                <th class="sorting">商品分类</th>
                <th class="sorting">商品名称</th>
                <th class="sorting">商品价格</th>
                <th class="sorting">商品标题</th>
                <th class="sorting">商品介绍</th>
                <th class="sorting">包装列表</th>
                <th class="sorting">售后服务</th>
                <th class="sorting">商品号</th>
                <th class="sorting">商品数量</th>
                <th class="sorting">商品图片</th>
                {{--<th class="sorting">商品相册</th>--}}
                <th class="sorting">是否展示</th>
                <th class="sorting">是否热卖</th>
                <th class="sorting">添加时间</th>
                <th class="text-center">操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($res as $k=>$v)
            <tr>
                <td>{{$v->goods_id}}</td>
                <td>{{$v->cate_id}}</td>
                <td>{{$v->goods_name}}</td>
                <td>{{$v->goods_price}}</td>
                <td>{{$v->goods_title}}</td>
                <td>{{$v->goods_desc}}</td>
                <td>{{$v->goods_packing}}</td>
                <td>{{$v->goods_sales}}</td>
                <td>{{$v->goods_sn}}</td>
                <td>{{$v->goods_store}}</td>
                <td><img src="{{env('UPLOADS_URL')}}{{$v->goods_img}}" width="60" hight="60" alt=""></td>
                {{--<td>{{$v->goods_imgs}}</td>--}}
                <td>{{$v->goods_show?'√':'×'}}</td>
                <td>{{$v->goods_hot?'√':'×'}}</td>
                <td>{{date('Y-m-d H:i:s',$v->goods_add_time)}}</td>
                <td class="text-center">
                    <a href="javascript:void[0]" id="id" goods_id="{{$v->goods_id}}" class="btn bg-olive btn-xs">删除</a>
                    <a href="{{url('/goods/edit/'.$v->goods_id)}}" class="btn bg-olive btn-xs">编辑</a>
                </td>
            </tr>
                @endforeach
            <tr><td colspan="6">{{$res->appends($query)->links()}}</td></tr>
            </tbody>
        </table>
        <!--数据列表/-->


    </div>
    <!-- 数据表格 /-->


</div>
<!-- /.box-body -->

</body>
@endsection

<script src="/js/jquery.js"></script>
<script>

        $(document).on("click","#id",function () {
//            alert(1111);
            var goods_id=$(this).attr('goods_id');
            var _this = $(this);
            if(confirm("你确认要删除吗")){
                $.get("/goods/delete/"+goods_id,function(res){
                    if(res.code==0){
                        alert(res.msg);
                        _this.parents("tr").remove();
                    }
                },'json')
            }
        })
</script>