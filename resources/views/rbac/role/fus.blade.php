 @extends("layouts.shop")
     @section("title",'rbac角色添加')
     <!--  -->
     @section('content')
   
   <!-- 代码部分 -->

     <div class="modal-content">
         <div class="modal-header">
             <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
             <h3 id="myModalLabel">角色添加</h3>
         </div>
         <div class="modal-body">
             <table class="table table-bordered table-striped"  width="800px">
                
                 <tr>
                     <td>角色权限</td>
                     <td>
                         @foreach($pow as $k=>$v)
                         <input type="checkbox" value="{{$v->pow_id}}" name="role_names"> {{$v->pow_name}}
                         @endforeach
                     </td>
            
                 </tr>
                 <input type="hidden" value="{{$id}}" id="ro_id">
             </table>
         </div>
         <div class="modal-footer">

             <!-- <a >添加</a> -->
             <button  type="submit" id="button" value="添加" class="btn btn-success" data-dismiss="modal" aria-hidden="true">添加</button>
         </div>
     </div>

<script>
    $("#button").click(function(){
        var checkboxarr=[];
        var ro_id =  $("#ro_id").val();

        $(".modal-body").find("input[name='role_names']:checked").each(function(){
            var id = $(this).val();
            checkboxarr.push(id);
        });
        // alert(checkboxarr);
        $.ajax({
            url:"/admin/rbac/role/fus2",
            type:'post',
            dataType:'json',
            data:{checkboxarr:checkboxarr,ro_id:ro_id},
            success:function(res){
                if(res.code==1){
                    alert(res.msg)
                    window.location.href="http://www.1912team.com/admin/rbac/role/list";
                }
                
            }
        })
})
</script>
	<!-- 代码结尾 -->
 @endsection