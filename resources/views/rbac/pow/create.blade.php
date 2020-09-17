 @extends("layouts.shop")
     @section("title",'rbac权限添加')
     <!--  -->
     @section('content')
   
   <!-- 代码部分 -->
   <form action="{{url('/admin/rbac/pow/store')}}" method="post">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h3 id="myModalLabel">权限添加</h3>
		</div>
		<div class="modal-body">		
			<table class="table table-bordered table-striped"  width="800px">
		      	<tr>
		      		<td>权限名称</td>
		      		<td><input  class="form-control" name="pow_name" placeholder="权限名称" >
						<span style="color:red">{{$errors->first('pow_name')}}</span>
					</td>
				</tr>
				<tr>
					<td>权限描述</td>
					<td> <textarea class="form-control" name="pow_desc" rows="3"></textarea></td>
				</tr>
				<tr>
					<td>权限url</td>
					<td><input  class="form-control" name="pow_url" placeholder="权限url" >
						<span style="color:red">{{$errors->first('pow_url')}}</span>
					</td>
				</tr>
			 </table>
		</div>
		<div class="modal-footer">						
			<input type="submit" value="添加" class="btn btn-success" data-dismiss="modal" aria-hidden="true">
			<!-- <a >添加</a> -->
		</div>
	  </div>
	  </form>
	<!-- 代码结尾 -->
 @endsection