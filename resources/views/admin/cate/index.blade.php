@extends("layouts.shop")
@section("title","商品后台分类管理")
@section("content")

<body class="hold-transition skin-red sidebar-mini" >
  <!-- .box-body -->
                
                    <div class="box-header with-border">
                        <h3 class="box-title">商品分类管理     
                       	</h3>
                    </div>

           
                        <!-- 数据表格 -->
                        <div class="table-box">
							
                            <!--工具栏-->
                            <div class="pull-left">
                                <div class="form-group form-inline">
                                    <div class="btn-group">
									<a href="/admin/cate/create/"> <button type="button" class="btn btn-default" title="新建" ><i class="fa fa-file-o"></i>新建</button></a>
									<button type="button" class="btn btn-default" title="刷新" onclick="window.location.reload();"><i class="fa fa-refresh"></i> 刷新<button>
                                       
                                    </div>
                                </div>
                            </div>                          
                       		
                        
			                <!--数据列表-->
			                  <table id="dataList" class="table table-bordered table-striped table-hover dataTable">
			                      <thead>
			                          <tr>
			                              <!-- <th class="" style="padding-right:0px">
			                                  <input type="checkbox" class="icheckbox_square-blue">
			                              </th>  -->
										  <th class="sorting_asc">分类ID</th>
									      <th class="sorting">分类名称</th>									   
									      <th class="sorting">类型模板ID</th>
										  <th class="sorting" class="cateValue" field="cate_show">是否显示</th>	
										   <th class="sorting" class="cateValue" field="cate_nav_show">是否导航显示</th>	
										   <th class="sorting">添加时间</th>	 
										   <!-- <th class="sorting">修改时间</th>	 						 -->
					                      <th class="text-center">操作</th>
			                          </tr>
			                      </thead>
			                      <tbody>
								  @foreach($res as $v)
									  <tr cate_id="{{$v->cate_id}}">
			                              <!-- <td><input  type="checkbox"> </td>			                               -->
				                          <td>{{$v->cate_id}}</td>
									      <td>{{str_repeat('|--',$v->level)}}{{$v->cate_name}}</td>									    
										  <td>{{$v->pid}}</td>
										  <td field="cate_show" class="cateValue">@if($v->cate_show==1)√@else × @endif</td>	
										  <td field="cate_nav_show" class="cateValue">{{$v->cate_nav_show==1?'√':'×'}}</td>	
										  <td>{{date("Y-m-d H:i:s",$v->add_time)}}</td>	
										  <!-- <td>{{date("Y-m-d H:i:s",$v->upd_time)}}</td>									       -->
		                                  <td class="text-center">		                                     
		                                      <a href="{{url('/admin/cate/destroy/'.$v->cate_id)}}"><button type="button" class="btn bg-olive btn-xs" >删除</button></a> 	                                     
		                                 	  <a href="{{url('/admin/cate/edit/'.$v->cate_id)}}"> <button type="button" class="btn bg-olive btn-xs"   >修改</button>   </a>                                        
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
              
<!-- 编辑窗口 -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" >
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h3 id="myModalLabel">商品分类编辑</h3>
		</div>
		<div class="modal-body">							
			
			<table class="table table-bordered table-striped"  width="800px">
				<tr>
		      		<td>上级商品分类</td>
		      		<td>
		      		   珠宝 >>  银饰
		      		</td>
		      	</tr>
		      	<tr>
		      		<td>商品分类名称</td>
		      		<td><input  class="form-control" placeholder="商品分类名称">  </td>
		      	</tr>			  
		      	<tr>
		      		<td>类型模板</td>
		      		<td>	      		
		      			<input select2 config="options['type_template']" placeholder="商品类型模板" class="form-control" type="text"/>
		      		</td>		      		      		
		      	</tr>		      	
			 </table>				
			
		</div>
		<div class="modal-footer">						
			<button class="btn btn-success" data-dismiss="modal" aria-hidden="true">保存</button>
			<button class="btn btn-default" data-dismiss="modal" aria-hidden="true">关闭</button>
		</div>
	  </div>
	</div>
</div>
</body>
@endsection

<script src="/jquery.js"></script>
<script>
	// 页面加载事件
	$(document).ready(function(){
		//对错号的即点即改
		// 绑定点击事件
		$(".cateValue").click(function(){	
			// alert("123 ");
			// false;		
			//获取这个对象
			var _this=$(this);
			// console.log(_this);
			// 获取分类id  cate_id  自定义属性的值
			var cate_id=_this.parent().attr("cate_id");
			// console.log(cate_id);
			//获取text 纯文本 √ ×是纯文本 所以我们使用 对象.text()来获取√ ×
			var sign=_this.text();
			// console.log(sign);
			//获取要修改的字段
			var field=_this.attr("field");
			// console.log(field);
			//获取值 如果获取到的是对号   将值赋值为 2 2表示的是×
			if(sign=="√"){
				var _value="2";
				// console.log(_value);
			}else{
				var _value="1";
				// console.log(_value);
			}
			// console.log(sign);
			// alert(_value);

			// // 使用ajax将cate_id将 字段 filed   传给后台php
			$.ajax({
				url:"/admin/cate/cateup",
				type:"post",
				data:{cate_id:cate_id,field:field,_value:_value},
				async:true,
				dataType:'json',
				//回调函数
				success:function(res){
					// console.log(res);//后台响应过来的数据
					if(res.code=='0000'){
						if(_value==2){
							console.log(111);
							_this.text("×");
						}else{
							console.log(123);
							_this.text("√");
						}
					}
				}

			})	



		})


	})



</script>
