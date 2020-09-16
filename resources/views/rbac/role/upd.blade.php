@extends("layouts.shop")
@section("title",'rbac角色添加')
        <!--  -->
@section('content')

        <!-- 代码部分 -->
<form action="{{url('/admin/rbac/role/update/'.$role->ro_id)}}" method="post">
<div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">角色修改</h3>
    </div>
    <div class="modal-body">
        <table class="table table-bordered table-striped"  width="800px">
            <tr>
                <td>角色名称</td>
                <td><input  class="form-control" id="role_name" value="{{$role->ro_name}}" name="ro_name"  >
                </td>
            </tr>
        </table>
    </div>
    <div class="modal-footer">
        <!-- <a >添加</a> -->
        <input  type="submit" id="button" value="修改" class="btn btn-success" data-dismiss="modal" aria-hidden="true">
    </div>
</div>
</form>

<!-- 代码结尾 -->
@endsection