@extends("layouts.shop")
     @section("title",'导航管理')
     @section('content')
   
<body class="hold-transition skin-red sidebar-mini"  >
  <!-- .box-body -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">导航展示</h3>
                    </div>

                    <div class="box-body">

                        <!-- 数据表格 -->
                        <div class="table-box">
						<div class="pull-left">
                                <div class="form-group form-inline">
                                    <div class="btn-group">
										<button class="del btn btn-default">批量删除</button>
                                    	<a href="/admin/nav/create"><button type="button" class="btn btn-default" title="新建" data-toggle="modal" data-target="#editModal" ><i class="fa fa-file-o"></i> 新建</button></a>
                                        <button type="button" class="btn btn-default" title="刷新" onclick="window.location.reload();"><i class="fa fa-refresh"></i> 刷新</button>
										
									</div>
                                </div>
                            </div>
                            <!--工具栏-->
                            
                            <div class="box-tools pull-right">
                                <form action="">
							        导航名称：<input type="text" name="nav_name">									
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
										  <th class="sorting_asc">导航ID</th>
									      <th class="sorting">导航名称</th>
									      <th class="sorting">导航跳转地址</th>
									      <th class="sorting">导航权重</th>
                                          <th class="sorting">是否展示</th>
									      <th class="sorting">添加时间</th>
										  <th class="sorting">导航展示id</th>
					                      <th class="text-center">操作</th>
			                          </tr>
			                      </thead>
			                      <tbody>
								  @foreach($data as $vv)
			                          <tr>
			                              <td><input  type="checkbox" class="icheckbox_square-blue shan" value="{{$vv->nav_id}}"></td>			                              
				                          <td>{{$vv->nav_id}}</td>
									      <td>{{$vv->nav_name}}</td>
										  <td><a href="{{$vv->nav_url}}">{{$vv->nav_url}}</a> </td>
									      <td>{{$vv->nav_weight}}</td>
                                          <td>@if($vv->nav_show==1)是@else 否@endif</td>
									      <td>{{date("Y-m-d H:i:s",$vv->nav_time)}}</td>
										  <td>{{$vv->cate_id}}</td>
		                                  <td class="text-center">                                           
		                                 	<a href="{{url('admin/nav/edit/'.$vv->nav_id)}}"> <button type="button" class="btn bg-olive btn-xs" data-toggle="modal" data-target="#editModal" >修改</button> </a>    
									
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
			</div>
		  </body>
 @endsection

 <script>
	$(document).on('click','.del',function(){
		alert(1234);
		var id=""
		// 绑定复选框 循环
			$(".shan:checked").each(function(reg){
				// +=是拼接
				id+= $(this).val()+",";
			});
			// 计算长度，减去最后一个，
			var ids =id.length-1;
			id=id.substr(0,ids);
			console.log(id);
		$.ajax({
			url:'/admin/ladver/ajaxdel',
			data:{id:id},
			type:'post',
			dataType:'json',
			success:function(res){
				if(res.code==0){
					alert(res.msg)
					location.href="/admin/ladver"
				}
				consoel.log(res);
			}
		})


	})

</script>

