@extends("layouts.shop")
     @section("title",'底部友情链接')
     @section('content')
   
<body class="hold-transition skin-red sidebar-mini"  >
  <!-- .box-body -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">底部友情链接</h3>
                    </div>

                    <div class="box-body">

                        <!-- 数据表格 -->
                        <div class="table-box">
						<div class="pull-left">
                                <div class="form-group form-inline">
                                    <div class="btn-group">
                                    	<a href="/admin/foot/create"><button type="button" class="btn btn-default" title="新建" data-toggle="modal" data-target="#editModal" ><i class="fa fa-file-o"></i> 新建</button></a>
                                        <button type="button" class="btn btn-default" title="刷新" onclick="window.location.reload();"><i class="fa fa-refresh"></i> 刷新</button>
										
									</div>
                                </div>
                            </div>
                            <!--工具栏-->
                            
                            <div class="box-tools pull-right">
                                <form action="">
							        友情链接名称：<input type="text" name="foot_name">									
									<button class="btn btn-default" >查询</button>                                    
                                </form>
                            </div>
                            <!--工具栏/-->

			                  <!--数据列表-->
			                  <table id="dataList" class="table table-bordered table-striped table-hover dataTable">
			                      <thead>
			                          <tr>
			                              <th class="" style="padding-right:0px">
			                                  <input id="selall" type="checkbox" class="icheckbox_square-blue">
			                              </th> 
										  <th class="sorting_asc">友情链接ID</th>
									      <th class="sorting">友情链接名称</th>
									      <th class="sorting">友情链接地址</th>
									      <th class="sorting">友情链接权重</th>
									      <th class="sorting">添加时间</th>
									     							
					                      <th class="text-center">操作</th>
			                          </tr>
			                      </thead>
			                      <tbody>
								  @foreach($data as $vv)
			                          <tr>
			                              <td><input  type="checkbox"></td>			                              
				                          <td>{{$vv->foot_id}}</td>
									      <td>{{$vv->foot_name}}</td>
									     <td><a href="{{$vv->foot_url}}">{{$vv->foot_url}}</a> </td>
									      <td>{{$vv->foot_weight}}</td>
									      <td>{{date("Y-m-d H:i:s",$vv->foot_time)}}</td>
		                                  <td class="text-center">                                           
		                                 	<a href="{{url('admin/foot/edit/'.$vv->foot_id)}}"> <button type="button" class="btn bg-olive btn-xs" data-toggle="modal" data-target="#editModal" >修改</button> </a>    
											 <a href="{{url('admin/foot/destroy/'.$vv->foot_id)}}"> <button type="button" class="btn bg-olive btn-xs" data-toggle="modal" data-target="#editModal" >删除</button> </a>    

		                                  </td>
			                          </tr>
									@endforeach
									<td>
										<td colspan="6">{{$data->appends($query)->links()}}</td>
									</td>
			                      </tbody>
			                  </table>
			                  <!--数据列表/-->                        
							  
							 
                        </div>
                        <!-- 数据表格 /-->
                        
                        
                    </div>
                    <!-- /.box-body -->
          </body>
 @endsection
