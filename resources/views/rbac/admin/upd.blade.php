@extends("layouts.shop")
@section("title",'rbac管理员添加')
        <!--  -->
@section('content')

        <!-- 代码部分 -->
<form action="{{url('/admin/rbac/admin/update/'.$admin->admin_id)}}" method="post">
<div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">管理员修改</h3>
    </div>
    <div class="modal-body">
        <table class="table table-bordered table-striped"  width="800px">
            <tr>
                <td>管理员名称</td>
                <td><input  class="form-control" id="admin_name" name="admin_name" value="{{$admin->admin_name}}">
                </td>
            </tr>
            <tr>
                <td>管理员密码</td>
                <td><input  class="form-control" type="password" id="admin_pwd" name="admin_pwd" value="{{$admin_pwd}}"></td>
            </tr>
        </table>
    </div>
    <div class="modal-footer">
        <input type="submit" value="修改" class="btn btn-success" >
        {{--<button type="submit" id="button"  class="btn btn-success" data-dismiss="modal" aria-hidden="true">添加</button>--}}
        <!-- <a >添加</a> -->
    </div>
</div>
</form>
        <!-- 代码结尾 -->

@endsection