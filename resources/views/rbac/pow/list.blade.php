 @extends("layouts.shop")
     @section("title",'rbac权限展示')
     <!--  -->
     @section('content')
   
   <!-- 代码部分 -->
		<body class="hold-transition skin-red sidebar-mini" >
  <!-- .box-body -->                
                    <div class="box-header with-border">
                        <h3 class="box-title">权限添加</h3>
                    </div>
                    <div class="box-body">
                        <!-- 数据表格 -->
                        <div class="table-box">

                            <!--工具栏-->
                            <div class="pull-left">
                                <div class="form-group form-inline">
                                    <div class="btn-group">
 <button><i class="fa fa-file-o"></i> 新建</button>
										<a  type="button" class="btn btn-default"  data-toggle="modal" data-target="#editModal"  href="">添加</a>
                                        <button type="button" class="btn btn-default" title="刷新" onclick="window.location.reload();"><i class="fa fa-refresh"></i> 刷新</button>
                                    </div>
                                </div>
                            </div>
                            <div class="box-tools pull-right">
                                <div class="has-feedback">
                                	<form action="">
                                		权限名称<input type="text" name="pow_name" value="{{$pow_name}}">
                                		<input type="submit" value="查询">

                                	</form>
							        
                                </div>
                            </div>
                            <!--工具栏/-->
			                  <!--数据列表-->
			                  <table id="dataList" class="table table-bordered table-striped table-hover dataTable">
			                      <thead>
			                          <tr>
										  <th class="sorting_asc">权限ID</th>
									      <th class="sorting">节点名称</th>
										  <th class="text-center">权限url</th>
					                       <th class="text-center">创建时间</th>
					                       <th class="text-center">操作</th>
			                          </tr>
			                      </thead>

			                      <tbody>
								  @foreach($pow as $k=>$v)
			                          <tr >
			                             <td class="sorting_asc">{{$v->pow_id}}</td>
			                             <td class="sorting_asc">{{$v->pow_name}}</td>
			                             <td class="sorting_asc">{{$v->pow_url}}</td>
			                             <td class="sorting_asc">{{date('Y-m-d H:i:s',$v->pow_add_time)}}</td>
			                             <td class="sorting_asc">
											 <a href="{{url('/admin/rbac/pow/del/'.$v->pow_id)}}" class="btn bg-olive btn-xs" >删除</a>
											 <a href="{{url('/admin/rbac/pow/upd/'.$v->pow_id)}}" class="btn bg-olive btn-xs" >修改</a>
										 </td>
			                          </tr>
									  @endforeach
			                      </tbody>
			                  </table>
			                  <!--数据列表/-->    
			                  <td colspan="5" align="center">{{$pow->appends(['pow_name'=>$pow_name])->links()}}</td>
                        </div>
                        <!-- 数据表格 /--> 
                     </div>
                    <!-- /.box-body -->                    
</body>
	<!-- 代码结尾 -->
 @endsection