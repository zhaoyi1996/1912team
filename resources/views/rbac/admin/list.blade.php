 @extends("layouts.shop")
     @section("title",'rbac管理员展示')
     <!--  -->
     @section('content')
   
   <!-- 代码部分 -->
 {{--<meta http-equiv="refresh" content="5">--}}
		<body class="hold-transition skin-red sidebar-mini" >
  <!-- .box-body -->                
                    <div class="box-header with-border">
                        <h3 class="box-title">管理员列表</h3>
                    </div>
                    <div class="box-body">
                        <!-- 数据表格 -->
                        <div class="table-box">

                            <!--工具栏-->
                            <div class="pull-left">
                                <div class="form-group form-inline">
                                    <div class="btn-group">
                                        <!-- <button type="button" class="btn btn-default" title="新建" data-toggle="modal" data-target="#editModal" ><i class="fa fa-file-o"></i> 新建</button> -->
                                       
                                        <button type="button" class="btn btn-default" title="刷新" onclick="window.location.reload();"><i class="fa fa-refresh"></i> 刷新</button>
                                    </div>
                                </div>
                            </div>
                            <div class="box-tools pull-right">
                                <!-- <div class="has-feedback">
							                    管理员名称：<input  >									
									<button class="btn btn-default" >查询</button>                                    
                                </div> -->
                            </div>
                            <!--工具栏/-->
			                  <!--数据列表-->
			                  <table id="dataList" class="table table-bordered table-striped table-hover dataTable">
			                      <thead>
			                          <tr>

										  <th class="sorting_asc">管理员ID</th>
									      <th class="sorting">管理员名称</th>	
									      <th class="sorting">添加时间</th>									     												
					                      <th class="text-center">操作</th>
			                          </tr>
			                      </thead>
			                      <tbody>
			                         @foreach($admin as $k=>$v)
									  <tr >

				                          <td>{{$v->admin_id}}</td>
									      <td>{{$v->admin_name}}</td>
									      <td>{{date('Y-m-d H:i:s',$v->admin_add_time)}}</td>
		                                  <td class="text-center" admin_id="{{$v->admin_id}}">
											  <a href="{{url('/admin/rbac/admin/upd/'.$v->admin_id)}}" class="btn bg-olive btn-xs" >修改</a>
											  {{--<button type="button" id="del" class="btn bg-olive btn-xs" data-toggle="modal" data-target="#editModal">删除</button>--}}
											  <a href="{{url('/admin/rbac/admin/del/'.$v->admin_id)}}" class="btn bg-olive btn-xs" >删除</a>
											  <a href="{{url('/admin/rbac/admin/fus/'.$v->admin_id)}}" class="btn bg-olive btn-xs" >添加角色</a>
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
<body class="hold-transition skin-red sidebar-mini" >
  <!-- .box-body -->                
                    <div class="box-header with-border">
                        <h3 class="box-title">管理员角色列表</h3>
                    </div>
                    <div class="box-body">
                        <!-- 数据表格 -->
                        <div class="table-box">

                            <!--工具栏-->
                            <div class="pull-left">
                                <div class="form-group form-inline">
                                    <div class="btn-group">
                                       
                                    </div>
                                </div>
                            </div>
                            <div class="box-tools pull-right">
                                
                            </div>
                            <!--工具栏/-->
			                  <!--数据列表-->
			                  <table id="dataList" class="table table-bordered table-striped table-hover dataTable">
			                      <thead>
			                          <tr>
										  <th class="sorting_asc">管理员权限ID</th>
									      <th class="sorting">管理员名称</th>	
									      <th class="sorting">管理员角色</th>
									      <th class="sorting">添加时间</th>									     												
					                      <th class="text-center">操作</th>
			                          </tr>
			                      </thead>
			                      <tbody>
			                         @foreach($admins as $k=>$v)
									  <tr >
				                          <td>{{$v->admin_user_role_id}}</td>
									      <td>{{$v->admin_name}}</td>
									      <td>{{$v->ro_name}}</td>
									      <td>{{date('Y-m-d H:i:s',$v->admin_add_time)}}</td>
		                                  <td class="text-center" admin_id="{{$v->admin_id}}">
											  <!-- <a href="{{url('/admin/rbac/admin/upd/'.$v->admin_id)}}" class="btn bg-olive btn-xs" >修改</a> -->
											  <a href="{{url('/admin/rbac/admin/del/'.$v->admin_id)}}" class="btn bg-olive btn-xs" >删除</a>
											  <!-- <a href="{{url('/admin/rbac/admin/fus/'.$v->admin_id)}}" class="btn bg-olive btn-xs" >添加角色</a> -->
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
 <script>
	 $("#del").click(function(){
		var admin_id = $(this).parent().attr("admin_id");
		 $.get('/admin/rbac/admin/del/'+admin_id,function(res){
			 if(res.code==0){
				 alert(res.msg)
			 }
			 if(res.code==1){
				 alert(res.msg)
			 }
		 },'json');
	 })
 </script>
	<!-- 代码结尾 -->
 @endsection