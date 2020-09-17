     @extends("layouts.shop")
         @section("title",'rbac管理员添加')
         <!--  -->
         @section('content')

       <!-- 代码部分 -->
     {{--<form action="{{url('/admin/rbac/pow/store')}}" method="post">--}}
         <div class="modal-content">
             <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                 <h3 id="myModalLabel">管理员添加</h3>
             </div>
             <div class="modal-body">
                 <table class="table table-bordered table-striped"  width="800px">
                     <tr>
                         <td>管理员名称</td>
                         <td><input  class="form-control" id="admin_name" name="admin_name" placeholder="管理员名称" >
                         </td>
                     </tr>
                     <tr>
                         <td>管理员密码</td>
                         <td><input  class="form-control" id="admin_pwd" name="admin_pwd" placeholder="管理员密码" ></td>
                     </tr>
                 </table>
             </div>
             <div class="modal-footer">
                 {{--<input type="submit" value="添加" class="btn btn-success" data-dismiss="modal" aria-hidden="true">--}}
                 <button type="submit" id="button"  class="btn btn-success" data-dismiss="modal" aria-hidden="true">添加</button>
                         <!-- <a >添加</a> -->
             </div>
         </div>
     {{--</form>--}}
        <!-- 代码结尾 -->
     <script>
         $("#button").click(function(){
             var admin_name = $("#admin_name").val();
             var admin_pwd = $("#admin_pwd").val();
             $.ajax({
                 url:'/admin/rbac/admin/store',
                 type:'post',
                 dataType:'json',
                 data:{admin_name:admin_name,admin_pwd:admin_pwd},
                 success:function(res){
                     if(res.code==0){
                         alert(res.msg);
                         window.location.href="http://www.1912team.com/admin/rbac/admin/list";
                     }
                     if(res.code==1){
                         alert(res.msg)
                     }
                 }
             })
         })
     </script>
     @endsection