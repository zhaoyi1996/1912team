 @extends("layouts.shop")
     @section("title",'rbac角色添加')
     <!--  -->
     @section('content')
   
   <!-- 代码部分 -->
 {{--<form action="" method="post">--}}
     <div class="modal-content">
         <div class="modal-header">
             <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
             <h3 id="myModalLabel">角色添加</h3>
         </div>
         <div class="modal-body">
             <table class="table table-bordered table-striped"  width="800px">
                 <tr>
                     <td>角色名称</td>
                         <td><input  class="form-control" id="role_name" name="role_name" placeholder="角色名称" >
                     </td>
                 </tr>
             </table>
         </div>
         <div class="modal-footer">

             <!-- <a >添加</a> -->
             <button  type="submit" id="button" value="添加" class="btn btn-success" data-dismiss="modal" aria-hidden="true">添加</button>
         </div>
     </div>
 {{--</form>--}}
 <script>
     $("#button").click(function(){
         var role_name = $("#role_name").val();
         $.ajax({
             url:'/admin/rbac/role/store',
             type:'post',
             dataType:'json',
             data:{role_name:role_name},
             success:function(res){
                 if(res.code==0){
                    alert(res.msg)
                     window.location.href='http://www.1912team.com/admin/rbac/role/list';
                 }
                 if(res.code==1){
                     alert(res.msg)
                 }
             }
         })
     })
 </script>
	<!-- 代码结尾 -->
 @endsection