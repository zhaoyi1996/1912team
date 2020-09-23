 @extends("layouts.shop")
     @section("title",'商品列表')
     @section('content')
     
   
<body class="hold-transition skin-red sidebar-mini">
  <!-- .box-body -->
                    <div class="box-header with-border">
                        <h3 class="box-title">品牌管理</h3>
                    </div>

                    <div class="box-body">

                        <!-- 数据表格 -->
                        <div class="table-box">

                            <!--工具栏-->
                            <div class="pull-left">
                                <div class="form-group form-inline">
                                    <div class="btn-group">
                                        <a href="/admin/brand/create"><button type="button" id="click_up" class="btn btn-default" title="新建" data-toggle="modal" data-target="#editModal"  ><i class="fa fa-file-o"></i> 新建</button></a>
                                                
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
			                  	<form action="">
									<input type="text" name="name" value="{{$name}}">
									<input type="submit" value="搜索">
								</form>

			                      <thead>
			                          <tr>
			                              <th class="" style="padding-right:0px">
			                                  <input id="selall" type="checkbox" class="icheckbox_square-blue">
			                              </th> 
										  <th class="sorting_asc">品牌ID</th>
									      <th class="sorting">品牌名称</th>
									      <th class="sorting">品牌LOGO</th>
									      <th class="sorting">品牌URL</th>
									      <th class="sorting">品牌首字母</th>									     				
					                      <th class="text-center">操作</th>
			                          </tr>
			                      </thead>
			                      <tbody>
			                      	@foreach($data as $v)
			                          <tr>
			                              <td><input  type="checkbox" ></td>			                              
				                          <td>{{$v->brand_id}}</td>
									      <td>{{$v->brand_name}}</td>
									      <td>@if($v->brand_img)<img src="{{env('UPLOADS_URL')}}{{$v->brand_img}}" width="50">@endif</td>
									      <td>{{$v->brand_url}}</td>		     
		                                  <td>{{$v->brand_story}}</td>		                                 
		                                  <td class="text-center"> 
		                                  	<a href="{{url('/admin/brand/edit/'.$v->brand_id)}}">
                    						<button type="button" class="btn btn-primary">修改</button></a>
                    						<a href="{{url('/admin/brand/delete/'.$v->brand_id)}}">
                    						<button type="button" class="btn btn-primary">删除</button></a>
                                                       
		                                  </td>
			                          </tr>
								@endforeach
			                      </tbody>
			                  </table>
			                  {{$data->appends(["name"=>$name])->links()}}
			                  <!--数据列表/-->                        
							  
							 
                        </div>
                        <!-- 数据表格 /-->
                        
                        
                        
                        
                     </div>
                    <!-- /.box-body -->
         


 @endsection






 