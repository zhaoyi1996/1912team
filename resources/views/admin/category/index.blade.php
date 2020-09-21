@extends('layouts.shop')
@section('title',"商品后台广告轮播图管理")
@section('content')

<body class="hold-transition skin-red sidebar-mini"  >
  <!-- .box-body -->
                
                    <div class="box-header with-border">
                        <h3 class="box-title">广告轮播图管理</h3>
                    </div>

                    <div class="box-body">

                        <!-- 数据表格 -->
                        <div class="table-box">

                            <!--工具栏-->
                            <div class="pull-left">
                                <div class="form-group form-inline">
                                    <div clas="btn-group">
									<a href="/admin/category/create/"><button type="button" class="btn btn-default" title="新建" data-toggle="modal" data-target="#AddModal"><i class="fa fa-file-o"></i> 新建</button></a>
                                      <button type="button" class="btn btn-default" title="刷新" onclick="window.location.reload();"><i class="fa fa-refresh"></i> 刷新<button>
                                    </div>
                                </div>
                            </div>
                            
                            <!--工具栏/-->
							<form action="">
								<input type="text" name="sl_url">
								<input type="submit" value="地址搜索">
							</form>
			                  <!--数据列表-->
			                  <table id="dataList" class="table table-bordered table-striped table-hover dataTable">
			                      <thead>
			                          <tr>
			                             
										  <th class="sorting_asc">ID</th>
									      <th class="sorting">轮播图地址</th>
									      <th class="sorting">轮播图权重</th>
									      <th class="sorting">轮播图-图片</th>
										  <th class="sorting">添加时间</th>
									      <th class="sorting">是否展示</th>								      							
					                      <th class="text-center">操作</th>
			                          </tr>
			                      </thead>
			                      <tbody>
								  @foreach($slide as $v)
			                          <tr>
			                              			                              
				                          <td>{{$v->sl_id}}</td>
									      <td>{{$v->sl_url}}</td>
									      <td>{{$v->sl_weight}}</td>
									      <td><img src="{{env('APP_URL')}}{{$v->sl_log}}" width="80" hight="80" alt=""></td>
										  <th>{{date("Y-m-d H:i:s",$v->add_time)}}</th>
		                                  <td>@if($v->is_show==1)是@else 否 @endif</td>
		                                  <td class="text-center">                                           
		                                 	<a href="{{url('/admin/category/edit/'.$v->sl_id)}}"> <button type="button" class="btn bg-olive btn-xs" data-toggle="modal" data-target="#editModal" >修改</button> </a>                                          
											<a href="{{url('/admin/category/destroy/'.$v->sl_id)}}"> <button type="button" class="btn bg-olive btn-xs" data-toggle="modal" data-target="#editModal" >删除</button> </a>                                          
		                                  </td>
			                          </tr>
									  @endforeach
									  <td>
										<td colspan="6">{{$slide->appends($query)->links()}}</td>
									</td>
			                      </tbody>
			                  </table>
			                  <!--数据列表/--> 
                        </div>
                        <!-- 数据表格 /-->
                     </div>
                    <!-- /.box-body -->
	            <!-- 分页 -->
				
@endsection