     @extends("layouts.shop")
         @section("title",'rbac管理员添加')
         <!--  -->
         @section('content')

       <!-- 代码部分 -->
  
         <div class="modal-content">
             <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                 <h3 id="myModalLabel">添加角色</h3>
             </div>
             <div class="modal-body">
                 <table class="table table-bordered table-striped"  width="800px">
                   <tr>
                       <td>用户角色</td>
                        @foreach($role as $k=>$v)
                       <td><input type="checkbox" value="{{$v->ro_id}}" id="ro_id" name="role_names">{{$v->ro_name}}</td>
                       @endforeach
                   </tr>
                    <input type="hidden" value="{{$admin_id}}" id="admin_id">
                 </table>
             </div>
             <div class="modal-footer">

                 <button type="submit" id="button"  class="btn btn-success" data-dismiss="modal" aria-hidden="true">添加</button>
                         <!-- <a >添加</a> -->
             </div>
         </div>

        <!-- 代码结尾 -->
     <script>
        $("#button").click(function(){
        var checkboxarr=[];
        var admin_id =  $("#admin_id").val();
        // alert(admin_id)
        $(".modal-body").find("input[name='role_names']:checked").each(function(){
            var id = $(this).val();
            checkboxarr.push(id);
        });
        // alert(checkboxarr);
        $.ajax({
            url:"/admin/rbac/admin/fus2",
            type:'post',
            dataType:'json',
            data:{checkboxarr:checkboxarr,admin_id:admin_id},
            success:function(res){
                if(res.code==1){
                    alert(res.msg)
                    window.location.href="http://www.1912team.com/admin/rbac/admin/list";
                }
                // alert(res)
            }
        })
})
     </script>
     @endsection