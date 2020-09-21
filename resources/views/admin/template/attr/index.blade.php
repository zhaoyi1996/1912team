@extends("layouts.shop")
@section("title","后台模板展示")
@section("content")
    @extends("layouts.shop")
@section("title","后台模板展示")
@section("content")
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <body class="hold-transition skin-red sidebar-mini" >
    <!-- .box-body -->

    <div class="box-header with-border">
        <h3 class="box-title">商品属性展示</h3>
    </div>

    <div class="box-body">

        <!-- 数据表格 -->
        <div class="table-box">

            <!--工具栏-->
            <div class="pull-left">
                <div class="form-group form-inline">
                    <div class="btn-group">
                        <a href="/admin/template/attr/create"><button type="button" class="btn btn-default" title="新建" data-toggle="modal" data-target="#editModal" >新建</button></a>
                        <button type="button" class="btn btn-default" title="刷新" onclick="window.location.reload();"><i class="fa fa-refresh"></i> 刷新</button>
                    </div>
                </div>
            </div>
            {{--<div class="box-tools pull-right">--}}
                {{--<div class="has-feedback">--}}
                    {{--分类模板名称：<input  >--}}
                    {{--<button class="btn btn-default">查询</button>--}}
                {{--</div>--}}
            {{--</div>--}}
            <!--工具栏/-->

            <!--数据列表-->
            <table id="dataList" class="table table-bordered table-striped table-hover dataTable">
                <thead>
                <tr>
                    {{--<th class="" style="padding-right:0px">--}}
                        {{--<input id="selall" type="checkbox" class="icheckbox_square-blue">--}}
                    {{--</th>--}}
                    <th class="sorting_asc">属性id</th>
                    <th class="sorting">属性名称</th>
                    <th class="sorting">添加时间</th>
                    <th class="text-center">操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($ShopData as $v)
                <tr>
                    {{--<td><input  type="checkbox"></td>--}}
                    <td>{{$v->attr_id}}</td>
                    <td>{{$v->attr_name}}</td>
                    <td>{{date('Y-m-d H:i:s',$v->add_time)}}</td>
                    <td class="text-center">
                        <a href="{{url('/admin/template/attr/edit/'.$v->attr_id)}}"><button type="button" class="btn bg-olive btn-xs" data-toggle="modal" data-target="#editModal" >修改</button></a>
                        <a href="{{url('/admin/template/attr/del/'.$v->attr_id)}}"><button type="button" class="btn btn-default" title="删除"><i class="fa fa-trash-o"></i> 删除</button></a>
                    </td>
                </tr>
                @endforeach
                <td>{{$ShopData->links()}}</td>
                </tbody>
            </table>
            <!--数据列表/-->
        </div>
        <!-- 数据表格 /-->
    </div>
    <!-- /.box-body -->

    </body>

@endsection







@endsection