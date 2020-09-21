@extends('layouts.shop')
@section('title',"商品后台广告轮播图管理")
@section('content')

<body class="hold-transition skin-red sidebar-mini"  >
  <!-- .box-body -->
                
                    <div class="box-header with-border">
                        <h3 class="box-title">小广告管理</h3>
                    </div>

                    <div class="box-body">

                        <!-- 数据表格 -->
                        <div class="table-box">

                            <!--工具栏-->
                            <div class="pull-left">
                                <div class="form-group form-inline">
                                    <div clas="btn-group">
										<!-- <button class="del btn btn-default">批量删除</button> -->
										<a href="/admin/ladver/create"><button type="button" class="btn btn-default" title="新建" data-toggle="modal" data-target="#AddModal"><i class="fa fa-file-o"></i> 新建</button></a>
                                      <button type="button" class="btn btn-default" title="刷新" onclick="window.location.reload();"><i class="fa fa-refresh"></i> 刷新<button>
                                    </div>
                                </div>
                            </div>
                            
                            <!--工具栏/-->
							<form action="">
								<input type="text" name="la_name">
								<input type="submit" value="搜索">
							</form>
			                  <!--数据列表-->
			                  <table id="dataList" class="table table-bordered table-striped table-hover dataTable">
			                      <thead>
			                          <tr>
										   <th class="" style="padding-right:0px">
			                                  <input id="selall" type="checkbox" class="icheckbox_square-blue">
			                              </th>
										  <th class="sorting_asc">小广告ID</th>
									      <th class="sorting">小广告名称</th>
									      <th class="sorting">小广告图片</th>
									      <th class="sorting">小广告url跳转地址</th>
										  <th class="sorting">小广告添加时间</th>						      							
					                      <th class="text-center">操作</th>
			                          </tr>
			                      </thead>
								  
			                      <tbody>
								 	@foreach($ladver as $v)
			                          <tr>
									  	  <td><input  type="checkbox" class="icheckbox_square-blue shan" value="{{$v->la_id}}"></td>	                              
				                          <td>{{$v->la_id}}</td>
									      <td>{{$v->la_name}}</td>
									      <td><img src="{{env('APP_URL')}}{{$v->la_img}}" width="80" hight="80" alt=""></td>
										  <td>{{$v->la_url}}</td>
										  <td>{{date('Y-m-d H:i:m'),$v->la_time}}</td>
		                                  <td class="text-center">                                           
		                                 	<a href="{{url('admin/ladver/edit/'.$v->la_id)}}"> <button type="button" class="btn bg-olive btn-xs" data-toggle="modal" data-target="#editModal" >修改</button> </a>    
											 <a href="{{url('admin/ladver/destroy/'.$v->la_id)}}"> <button type="button" class="btn bg-olive btn-xs" data-toggle="modal" data-target="#editModal" >删除</button> </a>    

		                                  </td>
			                          </tr>
									 @endforeach
									 <td>
										<td colspan="6">{{$ladver->appends($query)->links()}}</td>
									</td>
			                      </tbody>
			                  </table>
			                  <!--数据列表/--> 
                        </div>
                        <!-- 数据表格 /-->
                     </div>
                    <!-- /.box-body -->
	            <!-- 分页 -->
<script>
	$(document).on('click','.del',function(){
		// alert(1234);
		var id=""
		// 绑定复选框 循环
			$(".shan:checked").each(function(reg){
				// +=是拼接
				id+= $(this).val()+",";
			});
			// 计算长度，减去最后一个，
			var ids =id.length-1;
			id=id.substr(0,ids);
			// console.log(id);
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


@endsection