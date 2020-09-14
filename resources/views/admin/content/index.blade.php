@extends('layouts.shop')
@section('title',"商品后台广告类型管理")
@section('content')


<body class="hold-transition skin-red sidebar-mini">
  <!-- .box-body -->
                
                    <div class="box-header with-border">
                        <h3 class="box-title">广告管理</h3>
                    </div>

                    <div class="box-body">

                        <!-- 数据表格 -->
                        <div class="table-box">

                            <!--工具栏-->
                            <div class="pull-left">
                                <div class="form-group form-inline">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default" title="新建" data-toggle="modal" data-target="#editModal" ><i class="fa fa-file-o"></i> 新建</button>
                                        <button type="button" class="btn btn-default" title="删除" ><i class="fa fa-trash-o"></i> 删除</button>
                                        <button type="button" class="btn btn-default" title="开启" onclick='confirm("你确认要开启吗？")'><i class="fa fa-check"></i> 开启</button>
                                        <button type="button" class="btn btn-default" title="屏蔽" onclick='confirm("你确认要屏蔽吗？")'><i class="fa fa-ban"></i> 屏蔽</button>
                                        <button type="button" class="btn btn-default" title="刷新" onclick="window.location.reload();"><i class="fa fa-refresh"></i> 刷新</button>
                                    </div>
                                </div>
                            </div>
                            <div class="box-tools pull-right">
                                <div class="has-feedback">
							                                  
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
										  <th class="sorting_asc">广告ID</th>
									      <th class="sorting">分类ID</th>
									      <th class="sorting">标题</th>
									      <th class="sorting">URL</th>		
									      <th class="sorting">图片</th>	
									      <th class="sorting">排序</th>		
									      <th class="sorting">是否有效</th>											     						      							
					                      <th class="text-center">操作</th>
			                          </tr>
			                      </thead>
			                      <tbody>
			                          <tr>
			                              <td><input  type="checkbox"></td>			                              
				                          <td>1</td>
									      <td>1</td>
									      <td>促销海报1</td>
									      <td>http://wwww.hb.com/hd1.html</td>
									      <td>
									      	<img alt="" src="" width="100px" height="50px">
									      </td>
									      <td>1</td>
									      <td>有效</td>									     								     
		                                  <td class="text-center">                                           
		                                 	  <button type="button" class="btn bg-olive btn-xs" data-toggle="modal" data-target="#editModal">修改</button>                                           
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
			<h3 id="myModalLabel">广告编辑</h3>
		</div>
		<div class="modal-body">							
			
			<table class="table table-bordered table-striped"  width="800px">
				<tr>
		      		<td>广告分类</td>
		      		<td>
		      			<select class="form-control" ng-model="entity.categoryId" ng-options="item.id as item.name for item in options['content_category'].data">
		                </select>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td>标题</td>
		      		<td><input  class="form-control" placeholder="标题" ng-model="entity.title">  </td>
		      	</tr>
			    <tr>
		      		<td>URL</td>
		      		<td><input  class="form-control" placeholder="URL" ng-model="entity.url">  </td>
		      	</tr>	
		      	<tr>
		      		<td>排序</td>
		      		<td><input  class="form-control" placeholder="排序" ng-model="entity.sortOrder">  </td>
		      	</tr>			      	
		      	<tr>
		      		<td>广告图片</td>
		      		<td>
						<table>
							<tr>
								<td>
								<input type="file" id="file" />				                
					                <button class="btn btn-primary" type="button" ng-click="uploadFile()">
				                   		上传
					                </button>	
					            </td>
								<td>
									
								</td>
							</tr>						
						</table>
		      		</td>
		      	</tr>	      
		      	<tr>
		      		<td>是否有效</td>
		      		<td>
		      		   <input type="checkbox" class="icheckbox_square-blue" >
		      		</td>
		      	</tr>  	
			 </table>				
			
		</div>
		<div class="modal-footer">						
			<button class="btn btn-success" data-dismiss="modal" aria-hidden="true">保存</button>
			<button class="btn btn-default" data-dismiss="modal" aria-hidden="true">关闭</button>
		</div>
	  </div>
	</div>
</div>

</body>

@endsection