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
                                        <button type="button" id="click_up" class="btn btn-default" title="新建" data-toggle="modal" data-target="#editModal"  ><i class="fa fa-file-o"></i> 新建</button>
                                                
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
		                                  	<a href="{{url('/admin/edit/'.$v->brand_id)}}">
                    						<button type="button" class="btn btn-primary">修改</button></a>
                    						<a href="{{url('/admin/delete/'.$v->brand_id)}}">
                    						<button type="button" class="btn btn-primary">删除</button></a>
                                                       
		                                  </td>
			                          </tr>
								@endforeach
			                      </tbody>
			                  </table>
			                  {{$data->links()}}
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
			<h3 id="myModalLabel">品牌编辑</h3>
		</div>
		<div class="modal-body">		
			<table class="table table-bordered table-striped" enctype="multipart/form-data"  width="800px">
		      	<tr>
		      		<td>品牌名称</td>
		      		<td><input  class="form-control" placeholder="品牌名称" name="brand_name">  </td>
		      	</tr>		      	
		      	<tr>
		      		<td>品牌图片</td>
		      		<td><input  type="file" class="form-control" id="uploadify"  placeholder="品牌图片" name="brand_img">  
		      			<input type="hidden" name="brand_img">
		      			<!-- <span class="showimg"></span> -->
					</td>
		      	</tr>	
		      	<tr>
		      		<td>品牌URL</td>
		      		<td><input  class="form-control" placeholder="品牌URL" name="brand_url">  </td>
		      	</tr>	
		      	<tr>
		      		<td>首字母</td>
		      		<td><input  class="form-control" placeholder="首字母" name="brand_story">  </td>
		      	</tr>		      	
			 </table>				
		</div>
		<div class="modal-footer">						
			<button class="btn btn-success" data-dismiss="modal" aria-hidden="true" id="test">保存</button>
			<button class="btn btn-default" data-dismiss="modal" aria-hidden="true">关闭</button>
		</div>
	  </div>
	</div>
</div>
   
</body>
<script>
	$("#test").click(function(){
		//alert(111);
		var brand_name=$("input[name='brand_name']").val();
		var brand_img=$("input[name='brand_img']").val();
		var brand_url=$("input[name='brand_url']").val();
		var brand_story=$("input[name='brand_story']").val();
		// console.log(brand_img)
		// return false
		$.ajax({
			url:"test",
			data:{brand_name:brand_name,brand_img:brand_img,brand_url:brand_url,brand_story:brand_story},
			type:"post",
			dataType:"json",
			success:function(res){
				if(res.code=='0'){
					location.href="brand";
				}else{
					alert("跳转失败");
				}
			}
		})
	})
</script>

 @endsection
 <script src="/uploadify/jquery.js"></script>
 <link rel="stylesheet" href="/uploadify/uploadify.css">
 <script src="/uploadify/jquery.uploadify.js"></script>
 <script>
	$(document).ready(function(){
		$("#uploadify").uploadify({
			uploader: "/admin/img",
			swf: "/uploadify/uploadify.swf",
			onUploadSuccess:function(res,data,msg){
				// console.log(res);
				// console.log(data);
				// console.log(msg);
				// return  false
				var imgPath  = data;
				var imgstr = "<img src='"+imgPath+"'>";
				$("input[name='brand_img']").val(imgPath);
				// $(".showimg").append(imgstr);
				
				// var video_str = "<video src='"+imgPath+"' controls='controls' style='width:400px;height:200px;'>";
				// $(".showimg").append(video_str);
			}
		});
	});
</script>

 
 