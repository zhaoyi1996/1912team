 @extends("layouts.shop")
     @section("title",'rbac角色展示')
     <!--  -->
     @section('content')
   
   <!-- 代码部分 -->
		<body class="hold-transition skin-red sidebar-mini" >
  <!-- .box-body -->                
                    <div class="box-header with-border">
                        <h3 class="box-title">角色添加</h3>
                    </div>
                    <div class="box-body">
                        <!-- 数据表格 -->
                        <div class="table-box">

                            <!--工具栏-->
                            <div class="pull-left">
                                <div class="form-group form-inline">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default" title="新建" data-toggle="modal" data-target="#editModal" ><i class="fa fa-file-o"></i> 新建</button>
                                       
                                        <button type="button" class="btn btn-default" title="刷新" onclick="window.location.reload();"><i class="fa fa-refresh"></i> 刷新</button>
                                    </div>
                                </div>
                            </div>
                            <div class="box-tools pull-right">
                                <div class="has-feedback">
							        	<form action="">
							        		<input type="text" name="ro_name" value="{{$ro_name}}">
							        		<input type="submit" value="查询">
							        	</form>
							                                              
                                </div>
                            </div>
                            <!--工具栏/-->
			                  <!--数据列表-->
			                  <table id="dataList" class="table table-bordered table-striped table-hover dataTable">
			                      <thead>
			                          <tr>
										  <th class="sorting_asc">角色ID</th>
									      <th class="sorting">角色名称</th>
									      <th class="sorting">角色添加时间</th>
					                       <th class="text-center">操作</th>
			                          </tr>
			                      </thead>
			                      <tbody>
									@foreach($ro as $k=>$v)
			                          <tr>
			                             <td>{{$v->ro_id}}</td>
			                             <td>{{$v->ro_name}}</td>
			                             <td>{{date('Y-m-d H:i:s',$v->ro_add_time)}}</td>
			                             <td class="text-center">
											 <a href="{{url('/admin/rbac/role/del/'.$v->ro_id)}}" class="btn bg-olive btn-xs" >删除</a>
											 <a href="{{url('/admin/rbac/role/fus/'.$v->ro_id)}}" class="btn bg-olive btn-xs" >赋权限</a>
											 <a href="{{url('/admin/rbac/role/upd/'.$v->ro_id)}}" class="btn bg-olive btn-xs" >修改</a>
										 </td>
			                          </tr>
									  @endforeach
			                      </tbody>
			                  </table>
			                  <td colepan="4" alian="center">{{$ro->appends(['ro_name'=>$ro_name])->links()}}</td>
			                  <!--数据列表/-->    
                        </div>
                        <!-- 数据表格 /--> 
                     </div>
                    <!-- /.box-body -->                    
</body>
<body class="hold-transition skin-red sidebar-mini" >
  <!-- .box-body -->                
                    <div class="box-header with-border">
                        <h3 class="box-title">角色相应权限</h3>
                    </div>
                    <div class="box-body">
                        <!-- 数据表格 -->
                        <div class="table-box">

                            <!--工具栏-->
                            <div class="pull-left">
                                <div class="form-group form-inline">
                                    <div class="btn-group">
                                       <!--  <button type="button" class="btn btn-default" title="新建" data-toggle="modal" data-target="#editModal" ><i class="fa fa-file-o"></i> 新建</button>
                                       
                                        <butt --><!-- on type="button" class="btn btn-default" title="刷新" onclick="window.location.reload();"><i class="fa fa-refresh"></i> 刷新</button> -->
                                    </div>
                                </div>
                            </div>
                           
                            <!--工具栏/-->
			                  <!--数据列表-->
			                  <table id="dataList" class="table table-bordered table-striped table-hover dataTable">
			                      <thead>
			                          <tr>
										  
									      <th class="sorting">角色名称</th>
									      <th class="sorting">角色权限</th>
									      <th class="sorting">角色权限添加时间</th>
					                       <th class="text-center">操作</th>
			                          </tr>
			                      </thead>
			                      <tbody>
									@foreach($ros as $k=>$v)
			                          <tr>
			                             
			                             <td>{{$v->ro_name}}</td>
			                             <td>{{$v->pow_name}}</td>
			                             <td>{{date('Y-m-d H:i:s',$v->ro_add_time)}}</td>
			                             <td class="text-center">
											 <a href="{{url('/admin/rbac/role/del/'.$v->ro_id)}}" class="btn bg-olive btn-xs" >删除</a>
											 	
											 <a href="{{url('/admin/rbac/role/upd/'.$v->ro_id)}}" class="btn bg-olive btn-xs" >修改</a>
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
	<!-- 代码结尾 -->
 @endsection