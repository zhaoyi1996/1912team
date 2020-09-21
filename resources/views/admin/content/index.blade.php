@extends('layouts.shop')
@section('title',"商品后台公告管理")
@section('content')


<body class="hold-transition skin-red sidebar-mini">
  <!-- .box-body -->
                
                    <div class="box-header with-border">
                        <h3 class="box-title">公告管理</h3>
                    </div>

                    <div class="box-body">

                        <!-- 数据表格 -->
                        <div class="table-box">

                            <!--工具栏-->
                            <div class="pull-left">
                                <div class="form-group form-inline">
                                    <div class="btn-group">
                                    	<a href="/admin/content/create"><button type="button" class="btn btn-default" title="新建" data-toggle="modal" data-target="#editModal" ><i class="fa fa-file-o"></i> 新建</button></a>
                                        <button type="button" class="btn btn-default" title="刷新" onclick="window.location.reload();"><i class="fa fa-refresh"></i> 刷新</button>
										
									</div>
                                </div>
                            </div>
                            <div class="box-tools pull-right">
                                <div class="has-feedback">
								                 
                                </div>
                            </div>
                            <!--工具栏/-->
							<form action="">
								<input type="text" name="an_name">
								<input type="submit" value="公告名称搜索">
							</form>
			                  <!--数据列表-->
							  <!-- <form action="">
									<input type="text" name="an_name">
									<input type="submit" value="搜索">
								</form>     -->
			                  <table id="dataList" class="table table-bordered table-striped table-hover dataTable">
			                      <thead>
			                          <tr>
			                              <!-- <th class="" style="padding-right:0px">
			                                  <input id="selall" type="checkbox" class="icheckbox_square-blue">
			                              </th>  -->
									      <th class="sorting">公告ID</th>
									      <th class="sorting">公告名称</th>
									      <th class="sorting">公告url跳转地址</th>		
									      <th class="sorting">公告介绍</th>	
										  <th class="sorting">折扣价格</th>
										  <th class="sorting">折扣销售数量</th>
										  <th class="sorting">折扣时间</th>
										  <th class="sorting">关联商品ID</th>
										  <th class="text-center">操作</th>
			                          </tr>
			                      </thead>
			                      <tbody>
								@foreach($annou as $v) 
			                          <tr>
			                              <!-- <td><input  type="checkbox"></td>			                               -->
				                          <td>{{$v->an_id}}</td>
									      <td>{{$v->an_name}}</td>
									      <td><a href="{{$v->an_url}}">{{$v->an_url}}</td></a>
									      <td>{{$v->an_desc}}</td>
									      <td>{{$v->an_st_price}}</td>
									      <td>{{$v->an_st_num}}</td>
										  <td>{{date("Y-m-d H:i:s",$v->an_st_time)}}</td>
									      <td>{{$v->goods_id}}</td>					     								     
		                                  <td class="text-center">                                           
										  		<a href="{{url('/admin/content/edit/'.$v->an_id)}}"><button type="button" class="btn bg-olive btn-xs" data-toggle="modal" data-target="#editModal">修改</button></a>
											  	<a href="{{url('/admin/content/destroy/'.$v->an_id)}}"> <button type="button" class="btn bg-olive btn-xs" data-toggle="modal" data-target="#editModal">删除</button></a>                                                                                     
		                                  </td>
			                          </tr>
								@endforeach
									<tr>
										<td colspan="6">{{$annou->appends($query)->links()}}</td>
									</tr>	  
			                      </tbody>
			                  </table>
			                  <!--数据列表/--> 
                        </div>
                        <!-- 数据表格 /-->
                     </div>
                    <!-- /.box-body -->

	</div>
</div>

</body>

@endsection