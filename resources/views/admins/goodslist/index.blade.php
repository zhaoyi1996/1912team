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
                    <button type="button" class="btn btn-default" title="删除" ><i class="fa fa-trash-o"></i> 删除</button>
                    <button type="button" class="btn btn-default" title="提交审核" ><i class="fa fa-check"></i> 提交审核</button>
                    <button type="button" class="btn btn-default" title="屏蔽" onclick='confirm("你确认要屏蔽吗？")'><i class="fa fa-ban"></i> 屏蔽</button>
                    <button type="button" class="btn btn-default" title="刷新" onclick="window.location.reload();"><i class="fa fa-refresh"></i> 刷新</button>
                </div>
            </div>
        </div>
        <div class="box-tools pull-right">
            <div class="has-feedback">
                状态：<select>
                    <option value="">全部</option>
                    <option value="0">未申请</option>
                    <option value="1">申请中</option>
                    <option value="2">审核通过</option>
                    <option value="3">已驳回</option>
                </select>
                商品名称：<input >
                <button class="btn btn-default" >查询</button>
            </div>
        </div>
        <!--工具栏/-->

        <!--数据列表-->
        <table id="dataList" class="table table-bordered table-striped table-hover dataTable">
            <thead>
            <tr>
                <th class="" style="padding-right:0px">
                    <input id="selall" type="checkbox" class="icheckbox_square-blue">
                </th>
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
                <th class="sorting">商品相册</th>
                <th class="sorting">是否展示</th>
                <th class="sorting">是否热卖</th>
                <th class="text-center">操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($res as $k=>$v)
            <tr>
                <td><input  type="checkbox"></td>
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
                <td>@if($v->goods_img)<img src="{{env('UPLOADS_URL')}}{{$v->goods_img}}" height="50" with="50">@endif</td>
                <td>{{$v->goods_imgs}}</td>
                <td>{{$v->goods_show?'√':'×'}}</td>
                <td>{{$v->goods_hot?'√':'×'}}</td>
                <td class="text-center">
                    <button type="button" class="btn bg-olive btn-xs">修改</button>
                </td>
            </tr>
                @endforeach
            </tbody>
        </table>
        <!--数据列表/-->


    </div>
    <!-- 数据表格 /-->


</div>
<!-- /.box-body -->

</body>
@endsection

<script>

</script>