@extends("layouts.shop")
@section("title","后台模板展示")
@section("content")
    <meta name="csrf-token" content="{{ csrf_token() }}">
<body class="hold-transition skin-red sidebar-mini" >
<!-- .box-body -->

<div class="box-header with-border">
	<h3 class="box-title">商品类型模板管理</h3>
</div>

<div class="box-body">

	<!-- 数据表格 -->
	<div class="table-box">

		<!--工具栏-->
		<div class="pull-left">
			<div class="form-group form-inline">
				<div class="btn-group">
					<button type="button" class="btn btn-default" title="新建" data-toggle="modal" data-target="#editModal" ><i class="fa fa-file-o"></i> 新建</button>
					<button type="button" class="btn btn-default" title="删除"><i class="fa fa-trash-o"></i> 删除</button>

					<button type="button" class="btn btn-default" title="刷新" onclick="window.location.reload();"><i class="fa fa-refresh"></i> 刷新</button>
				</div>
			</div>
		</div>
		<div class="box-tools pull-right">
			<div class="has-feedback">
				分类模板名称：<input  >
				<button class="btn btn-default">查询</button>
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
				<th class="sorting_asc">模板ID</th>
				<th class="sorting">分类模板名称</th>
				<th class="sorting">关联品牌</th>
				<th class="sorting">关联规格</th>
				<th class="sorting">扩展属性</th>
				<th class="text-center">操作</th>
			</tr>
			</thead>
			<tbody>
			<tr>
				<td><input  type="checkbox"></td>
				<td>1</td>
				<td>手机</td>
				<td>联想,华为,中兴</td>
				<td>网络制式</td>
				<td></td>
				<td class="text-center">
					<button type="button" class="btn bg-olive btn-xs" data-toggle="modal" data-target="#editModal" >修改</button>
				</td>
			</tr>
			<tr>
				<td><input  type="checkbox"></td>
				<td>2</td>
				<td>服装</td>
				<td>七匹狼,雅戈尔</td>
				<td>服装尺码</td>
				<td></td>
				<td class="text-center">
					<button type="button" class="btn bg-olive btn-xs" data-toggle="modal" data-target="#editModal" >修改</button>
				</td>
			</tr>
			</tbody>
		</table>
		<!--数据列表/-->
	</div>
	<!-- 数据表格 /-->
</div>
<!-- /.box-body -->
<!-- 编辑窗口 -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" >
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h3 id="myModalLabel">商品类型模板编辑</h3>
			</div>
			<div class="modal-body">
				<table class="table table-bordered table-striped"  width="800px">
					<tr>
						<td>商品类型</td>
						<td><input  class="form-control" name="type_name" id="type_name" placeholder="商品类型">  </td>
					</tr>
					<tr>
						<td>关联品牌</td>
						<td>
							<input select2 config="{data:[{id:'1',text:'联想'},{id:'2',text:'华为'}]}" multiple placeholder="选择品牌（可多选）" class="form-control" name="brand_id" id="brand_id" type="text"/>
						</td>
					</tr>
					<tr>
						<td>关联规格</td>
						<td>
							<input select2 select2-model="entity.specIds" config="options['specification']" multiple placeholder="选择规格（可多选）" class="form-control" name="attr_id" id=attr_id type="text"/>
						</td>
					</tr>

					<tr>
						<td>扩展属性</td>
						<td>
							<div class="btn-group">
								<button type="button" class="btn btn-default" title="新增扩展属性"><i class="fa fa-file-o"></i> 新增扩展属性</button>

							</div>
							<table class="table table-bordered table-striped"  width="800px">
								<thead>
								<tr>
									<td><input type="checkbox" class="icheckbox_square-blue"></td>
									<td>属性名称</td>
									<td>操作</td>
								</tr>
								</thead>
								<tbody>
								<tr>
									<td><input type="checkbox" class="icheckbox_square-blue" ></td>
									<td><input class="form-control" placeholder="属性名称" ></td>
									<td><button type="button" class="btn btn-default" title="删除"><i class="fa fa-trash-o"></i> 删除</button></td>
								</tr>
								<tr>
									<td><input type="checkbox" class="icheckbox_square-blue" ></td>
									<td><input class="form-control" placeholder="属性名称" ></td>
									<td><button type="button" class="btn btn-default" title="删除"><i class="fa fa-trash-o"></i> 删除</button></td>
								</tr>
								</tbody>
							</table>

						</td>
					</tr>
				</table>
			</div>
			<div class="modal-footer">
				<button class="btn btn-success" data-dismiss="modal" id="submit" aria-hidden="true">保存</button>
				<button class="btn btn-default" data-dismiss="modal" aria-hidden="true">关闭</button>
			</div>
		</div>
	</div>
</div>
</body>
<script>
    $('#submit').click(function(){
        //获取商品类型
        var type_name=$('#type_name').val();
        //获取关联品牌
        var brand_id=$('#brand_id').val();
        //获取关联规格
        var attr_id=$('#attr_id').val();
        //ajax传值到控制器
        $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
        $.ajax({
            url:"/admin/template/create",
            type:'post',
            data:{type_name:type_name,brand_id:brand_id,attr_id:attr_id},
            success:function(res){
                alert(res.msg);
                if(res.code==0){
                    location.href="/admin/template";
                }
            }
        });
    });
</script>
@endsection
